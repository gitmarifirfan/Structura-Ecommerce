<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\api\ApiVerificationMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;

class ApiController extends Controller
{
    // REGISTER
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            app(ApiVerificationMail::class)->sendVerificationEmail($user);

            return response()->json([
                'message' => 'Registrasi berhasil! Silakan cek email untuk verifikasi akun.',
                'user' => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat registrasi!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // LOGIN
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string'
            ]);

            if (!Auth::attempt($credentials)) {
                return response()->json(['message' => 'Email atau password salah'], 401);
            }

            /** @var \App\Models\User $user */
            $user = Auth::user();

            // Cek apakah email sudah diverifikasi
            if (is_null($user->email_verified_at)) {
                Auth::logout(); // Logout jika belum verifikasi
                return response()->json([
                    'message' => 'Silakan verifikasi email Anda terlebih dahulu sebelum login.'
                ], 403);
            }

            // Hapus semua token lama sebelum membuat token baru
            $user->tokens()->delete();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login berhasil!',
                'token' => $token,
                'user' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat login!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // GET PROFILE
    public function profile(Request $request)
    {
        try {
            if (!$request->user()) {
                return response()->json([
                    'message' => 'Token tidak valid atau sudah expired'
                ], 401);
            }

            return response()->json([
                'message' => 'Profil user berhasil diambil!',
                'user' => [
                    'id' => $request->user()->id,
                    'name' => $request->user()->name,
                    'email' => $request->user()->email,
                    'address' => json_decode($request->user()->address, true) // Decode JSON
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat mengambil profil!',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    // UPDATE PROFILE
    public function updateProfile(Request $request)
    {
        try {
            $user = $request->user();

            if (!$user) {
                return response()->json([
                    'message' => 'Token tidak valid atau sudah expired'
                ], 401);
            }

            $request->validate([
                'name' => 'sometimes|string|max:255',
                'address' => 'sometimes|array', // Pastikan address berbentuk array

                'address.nama_penerima' => 'required|string|max:255',
                'address.no_telepon' => 'required|string|max:15',
                'address.provinsi' => 'sometimes|string|max:255',
                'address.kota_kabupaten' => 'sometimes|string|max:255',
                'address.kecamatan' => 'sometimes|string|max:255',
                'address.kode_pos' => 'sometimes|string|max:10',
                'address.alamat_lengkap' => 'sometimes|string|max:500'
            ]);

            // Simpan data dalam format JSON
            $user->update([
                'name' => $request->name ?? $user->name,
                'address' => $request->has('address') ? json_encode($request->address) : $user->address
            ]);

            return response()->json([
                'message' => 'Profil berhasil diperbarui!',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'address' => json_decode($user->address, true)
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat memperbarui profil!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // LOGOUT
    public function logout(Request $request)
    {
        try {
            $user = $request->user();

            if (!$user) {
                return response()->json([
                    'message' => 'Token tidak valid atau sudah expired'
                ], 401);
            }

            // Hapus semua token yang dimiliki user
            $user->tokens()->delete();

            return response()->json([
                'message' => 'Logout berhasil! Token dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat logout!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

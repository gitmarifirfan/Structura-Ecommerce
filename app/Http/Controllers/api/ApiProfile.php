<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiProfile extends Controller
{
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

                'address.nama_penerima' => 'nullable|string|max:255',
                'address.no_telepon' => 'nullable|string|max:15',
                'address.provinsi' => 'nullable|string|max:255',
                'address.kota_kabupaten' => 'nullable|string|max:255',
                'address.kecamatan' => 'nullable|string|max:255',
                'address.kode_pos' => 'nullable|string|max:10',
                'address.alamat_lengkap' => 'nullable|string|max:500'
            ]);

            // Decode data lama dari database
            $oldAddress = json_decode($user->address, true) ?? [];

            // Gabungkan data lama dengan data baru agar tidak hilang
            $newAddress = array_merge($oldAddress, $request->input('address', []));

            // Simpan dalam format JSON
            $user->update([
                'name' => $request->name ?? $user->name,
                'address' => json_encode($newAddress),
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
}

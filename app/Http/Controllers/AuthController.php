<?php

namespace App\Http\Controllers;

use App\Mail\emailSendingStructura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Menampilkan Form Register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Menampilkan Form Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'address' => 'nullable|string|max:255',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
        ]);

        // Buat Link Verifikasi
        $verificationUrl = route('verification.verify', ['id' => $user->id, 'hash' => sha1($user->email)]);

        // Kirim email verifikasi
        Mail::to($user->email)->send(new emailSendingStructura($user, $verificationUrl));

        return redirect()->route('login.form')->with('success', 'Silahkan cek email untuk verifikasi.');

        // return response()->json([
        //     'message' => 'Registrasi berhasil!',
        //     'user' => $user
        // ], 201);

    }

    // Verifikasi email
    public function verifyEmail($id, $hash)
    {
        $user = User::findOrFail($id);

        if (sha1($user->email) !== $hash) {
            return redirect()->route('login.form')->with('error', 'Token verifikasi tidak valid!');
        }

        // Update status email_verified_at
        $user->update(['email_verified_at' => now()]);
        return redirect()->route('login.form')->with('success', 'Email telah diverifikasi! Silakan login.');
    }


    // LOGIN
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        // Cek apakah email ada di database
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah'
            ], 401);
        }

        // Cek apakah email sudah diverifikasi
        if (is_null($user->email_verified_at)) {
            return response()->json([
                'message' => 'Silakan verifikasi email Anda terlebih dahulu sebelum login'
            ], 403);
        }

        // Buat token untuk user
        $token = $user->createToken('auth_token')->plainTextToken;

        return redirect()->route('home')->with('success', 'Login berhasil!')->with('token', $token);
    }

    // LOGOUT
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout berhasil'
        ], 200);
    }

    // GET PROFILE
    public function profile(Request $request)
    {

        if (!$request->user()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'message' => 'Profile retrieved successfully',
            'user' => $request->user()
        ], 200);
    }

    // UPDATE PROFILE
    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'sometimes|string|max:255|unique:users,username,' . $request->user()->id,
            'address' => 'sometimes|string|max:255'
        ]);

        $user = $request->user();

        if ($request->filled('username')) {
            $user->username = $request->username;
        }
        if ($request->filled('address')) {
            $user->address = $request->address;
        }

        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user
        ], 200);
    }
}

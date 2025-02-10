<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Panggil fungsi kirim email verifikasi
        app('App\Http\Controllers\Auth\VerificationController')->sendVerificationEmail($user);
        return redirect()->route('login.form')->with('success', 'Silahkan cek email untuk verifikasi.');
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

        return redirect()->route('dashboard')->with('success', 'Login berhasil!')->with('token', $token);
    }

    // LOGOUT
    // public function logout(Request $request)
    // {
    //     $request->user()->currentAccessToken()->delete();
    //     return redirect()->route('login')->with('success', 'logout berhasil!');
    //     // return response()->json([
    //     //     'message' => 'Logout berhasil'
    //     // ], 200);
    // }

    public function logout(Request $request)
{
    Auth::logout(); // Logout user dari session

    // Hapus sesi agar tidak tersimpan di cache browser
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login')->with('success', 'Logout berhasil!');
}
}

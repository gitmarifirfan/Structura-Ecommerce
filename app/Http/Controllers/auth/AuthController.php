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
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        // Coba autentikasi user
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek apakah email sudah diverifikasi
            if (is_null($user->email_verified_at)) {
                Auth::logout(); // Logout jika belum verifikasi
                return back()->with('error', 'Silakan verifikasi email Anda terlebih dahulu sebelum login');
            }

            // Regenerasi sesi setelah login
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        // Jika gagal login
        return back()->with('error', 'Email atau password salah');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
}

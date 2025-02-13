<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    // Menampilkan form lupa password
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function sendResetPasswordEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        // Cek apakah email sudah diverifikasi
        $user = User::where('email', $request->email)->whereNotNull('email_verified_at')->first();

        // json untuk debug
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Email ini belum diverifikasi. Silakan verifikasi terlebih dahulu.'
            ], 403);
        }

        // if (!$user) {
        //     return redirect()->back()->with('error', 'Email ini belum diverifikasi. Silakan verifikasi terlebih dahulu.');
        // }

        // Buat token reset password menggunakan Laravel Password Broker
        $token = Password::createToken($user);

        // Buat link reset password
        $resetUrl = route('password.reset', ['token' => $token, 'email' => $user->email]);

        // Kirim email reset password
        Mail::to($user->email)->send(new ResetPasswordMail($user, $resetUrl));

        return redirect()->route('login.form')->with('success', 'Link reset password telah dikirim ke email Anda.');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Gunakan Laravel Password Broker
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login.form')->with('success', 'Password berhasil direset! Silakan login.')
            : back()->withErrors(['email' => 'Token tidak valid atau sudah kedaluwarsa.']);
    }
}

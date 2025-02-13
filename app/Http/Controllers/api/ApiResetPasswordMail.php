<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ApiResetPasswordMail extends Controller
{
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();

        // Cek apakah email sudah diverifikasi
        if (!$user->email_verified_at) {
            return response()->json(['message' => 'Akun belum diverifikasi! Silakan verifikasi email terlebih dahulu.'], 403);
        }

        // Buat token reset password
        $token = Password::createToken($user);

        // Buat URL reset password
        $resetUrl = url('auth/reset-password?token=' . $token . '&email=' . $user->email);

        // Kirim email dengan template `ResetPasswordMail`
        Mail::to($user->email)->send(new ResetPasswordMail($user, $resetUrl));

        return response()->json(['message' => 'Link reset password telah dikirim ke email Anda.', 'Token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill(['password' => Hash::make($password)])->save();
            }
        );

        return response()->json(['message' => __($status)]);
    }
}

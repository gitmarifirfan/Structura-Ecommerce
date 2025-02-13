<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\VerificationMail;

class ApiVerificationMail extends Controller
{
    // mengirim email verifikasi ke Mailtrap
    public function sendVerificationEmail($user) {
        $verificationUrl = route('verification.verify.api', ['id' => $user->id, 'hash' => sha1($user->email)]);
        Mail::to($user->email)->send(new VerificationMail($user, $verificationUrl));
    }

    // verifikasi email
    public function verifyEmail($id, $hash) {
        $user = User::findOrFail($id);

        if (sha1($user->email) !== $hash) {
            return response()->json(['message' => 'Token verifikasi tidak valid!'], 400);
        }

        // Update status email_verified_at
        $user->update(['email_verified_at' => now()]);

        return response()->json(['message' => 'Email berhasil diverifikasi!'], 200);
    }
}

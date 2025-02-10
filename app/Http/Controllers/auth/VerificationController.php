<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    public function sendVerificationEmail($user) {
        $verificationUrl = route('verification.verify', ['id' => $user->id, 'hash' => sha1($user->email)]);
        Mail::to($user->email)->send(new VerificationMail($user, $verificationUrl));
    }

    // Verifikasi email
    public function verifyEmail($id, $hash) {
        $user = User::findOrFail($id);

        if (sha1($user->email) !== $hash) {
            return redirect()->route('login.form')->with('error', 'Token verifikasi tidak valid!');
        }

        // Update status email_verified_at
        $user->update(['email_verified_at' => now()]);
        return redirect()->route('login.form')->with('success', 'Email telah diverifikasi!');
    }
}

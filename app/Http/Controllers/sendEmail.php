<?php

namespace App\Http\Controllers;

use App\Mail\emailSendingStructura;
use Illuminate\Support\Facades\Mail;

// funsi ini di buat untuk uji coba
class sendEmail extends Controller
{
    // public function SendEmailFunc()
    // {
    //     // Mail::to($request->user())->send(new OrderShipped($order));
    //     Mail::to('email@gmail.com')->send(new emailSendingStructura());
    // }

    public function SendEmailFunc()
    {
        // Kirim email uji coba ke alamat tertentu
        // Mail::to('email@gmail.com')->send(new emailSendingStructura());

        return response()->json(['message' => 'Email berhasil dikirim!']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\emailSendingStructura;
use Illuminate\Support\Facades\Mail;

class sendEmail extends Controller
{
    public function index()
    {
        // Mail::to($request->user())->send(new OrderShipped($order));
        Mail::to('email@gmail.com')->send(new emailSendingStructura());
    }
}

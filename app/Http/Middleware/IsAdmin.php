<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user login sebagai admin
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        // Redirect jika bukan admin
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}

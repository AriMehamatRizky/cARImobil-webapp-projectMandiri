<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login dan apakah user adalah admin
        if (!auth()->check() || !auth()->user()->is_admin) {
            // Jika bukan, tendang ke halaman home
            return redirect()->route('home');
        }

        // Jika ya, izinkan masuk
        return $next($request);
    }
}
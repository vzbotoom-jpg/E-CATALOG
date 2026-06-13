<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Hanya cek is_admin
        if (!Auth::user()->is_admin) {
            return redirect()->route('home')->with('error', 'Akses ditolak. Anda bukan admin.');
        }

        return $next($request);
    }
}
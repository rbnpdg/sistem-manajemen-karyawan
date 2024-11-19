<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cekrole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): mixed
    {
        if (!Auth::check()) { // kondisi saat user blm login
            return redirect('login')->withErrors('Silahkan login terlebih dahulu!');
        }

        if (Auth::user()->role !== $role) { // kondisi jika role pengguna tidak sesuai
            return redirect('login')->withErrors('Anda tidak memiliki akses ke halaman ini!');
        }

        return $next($request);
    }
}

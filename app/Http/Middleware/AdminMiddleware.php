<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna terautentikasi
        if (!auth()->check()) {
            return redirect()->route('login'); // Jika tidak terautentikasi, redirect ke halaman login
        }

        // Cek apakah pengguna memiliki peran sebagai admin
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.'); // Jika bukan admin, kirim kode status 403 (Forbidden)
        }

        return $next($request);
    }
}

<?php

// app/Http/Middleware/KasirMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasirMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'kasir') {
            return $next($request); // lanjut ke controller
        }

        return redirect()->back()->with('error', 'Akses ditolak. Hanya kasir yang dapat mengakses halaman ini.');
    }
}
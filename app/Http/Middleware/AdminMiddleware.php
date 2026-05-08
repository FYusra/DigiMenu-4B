<?php
// app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
public function handle(Request $request, Closure $next)
{
// cek apakah user sudah login dan rolenya admin
if (Auth::check() && Auth::user()->role === 'admin') {
return $next($request); // lanjut ke controller
}

return redirect()->back()->with('error', 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
}
}
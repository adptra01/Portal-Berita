<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Memeriksa apakah peran pengguna saat ini ada dalam daftar peran yang diperbolehkan
        if (in_array($request->user()->role, $roles)) {
            return $next($request);
        }

        // Jika tidak, kembalikan respons yang sesuai
        return back()->with('error', 'Anda tidak memiliki hak mengakses laman');
    }
}

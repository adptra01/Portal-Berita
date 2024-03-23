<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ipAddress = $request->ip();

        // Cek apakah ada kunjungan dengan IP yang sama pada hari yang sama
        $existingVisitor = Visitor::where('ip_address', $ipAddress)
            ->whereDate('visited_at', Carbon::today())
            ->first();

        // Jika tidak ada kunjungan dengan IP yang sama pada hari yang sama, simpan data pengunjung
        if (!$existingVisitor) {
            Visitor::create([
                'ip_address' => $ipAddress,
                'visited_at' => now(),
            ]);
        }

        return $next($request);
    }
}

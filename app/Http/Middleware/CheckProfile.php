<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Contoh field yang harus diperiksa
            if (empty($user->nama) || empty($user->posisi)) {
                // Pastikan tidak mengarahkan kembali ke 'profile-edit' secara berulang
                if ($request->route()->named('profile-edit')) {
                    return $next($request);
                }
                return redirect()->route('profile-edit');
            }
        }

        return $next($request);

    }
}

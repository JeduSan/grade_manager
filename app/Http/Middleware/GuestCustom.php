<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GuestCustom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return to_route('admin.dashboard');
            } else if (Auth::user()->role_id == 3) {
                return to_route('teacher.dashboard');
            } else if (Auth::user()->role_id == 2) {
                return to_route('student.dashboard');
            }
        }

        return $next($request);
    }
}

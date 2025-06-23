<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsMentor
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'mentor') {
            return $next($request);
        }

        abort(403, 'Unauthorized - Mentors only.');
    }
}

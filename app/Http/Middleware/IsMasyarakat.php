<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsMasyarakat
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::user() && Auth::user()->role == 'Masyarakat') {
            return $next($request);
        }
        return redirect('/');

    }
}
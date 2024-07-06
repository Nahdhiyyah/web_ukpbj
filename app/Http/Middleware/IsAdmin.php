<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class IsAdmin
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
        if( Auth::user() && Auth::user()->role == 'Super Admin') {
            return $next($request);
        } 
        else if( Auth::user() && Auth::user()->role == 'Pengelola Layanan') {
            return $next($request);
        } else {
        Alert::error('Error', 'Maaf anda tidak bisa mengakses halaman tersebut!');
        return back();
        }
    }
}
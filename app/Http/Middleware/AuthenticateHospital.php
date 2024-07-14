<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateHospital
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('hospital')->check()) {
            return redirect('/hospital/login');
        }

        return $next($request);
    }
}

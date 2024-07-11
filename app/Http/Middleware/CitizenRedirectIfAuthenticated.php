<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Providers\AppServiceProvider;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class CitizenRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if(Auth::guard('citizen')->check())
        {
            return redirect()->route('citizen.dashboard');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class CitizenAuthenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('citizen.login');
    }
    
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('citizen')->check())
        {
            return $this->auth->shouldUse('citizen');
        }
        $this->unauthenticated($request, ['citizen']);
    }
}

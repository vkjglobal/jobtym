<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectIfNotUser
{
    /**
     * Handle an incoming request.
     *
         * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $guard
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle(Request $request, Closure $next, $guard = 'user')
    {
        if (Auth::guard($guard)->check()) {
            return $next($request);
        }

        $redirectToRoute = $request->expectsJson() ? '' : route('user.login');

        throw new AuthenticationException(
            'Unauthenticated.', [$guard], $redirectToRoute
        );
    }
}

<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            if (Auth::user()->role === 'user') {
                return $next($request);
            } else {
                return redirect()->route('dashboard.admin');
            }
        } else {
            return redirect()->route('login');
        }
    }
}

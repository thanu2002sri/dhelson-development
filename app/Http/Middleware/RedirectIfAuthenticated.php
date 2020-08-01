<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
        
            if ($guard == "admin" && Auth::guard($guard)->check()) {
                return redirect('/admin/dashboard');
            }
            if ($guard == "agent" && Auth::guard($guard)->check()) {
                return redirect('/agent/dashboard');
            }
            if ($guard == "incharge" && Auth::guard($guard)->check()) {
                return redirect('/incharge/dashboard');
            }
            if ($guard == "guard" && Auth::guard($guard)->check()) {
                return redirect('/guard/dashboard');
            }
            if ($guard == "guard" && Auth::guard($guard)->check()) {
                return redirect('/customer-care/dashboard');
            }
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Closure;
use Auth;
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
        if(! Auth::user())
        {
            return redirect('/');
        }
        else if (getUerRole(Auth::user()->role)->role != 'user')
        {
            return redirect('/'.getUerRole(Auth::user()->role)->role.'/dashboard');
        }
        else
        {
            Auth::logout();
            return redirect('/')->with('error', 'You don\'t have login access in web portal.');
        }
        return $next($request);
    }
}

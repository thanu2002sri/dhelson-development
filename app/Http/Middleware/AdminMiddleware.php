<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Closure;
use Auth;
class AdminMiddleware
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
        else if (getUerRole(Auth::user()->role)->role != 'admin')
        {
            return redirect('/'.getUerRole(Auth::user()->role)->role.'/dashboard');
        }
        return $next($request);
    }

}

<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Closure;
use Auth;
class AgentMiddleware
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
        else if(Auth::check() && Auth::user()->status != '0'){

            Auth::logout();

            return redirect('/login')->with('error', 'Your Account has been Inactive.\r\n Please Contact Administrate.');

        }
        else if (getUerRole(Auth::user()->role)->role != 'agent')
        {
            return redirect('/'.getUerRole(Auth::user()->role)->role.'/dashboard');
        }
        return $next($request);
    }
}

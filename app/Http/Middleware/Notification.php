<?php

namespace App\Http\Middleware;

use Closure;

class Notification
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
        if(Auth::check() && Auth::user()->kyc_status != 'APPROVED'){

            return response()->json([
                'success' =>'TRUE',
                'message' => 'KYC not Approved!'
            ], 200);

        }
        return $next($request);
    }
}

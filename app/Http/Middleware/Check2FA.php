<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
  
class Check2FA
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        if (!Session::has('user_2fa')) {
            return redirect()->route('2fa.index');
        }
  
        return $response;
    }
}
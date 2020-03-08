<?php

namespace App\Http\Middleware;

use Closure;

class Auth
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
        $token = $request->header('APP_KEY');
        if($token != 'Rohit123.'){
            return response()->json(['message'=>'Error 401:: App Key Not Found, Unauthorised Access'],401);
        }
        return $next($request);
    }
}

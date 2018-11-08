<?php

namespace App\Http\Middleware;

use Closure;

class UserLoginMiddleware
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
        if(!session('user') || session('user')==""){
            return redirect()->route('user.login');
        }
        return $next($request);
    }
}

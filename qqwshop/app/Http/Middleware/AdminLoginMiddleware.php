<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
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
        if(!session('admin') || session('admin')==""){
            return redirect()->route('admin.login');
        }
        if(!session('root')){
            $path = isset($_SERVER['PATH_INFO'])? trim($_SERVER['PATH_INFO'], '/'): '/';
            $whiteList = ['admin','admin/home','admin/logout','admin/login'];
            if(!in_array($path,array_merge($whiteList,session('url_path')))){
                return redirect()->route('admin.adminIndex')->with('tips','无权访问!!!!');
            }
        }


        return $next($request);
    }
}

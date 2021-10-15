<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogout
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
        //If admin haven't logged out yet and has tried login, return dashboard
        if (Auth::guard('admin')->user()) {   
            return redirect('/admin');
        }
        // else return view login
        return $next($request);
    }
}

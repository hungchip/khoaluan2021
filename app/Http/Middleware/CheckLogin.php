<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

///middlware này kiểm tra xem người dùng đã đăng nhập chưa ??
class CheckLogin
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
        if (Auth::guard('admin')->user()) {
            // Nếu đã đăng nhập -> vào trang dashboard
            return $next($request);
        }
        //Nếu chưa đăng nhập -> về trang đăng nhập
        return redirect()->route('getLogin');
    }
}

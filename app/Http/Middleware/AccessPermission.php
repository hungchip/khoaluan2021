<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        $arr = explode(';', $roles);

        if(Auth::guard('admin')->user()->hasAnyRoles($arr)) {
            return $next($request);
        }

        return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Bạn không có quyền này !!!']);
    }
}

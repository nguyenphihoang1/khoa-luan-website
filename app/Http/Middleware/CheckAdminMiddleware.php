<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        //Ý tưởng: Bạn phải login rồi thì tôi mới cho bạn qua. $next($request);
        if(Auth::guard('admin')->check()) {
            return $next($request);
        } else {
            toastr()->error('Bạn cần đăng nhập trước!');
            return redirect('/admin/login');
        }
    }
}

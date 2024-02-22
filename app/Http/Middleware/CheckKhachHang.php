<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckKhachHang
{
    public function handle(Request $request, Closure $next)
    {
        $khachhang = Auth::guard('customer')->check();
        if($khachhang) {
            return $next($request);
        } else {
            toastr()->error('Bạn cần đăng nhập trước!');
            return redirect('/auth');
        }
    }
}

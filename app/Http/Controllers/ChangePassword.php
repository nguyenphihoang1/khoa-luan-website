<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePassword as RequestsChangePassword;
use App\Http\Requests\RequestChangpassword;
use App\Models\KhachHang;
use Flasher\Laravel\Http\Request as HttpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller
{
    public function index()
    {
        return view('customer.Changepassword');
    }

    public function changepassword(RequestChangpassword $request)
    {
        $user = Auth::guard('customer')->user();
        $khachhang = KhachHang::where('id', $user->id)->first();

        if (Hash::check($request->currentpw, $user->password)) {
            // Update the password
            $khachhang->password = bcrypt($request->newpw);
            $khachhang->save();
            return response()->json([
                'status' => true,
                'message' => 'đã thay đổi mật khẩu thành công.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'thay đổi mật khẩu thất bại , vui lòng kiểm tra lại mật khẩu!!!'
            ]);
        }
    }
}



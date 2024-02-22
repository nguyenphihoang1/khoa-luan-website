<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaiKhoanAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index_form()
    {
        $data = Admin::get(); //Admin::all();

        return view('admin.page.tai_khoan.index_form', compact('data'));
    }

    public function create_form(Request $request)
    {
        $data = $request->all();

        Admin::create($data);

        return redirect('/admin/tai-khoan/index-form');
    }

    public function create_ajax(CreateTaiKhoanAdminRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        Admin::create($data);

        return response()->json([
            'status'    => true
        ]);
    }


    public function index_vue()
    {
        return view('admin.page.tai_khoan.index_vue');
    }

    public function data()
    {
        $data = Admin::get();

        return response()->json([
            'data'  => $data,
        ]);
    }

    public function viewLogin()
    {
        return view('admin.login');
    }

    public function actionLogin(Request $request)
    {
        // Kiểm tra $request->email và $request->password có giống với tài khoản nào không?
        $data['email']      = $request->email;
        $data['password']   = $request->password;

        $check = Auth::guard('admin')->attempt($data); // True/False

        return response()->json([
            'status'    => $check,
        ]);
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaiKhoanAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ho_va_ten'         =>  'required|min:5|max:100',
            'email'             =>  'required|email|unique:admins,email',
            'password'          =>  'required|min:6|max:30',
            're_password'       =>  'required|same:password',
            'so_dien_thoai'     =>  'required|digits:10',
            'ngay_sinh'         =>  'required|date',
        ];
    }

    public function messages()
    {
        return [
            'ho_va_ten.*'         =>  'Họ và tên phải từ 5 ký tự',
            'email.*'             =>  'Email không đúng định dạng hoặc đã tồn tại',
            'password.*'          =>  'Mật khẩu phải từ 6 đến 30 ký tự',
            're_password.*'       =>  'Mật khẩu nhập lại không giống',
            'so_dien_thoai.*'     =>  'Số điện thoại chỉ được 10 số',
            'ngay_sinh.*'         =>  'Ngày sinh không giống định dạng',
        ];
    }
}

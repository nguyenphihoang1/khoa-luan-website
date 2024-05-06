<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestChangpassword extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'currentpw' => 'required|min:6',
            'newpw'     => 'required|min:6',
            'confirmpw' => 'required|same:newpw',
        ];
    }

    public function messages()
    {
        return [
            'currentpw.required' => 'Vui lòng nhập mật khẩu hiện tại',
            'currentpw.min'      => 'Mật khẩu hiện tại phải chứa ít nhất 6 kí tự',
            'newpw.required'     => 'Vui lòng nhập mật khẩu mới',
            'newpw.min'          => 'Mật khẩu mới phải chứa ít nhất 6 kí tự',
            'confirmpw.required' => 'Vui lòng nhập lại mật khẩu mới để xác nhận',
            'confirmpw.same'     => 'Mật khẩu mới và mật khẩu xác nhận không khớp',
        ];
    }
}

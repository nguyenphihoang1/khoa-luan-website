<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThanhToanRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "ho_lot" => "required",
            "ten_khach" => "required",
            "email" => "required|email",
            "so_dien_thoai" => "required|numeric|digits:10",
            "dia_chi" => "required|min:5",
        ];
    }

    public function messages()
    {
        return [
            "ho_lot.*" => "First name không được để trống !",
            "ten_khach.*" => "Last name không được để trống !",
            "email.*" => "Email phải đúng định dạng !",
            "so_dien_thoai.*" => "Phone number không được để trống !",
            "dia_chi.*" => "Địa chỉ phải từ 5 ký tự !",
        ];
    }
}

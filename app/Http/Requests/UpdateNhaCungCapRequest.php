<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNhaCungCapRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'                    =>  'exists:nha_cung_caps,id',
            'ma_so_thue'            =>  'nullable|unique:nha_cung_caps,ma_so_thue',
            'ten_cong_ty'           =>  'nullable|min:5',
            'ten_nguoi_dai_dien'    =>  'required|min:5',
            'so_dien_thoai'         =>  'required|digits:10',
            'email'                 =>  'required|email',
            'dia_chi'               =>  'nullable',
            'ten_goi_nho'           =>  'nullable',
        ];
    }
}

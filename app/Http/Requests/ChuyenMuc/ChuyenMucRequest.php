<?php

namespace App\Http\Requests\ChuyenMuc;

use Illuminate\Foundation\Http\FormRequest;

class ChuyenMucRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ten_chuyen_muc'            => 'required|min:3',
            'slug_chuyen_muc'           => 'required|min:3',
            'tinh_trang'                => 'required|boolean',
            'id_chuyen_muc_cha'         => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ten_chuyen_muc.*'            => 'Tên chuyên mục phải ít nhất 3 kí tự',
            'slug_chuyen_muc.*'           => 'Slug chuyên mục ít nhất phải 3 kí tự',
            'tinh_trang.*'                => 'Tình trạng không được để trống',
            'id_chuyen_muc_cha.*'         => 'Chuyên mục cha không được để trống',
        ];
    }
}

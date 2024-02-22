<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteChiTietNhapKhoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'    =>  'required|exists:chi_tiet_hoa_don_nhap_khos,id',
        ];
    }

    public function messages()
    {
        return [
            'id.*'    =>  'Chi tiết hóa đơn không tồn tại',
        ];
    }
}

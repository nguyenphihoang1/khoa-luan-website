<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChiTietNhapKhoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'                =>  'required|exists:chi_tiet_hoa_don_nhap_khos,id',
            'so_luong_nhap'     =>  'required|numeric|min:1',
            'don_gia_nhap'      =>  'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'id.*'                =>  'Chi tiết hóa đơn không tồn tại',
            'so_luong_nhap.*'     =>  'Số lượng phải từ 1 trở lên',
            'don_gia_nhap.*'      =>  'Đơn giá phải từ 0đ trở lên',
        ];
    }
}

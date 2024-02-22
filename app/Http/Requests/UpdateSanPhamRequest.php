<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSanPhamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'id'                =>  'required|exists:san_phams,id',
            'ten_san_pham'      =>  'required|min:5',   // MIN: TỐI THIỂU
            'slug_san_pham'     =>  'required|min:5',
            'hinh_anh'          =>  'required',
            'mo_ta'             =>  'required|min:20',
            'id_chuyen_muc'     =>  'required|exists:chuyen_mucs,id',   // EXISTS: TỒN TẠI Ở TABLE NÀO VÀ CỘT NÀO
            'trang_thai'        =>  'required|boolean', // TRUE HOẶC FALSE
            'gia_ban'           =>  'required|numeric|min:0',   // NUMERIC: SỐ
            'gia_khuyen_mai'    =>  'nullable|numeric|min:0',  // ĐƯỢC PHÉP NULL
        ];
    }

    public function messages()
    {
        return [
            'id.*'                  =>  'Sản phẩm không tồn tại',
            'ten_san_pham.required' =>  'Tên sản phẩm phải nhập',
            'ten_san_pham.min'      =>  'Tên sản phẩm phải từ 5 ký tự trở lên',
            'slug_san_pham.*'       =>  'Slug phải từ 5 ký tự trở lên',
            'hinh_anh.*'            =>  'Bạn phải nhập hình ảnh',
            'mo_ta.*'               =>  'Bạn phải nhập mô tả từ 20 ký tự',
            'id_chuyen_muc.*'       =>  'Chuyên mục không tồn tại',
            'trang_thai.*'          =>  'Trạng thái chỉ được Kinh doanh/Tạm dừng',
            'gia_ban.*'             =>  'Giá bán phải từ 0đ trở lên',
            'gia_khuyen_mai.*'      =>  'Giá bán phải từ 0đ trở lên',
        ];
    }
}

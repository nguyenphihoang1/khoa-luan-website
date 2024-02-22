<?php

namespace App\Http\Requests\TinTuc;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTinTucRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tieu_de'           =>  'required|min:5',
            'slug_bai_viet'     =>  'required|min:5',
            'hinh_anh'          =>  'required',
            'mo_ta_ngan'        =>  'required|min:10',
            'mo_ta_chi_tiet'    =>  'required|min:20',
            'trang_thai'        =>  'required|boolean',
            'loai_bai_viet'     =>  'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'tieu_de.required'          =>  'Tiêu đề không được để trống!',
            'tieu_de.min'               =>  'Tiêu đề phải từ 5 ký tự trở lên',
            'slug_bai_viet.*'           =>  'Slug bài viết phải từ 5 ký tự trở lên',
            'hinh_anh.*'                =>  'Bạn phải nhập hình ảnh',
            'mo_ta_ngan.required'       =>  'Mô tả ngắn không được để trống!',
            'mo_ta_ngan.min'            =>  'Bạn phải nhập mô tả từ 10 ký tự',
            'mo_ta_chi_tiet.required'   =>  'Mô tả chi tiết không được để trống!',
            'mo_ta_chi_tiet.min'        =>  'Bạn phải nhập mô tả từ 20 ký tự',
            'trang_thai.*'              =>  'Trạng thái chỉ được Hiển Thị/Tạm Tắt',
            'loai_bai_viet.*'           =>  'Loại bài viết không được để trống!',

        ];
    }
}

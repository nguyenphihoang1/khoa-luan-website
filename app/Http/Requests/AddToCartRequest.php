<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_san_pham'   =>  'required|exists:san_phams,id',
            'so_luong'      =>  'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'id_san_pham.*'   =>  'Sản phẩm không tồn tại',
            'so_luong.*'      =>  'Số lượng phải lớn hoặc bằng 1',
        ];
    }
}

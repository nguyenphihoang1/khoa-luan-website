<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteSanPhamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'    =>  'required|exists:san_phams,id',
        ];
    }

    public function messages()
    {
        return [
            'id.*'  => 'Sản phẩm không tồn tại!',
        ];
    }
}

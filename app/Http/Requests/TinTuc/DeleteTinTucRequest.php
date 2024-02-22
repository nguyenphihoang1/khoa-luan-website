<?php

namespace App\Http\Requests\TinTuc;

use Illuminate\Foundation\Http\FormRequest;

class DeleteTinTucRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'    =>  'required|exists:tin_tucs,id',
        ];
    }

    public function messages()
    {
        return [
            'id.*'  => 'Tin tức phải tồn tại trong hệ thống!',
        ];
    }
}

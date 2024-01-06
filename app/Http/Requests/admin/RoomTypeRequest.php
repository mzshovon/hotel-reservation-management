<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class RoomTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Please enter title'
        ];
    }
}

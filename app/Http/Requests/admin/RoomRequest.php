<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'regular_price' => 'required',
            'capacity' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Please enter title.',
            'regular_price.required'=>'Please enter regular price.',
            'capacity.required'=>'Please enter room capacity.',
        ];
    }
}

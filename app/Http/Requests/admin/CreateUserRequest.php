<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|string|max:100',
            'email'=>'required|email:rfc,dns',
            'status'=>'required|in:0,1',
        ];
    }
}

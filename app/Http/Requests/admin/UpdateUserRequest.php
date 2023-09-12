<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'=>'required|integer',
            'name'=>'required|string|max:100',
            'email'=>'required|email:rfc,dns|unique:users,email,'.$this->id,
            'status'=>'required|in:0,1',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RegisterRequest extends FormRequest
{
    protected $id;
    protected $rules;

    public function __construct(Request $request)
    {
        $this->id = $request->user_id;
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $this->rules = [
            'name' => 'required',
            'email' => 'required|email:rfc,dns|',Rule::unique(with(new User())->getTable())->ignore($this->user->id ?? 0),
            'username' => 'required',Rule::unique(with(new User())->getTable())->ignore($this->user->id ?? 0),
        ];

        if($this->id){
            $this->rules['password'] = 'sometimes|nullable|min:8';
            $this->rules['password_confirmation'] = 'sometimes|nullable|same:password|min:8';
        } else {
            $this->rules['password'] = 'required|min:8';
            $this->rules['password_confirmation'] = 'required|same:password|min:8';
        }
        return $this->rules;
    }
}
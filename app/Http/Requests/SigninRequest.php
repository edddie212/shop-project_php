<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages(){
      return [
        'email.required' => 'email is required',
        'email.email' => 'email format is required',
        'password.required' => 'password is required',
      ];
    }

}

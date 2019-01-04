<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }



    public function rules()
    {
        return [
         'name' => 'required|min:2|max:25',
         'email' => 'required|email|unique:users,email',
         'password' => 'required|min:6|max:35|confirmed',
        ];    
    }


        public function messages(){
          return [
            'name.required' => 'name is required',
            'email.required' => 'email is required',
            'email.unique' => 'this email is taken',
            'email.email' => 'email format is required',
            'password.required' => 'password is required',
            'password.confirmed' => 'password conformation failed',
          ];
        }


}

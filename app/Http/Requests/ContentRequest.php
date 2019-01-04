<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class ContentRequest extends FormRequest{
  public function authorize()
  {
      return true;
  }

  public function rules(){

      return [
         'menu_id' => 'required',
         'ctitle' => 'required|min:2|max:255',
         'article' => 'required|min:2'
      ];
  }

  public function messages(){
    return [
      'menu_id.required' => 'menu link required',
      'ctitle.required' => 'title is required',
      'article.required' => 'article is required'


    ];
  }
}

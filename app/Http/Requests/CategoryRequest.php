<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class CategoryRequest extends FormRequest{
  public function authorize()
  {
      return true;
  }

  public function rules(Request $request){

      $ignore = !empty($request['item_id']) ? ',' . $request['item_id'] : '';
      return [
        'title' => 'required|min:2|max:100',
        'url' => 'required|min:2|max:100|regex:/^[a-z\d-]+$/|unique:categories,url' . $ignore,
        'description' => 'required|min:2',
         'images' => 'image|max:5242880',
       ];
  }

   public function messages(){
     return [
      'title.required' => 'title is required',
      'url.required' => 'url  is required',
      'description.required' => 'description is required',
      'images' => 'image file needed',
      'images.size' => 'file is to big to upload',
    ];
  }
}

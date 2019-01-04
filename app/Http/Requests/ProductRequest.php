<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class ProductRequest extends FormRequest{

  public function authorize()
  {
      return true;
  }

  public function rules(Request $request){

      $ignore = !empty($request['item_id']) ? ',' . $request['item_id'] : '';
      return [
        'categorie_id' => 'required',
        'p_title' => 'required|min:2|max:100',
        'p_url' => 'required|min:2|max:100|regex:/^[a-z\d-]+$/|unique:products,p_url' . $ignore,
        'price' => 'required|numeric',
        'article' => 'required|min:2',
         'p_image' => 'image|max:5242880',
       ];
  }

   public function messages(){
     return [
      'categorie_id.required' => 'Category is required',
      'p_title.required' => 'title is required',
      'p_url.required' => 'url is required',
      'price.required' => ' Price is required',
      'price.numeric' => ' Please enter only numbers',
      'article.required' => 'Article is required',
      'p_image.image' => 'image file needed',
      'p_image.size' => 'file is to big to upload',
    ];
  }
}

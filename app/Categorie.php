<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image,Session;

class Categorie extends Model{

static public function save_new($request){

 $image_name = 'default-image.png.';
  if($request->hasFile('images') && $request->file('images')->isValid() ){

    $file = $request->file('images');

   $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();

   $request->file('images')->move(public_path(). '/images/' , $image_name);

   $img = Image::make(public_path(). '/images/' . $image_name);
   $img->resize(200, null, function ($constraint) {
       $constraint->aspectRatio();
   });
   $img->save();

  }

$category = new self();
$category->title = $request['title'];
$category->description = $request['description'];
$category->url = $request['url'];
$category->images = $image_name;
$category->save();
Session::flash('sm', 'Category created successfuly');
Session::flash('smpos', 'toast-top-center');


 }

 static public function update_item($request, $id){

   $image_name = '';
    if($request->hasFile('images') && $request->file('images')->isValid() ){

      $file = $request->file('images');

     $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();

     $request->file('images')->move(public_path(). '/images/' , $image_name);

     $img = Image::make(public_path(). '/images/' . $image_name);
     $img->resize(200, null, function ($constraint) {
         $constraint->aspectRatio();
     });
     $img->save();
 }


 $category =self::find($id);
 $category->title = $request['title'];
 $category->description = $request['description'];
 $category->url = $request['url'];

if($image_name){
  $category->images = $image_name;
 }

 $category->save();
 Session::flash('sm', 'Category updated successfuly');
 Session::flash('smpos', 'toast-top-center');



 }
}

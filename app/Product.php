<?php

namespace App;

use Session, DB, Cart, Image;
use Illuminate\Database\Eloquent\Model;


class Product extends Model{

static public function getProducts($curl, &$data){

  $products = DB::table('products AS p')
  ->join('categories AS c', 'c.id', '=', 'p.categorie_id')
  ->select('p.*', 'c.url', 'c.title')
  ->where('c.url', '=', $curl);


    if($data['total_count'] = $products->count() ) {
    $products = $products->paginate(3);
    $data['products'] = $products;
    $data['title'] = $products[0]->title.' '.'products';
    }else {
    abort(404);
  }
  }
static public function getItem($purl, &$data) {

if ( $item = Product::where('p_url', '=', $purl)->first() ){
  $data['product'] = $item->toArray();
  $data['title'] = $data['product'] ['p_title'];
}else{

  abort(404);
    }

  }
static public function addToCart($pid){

if(! empty($pid) && is_numeric($pid) ){
 if($product = self::find($pid) ){
  $product = $product->toArray();
if(! Cart::get($pid)){
Cart::add($pid, $product['p_title'], $product['price'], 1, [] );
Session::flash('sm', $product['p_title'] . 'add to cart');
Session::flash('smpos','toast-bottom-center' );



    }
   }
  }
 }

  static public function updateCart($request) {

  if(! empty($request['pid']) && is_numeric($request['pid']) ){

     if(! empty($request['op'])){

       if($product = Cart::get($request['pid']) ){

       $product = $product->toArray() ;

         if($request['op'] == 'plus') {
           Cart::update($request['pid'], ['quantity' => 1 ]);

          }elseif($request['op'] == 'minus'){

            Cart::update($request['pid'], ['quantity' => -1 ]);

       }
      }
     }
    }
   }

static public function save_new($request){


   $image_name = 'default-image.png.';
    if($request->hasFile('p_image') && $request->file('p_image')->isValid() ){

      $file = $request->file('p_image');

     $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();

     $request->file('p_image')->move(public_path(). '/images/' , $image_name);

     $img = Image::make(public_path(). '/images/' . $image_name);
     $img->resize(200, null, function ($constraint) {
         $constraint->aspectRatio();
     });
     $img->save();


  }

   $product = new self();
   $product->categorie_id = $request['categorie_id'];
   $product->p_title = $request['p_title'];
   $product->article = $request['article'];
   $product->p_url = $request['p_url'];
   $product->p_image = $image_name;
   $product->price = $request['price'];
   $product->save();
   Session::flash('sm', 'Product created successfuly');
   Session::flash('smpos', 'toast-top-center');

 }

 static public function update_item($request, $id){

   $image_name = '';
    if($request->hasFile('p_image') && $request->file('p_image')->isValid() ){

      $file = $request->file('p_image');

     $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();

     $request->file('p_image')->move(public_path(). '/images/' , $image_name);

     $img = Image::make(public_path(). '/images/' . $image_name);
     $img->resize(200, null, function ($constraint) {
         $constraint->aspectRatio();
     });
     $img->save();


  }

   $product = self::find($id);
   $product->categorie_id = $request['categorie_id'];
   $product->p_title = $request['p_title'];
   $product->article = $request['article'];
   $product->p_url = $request['p_url'];

   if($image_name){
    $product->p_image = $image_name;
    }
   $product->price = $request['price'];
   $product->save();
   Session::flash('sm', 'Product updated successfuly');
   Session::flash('smpos', 'toast-top-center');
 }
}

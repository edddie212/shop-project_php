<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Categorie;
use App\Product;
use \App\Order;
use DB, Cart, Session;

class ShopController extends MainController
{
public function categories (){

self::$data['categories'] = Categorie::all()->toArray();
self::$data['title'] = 'Shop Categories';
return view('contant.categories', self::$data);

 }

public function products ($curl){

  Product::getProducts($curl, self::$data);
  self::$data['curl'] = $curl;
  return view('contant.products', self::$data);
 }

 public function item($curl,$purl){

Product::getItem($purl,self::$data);
self::$data['p_url'] = $purl;
self::$data['curl'] = $curl;
return view('contant.item', self::$data);

 }

 public function addToCart(Request $request){
// clear the cart
//Cart::clear();
//return;

 Product::addToCart($request['pid']);

 }

public function checkout() {

$cart = Cart::getContent()->toArray();
sort($cart);
self::$data['title'] = 'Shop Checkout';
self::$data['cart'] = $cart;
return view('contant.checkout',self::$data );

 }
 public function updateCart(Request $request){
   Product::updateCart($request);
   return redirect('shop/checkout');
 }

 public function clearCart(){
   Cart::clear();
   return redirect('shop/checkout');
 }

public function removeItem(Request $request){

if(Cart::get($request['pid']) ){

   Cart::remove($request['pid']);
  }
   return redirect('shop/checkout');

 }

 public function orderNow(){

 if(Cart::isEmpty() ){

   return redirect('shop/checkout');

 }else{

   if(! Session::has('user_id') ){
     return redirect('user/signin?rd=shop/checkout');
   }else {
  Order::save_new();
  return redirect('shop');


    }
   }
  }


}

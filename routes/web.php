<?php


#Shop
Route::prefix('shop')->group(function () {
Route::name('shop')->get('/', 'ShopController@categories');
Route::get('order-now', 'ShopController@orderNow');
Route::get('remove-item', 'ShopController@removeItem');
Route::get('clear-cart', 'ShopController@clearCart');
Route::get('update-cart', 'ShopController@updateCart');
Route::name('checkout')->get('checkout', 'ShopController@checkout');
Route::get('add-to-cart', 'ShopController@addToCart');
Route::name('products')->get('{curl}', 'ShopController@products');
  Route::name('item')->get('{curl}/{p_url}', 'ShopController@item');

});

#User
Route::prefix('user')->group(function () {
Route::name('signin')->get('signin', 'UserController@getSignin');
Route::post('signin', 'UserController@postSignin');
Route::name('signup')->get('signup', 'UserController@getSignup');
Route::post('signup', 'UserController@postSignup');
Route::get('logout', 'UserController@logout');

});

#Cms
Route::middleware(['adminguard'])->group(function () {
  Route::prefix('cms')->group(function () {
   Route::get('dashboard', 'CmsController@dashboard');
   Route::resource('menu', 'MenuController');
   Route::resource('content', 'ContentController');
   Route::resource('categories', 'CategoriesController');
   Route::resource('products', 'ProductsController');
   Route::get('orders', 'CmsController@orders');

  });
});

#Pages
Route::name('home')->get('/', 'PagesController@home');
Route::name('content')->get('{url}', 'PagesController@content');


?>

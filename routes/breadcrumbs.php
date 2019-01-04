<?php

use App\Categorie;
use App\Product;
use App\Menu;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});


Breadcrumbs::for('shop', function ($trail) {
    $trail->parent('home');
    $trail->push('Shop', route('shop'));
});

Breadcrumbs::for('content', function ($trail, $url) {
    $menu = Menu::where('url', '=', $url)->first();
    $trail->parent('home');
    $trail->push($menu->link, route('content', [$url]));
});

Breadcrumbs::for('signin', function ($trail) {
    $trail->parent('home');
    $trail->push('Signin', route('signin'));
});

Breadcrumbs::for('signup', function ($trail) {
    $trail->parent('home');
    $trail->push('Signup', route('signup'));
});

Breadcrumbs::for('checkout', function ($trail) {
    $trail->parent('shop');
    $trail->push('Checkout Page', route('checkout'));
});

Breadcrumbs::for('products', function ($trail, $curl) {
    $category = Categorie::where('url', '=', $curl)->first();
    $trail->parent('shop');
    $trail->push($category->title, route('products', [$curl] ));
});

Breadcrumbs::for('item', function ($trail, $curl, $purl ) {
    $product = Product::where('p_url', '=', $purl)->first();
    $trail->parent('products', $curl);
    $trail->push($product->p_title, route('item', [$curl, $purl] ) );
});


















?>

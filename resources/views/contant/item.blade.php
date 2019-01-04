@extends('master')
@section('contant')
{{ Breadcrumbs::render('item', $curl, $p_url) }}

<div class="row">
  <div class="col-12">
<h1>{{$product['p_title']}}</h1>
<p><img width="400" src="{{ asset('images/'.$product{'p_image'}) }}" ></p>
<p>{!! $product['article']!!}</p>

<p><b>Price in site : </b> ${{$product['price']}}</p>

@if(Cart::get($product['id']))
<button disabled="disabled" type="button" class="btn btn-sm btn-outline-success ml-4 add-to-cart-btn"><i class="fas fa-shopping-cart mr-1"></i>  In Cart</button>

@else
 <button  data-id="{{$product['id'] }}"  type="button" class="btn btn-sm btn-outline-success ml-4 add-to-cart-btn"><i class="fas fa-shopping-cart mr-1"></i>  Add to cart</button>
@endif
  </div>
</div>

@endsection

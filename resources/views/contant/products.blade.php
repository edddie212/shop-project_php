@extends('master')
@section('contant')
@if(!empty($products) )
{{ Breadcrumbs::render('products', $curl) }}

<div class="row">
  <div class="col-12">
<h1>{{$products[0]->title}}  - Products</h1>
<p>
This is all that u will want to know about our company!!!!

  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
   occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
<p><b>Total Products :  {{ $total_count}}</b></p>
  </div>
</div>
<div class="row">
@foreach($products as $product)
<div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="container-fluid"  src="{{ asset('images/'. $product->p_image) }}">
                <div class="card-body">
                  <h3 class="card-text">{{$product->p_title}}</h3>
                  <br><p>
                 {!!str_limit($product->article, 29, '...')!!}

               </p>   <br>
                  <p><b>Price on site:</b>{{$product->price}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                   <a class="btn btn-sm btn-outline-primary" href="{{url('shop/'.$product->url.'/'.$product->p_url)}}">View</a>


                   @if (Cart::get($product->id))
                   <button disabled="disabled" type="button" class="btn btn-sm btn-outline-success ml-4 add-to-cart-btn"><i class="fas fa-shopping-cart mr-1"></i>  In Cart</button>

                   @else
                    <button  data-id="{{$product->id }}"  type="button" class="btn btn-sm btn-outline-success ml-4 add-to-cart-btn"><i class="fas fa-shopping-cart mr-1"></i>  Add to cart</button>
                   @endif


                    </div>
                  </div>
                </div>
              </div>
            </div>
@endforeach
</div>
<div class="row">
{{ $products->links() }}
</div>

@endif
@endsection

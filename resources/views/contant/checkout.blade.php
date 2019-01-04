@extends('master')
@section('contant')
{{ Breadcrumbs::render('checkout') }}


<div class="row">
  <div class="col-12">

<h1>Shop Check Page</h1>
<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
  </div>
</div>
<div class="row text-center">
  <div class="col-10 ">
    @if($cart)

<table class="table table-bordered">
  <thead>
  <tr>
   <th>Products</th>
   <th>Quantity</th>
   <th>Price</th>
   <th>Sub Total</th>
   <th></th>
  </tr>
   </thead>
   <tbody>
 @foreach($cart as $item)
 <tr>

   <td>{{ $item['name'] }}</td>
   <td class="text-center">

<a href="{{url('shop/update-cart?pid=' . $item['id'] . '&op=minus') }}" class="text-dark update-cart-button"><i class="fas fa-minus-circle"></i></a>
<input size="1" class="text-center" type="text"  value="{{$item['quantity'] }}">
<a href="{{url('shop/update-cart?pid=' . $item['id'] . '&op=plus')  }}" class="text-dark update-cart-button"><i class="fas fa-plus-circle"></i></a>

</td>
   <td>{{ $item['price'] }}</td>
   <td>{{ $item['price'] * $item['quantity'] }}</td>
   <td >
<a  class="text-danger" href="{{ url('shop/remove-item?pid=' .$item['id']) }}"><i class="fas fa-trash"></i>Trash</a>
   </td>
 </tr>
 @endforeach

   </tbody>

  </table>

  <p>
    <b>Total In Cart: </b>$ {{Cart::getTotal()}}
     <span class="text-right"><a class="btn btn-light" href="{{ url('shop/clear-cart') }}">Clear Cart</a></span>
  </p>

  <p><a class="btn btn-dark" href="{{url('shop/order-now')}}">ORDER NOW!</a></p>
@else
<p>CART IS EMPTY!!!!</p>


@endif
  </div>
</div>
@endsection

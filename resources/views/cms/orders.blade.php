@extends('cms.cms_master')

@section('main_content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Site Orders</h1>

  </div>


  <div class="table-responsive mt-5">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>User</th>
          <th>Order Details</th>
          <th>Total</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
       @foreach ($orders as $item)
       <tr>
        <td>{{$item->name}}</td>
        <td>
          <ul>
          @foreach(unserialize($item->data) as $order )
           <li>{{$order['name'] }}, Quantity:  {{$order['quantity'] }}, Price: $ {{$order['price']}}</li>
          @endforeach
          </ul>
        </td>
        <td>$ {{$item->total}}</td>
        <td>{{ date('d/m/Y H.i.s', strtotime($item->created_at)) }}</td>
       </tr>
       @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection

@extends('cms.cms_master')

@section('main_content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Site Products</h1>

  </div>
<p>
<a class="btn btn-dark btn-lg" href="{{ url('cms/products/create') }}">Add Product</a>
</p>

  <div class="table-responsive mt-5">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Product</th>
          <th>Product Image</th>
          <th>Operation</th>
        </tr>
      </thead>
      <tbody>
       @foreach ($products as $item)
       <tr>
        <td>{{$item['p_title']}}</td>
        <td><img width="100" src="{{ asset('images/' . $item['p_image'] ) }}" ></td>
         <td>
          <a class="btn btn-warning btn-sm mr-2" href="{{ url('cms/products/' . $item['id'] . '/edit') }} ">Edit</a>
          <a class="btn btn-danger btn-sm" href="{{ url('cms/products/' . $item['id']) }}">Delete</a>
        </td>
       </tr>
       @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection

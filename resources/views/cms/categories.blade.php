@extends('cms.cms_master')

@section('main_content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Site Categories</h1>

  </div>
<p>
<a class="btn btn-dark btn-lg" href="{{ url('cms/categories/create') }}">Add Category</a>
</p>

  <div class="table-responsive mt-5">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Category</th>
          <th>Category Image</th>
          <th>Operation</th>
        </tr>
      </thead>
      <tbody>
       @foreach ($categories as $item)
       <tr>
        <td>{{$item['title']}}</td>
        <td><img width="100" src="{{ asset('images/' . $item['images'] ) }}" ></td>
         <td>
          <a class="btn btn-warning btn-sm mr-2" href="{{ url('cms/categories/' . $item['id'] . '/edit') }} ">Edit</a>
          <a class="btn btn-danger btn-sm" href="{{ url('cms/categories/' . $item['id']) }}">Delete</a>
        </td>
       </tr>
       @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection

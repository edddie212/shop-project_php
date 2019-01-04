@extends('master')
@section('contant')
{{ Breadcrumbs::render('shop') }}

<div class="row">
  <div class="col-12">
<h1>SAAA Shop Categories </h1>
<p>
This is just a prgh
</p>

  </div>
</div>
<div class="row">
@if(! empty($categories))
@foreach($categories as $category)
<div class="col-md-4 col-sm-6">
  <h3>{{$category['title']}}</h3>
  <p><img src="{{asset('images/'. $category['images'])}}" class="img-fluid pull-xs-left" alt="..."></p>
<p>{!!$category['description']!!}</p>
<a class="btn btn-dark " href="{{url('shop/'.$category['url'])}}">View Products</a>
 </div>

@endforeach
</div>
@else
<div class="col-12">
<p><i>No Categories....</i></p>
</div>
@endelse
@endif
@endsection

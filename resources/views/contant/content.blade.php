@extends('master')
@section('contant')

<div class="row">
  <div class="col-12">

@if($contents->count())
{{ Breadcrumbs::render('content', $url) }}

@foreach ($contents as $content)

<div class="row">
  <div class="col-12">
    <h2>{{$content->ctitle}}</h2>
     <p>{!! $content->article !!}</p>
     <br><hr>
  </div>
</div>


@endforeach


@else
{{ Breadcrumbs::render('content', $url) }}

 <div class="row">
  <div class="col-12">
   <b><p><i>No content  for this menu link</i></p></b>

  </div>
 </div>
@endif

@endsection

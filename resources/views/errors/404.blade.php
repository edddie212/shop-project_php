
@php
$menu = App\Menu::all()->toArray();
@endphp

@extends('master')
@section('contant')

<div class="row">
  <div class="col-12">
<h1>OOOPSSS The Page you are looking is not found</h1>
<p>
ERROR 404!!!!</p>

  </div>
</div>

@endsection

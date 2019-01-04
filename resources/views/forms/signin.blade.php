@extends('master')
@section('contant')
{{ Breadcrumbs::render('signin') }}

<div class="row">
  <div class="col-12">
<h1>Here you can sign in with your acount</h1>
  </div>
</div>
<div class="row">
 <div class="col-md-4">

<form class="" action=""  method="post" novalidate="novalidate" autocomplete="off">
@csrf
 <div class="form-group">
<label for="email">* Email : </label>
<input value="{{ old('email') }}" class="form-control" type="email" name="email" id="email">
 </div>
 <div class="form-group">
<label for="password">* Password : </label>
<input class="form-control" type="password" name="password" id="password">
 </div>
 <input type="submit" class="btn btn-dark btn-block " value="Sign in">

</form>

 </div>
</div>
@endsection

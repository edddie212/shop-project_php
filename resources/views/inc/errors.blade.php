@if( !empty($err_top) && $errors->any())
<div class="container">
 <div class="row">
  <div class="col-12">
   <div class="alert alert-danger mt-3">
    <ul>
    @foreach ($errors->all() as $error)
    <li> * {{ $error }}</li><br>

    @endforeach
    </ul>
   </div>
  </div>
 </div>
</div>
@endif

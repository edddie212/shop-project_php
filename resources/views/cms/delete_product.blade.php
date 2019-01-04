@extends('cms.cms_master')

@section('main_content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h3">Are You Sure You Want To Delete This Item</h1>
  </div>
<div class="row">
 <div class="col-8">
  <form  action="{{ url('cms/products/' . $item_id) }}" method="POST" novalidate="novalidate" autocomplete="off">
  @method('DELETE')
    @csrf

    <a class="btn btn-info" href="{{url('cms/products')}}">Cancel</a>
    <input class="btn btn-danger" type="submit" name="submit" value="delete">
  </form>
 </div>
</div>

</main>
@endsection

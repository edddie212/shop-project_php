@extends('cms.cms_master')

@section('main_content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Menu Link</h1>
  </div>
<div class="row">
 <div class="col-8">
  <form  action="{{url('cms/menu/' . $menu_item['id'] )}}" method="POST" novalidate="novalidate" autocomplete="off">
    @method('PUT')
    @csrf
    <input type="hidden" name="item_id" value="{{ $menu_item['id'] }}">
    <div class="form-group">
       <label for="link"><span class="text-danger">* </span>Link:</label>
       <input value="{{ $menu_item['link'] }}" type="text" name="link" id="link" class="form-control field-input-cms original-text">
       <small class="text-muted text-black">The Menu Link, min 2 chars - max 50 chars</small><br>
       <span class="text-danger">{{ $errors->first('link') }}</span>
    </div>
    <div class="form-group">
       <label for="url"><span class="text-danger">* </span>Url Menu:</label>
       <input value="{{ $menu_item['url'] }}" type="text" name="url" id="url" class="form-control field-input-cms target-text">
       <small class="text-muted text-black">The Url Menu, only small letters, -,  and - numbers</small><br>
       <span class="text-danger">{{ $errors->first('url') }}</span>
    </div>
    <div class="form-group">
       <label for="title"><span class="text-danger">* </span>Page  Title :</label>
       <input value="{{ $menu_item['title'] }}" type="text" name="title" id="title" class="form-control field-input-cms">
       <small class="text-muted text-black">The Page Title Menu, min 2 chars - max 100 chars</small><br>
       <span class="text-danger">{{ $errors->first('title') }}</span>
    </div>
    <a class="btn btn-info" href="{{url('cms/menu')}}">Cancel</a>
    <input class="btn btn-dark" type="submit" name="submit" value="Update Menu">
  </form>
 </div>
</div>

</main>
@endsection

@extends('cms.cms_master')

@section('main_content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit
<div class="row">
 <div class="col-12">
   <form  action="{{url('cms/categories/' . $category_item['id'] )}}" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
     @method('PUT')
     @csrf
     <input type="hidden" name="item_id" value="{{ $category_item['id'] }}">
    <div class="form-group">
       <label for="title"><span class="text-danger">* </span> Title :</label>
       <input value="{{ $category_item['title'] }}" type="text" name="title" id="title" class="form-control field-input-cms original-text">
       <small class="text-muted text-black">The Title Menu, min 2 chars - max255 chars</small><br>
       <span class="text-danger">{{ $errors->first('title') }}</span>
    </div>
    <div class="form-group">
       <label for="url"><span class="text-danger">* </span> Category Url :</label>
       <input value="{{ $category_item['url'] }}" type="text" name="url" id="url" class="form-control field-input-cms target-text">
       <small class="text-muted text-black">The Url Menu, only small letters, -,  and - numbers</small><br>
       <span class="text-danger">{{ $errors->first('url') }}</span>
    </div>
    <div class="form-group">
       <label for="article"><span class="text-danger">* </span> Description :</label>
       <textarea name="description" id="article" class="form-control">{{$category_item['description']}}</textarea>
       <small class="text-muted text-black">The Description, min 2 chars</small><br>
       <span class="text-danger">{{ $errors->first('description') }}</span>
    </div>
    <div class="form-group">
      <img width="100" src="{{asset('images/' . $category_item['images'])}}" >
    </div>
    <br>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
      </div>
      <div class="custom-file">
        <input name="image" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
        <label class="custom-file-label" for="inputGroupFile01">Change Category Image</label>
      </div>
    </div>
    <div class="form-group">
      <small class="text-muted text-black">The Image must be : jpg, jpeg, pmg, gif with max size : 5 mb </small>

      <span class="text-danger">{{ $errors->first('image') }}</span>
    </div>
    <br>
    <a class="btn btn-info mr-2" href="{{url('cms/categories')}}">Cancel</a>
    <input class="btn btn-dark " type="submit" name="submit" value="Update Category">
  </form>
 </div>
</div>

</main>
@endsection

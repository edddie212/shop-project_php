@extends('cms.cms_master')

@section('main_content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Product</h1>
  </div>
<div class="row">
 <div class="col-8">
   <form  action="{{url('cms/products/' . $product_item['id'] )}}" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
     @method('PUT')
     @csrf
     <input type="hidden" name="item_id" value="{{ $product_item['id'] }}">
    <div class="form-group">
       <label for="categorie-id"><span class="text-danger">* </span>Category  :</label>
     <select class="form-control" name="categorie_id" id="categorie-id">
     @foreach ($categories as $item)
    <option @if($product_item['categorie_id'] == $item['id']) selected="selected" @endif value="{{ $item['id'] }}">{{ $item['title'] }}</option>
     @endforeach
    </select>
       <span class="text-danger">{{ $errors->first('categorie_id') }}</span>
    </div>

    <div class="form-group">
       <label for="title"><span class="text-danger">* </span> Title :</label>
       <input value="{{ $product_item['p_title'] }}" type="text" name="p_title" id="p_title" class="form-control field-input-cms original-text">
       <small class="text-muted text-black">The Title Menu, min 2 chars - max255 chars</small><br>
       <span class="text-danger">{{ $errors->first('p_title') }}</span>
    </div>
    <div class="form-group">
       <label for="p_url"><span class="text-danger">* </span> product Url :</label>
       <input value="{{  $product_item['p_url'] }}" type="text" name="p_url" id="url" class="form-control field-input-cms target-text">
       <small class="text-muted text-black">The Url Product</small><br>
       <span class="text-danger">{{ $errors->first('p_url') }}</span>
    </div>
     <div class="form-group">
         <label for="price"><span class="text-danger">* </span> product Price :</label>
         <input value="{{  $product_item['price'] }}" type="text" name="price" id="price" class="form-control field-input-cms ">
         <small class="text-muted text-black">The Url Price only numbers</small><br>
         <span class="text-danger">{{ $errors->first('price') }}</span>
      </div>
     <div class="form-group">
       <label for="article"><span class="text-danger">* </span> Article :</label>
       <textarea name="article" id="article" class="form-control">{{ $product_item['article'] }}</textarea>
       <small class="text-muted text-black">The Article, min 2 chars</small><br>
       <span class="text-danger">{{ $errors->first('article') }}</span>
    </div>
    <div class="form-group">
      <img width="80" src="{{ asset('images/'. $product_item['p_image']) }}" >
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
      </div>
      <div class="custom-file">
        <input name="p_image" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
        <label class="custom-file-label" for="inputGroupFile01">Change Product Image</label>
      </div>
    </div>
    <div class="form-group">
      <small class="text-muted text-black">The Image must be : jpg, jpeg, pmg, gif with max size : 5 mb </small><br>

      <span class="text-danger">{{ $errors->first('p_image') }}</span>
    </div>
    <br><br>
    <a class="btn btn-info mr-2" href="{{url('cms/products')}}">Cancel</a>
    <input class="btn btn-dark " type="submit" name="submit" value="Update Product">
  </form>
 </div>
</div>

</main>
@endsection

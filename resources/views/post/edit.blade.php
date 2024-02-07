
@extends('layouts.app')

@section('content')
@if (session('alert'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>System Message!</strong> {{session('alert')}}.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<form enctype="multipart/form-data" class="row g-3 shadow mt-3 rounded-2 p-2" action={{ route('posts.update' , ['post' =>$singlePost->id])}} method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="user_id" value="{{ request()->session()->get("user")['id']}}" >

    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Title</label>
      <input name="title" value="{{$singlePost->title}}" type="text" 
        class="form-control @error('title')is-invalid @enderror" id="inputEmail4">
      <div id="validationServer03Feedback" class="invalid-feedback">
        @error('title')
          {{$message}}    
        @enderror
      </div>
    </div>

    <div class="col-md-6">
      <label for="inputfile" class="form-label">Cover Image</label>
      <input name="img_cover" type="file" class="form-control @error('img_cover') is-invalid @enderror"
        id="inputfile">  
      <div id="validationServer03Feedback" class="invalid-feedback">
        @error('img_cover')
          {{$message}}    
        @enderror 
      </div> 
    </div>
    
    <div class="col-12">
        <label for="content"></label>
        <textarea name="content"  id="#content" class="w-100 @error('title') is-invalid @enderror"
          rows="10">{{ $singlePost->content}}</textarea>
        <div id="validationServer03Feedback" class="invalid-feedback">
          @error('content')
            {{$message}}    
          @enderror
        </div>
      </div>

    <div class="col-12">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>

@endsection
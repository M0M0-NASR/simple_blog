@extends('layouts.app')

@section('content')


@isset($alert)    
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>
@endisset


<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<form class="row g-3 shadow mt-3 rounded-2 p-2" action="{{ route('posts.store')}}" method="POST">
    
  
  
  
  @csrf
    @method('post')
    
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Title</label>
      <input name="title" value="{{old('title')}}" type="text"
       class="form-control @error('title') is-invalid @enderror" id="validationServer03">
      <div id="validationServer03Feedback" class="invalid-feedback">
        @error('title')
          {{$message}}    
        @enderror
      </div>        
    </div>
    <div class="col-md-6">
      <label for="inputfile" class="form-label">Cover Image</label>
      <input name="img_cover" value="{{old('img_cover')}}" type="file" class="form-control" id="inputfile" >    
      @error('img_cover')
      {{$message}}    
      @enderror
      
    </div>
    <div class="col-12">
        <label for="content"></label>
        <textarea name="content" id="#content" class="w-100 @error('content') is-invalid @enderror"
         rows="10">{{old('content')}}</textarea>
        <div id="validationServer03Feedback" class="invalid-feedback">
          @error('title')
            {{$message}}    
          @enderror
        </div> 
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-success">Create</button>
      <input type="reset" value="Reset" class="btn btn-danger">
    </div>

  </form>
  
  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
@endsection
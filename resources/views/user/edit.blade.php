
@extends('layouts.app')

@section('content')
@if (session('alert'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>System Message!</strong> {{session('alert')}}.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex justify-content-center">
    <form class="row g-3 shadow mt-3 rounded-2 p-2 w-50 rounded-3" action={{ route('posts.update' , ['post' =>$user->id])}} method="POST">
        @csrf
        @method('put')
        <input type="hidden" name="user_id" value="{{ request()->session()->get("user")['id']}}" >
    
        <div class="col-12">
            <label for="inputEmail4" class="form-label">User Name</label>
            <input name="title" value="{{$user['name']}}" type="text" 
              class="form-control @error('title')is-invalid @enderror" id="inputEmail4">
            <div id="validationServer03Feedback" class="invalid-feedback">
              @error('title')
                {{$message}}    
              @enderror
            </div>
          </div>
          <div class="col-12">
            <label for="inputEmail4" class="form-label">Email</label>
            <input name="title" value="{{$user['email']}}" type="text" 
              class="form-control @error('title')is-invalid @enderror" id="inputEmail4">
            <div id="validationServer03Feedback" class="invalid-feedback">
              @error('title')
                {{$message}}    
              @enderror
            </div>
          </div>
    
        <div class="col-12">
          <label for="inputfile" class="form-label">Cover Image</label>
          <input name="img_cover" value="tests.img" type="file" class="form-control @error('img_cover') is-invalid @enderror"
            id="inputfile">  
          <div id="validationServer03Feedback" class="invalid-feedback">
            @error('img_cover')
              {{$message}}    
            @enderror 
          </div> 
        </div>

        <div class="col-md-6">

            <a href="{{route('password.request')}}" class="btn btn-success col-12  m-1">Reset Password</a>
        </div>
        <div class="col-md-6">

            <input class="btn btn-success col-12  m-1" type="submit" value="Update Info" >
        </div>
    </form>
</div>


  @endsection
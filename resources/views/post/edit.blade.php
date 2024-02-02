@extends('layouts.app')

@section('content')
<form class="row g-3 shadow mt-3 rounded-2 p-2" action={{ route('posts.update' , ['post' =>$post['id']])}} method="POST">
    @csrf
    @method('put')
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Title</label>
      <input type="email" class="form-control" id="inputEmail4">
    </div>

    <div class="col-md-6">
      <label for="inputfile" class="form-label">Cover Image</label>
      <input type="file" class="form-control" id="inputfile" >    
    </div>
    
    <div class="col-12">
        <label for="content"></label>
        <textarea name="" id="#content" class="w-100" rows="10"></textarea>
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-primary">create</button>
    </div>
  </form>
  <div id="shapes-container"></div>

  

@endsection
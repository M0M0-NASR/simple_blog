
@extends('layouts.app')

@section('content')
<form class="row g-3 shadow mt-3 rounded-2 p-2" action={{ route('posts.update' , ['post' =>$id])}} method="POST">
    @csrf
    @method('put')
    @php
  $post['img_cover'] = "aaa.php"
@endphp

    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Title</label>
      <input name="title" value={{ $post['title']}}  type="text" class="form-control" id="inputEmail4">
    </div>

    <div class="col-md-6">
      <label for="inputfile" class="form-label">Cover Image</label>
      <input name="img_cover" type="file"  value=test.php class="form-control" id="inputfile">    
    </div>
    
    <div class="col-12">
        <label for="content"></label>
        <textarea name="content"  id="#content" class="w-100" rows="10"> {{ $post['content']}}</textarea>
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>

@endsection
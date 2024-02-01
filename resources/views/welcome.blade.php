@extends('layouts.app')

@section('content')
<div class="text-center my-2">
  <a class="btn btn-success">Create Post</a>
  
</div>
<table class="table table-striped table-dark table-bordered rounded shadow">
    <thead class="table-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach ($posts as $post)
          
      <tr>
        <th scope="row">{{$post['id']}}</th>
        <td>{{$post['posted_by']}}</td>
        <td>{{$post['created_at']}}</td>
        <td>{{$post['to']}}</td>
        <td>
            <a class="btn btn-success">view</a>
            <a class="btn btn-primary">edit</a>
            <a class="btn btn-danger">delete</a>
        </td>
      @endforeach
      
      
    </tbody>
  </table>
@endsection
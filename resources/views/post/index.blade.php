@extends('layouts.app')

@section('content')

@if (session('alert'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>System Message!</strong> {{session('alert')}}.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="text-center my-2">
  <a href="{{ route('posts.create')}}" class="btn btn-success">Create Post</a>  
</div>

{{-- Post data table  --}}
<table class="table table-striped table-dark table-bordered rounded shadow">
    <thead class="table-light">
      <tr class=" px-5">
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody class="w-auto table-group-divider">
      @php
          $i = 0;
      @endphp
                
      @foreach ($allPosts as $post)
          
      <tr>
        <td scope="row">{{++$i}}</td >
        <td>{{$post->title}}</td>
        <td>{{$post->posted_by}}</td>
        <td>{{$post->created_at}}</td>
        <td class="actions d-grid d-md-flex gap-1">
            <a href={{route('posts.show', $post->id )}} class="btn btn-success ">view</a>
            <a href={{route('posts.edit', $post->id )}}  class="btn btn-primary  ">edit</a>
            <a href={{route('posts.share', $post->id )}} class="btn btn-secondary">share</a>
            
            <!-- Delete Button compont -->
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">delete</button>
            <!-- Modal  For  Confrim Delete -->
            <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-dark">
                    Are you sure for delete this post
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action={{route('posts.destroy', $post->id )}} method="post">
                      @csrf()
                      @method("delete")
                      <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                  </div>
                </div>
              </div>
            </div>

        </td>
      @endforeach     
    </tbody>
  </table>
  
  @empty(count($allPosts))
  <div class="fw-bold text-center w-100" >
    No Data To Show
  </div>
  @endempty
  @endsection
 
  
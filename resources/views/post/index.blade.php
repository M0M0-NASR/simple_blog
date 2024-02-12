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
<div class="table-responsive">
  
<table class="table table-striped table-dark table-bordered rounded shadow">
    <thead class="table-light">
      <tr class="px">
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col" >Content</th>
        <th scope="col" width="20%" >Created At</th>
        <th scope="col" width="10%" >Cover</th>
        <th scope="col">Tags</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @php
          $i = 0;
      @endphp
                
      @foreach ($allPosts as $post)
          
      <tr>
        <td >{{++$i}}</td >
        <td>{{$post->title}}</td>
        <td>{{$post->content}}</td>
        <td>{{$post->created_at}}</td>
        <td> <div class="d-flex "> 
          <img class="img-fluid" src="{{Storage::url($post->img_cover)}}" alt="cover" srcset=""></div></td>
        <td>
          <div class="d-flex flex-wrap">
            @foreach ($post->tags()->get() as $tag)
            <span class="badge rounded-pill bg-danger">
              {{$tag->name}}
            </span>
            @endforeach
          </div>
        </td>
          
        <td >
          <div class="row align-items-center">
            <div class="col-12 col-md-6 col-lg-3">

              <a href={{route('posts.show', $post->id )}} class="btn btn-success w-100 ">view</a>
            </div>

            <div class="col-12 col-md-6 col-lg-3">

              <a href={{route('posts.edit', $post->id )}}  class="btn btn-primary  w-100">edit</a>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
              <button class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#shareModal">share</button>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
              <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">delete</button>
              
              <!-- Modal  For  Share -->
              <div class="modal fade text-dark" id="shareModal" tabindex="-1" aria-labelledby="#shareModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Post</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="shareLinks" class="modal-body text-dark">
                        
                      @php
                        $links = Share::currentPage()
                                ->facebook()
                                ->twitter()
                                ->linkedin('')
                                ->whatsapp()
                                ->getRawLinks();
                      @endphp


                      <div>
                        @foreach ($links as $key => $link )
                          
                        <a href={{$link}}><i class="fa-brands fa-{{$key}}"></i></a>
                        @endforeach
                      </div>  
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <form action={{route('posts.destroy', $post->id )}} method="post">
                        @csrf
                        @method("delete")
                        <input type="hidden" name="user_id" value="{{ request()->session()->get("user")['id']}}" >
  
                        <input type="submit" value="Delete" class="btn btn-danger">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              

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
                        @csrf
                        @method("delete")
                        <input type="hidden" name="user_id" value="{{ request()->session()->get("user")['id']}}" >
  
                        <input type="submit" value="Delete" class="btn btn-danger">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>

        </td>
      @endforeach     
    </tbody>
  </table>
</div>
  
  @empty(count($allPosts))
  <div class="fw-bold text-center w-100" >
    No Data To Show
  </div>
  @endempty
  
  
@endsection


























  


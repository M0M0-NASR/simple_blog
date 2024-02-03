@extends('layouts.app')

@section('content')

  <div class="card">
    <div class="card-body">
      <div class="d-flex align-text-middle">
        <h5 class="card-title me-2">{{$singlePost->title}}</h5>
        <p class="card-text "><small class="text-body-secondary">{{$singlePost->created_at}}</small></p>
      </div>
      <p class="card-text"> {{$singlePost->content}}</p>
    </div>
    <img  src="..." class="card-img-bottom" alt="...">
  </div>
@endsection
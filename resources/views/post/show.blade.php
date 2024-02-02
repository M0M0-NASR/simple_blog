@extends('layouts.app')

@section('content')

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">{{$post['title']}}</h5>
      <p class="card-text"> {{$post['content']}}</p>
      <p class="card-text"><small class="text-body-secondary">{{$post['created_at']}}</small></p>
    </div>
    <img  src="..." class="card-img-bottom" alt="...">
  </div>
@endsection
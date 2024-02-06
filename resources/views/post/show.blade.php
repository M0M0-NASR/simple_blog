@extends('layouts.app')

@section('content')

<div class="card mb-3">
  <div class="p-3 rounded">  
    <img  src="{{Storage::url($singlePost->img_cover)}}"  class="" alt="...">
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$singlePost->title}}</h5>
    <p class="card-text"><small class="text-body-secondary">{{$singlePost->created_at}}</small></p>
    <p class="card-text">{{$singlePost->content}}</p>
  </div>
</div>

@endsection














@extends('layouts.app')

@section('content')

  <div class="card">
    <div class="card-body">
        <h5 class="card-title me-2">{{$singlePost->title}}</h5>
      <p class="card-text "><small class="text-body-secondary">{{$singlePost->created_at}}</small></p>
      <img  src="{{Storage::url($singlePost->img_cover)}}" class="cover card-img-bottom " alt="...">
      <p class="lead my-3"> {{$singlePost->content}}</p>
    </div>
  </div>
@endsection
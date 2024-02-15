@extends('layouts.app')
@section('content')
    <div class="container d-flex flex-column">
        <div class="user-card p-4 row justify-content-center">
            <div class="col-12 col-lg-8 gap-4 d-md-flex justify-content-center shadow rounded-3 ">
                <div class="d-flex justify-content-center ">
                    
                    @if ($user->img_cover)
                    <img  src="{{Storage::url($user->img_cover)}}"  class="img_fluid" width="200" alt="...">
                    @else
  
                    <svg class="bd-placeholder-img img-thumbnail rounded-lg" width="200" height=""
                    xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice"
                    focusable="false">
                    <rect width="100%" height="100%" fill="#868e96">
                    </rect>
                    <text fill="#dee2e6" x="35%" y="50%">User Img</text>
                    </svg>
                    @endif

                </div>
                <div class="">
                    <div class="my-2 form-control form-control--lg">
                        {{ $user->name }}
                    </div>
                    <div class="my-2 form-control form-control-md-lg">
                        {{ $user->email }}
                    </div>
                    <div class="my-2 form-control form-control-md-lg">
                        {{ date('Y / m / d') }}
                    </div>
                </div>
                
            </div>
            <div class="buttons row justify-content-center my-2 p-1">
                
                <a href="{{route('user.edit' , $user->id)}}" class="btn btn-success col-md-4  m-1" >Update Cover</a>
                <a href="{{route('user.edit' , $user->id)}}" class="btn btn-success col-md-4  m-1" >Update Info</a>
            </div>
        </div>
    </div>
@endsection

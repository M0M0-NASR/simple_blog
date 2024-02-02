@extends('layouts.app')

@section('content')
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
        $i = 1;
      @endphp
      @foreach ($posts as $post)
          
      <tr>
        <td scope="row">{{$i++}}</td >
        <td>{{$post['title']}}</td>
        <td>{{$post['posted_by']}}</td>
        <td>{{$post['created_at']}}</td>
        <td class="actions d-grid d-md-flex gap-1">
            <a class="btn btn-success ">view</a>
            <a class="btn btn-primary  ">edit</a>
            <a class="btn btn-secondary  ">share</a>
            <a class="btn btn-danger ">delete</a>
        </td>
      @endforeach 
    </tbody>
  </table>
@endsection
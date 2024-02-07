@extends('layouts.app')

@section('content')
    {{-- @error('user_id')
  @dd($message)
@enderror --}}

    <form class="row g-3 shadow mt-3 rounded-2 p-2" action="{{ route('posts.store') }}" method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('post')
        <input type="hidden" name="user_id" value="{{ request()->session()->get('user')['id'] }}">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Title</label>
            <input name="title" value="{{ old('title') }}" type="text"
                class="form-control @error('title') is-invalid @enderror" id="validationServer03">
            <div id="validationServer03Feedback" class="invalid-feedback">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputfile" class="form-label">Cover Image</label>
            <input name="img_cover" value="{{ old('img_cover') }}" type="file" class="form-control" id="inputfile">
            @error('img_cover')
                {{ $message }}
            @enderror

        </div>
        <div class="col-12">
          <label for="input">Tags</label>
          <div class="d-flex align-items-center ">
            <div class="col-3 ">
              <input class="form-control" type="text" id="input">
          </div>
          <div class="d-flex flex-wrap mx-2" ><span>adfdsfa</span><span>adfdsfa</span><span>adfdsfa</span><span>adfdsfa</span> <span>adfdsfa</span></div>

          </div>
      </div>
        <div class="col-12">
            <label for="content"></label>
            <textarea name="content" id="#content" class="w-100 @error('content') is-invalid @enderror" rows="10">{{ old('content') }}</textarea>
            <div id="validationServer03Feedback" class="invalid-feedback">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-success">Create</button>
            <input type="reset" value="Reset" class="btn btn-danger">
        </div>

    </form>

    <script src="{{ asset('assets/js/autocomplit.js') }}"></script>
@endsection

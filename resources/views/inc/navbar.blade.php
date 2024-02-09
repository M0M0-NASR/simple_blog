

 <nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">
  <div class="container">
    <a class="navbar-brand col-lg-1 me-0 d-flex d-lg-none" href={{route('posts.index')}}>My Blog</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
      <a class="navbar-brand col-lg-1 me-0 d-none d-lg-flex" href={{route('posts.index')}}>My Blog</a>
      <ul class="navbar-nav col-lg-2 justify-content-lg-start">
        <li class="nav-item">
          <a class="nav-link @if(request()->url() === route('posts.index')) active @endif" href={{route('posts.index')}}>Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->url() === route('user.index')) active @endif" href={{route('user.index')}}>Profile</a>
        </li>
      </ul>
      @auth
      <div class="d-lg-flex col-lg-6 justify-content-lg-center" >
        <div class="d-flex" >
          <input  class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit" data-bs-toggle="modal" data-bs-target="#searchModal">Search</button>
        </div>
      @endauth
      </div>
      <div class="d-lg-flex col-lg-3 justify-content-lg-end">
        @guest
        <a class="btn btn-outline-primary me-1" href={{route('login')}}>Login</a>
        <a class="btn btn-danger" href={{route('register')}}>Sign up</a>
        @endguest
        @auth
        <form action="{{route('logout')}}" method="post">
          @csrf
          <button class="btn btn-danger mt-1 mt-lg-0" type="submit">logout</button>           
        </form>
        @endauth         

      </div>
    </div>
  </div>
</nav>

<!-- Modal  For  Confrim Delete -->
<div class="modal fade text-dark" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <input name="search" id="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      </div>
      <div id="searchResults" class="modal-body text-dark">
        // searching 
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
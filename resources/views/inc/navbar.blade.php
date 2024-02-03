   
<nav class="navbar navbar-expand-lg bg-body-tertiary shadow ">
    <div class="container">
      <a class="navbar-brand" href={{route('posts.index')}}>Blog</a>  
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-none d-lg-flex flex-row justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href={{route('posts.index')}}>Posts</a>
                </li>  
                
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <div>
              @guest
              <a class="btn btn-outline-primary" href={{route('login')}}>Login</a>
              <a class="btn btn-danger" href={{route('register')}}>Sign up</a>
              @endguest
              @auth
              <a class="btn btn-danger" href={{route('logout')}}>Logout</a>
              @endauth         
            </div>
        
      </div>
    </div>
  </nav>
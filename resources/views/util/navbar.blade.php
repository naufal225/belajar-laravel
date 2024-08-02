<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="/">NMA225</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link {{ ($title == "Home") ? "active" : "" }}" aria-current="page" href="/">Home</a>
          <a class="nav-link {{ ($title == "About") ? "active" : "" }}" href="/about">About</a>
          <a class="nav-link {{ ($title == "Blog") ? "active" : "" }}" href="/blog">My Blog</a>
          <a class="nav-link {{ ($title == "Post Categories") ? "active" : "" }}" href="/categories">Categories</a>
        </div>
        @auth
        <div class="navbar-nav">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Back! {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/dashboard">Dashboard</a>
              <a class="dropdown-item" href="/logout">Logout</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </div>
        @else
        
        <div class="navbar-nav ms-auto">
          <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </div>
        @endauth
      </div>
    </div>
</nav>
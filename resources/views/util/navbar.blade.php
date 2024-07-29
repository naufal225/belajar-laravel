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
        <div class="navbar-nav ms-auto">
          <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </div>
      </div>
    </div>
</nav>
<header class="navbar sticky-top bg-dark flex-md-nowrap shadow sticky-top" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">NMA Blog</a>
  
    <ul class="navbar-nav flex-row d-md-none">
      <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
          <svg class="bi"><use xlink:href="#search"/></svg>
        </button>
      </li>
      <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <svg class="bi"><use xlink:href="#list"/></svg>
        </button>
      </li>
    </ul>
  
    <div id="navbarSearch" class="navbar-search w-100 d-flex justify-content-around">
      <input class="form-control rounded-0 border-0" style="width: 80%" type="text" placeholder="Search" aria-label="Search">
      <form action="/logout" method="post">
        @csrf 
        <button type="submit" class="btn btn-dark bg-danger"><i class="bi bi-box-arrow-right"></i>Logout</button>
      </form>
    </div>
  </header>
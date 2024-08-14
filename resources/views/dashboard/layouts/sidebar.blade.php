<div class="col-md-3 col-lg-2 d-md-block bg-light sidebar" style="min-height: 100vh" id="sidebarMenu">
  <div class="position-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <i data-feather="home"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
          <i data-feather="file-text"></i>
          My Posts
        </a>
      </li>
    </ul>
  </div>
</div>

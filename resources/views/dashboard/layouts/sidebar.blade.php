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
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 mt-4 text-muted">
      <span>Administrator</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="/dashboard/categories" class="nav-link {{ Request::is("dashboard/categories*") ? "active" : "" }}">
          <i data-feather="grid"></i>
          Post Categories
        </a>
      </li>
    </ul>
  </div>
</div>

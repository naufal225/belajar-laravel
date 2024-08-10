<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary d-flex flex-column h-100" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-body flex-grow-1 p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link text-black {{ Request::is("dashboard") ? "active" : "" }}" aria-current="page" href="/dashboard">
              <i data-feather="home"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black {{ Request::is("dashboard/posts") ? "active" : "" }}" href="/dashboard/posts">
              <i data-feather="file-text"></i>
              My Posts
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
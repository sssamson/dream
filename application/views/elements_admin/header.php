<header class="app-header navbar">
  <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
    <span class="icon-menu"></span>
  </button>

  <ul class="nav navbar-nav d-md-down-none">
    <li class="nav-item px-1">
      <a class="nav-link" href="/">Visit Site</a>
    </li>
    <li class="nav-item px-1">
      <a class="nav-link" href="/admin/clients/?page=users">Users</a>
    </li>
    <li class="nav-item px-1">
      <a class="nav-link" href="#">Account</a>
    </li>
  </ul>
  <div class="ml-auto">
    <ul class="nav navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
          <img src="/assets/back/img/avatars/8.png" class="img-avatar">
          <span class="hidden-md-down">Admin</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>User Settings</strong>
          </div>
          <a class="dropdown-item" href="/admin/clients/edit?page=users&id=<?= $this->session->client_id ?>"><i class="fa fa-user"></i> Profile</a>
          <div class="divider"></div>
          <a class="dropdown-item" href="/admin/main/logout"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
      </li>
    </ul>
  </div>
</header>
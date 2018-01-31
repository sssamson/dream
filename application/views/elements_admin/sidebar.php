<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">

      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-title nav-dropdown-toggle" href="#"><i class="fa fa-hashtag"></i> General</a>
        <ul class="nav-dropdown-items">
          <?php $section = 'general' ?>
          <?php $id = 'dashboard' ?>
          <li class="nav-item">
            <a class="nav-link" data-url="<?= $id ?>" href="/admin/<?= $section ?>/?page=<?= $id ?>">
              <i class="fa fa-dashboard" aria-hidden="true"></i>
              Dashboard
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-title nav-dropdown-toggle" href="#"><i class="icon-picture"></i> Pages</a>
        <ul class="nav-dropdown-items">
          <?php
          $section = 'pages';
          $web_sections = $this->config->item('web_sections');
          foreach ($web_sections as $id => $name) {
          ?>
            <li class="nav-item">
              <a class="nav-link" data-url="<?= $id ?>" href="/admin/<?= $section ?>/?page=<?= $id ?>"><i class="icon-star"></i> <?= $name ?></a>
            </li>
          <?php
          }
          ?>
        </ul>
      </li>

    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-title nav-dropdown-toggle" href="#"><i class="icon-list"></i> Blog</a>
        <ul class="nav-dropdown-items">
          <?php $section = 'blogs' ?>
          <?php $id = 'categories' ?>
          <li class="nav-item">
            <a class="nav-link" data-url="<?= $id ?>" href="/admin/<?= $section ?>/categories/?page=<?= $id ?>"><i class="icon-organization"></i> Categories</a>
          </li>
          <?php $id = 'blogs' ?>
          <li class="nav-item">
            <a class="nav-link" data-url="<?= $id ?>" href="/admin/<?= $section ?>/?page=<?= $id ?>"><i class="icon-doc"></i> Articles</a>
          </li>
        </ul>
      </li>

      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-title nav-dropdown-toggle" href="#"><i class="icon-handbag"></i> Store</a>
        <ul class="nav-dropdown-items">
          <?php $section = 'store' ?>
          <?php $id = 'products' ?>
          <li class="nav-item">
            <a class="nav-link" data-url="<?= $id ?>" href="/admin/<?= $section ?>/?page=<?= $id ?>"><i class="icon-star"></i> Products</a>
          </li>
          <?php $id = 'orders' ?>
          <li class="nav-item">
            <a class="nav-link" data-url="<?= $id ?>" href="/admin/<?= $section ?>/orders/?page=<?= $id ?>"><i class="icon-wallet"></i> Orders</a>
          </li>
        </ul>
      </li>

      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-title nav-dropdown-toggle" href="#"><i class="icon-event"></i> Service</a>
        <ul class="nav-dropdown-items">
          <?php $section = 'services' ?>
          <?php $id = 'service_settings' ?>
          <li class="nav-item">
            <a class="nav-link" data-url="<?= $id ?>" href="/admin/<?= $section ?>/settings?page=<?= $id ?>"><i class="icon-star"></i> Business Hours</a>
          </li>
          <?php $id = 'services_com' ?>
          <li class="nav-item">
            <a class="nav-link" data-url="<?= $id ?>" href="/admin/<?= $section ?>/?page=<?= $id ?>"><i class="icon-star"></i> Services</a>
          </li>
          <?php $id = 'appointments' ?>
          <li class="nav-item">
            <a class="nav-link" data-url="<?= $id ?>" href="/admin/<?= $section ?>/appointments/?page=<?= $id ?>"><i class="icon-location-pin"></i> Appointments</a>
          </li>
        </ul>
      </li>

      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-title nav-dropdown-toggle" href="#"><i class="icon-pin"></i> Tasks</a>
        <ul class="nav-dropdown-items">
          <?php $section = 'tasks' ?>
          <?php $id = 'tasks' ?>
          <li class="nav-item">
            <a class="nav-link" data-url="<?= $id ?>" href="/admin/<?= $section ?>/?page=<?= $id ?>"><i class="icon-check"></i> Users Tasks</a>
          </li>
        </ul>
      </li>

      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-title nav-dropdown-toggle" href="#"><i class="icon-people"></i> Clients</a>
        <ul class="nav-dropdown-items">
          <?php $section = 'clients' ?>
          <?php $id = 'users' ?>
          <li class="nav-item">
            <a class="nav-link" data-url="<?= $id ?>" href="/admin/<?= $section ?>/?page=<?= $id ?>"><i class="icon-star"></i> Users</a>
          </li>
        </ul>
      </li>

      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-title nav-dropdown-toggle" href="#"><i class="icon-support"></i> Help</a>
        <ul class="nav-dropdown-items">
          <?php $section = 'help' ?>
          <?php $id = 'requests' ?>
          <li class="nav-item">
            <a class="nav-link" data-url="<?= $id ?>" href="/admin/<?= $section ?>/?page=<?= $id ?>"><i class="icon-star"></i> Requests</a>
          </li>
        </ul>
      </li>

    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>

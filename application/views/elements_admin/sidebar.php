<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">

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

    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>

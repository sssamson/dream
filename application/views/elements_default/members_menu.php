<div class="panel panel-default sidebar-menu">
  <div class="panel-heading">
    <h3 class="panel-title">Customer section</h3>
  </div>
  <div class="side_menu">
    <ul class="nav flex-column">
      <li>
        <a class="<?= $active=='orders' ? 'active' : '' ?>" href="/member/orders"><i class="fa fa-list"></i> My orders</a>
      </li>
      <li>
        <a class="<?= $active=='wishlist' ? 'active' : '' ?>" href="/member/account"><i class="fa fa-heart"></i> My wishlist</a>
      </li>
      <li>
        <a class="<?= $active=='account' ? 'active' : '' ?>" href="/member/account"><i class="fa fa-user"></i> My account</a>
      </li>
      <li>
        <a href="index.html"><i class="fa fa-sign-out"></i> Logout</a>
      </li>
    </ul>
  </div>
</div>

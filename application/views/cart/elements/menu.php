<?php
$class['schedule'] = $class['address'] = $class['payment'] = $class['review'] = 'disabled';
switch ($target) {
  case 'schedule':
    $class['schedule'] = 'active';
    break;
  case 'checkout':
    $class['schedule'] = '';
    $class['address'] = 'active';
    break;
  case 'payment':
    $class['address'] = '';
    $class['payment'] = 'active';
    break;
  case 'review':
    $class['address'] = '';
    $class['payment'] = '';
    $class['review'] = 'active';
    break;
}
?>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link <?= $class['schedule'] ?>" href="/cart/schedule/"><i class="fa fa-calendar"></i><br>Schedule Visit</a>
    <a class="nav-item nav-link <?= $class['address'] ?>" href="/cart/address/"><i class="fa fa-map-marker"></i><br>Delivery Address</a>
    <a class="nav-item nav-link <?= $class['payment'] ?>" href="/cart/payment"><i class="fa fa-money"></i><br>Credit Card Info</a>
    <a class="nav-item nav-link <?= $class['review'] ?>" href="/cart/review"><i class="fa fa-eye"></i><br>Review</a>
  </div>
</nav>
<?php
$params['active'] = 'account';
$this->view('elements_member/breadcrumbs',$params)
?>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <?php
      $params['active'] = 'orders';
      $this->view('elements_member/members_menu',$params)
      ?>
    </div>
    <div class="col-md-9" id="customer-orders">
      <div class="box">
        <h1>My orders</h1>
        <p class="lead">Your orders on one place.</p>
        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
        <hr>
        <table class="table table-hover">
            <thead>
              <tr>
                <th>Order</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $element) { ?>
                <tr>
                  <th><?= $element['id'] ?></th>
                  <td><?= dbdate_to_date($element['date']) ?></td>
                  <td>$<?= $element['total'] ?></td>
                  <td><?= $element['status'] ?></td>
                  <td>
                    <!-- View -->
                    <button
                      data-id="<?= $element['id'] ?>"
                      data-toggle="tooltip"
                      title="View"
                      type="button"
                      class="btn-loading btn btn-primary btn-sm view_order">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

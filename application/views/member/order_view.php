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
    <div class="col-md-9" id="customer-order">
      <div class="box">
        <h1>Order #1735</h1>
        <p class="lead">Order #1735 was placed on <strong>22/06/2013</strong> and is currently <strong>Being prepared</strong>.</p>
        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
        <hr>
        <div class="table-responsive">
          <table class="table2">
            <thead>
              <tr>
                <th colspan="2">Product</th>
                <th>Quantity</th>
                <th>Unit price</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data['products'] as $item) { ?>
              <tr>
                <td>
                  <?php if (!empty($item->image)) { ?>
                    <a href="#"><img src="/assets/img/store/<?= $item->image ?>" class="image_table"></a>
                  <?php } ?>
                </td>
                <td><?= $item->name ?></td>
                <td>1</td>
                <td>$<?= $item->price ?></td>
                <td>$<?= $item->price ?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="5" class="text-right">Order subtotal</th>
                <th>$<?= $data['order']->total ?></th>
              </tr>
              <tr>
                <th colspan="5" class="text-right">Shipping and handling</th>
                <th>$00.00</th>
              </tr>
              <tr>
                <th colspan="5" class="text-right">Tax</th>
                <th>$0.00</th>
              </tr>
              <tr>
                <th colspan="5" class="text-right">Total</th>
                <th>$<?= $data['order']->total ?></th>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="row addresses">
          <div class="col-md-6">
            <h2>Invoice address</h2>
            <p>John Brown
              <br>13/25 New Avenue
              <br>New Heaven
              <br>45Y 73J
              <br>England
              <br>Great Britain
            </p>
          </div>
          <div class="col-md-6">
            <h2>Shipping address</h2>
            <p>John Brown
              <br>13/25 New Avenue
              <br>New Heaven
              <br>45Y 73J
              <br>England
              <br>Great Britain
            </p>
          </div>
        </div>
      </div>
    </div>

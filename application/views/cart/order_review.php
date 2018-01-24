<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="#">Home</a>
        </li>
        <li>Checkout - Order review</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-9" id="checkout">
      <div class="box">
        <h1>Checkout - Order review</h1>
        <?php
        $params = array('target'=>'review');
        $this->view('cart/elements/menu',$params);
        ?>
        <div class="tab-content">
          <div class="content">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2">Product</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <th>Discount</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($data as $item): ?>
                    <tr>
                      <td>
                        <?php if (!empty($item['image'])) { ?>
                           <a href="#"><img src="/assets/img/store/<?= $item['image'] ?>" class="image_table"></a>
                         <?php } ?>
                      </td>
                      <td><a href="#"><?= $item['name']; ?></a></td>
                      <td><?= $item['qty']; ?></td>
                      <td>$<?= money_format('%i',$item['price']) ?></td>
                      <td>$0.00</td>
                      <td>$<?= money_format('%i',$item['subtotal']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="5">Total</th>
                    <th>$<?= money_format('%i',$total) ?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="pull-left">
            <a href="/cart/payment" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back to Payment</a>
          </div>
          <div class="pull-right">
            <button type="button" id="form_validate" class="btn btn-primary place_order">Place an order <i class="fa fa-chevron-right"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <?php
    $params = array();
    $this->view('cart/elements/order_summary',$params);
    ?>
  </div>
</div>
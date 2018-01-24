<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>Shopping cart</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-9" id="basket">
      <div class="box">
         <h1>Shopping cart</h1>
         <p class="text-muted">You currently have <b><?= count($data) ?></b> item(s) in your cart.</p>
         <div class="table-responsive">
            <table class="table">
               <thead>
                  <tr>
                     <th colspan="2">Product</th>
                     <th>Quantity</th>
                     <th>Price</th>
                     <th colspan="2">Total</th>
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
                     <td>$<?= $item['price']; ?></td>
                     <td>$<?= $item['subtotal']; ?></td>
                     <td>
                       <a href="/cart/remove?id=<?= $item['rowid']; ?>"><i class="fa fa-trash-o"></i></a>
                     </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
               <tfoot>
                  <tr>
                     <th colspan="5">Total</th>
                     <th colspan="2">$<?= $total ?></th>
                  </tr>
               </tfoot>
            </table>
         </div>
         <div class="box-footer">
            <div class="pull-left">
               <a href="<?= $this->config->item('shopping_url') ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
            </div>
            <div class="pull-right">
              <?php if (!empty(count($data))) { ?>
               <button type="button" class="btn btn-primary checkout">Proceed to checkout <i class="fa fa-chevron-right"></i>
               </button>
              <?php } ?>
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
<br><br>
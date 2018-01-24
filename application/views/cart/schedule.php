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
        <form id="data_form" method="post"> 
          <h1>Checkout - Order review</h1>
          <?php
          $params = array('target'=>'schedule');
          $this->view('cart/elements/menu',$params);
          ?>
          <div class="tab-content">
            <?php
            $params = array();
            $this->view('cart/calendar',$params);
            ?>
          </div>
          <div class="box-footer">
            <div class="pull-left">
              <a href="/cart/" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back to Basket</a>
            </div>
            <div class="pull-right">
              <input 
                  type="hidden" 
                  id="service_start_date" 
                  name="service_start_date" 
                  value="<?= !empty($data->service_start_date) ? $data->service_start_date : ''  ?>">

              <input 
                  type="hidden" 
                  id="service_end_date" 
                  name="service_end_date" 
                  value="<?= !empty($data->service_end_date) ? $data->service_end_date : ''  ?>">
              
              <input type="hidden" id="page" name="page" value="service">
              <button type="submit" id="form_validate" class="btn btn-primary">Service Address <i class="fa fa-chevron-right"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php
    $params = array();
    $this->view('cart/elements/order_summary',$params);
    ?>
  </div>
</div>
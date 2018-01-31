<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="#">Home</a>
        </li>
        <li>Checkout - Address</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-9" id="checkout">
      <div class="box">
        <form id="data_form" method="post">
          <h1>Delivery Address</h1>
          <?php
          $params = array('target'=>'checkout');
          $this->view('cart/elements/menu',$params);
          ?>
          <div class="tab-content">
            <div class="content">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input
                        value="<?= !empty($data->firstname) ? $data->firstname : ''  ?>"
                        type="text"
                        class="form-control"
                        id="firstname"
                        name="firstname"
                        data-validation="required">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input
                        value="<?= !empty($data->lastname) ? $data->lastname : ''  ?>"
                        type="text"
                        class="form-control"
                        id="lastname"
                        name="lastname"
                        data-validation="required">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="street">Street</label>
                    <input
                        value="<?= !empty($data->street) ? $data->street : ''  ?>"
                        type="text"
                        class="form-control"
                        id="street"
                        name="street"
                        data-validation="required">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="city">City</label>
                    <input
                        value="<?= !empty($data->city) ? $data->city : ''  ?>"
                        type="text"
                        class="form-control"
                        id="city"
                        name="city"
                        data-validation="required">
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="zip">ZIP</label>
                    <input
                        value="<?= !empty($data->zip) ? $data->zip : ''  ?>"
                        type="text"
                        class="form-control"
                        id="zip"
                        name="zip"
                        data-validation="required">
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="state">State</label>
                    <select name="state" class="form-control" required>
                      <?= get_state_options($data->state)  ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="country">Country</label>
                    <select name="state" class="form-control" required>
                      <?php $county = (!empty($data->country) ? $data->country : 'US'); ?>
                      <?= get_country_options($county)  ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <?php if (empty($has_service)) { ?>
              <div class="pull-left">
                <a href="/cart/" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back to Basket</a>
              </div>
            <?php } else { ?>
              <div class="pull-left">
                <a href="/cart/schedule" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back to Schedule</a>
              </div>
            <?php } ?>
            <div class="pull-right">
              <input type="hidden" id="page" name="page" value="address">
              <button type="submit" id="form_validate" class="btn btn-primary">Continue to Payment <i class="fa fa-chevron-right"></i>
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

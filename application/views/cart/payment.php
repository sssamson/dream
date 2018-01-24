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
          <h1>Checkout</h1>
          <?php
          $params = array('target'=>'payment');
          $this->view('cart/elements/menu',$params);
          ?>
          <div class="tab-content">
            <div class="content">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="ccnumber">Credit Card Number</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="ccnumber" 
                        name="ccnumber" 
                        value="<?= !empty($data->ccnumber) ? $data->ccnumber : ''  ?>"
                        data-validation="required">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="cctype">Credit Card Type</label>
                    <table class="table">
                      <tr>
                        <td>
                          <input 
                            id="Visa" 
                            type="radio" 
                            name="cc_type" 
                            value="Visa" 
                            <?= (!empty($data->cc_type) && $data->cc_type == 'Visa') ? 'checked="checked"' : ''  ?>
                            data-validation="required"> <label for="Visa">Visa</label>
                        </td>
                        <td>
                          <input 
                            id="MasterCard" 
                            type="radio" 
                            name="cc_type" 
                            value="MasterCard"
                            <?= (!empty($data->cc_type) && $data->cc_type == 'MasterCard') ? 'checked="checked"' : ''  ?>
                            data-validation="required"> <label for="MasterCard">MasterCard</label>
                        </td>
                        <td>  
                          <input 
                            id="Discover" 
                            type="radio" 
                            name="cc_type" 
                            value="Discover"
                            <?= (!empty($data->cc_type) && $data->cc_type == 'Discover') ? 'checked="checked"' : ''  ?>
                            data-validation="required"> <label for="Discover">Discover</label>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="ccnumber">Expiration Date</label>
                    <table class="table">
                      <tr>
                        <td>
                          <select 
                            id="ccnumber"
                            name="exp_month" 
                            class="form-control"
                            data-validation="required">
                            <option value="">Month</option>
                            <?= get_month_options($data->exp_month)  ?>
                          </select>
                        </td>
                        <td>
                          <select 
                            name="exp_year" 
                            class="form-control"
                            data-validation="required">
                            <option value="">Year</option>
                            <?= get_year_options($data->exp_year)  ?>
                          </select>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="cvc">Security Code</label>
                    <input 
                      type="text" 
                      class="form-control" 
                      id="cvc"
                      name="cvc" 
                      value="<?= !empty($data->cvc) ? $data->cvc : ''  ?>"
                      data-validation="required">
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="firstname"
                        name="firstname"
                        value="<?= !empty($data->firstname) ? $data->firstname : ''  ?>"
                        data-validation="required">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="lastname"
                        name="lastname"
                        value="<?= !empty($data->lastname) ? $data->lastname : ''  ?>"
                        data-validation="required">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="street">Street</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="street"
                        name="street"
                        value="<?= !empty($data->street) ? $data->street : ''  ?>"
                        data-validation="required">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="city">City</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="city"
                        name="city"
                        value="<?= !empty($data->city) ? $data->city : ''  ?>"
                        data-validation="required">
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="zip">Zip</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="zip"
                        name="zip"
                        value="<?= !empty($data->zip) ? $data->zip : ''  ?>"
                        data-validation="required">
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="state">State</label>
                    <select 
                      class="form-control" 
                      id="state"
                      name="state"
                      data-validation="required">
                      <?= get_state_options($data->state)  ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="country">Country</label>
                    <select 
                      class="form-control" 
                      id="country"
                      name="country"
                      data-validation="required">
                      <option value="USA">USA</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="phone">Telephone</label>
                    <input 
                      type="text" 
                      class="form-control" 
                      id="phone"
                      name="phone"
                      value="<?= !empty($data->phone) ? $data->phone : ''  ?>"
                      data-validation="required">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                      type="email" 
                      class="form-control" 
                      id="email"
                      name="email"
                      value="<?= !empty($data->email) ? $data->email : ''  ?>"
                      data-validation="required">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <div class="pull-left">
              <a href="/cart/address/" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back to Address</a>
            </div>
            <div class="pull-right">
              <input type="hidden" id="page" name="page" value="payment">
              <button type="submit" id="form_validate" class="btn btn-primary">Continue to Review <i class="fa fa-chevron-right"></i>
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
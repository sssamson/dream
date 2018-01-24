<div class="col-md-12">
  <ul class="breadcrumb">
    <li><a href="#">Home</a>
    </li>
    <li>My account</li>
  </ul>
</div>
<div class="col-md-3">
  <div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
      <h3 class="panel-title">Customer section</h3>
    </div>
    <div class="panel-body">
      <ul class="nav nav-pills nav-stacked">
        <li class="active">
          <a href="customer-orders.html"><i class="fa fa-list"></i> My orders</a>
        </li>
        <li>
          <a href="customer-wishlist.html"><i class="fa fa-heart"></i> My wishlist</a>
        </li>
        <li>
          <a href="customer-account.html"><i class="fa fa-user"></i> My account</a>
        </li>
        <li>
          <a href="index.html"><i class="fa fa-sign-out"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="col-md-9">
  <div class="box">
    <h1>My account</h1>
    <p class="lead">Change your personal details or your password here.</p>
    <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
    <h3>Change password</h3>
    <form id="data_form_password" method="post">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="password_1">New password</label>
            <input 
                    type="password" 
                    class="form-control" 
                    id="password_1"
                    name="password"
                    data-validation="required">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="password_2">Retype new password</label>
            <input 
                    type="password" 
                    class="form-control" 
                    id="password_2"
                    data-validation="confirmation"
                    data-validation-confirm="password">
          </div>
        </div>
      </div>
      <div class="col-sm-12 text-center">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
      </div>
    </form>
    <hr>
    <h3>Personal details</h3>
    <form id="data_form_account" method="post"> 
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
            <label for="address">Street</label>
            <input 
                    type="text" 
                    class="form-control" 
                    id="address"
                    name="address"
                    value="<?= !empty($data->address) ? $data->address : ''  ?>" 
                    data-validation="required">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="form-group">
            <label for="company">Company</label>
            <input 
                    type="text" 
                    class="form-control" 
                    id="city"
                    name="address"
                    value="<?= !empty($data->address) ? $data->address : ''  ?>" 
                    data-validation="required">
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group">
            <label for="zip">ZIP</label>
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
            <select class="form-control" id="state">
              <option value=""></option>
              <?= get_state_options(!empty($data->state) ? $data->state : '') ?>
            </select>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group">
            <label for="country">Country</label>
            <select class="form-control" id="country">
              <?= get_country_options(!empty($data->country) ? $data->country : 'US') ?>
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
        <div class="col-sm-12 text-center">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>
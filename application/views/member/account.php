<?php
$params['active'] = 'account';
$this->view('elements_member/breadcrumbs',$params)
?>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <?php
      $params['active'] = 'account';
      $this->view('elements_member/members_menu',$params)
      ?>
    </div>
    <div class="col-md-9">
      <div class="box">
        <h1>My account</h1>
        <p class="lead">Change your personal details or your password here.</p>
        <form id="data_form_credentails" method="post">
          <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input
                          type="email"
                          class="form-control"
                          name="email"
                          value="<?= !empty($data->email) ? $data->email : ''  ?>"
                          data-validation="required">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="password_1">New password</label>
                <input
                        type="password"
                        class="form-control"
                        id="password_1"
                        name="password">
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
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Login Details</button>
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
                        name="street"
                        value="<?= !empty($data->street) ? $data->street : ''  ?>"
                        data-validation="required">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <label for="zip">ZIP</label>
                <input
                        type="text"
                        class="form-control"
                        name="zip"
                        value="<?= !empty($data->zip) ? $data->zip : ''  ?>"
                        data-validation="required">
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <label for="state">State</label>
                <select class="form-control" name="state">
                  <option value=""></option>
                  <?= get_state_options(!empty($data->state) ? $data->state : '') ?>
                </select>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" name="country">
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
                        name="phone"
                        value="<?= !empty($data->phone) ? $data->phone : ''  ?>"
                        data-validation="required">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-group">
                  <label for="company">Company</label>
                  <input
                          type="text"
                          class="form-control"
                          name="company"
                          value="<?= !empty($data->company) ? $data->company : ''  ?>"
                          data-validation="required">
                </div>
              </div>
            </div>
            <div class="col-sm-12 text-center">
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

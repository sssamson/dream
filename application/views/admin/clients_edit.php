<div class="container-fluid">
  <div class="row header">
    <div class="col-md-12">
      <?php
      if (!empty($page)) {
        echo '<h1>'.ucfirst($page).'</h1>';
      }
      ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
          <form id="data_form" method="post">
            <div class="form-group">
              <label class="control-label" for="firstname">First Name</label>
              <input
                value="<?= !empty($data->firstname) ? $data->firstname : ''  ?>"
                type="text"
                class="form-control"
                id="firstname"
                name="firstname"
                placeholder="First Name"
                data-validation="required">
            </div>
            <div class="form-group">
              <label class="control-label" for="lastname">Last Name</label>
              <input
                value="<?= !empty($data->lastname) ? $data->lastname : ''  ?>"
                type="text"
                class="form-control"
                id="lastname"
                name="lastname"
                placeholder="Last Name"
                data-validation="required">
            </div>
            <div class="form-group">
              <label class="control-label" for="price">Email</label>
              <input
                value="<?= !empty($data->email) ? $data->email : ''  ?>"
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Email"
                data-validation="required">
            </div>
             <div class="form-group">
              <label class="control-label" for="password">Password</label>
              <input
                value="<?= !empty($data->password) ? $data->password : ''  ?>"
                type="text"
                class="form-control"
                id="password"
                name="password"
                placeholder="Password"
                data-validation="required">
            </div>
            <div class="form-group">
              <label class="control-label" for="phone">Phone</label>
              <input
                value="<?= !empty($data->phone) ? $data->phone : ''  ?>"
                type="tel"
                class="form-control"
                id="phone"
                name="phone"
                placeholder="Phone">
            </div>
            <div class="form-group">
              <label class="control-label" for="street">Street</label>
              <input
                value="<?= !empty($data->street) ? $data->street : ''  ?>"
                id="street"
                name="street"
                class="form-control"
                placeholder="Street">
            </div>
            <div class="form-group">
              <label for="state">State</label>
              <select name="state" class="selectpicker form-control" required>
                <?= get_state_options($data->state)  ?>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label" for="zip">Zip</label>
              <input
                value="<?= !empty($data->zip) ? $data->zip : ''  ?>"
                id="zip"
                name="zip"
                class="form-control"
                placeholder="Zip">
            </div>
            <div class="form-group">
              <label for="country">Country</label>
              <select name="country" class="selectpicker form-control" required>
                <?php $county = (!empty($data->country) ? $data->country : 'US'); ?>
                <?= get_country_options($county)  ?>
              </select>
            </div>
            <div class="form-group">
              <input
                type="hidden"
                name="id"
                id="id"
                value="<?= !empty($data->id) ? $data->id : ''  ?>">
              <div class="submit-container">
                <button type="submit" id="form_validate" class="btn btn-primary">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

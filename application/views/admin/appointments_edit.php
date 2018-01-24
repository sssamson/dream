<div class="container-fluid">
  <div class="row header">
    <div class="col-md-6">
      <?php
      if (!empty($page)) {
        echo '<h1>'.ucfirst($page).'</h1>';
      } 
      ?>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-block appointment">
          <h3>Client:</h3>
          <hr>
          <div class="row">
            <div class="col-3 label"><b>Name</b>: </div>
            <div class="col-9"><?= $data->firstname ?> <?= $data->lastname ?></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-3 label"><b>Email</b>: </div>
            <div class="col-9"><a href="mailto:<?= $data->email ?>"><?= $data->email ?></a></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-3 label"><b>Phone</b>: </div>
            <div class="col-9"><?= $data->phone ?></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-3 label"><b>Address</b>: </div>
            <div class="col-9"><?= $data->address ?></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-block appointment">
          <h3>Update Status:</h3>
          <hr>
          <form id="data_form" method="post" enctype="multipart/form-data"> 
            <div class="form-group">
              <label class="control-label" for="status"><b>Status</b></label>
              <select id="status" name="status" class="selectpicker form-control">
                <option value="pending" <?= (!empty($data->status) && $data->status=='pending') ? 'selected' : '' ?>>Pending</option>
                <option value="active" <?= (!empty($data->status) && $data->status=='active') ? 'selected' : '' ?>>Active</option>
                <option value="fulfilled" <?= (!empty($data->status) && $data->status=='fulfilled') ? 'selected' : '' ?>>Fulfilled</option>
                <option value="cancelled" <?= (!empty($data->status) && $data->status=='cancelled') ? 'selected' : '' ?>>Cancelled</option>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label" for="schedule"><b>Schedule Date</b> (<?= current_date($data->schedule)['date'] ?>)</label>
              <input 
                value="<?= !empty($data->schedule) ? $data->schedule : ''  ?>" 
                type="text" 
                class="form-control" 
                id="schedule" 
                name="schedule" 
                data-date-format="yy-mm-dd">
            </div>

            <div class="form-group">
              <label class="control-label" for="time"><b>Schedule Time</b> (<?= current_date($data->schedule)['time'] ?>)</label>
              <input 
                value="<?= !empty($data->time) ? dbdate_to_time($data->schedule)['time'] : ''  ?>" 
                type="text" 
                class="form-control" 
                id="time" 
                name="time">
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

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
          <h3>Service:</h3>
          <hr>
          <div class="row">
            <div class="col-3 label"><b>Name</b>: </div>
            <div class="col-9"><?= $data->service_name ?></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-3 label"><b>Description</b>: </div>
            <div class="col-9"><?= $data->service_description ?></a></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-3 label"><b>Price</b>: </div>
            <div class="col-9">$<?= $data->price ?></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-3 label"><b>Image</b>: </div>
            <div class="col-9">
              <?php if (!empty($data->image)) { ?>
                <img src="/assets/img/store/<?= $data->image ?>" class="image_table">
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
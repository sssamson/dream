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
          <form id="data_form" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label class="control-label" for="status">Status</label>
              <select id="status" name="status" class="form-control selectpicker">
                <option value="pending">Pending</option>
                <option value="active">Active</option>
                <option value="fulfilled">Fulfilled</option>
                <option value="cancelled">Cancelled</option>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label" for="schedule">Schedule Date (<?= current_date()['date'] ?>)</label>
              <input
                type="text"
                class="form-control"
                id="schedule"
                name="schedule"
                data-date-format="yyyy-mm-dd"
                data-validation="required">
            </div>
            <div class="form-group">
              <label class="control-label" for="time">Schedule Time (<?= current_date()['time'] ?>)</label>
              <input
                type="text"
                class="form-control"
                id="time"
                name="time"
                data-validation="required">
            </div>
            <div class="form-group">
              <label class="control-label" for="status">Service</label>
              <select id="service_id" name="service_id" class="selectpicker form-control" data-validation="required">
                <option></option>
                <?php foreach ($services as $service) { ?>
                  <option value="<?= $service->id ?>"><?= $service->name ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label" for="status">Client</label>
              <select id="client_id" name="client_id" class="selectpicker form-control" data-validation="required">
                <option></option>
                <?php foreach ($clients as $client) { ?>
                  <option value="<?= $client->id ?>"><?= $client->firstname ?> <?= $client->lastname ?>, <?= $client->email ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
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

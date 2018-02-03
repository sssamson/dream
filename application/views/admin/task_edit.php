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
              <label class="control-label" for="status">Client</label>
              <select id="client_id" name="client_id" class="selectpicker form-control" data-validation="required">
                <option></option>
                <?php foreach ($clients as $client) { ?>
                  <option value="<?= $client->id ?>" <?= (!empty($data->client_id) && $data->client_id==$client->id) ? 'selected' : '' ?>><?= $client->firstname ?> <?= $client->lastname ?>, <?= $client->email ?></option>
                <?php } ?>
              </select>
            </div>
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
              <label class="control-label" for="name">Summary</label>
              <input
                value="<?= !empty($data->summary) ? $data->summary : ''  ?>"
                type="text"
                class="form-control"
                name="summary"
                placeholder="Summary"
                data-validation="required">
            </div>
            <div class="form-group">
              <label class="control-label" for="description">Description</label>
              <textarea
                name="description"
                rows="3"
                class="form-control"
                placeholder="Description.."
                data-validation="required"><?= !empty($data->description) ? $data->description : ''  ?></textarea>
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

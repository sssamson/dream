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
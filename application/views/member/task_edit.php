<?php
$params['active'] = 'account';
$this->view('elements_member/breadcrumbs',$params)
?>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <?php
      $params['active'] = 'task';
      $this->view('elements_member/members_menu',$params);
      ?>
    </div>
    <div class="col-md-9">
      <div class="row">
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

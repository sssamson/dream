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
              <label class="control-label" for="name">Name</label>
              <input 
                value="<?= !empty($data->name) ? $data->name : ''  ?>" 
                type="text" 
                class="form-control" 
                id="name" 
                name="name" 
                placeholder="Category Name"
                data-validation="required">
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
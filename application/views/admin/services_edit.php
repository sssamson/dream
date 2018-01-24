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
              <label class="control-label" for="name">Name</label>
              <input 
                value="<?= !empty($data->name) ? $data->name : ''  ?>" 
                type="text" 
                class="form-control" 
                id="name" 
                name="name" 
                placeholder="Name"
                data-validation="required">
            </div>
            <div class="form-group">
              <label class="control-label" for="price">Price (example: 12.99)</label>
              <input 
                value="<?= !empty($data->price) ? $data->price : ''  ?>" 
                type="number" 
                step="0.01" 
                class="form-control" 
                id="price" 
                name="price" 
                placeholder="Price"
                data-validation="required">
            </div>
            <div class="form-group">
              <label class="control-label" for="description">Description</label>
              <textarea 
                id="description" 
                name="description" 
                rows="3" 
                class="form-control" 
                placeholder="Description.."
                data-validation="required"><?= !empty($data->description) ? $data->description : ''  ?></textarea>
            </div>
            <div class="form-group">
              <label class="control-label" for="order">Order</label>
              <input 
                value="<?= !empty($data->order) ? $data->order : ''  ?>" 
                type="number" 
                class="form-control" 
                id="order" 
                name="order" 
                placeholder="Order">
            </div>
            <div class="form-group">
              <?php
              if (!empty($data->image)) {
              ?>
                <a target="_blank" href="/assets/img/store/<?= $data->image ?>">
                  <img src="/assets/img/store/<?= $data->image ?>" class="image_upload" alt="">
                </a>
              <?php
              }
              ?>
              <div class="image-upload-wrap">
                <input 
                  class="file-upload-input" 
                  id="image"
                  name="image"
                  type="file" 
                  onchange="readURL(this);" 
                  accept="image/*" />
                <div class="drag-text">
                  <h5>Select Image to Upload</h5>
                </div>
              </div>
              <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" />
                <div class="image-title-wrap">
                  <button 
                    type="button" 
                    onclick="removeUpload()" 
                    class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input 
                type="hidden" 
                name="type" 
                id="type" 
                value="service">
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
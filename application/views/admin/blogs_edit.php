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
              <label class="control-label" for="date">Date</label>
              <input
                value="<?= db_seperate_date('date',!empty($data->date) ? $data->date : '')  ?>"
                type="text"
                class="form-control"
                id="date"
                name="date"
                data-validation="required">
            </div>
            <div class="form-group">
              <label class="control-label" for="time">Time</label>
              <input
                value="<?= db_seperate_date('time',!empty($data->date) ? $data->date : '')  ?>"
                type="text"
                class="form-control"
                id="time"
                name="time"
                data-validation="required">
            </div>
            <div class="form-group">
              <label class="control-label" for="categories">Category</label>
              <select id="categories" name="cat_id" class="selectpicker form-control">
                <option value="">None</option>
                <?php foreach ($categories as $cat) { ?>
                  <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label" for="title">Title</label>
              <input
                value="<?= !empty($data->title) ? $data->title : ''  ?>"
                type="title"
                class="form-control"
                id="title"
                name="title"
                placeholder="Title"
                data-validation="required">
            </div>
            <div class="form-group">
              <label class="control-label" for="intro">Intro</label>
              <textarea
                id="intro"
                name="intro"
                rows="3"
                class="form-control"
                placeholder="Intro to Article"><?= !empty($data->intro) ? $data->intro : ''  ?></textarea>
            </div>
            <div class="form-group">
              <label class="control-label" for="summernote">Article</label>
              <textarea
                id="summernote"
                name="content"
                class="form-control"><?= !empty($data->content) ? html_entity_decode($data->content) : ''  ?></textarea>
            </div>
            <div class="form-group">
              <label class="control-label" for="image">Image</label>
              <?php
              if (!empty($data->image)) {
              ?>
                <a target="_blank" href="/assets/img/blog/<?= $data->image ?>">
                  <img src="/assets/img/blog/<?= $data->image ?>" class="image_upload" alt="">
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

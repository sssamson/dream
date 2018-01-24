<form id="data_form" method="post" enctype="multipart/form-data">
  <div class="card-header">
    Main
  </div>
  <div class="card-block">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 form-control-label">Select Type:</label>
          <div class="col-md-9">
            <label class="radio-inline" for="image_type">
              <input class="media_type_radio" type="radio" id="image_type" name="mediatype" value="image"
              <?php 
                if (empty($data["page_header"]->mediatype)) 
                  echo 'selected';
                else if ($data["page_header"]->mediatype == 'image') {
                  echo 'selected';
                }
              ?> 
              > Image
            </label>
            <label class="radio-inline" for="video_type">
              <input class="media_type_radio" type="radio" id="video_type" name="mediatype" value="video"
              <?php
                if ($data["page_header"]->mediatype == 'video') {
                  echo 'selected';
                }
              ?>
              > Video
            </label>
          </div>
        </div>
        <div id="image_div" class="media_div">
          <?php
          if (!empty($data["page_header"]->media)) {
          ?>
            <a target="_blank" href="/assets/img/page/<?= $data["page_header"]->media ?>">
              <img src="/assets/img/page/<?= $data["page_header"]->media ?>" style="height:200px" alt="">
            </a>
          <?php
          }
          ?>
          <div class="image-upload-wrap">
            <input 
              class="file-upload-input" 
              name="media"
              id="media"
              type='file' 
              onchange="readURL(this);" 
              accept="image/*" />
            <div class="drag-text">
              <h5>Select Image to Upload</h5>
            </div>
          </div>
          <div class="file-upload-content">
            <img class="file-upload-image" src="#" alt="your image" />
            <div class="image-title-wrap">
              <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
            </div>
          </div>
        </div>
        <div id="video_div" class="media_div">
          Video Url
        </div>
      </div>
      <div class="col-md-6">    
        <label class="control-label" for="title">Title</label>
        <input 
          value="<?= !empty($data["page_header"]->section) ? $data["page_header"]->section : ''  ?>" 
          type="text" 
          class="form-control" 
          id="section" 
          name="section" 
          placeholder="Title"
          data-validation="required">
        <label class="control-label" for="email">Description</label>
        <textarea id="subsection" name="subsection" rows="9" class="form-control" placeholder="Description.."><?= !empty($data["page_header"]->subsection) ? $data["page_header"]->subsection : ''  ?></textarea>
      </div>
    </div>
  </div>
  <div class="card-footer">
    <div class="row">
      <div class="col-md-6" id="error">
      </div>
      <div class="col-md-6">
        <input type="hidden" name="id" id="id" value="<?= !empty($data["page_header"]->id) ? $data["page_header"]->id : ''  ?>">
        <input type="hidden" name="tag" id="tag" value="<?= !empty($tag) ? $tag : ''  ?>">
        <input type="hidden" name="type" id="type" value="page">
        <button type="submit" id="form_validate" class="btn btn-primary pull-right">Save</button>
      </div>
    </div>
  </div>
</form>
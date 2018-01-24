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

            <!-- Select Media Type -->
            <?php if (empty($permissions['element']['nomedia'])) { ?>
            <div class="form-group">
              <label class="control-label">Select Type:</label>
              <?php if (!empty($permissions['element']['image'])) { ?>
              <label class="radio-inline" for="image_type">
                <input class="media_type_radio" type="radio" id="image_type" name="mediatype" value="image"
                  <?php 
                    if (empty($data["page_elements"]->mediatype)) 
                      echo 'checked';
                    else if ($data["page_elements"]->mediatype == 'image') {
                      echo 'checked';
                    }
                  ?> 
                  > Image
              </label>
              <?php } ?>
              <?php if (!empty($permissions['element']['video'])) { ?>
              <label class="radio-inline" for="video_type">
                <input class="media_type_radio" type="radio" id="video_type" name="mediatype" value="video"
                  <?php
                    if (!empty($data["page_elements"]->mediatype) && $data["page_elements"]->mediatype == 'video') {
                      echo 'checked';
                    }
                  ?>
                  > Video
              </label>
              <?php } ?>
              <?php if (!empty($permissions['element']['icon'])) { ?>
              <label class="radio-inline" for="icon_type">
                <input class="media_type_radio" type="radio" id="icon_type" name="mediatype" value="icon"
                  <?php
                    if (!empty($data["page_elements"]->mediatype) && $data["page_elements"]->mediatype == 'icon') {
                      echo 'checked';
                    }
                  ?>
                  > Icon
              </label>
              <?php } ?>
            </div>

            <!-- Media Divs -->
            <div class="form-group">
              <div id="image_div" class="media_div">
                <?php
                if (!empty($data["page_elements"]->image)) {
                ?>
                  <a target="_blank" href="/assets/img/page/<?= $data["page_elements"]->image ?>">
                    <img src="/assets/img/page/<?= $data["page_elements"]->image ?>" class="image_upload" alt="">
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
              <div id="video_div" class="media_div">
                <?php
                if (!empty($data["page_elements"]->video)) {
                ?>
                  <div class="videoWrapper"> 
                    <iframe width="560" height="315" src="<?= str_replace("watch?v=","embed/",$data["page_elements"]->video) ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                  </div>
                <?php
                }
                ?>
                <div class="form-group">
                  <label class="control-label" for="title">Video URL</label>
                  <input 
                    value="<?= !empty($data["page_elements"]->video) ? $data["page_elements"]->video : ''  ?>" 
                    type="text" 
                    class="form-control" 
                    id="video" 
                    name="video" 
                    placeholder="Video URL">
                </div>
              </div>
              <div id="icon_div" class="media_div">
                <?php
                if (!empty($data["page_elements"]->icon)) {
                ?>
                  <div class="iconWrapper"> 
                    <i class="fa <?= $data["page_elements"]->icon ?>" aria-hidden="true"></i>
                  </div>
                <?php
                }
                ?>
                <div class="form-group fa_icons_div">
                  <?php 
                  $params = array();
                  $this->view('elements_admin/fa_icons',$params); 
                  ?>
                </div>
              </div>
            </div>
            <?php } ?>

            <!-- Order -->
            <?php if (!empty($permissions['element']['order'])) { ?>
            <div class="form-group">
              <label class="control-label" for="order"><?= $permissions['element']['order'] ?></label>
              <input 
              value="<?= !empty($data['page_elements']->order) ? $data['page_elements']->order : ''  ?>" 
              type="number" 
              class="form-control" 
              id="order" 
              name="order">
            </div>
            <?php } ?>

            <!-- Category -->
            <?php if (!empty($permissions['element']['category'])) { ?>
            <div class="form-group">
              <label class="control-label" for="category"><?= $permissions['element']['category'] ?> (Select or Enter New)</label>
              <select name="category" id="category" class="select2 form-control">
                <?php 
                  foreach ($categories as $element) { 
                    $selected = '';
                    if ($data['page_elements']->category_id == $element->id) {
                      $selected = 'selected="selected"';
                    }
                ?>
                  <option value="<?= $element->id ?>" <?= $selected ?>><?= $element->name ?></option>
                <?php } ?>
              </select>
            </div>
            <?php } ?>

            <!-- Section -->
            <?php if (!empty($permissions['element']['section'])) { ?>
            <div class="form-group">   
              <label class="control-label" for="section"><?= $permissions['element']['section'] ?></label>
              <input 
              value="<?= !empty($data['page_elements']->section) ? $data['page_elements']->section : ''  ?>" 
              type="text" 
              class="form-control" 
              id="section" 
              name="section"
              data-validation="required">
            </div>
            <?php } ?>

            <!-- Subsection -->
            <?php if (!empty($permissions['element']['subsection'])) { ?>
            <div class="form-group">
              <label class="control-label" for="subsection"><?= $permissions['element']['subsection'] ?></label>
              <textarea id="subsection" name="subsection" rows="3" class="form-control"><?= !empty($data['page_elements']->subsection) ? $data['page_elements']->subsection : ''  ?></textarea>
            </div>
            <?php } ?>

            <!-- H1 -->
            <?php if (!empty($permissions['element']['h1'])) { ?>
            <div class="form-group">
              <label class="control-label" for="h1"><?= $permissions['element']['h1'] ?></label>
              <textarea id="h1" name="h1" rows="3" class="form-control"><?= !empty($data['page_elements']->h1) ? $data['page_elements']->h1 : ''  ?></textarea>
            </div>
            <?php } ?>

            <!-- H2 -->
            <?php if (!empty($permissions['element']['h2'])) { ?>
            <div class="form-group">
              <label class="control-label" for="h2"><?= $permissions['element']['h2'] ?></label>
              <textarea id="h2" name="h2" rows="3" class="form-control"><?= !empty($data['page_elements']->h2) ? $data['page_elements']->h2 : ''  ?></textarea>
            </div>
            <?php } ?>

            <!-- Submit -->
            <div class="form-group">
              <input 
                type="hidden" 
                name="id" 
                id="id" 
                value="<?= !empty($data['page_elements']->id) ? $data['page_elements']->id : ''  ?>">
              <input 
                type="hidden" 
                name="page_id" 
                id="page_id" 
                value="<?= !empty($data['page_header']->id) ? $data['page_header']->id : ''  ?>">
              <input 
                type="hidden" 
                name="tag" 
                id="tag" 
                value="<?= !empty($data['page_header']->tag) ? $data['page_header']->tag : ''  ?>">
              <input 
                type="hidden" 
                name="type" 
                id="type" 
                value="element">
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
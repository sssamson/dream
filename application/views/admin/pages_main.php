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
      <div class="card" id="content">
        <form id="data_form" method="post" enctype="multipart/form-data">
          <div class="card-header">
            Main
          </div>
          <div class="card-block">
            <div class="row">
              
              <!-- Media -->
              <?php if (has_media($permissions['main'])) { ?>
              <div class="col-md-6">
                <!-- Select Media Type -->
                <div class="form-group">

                  <label class="control-label">Select Type:</label>
                  <?php if (!empty($permissions['main']['image'])) { ?>
                  <label class="radio-inline" for="image_type">
                    <input class="media_type_radio" type="radio" id="image_type" name="mediatype" value="image"
                    <?php 
                      if (empty($data["page_header"]->mediatype)) 
                        echo 'checked';
                      else if ($data["page_header"]->mediatype == 'image') {
                        echo 'checked';
                      }
                    ?> 
                    > <?= $permissions['main']['image'] ?>
                  </label>
                  <?php } ?>

                  <?php if (!empty($permissions['main']['video'])) { ?>
                  <label class="radio-inline" for="video_type">
                    <input class="media_type_radio" type="radio" id="video_type" name="mediatype" value="video"
                    <?php
                      if (!empty($data["page_header"]->mediatype) && $data["page_header"]->mediatype == 'video') {
                        echo 'checked';
                      }
                    ?>
                    > <?= $permissions['main']['video'] ?>
                  </label>
                  <?php } ?>
                </div>
                <!-- Media -->
                <div class="form-group">
                  <div id="image_div" class="media_div">
                    <?php
                    if (!empty($data["page_header"]->image)) {
                    ?>
                      <a target="_blank" href="/assets/img/page/<?= $data["page_header"]->image ?>">
                        <img class="image_upload" src="/assets/img/page/<?= $data["page_header"]->image ?>" alt="">
                      </a>
                    <?php
                    }
                    ?>
                    <div class="image-upload-wrap">
                      <input 
                        class="file-upload-input" 
                        name="image"
                        id="image"
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
                    <?php
                    if (!empty($data["page_header"]->video)) {
                    ?>
                      <div class="videoWrapper">
                        <iframe width="560" height="315" src="<?= str_replace("watch?v=","embed/",$data["page_header"]->video) ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                      </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                      <label class="control-label" for="title">Video URL</label>
                      <input 
                        value="<?= !empty($data["page_header"]->video) ? $data["page_header"]->video : ''  ?>" 
                        type="text" 
                        class="form-control" 
                        id="video" 
                        name="video" 
                        placeholder="Video URL">
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>

              <!-- Data -->              
              <div class="col-md-6">  

                <!-- Section -->
                <?php if (!empty($permissions['main']['section'])) { ?>
                <div class="form-group"> 
                  <label class="control-label" for="section">
                    <?= $permissions['main']['section']  ?>
                  </label>
                  <input 
                    value="<?= !empty($data["page_header"]->section) ? $data["page_header"]->section : ''  ?>" 
                    type="text" 
                    class="form-control" 
                    id="section" 
                    name="section" 
                    placeholder="Title"
                    data-validation="required">
                </div>
                <?php } ?>

                <!-- Subsection -->
                <?php if (!empty($permissions['main']['subsection'])) { ?>
                <div class="form-group">
                  <label class="control-label" for="subsection">Description</label>
                  <textarea id="subsection" name="subsection" rows="9" class="form-control" placeholder="Description.."><?= !empty($data["page_header"]->subsection) ? $data["page_header"]->subsection : ''  ?></textarea>
                </div>
                <?php } ?>

              </div>
            </div>
            <div class="row">

              <!-- Submit -->
              <div class="col-md-6" id="error">
              </div>
              <div class="col-md-6">
                <input 
                  type="hidden" 
                  name="id" 
                  id="id" 
                  value="<?= !empty($data["page_header"]->id) ? $data["page_header"]->id : ''  ?>">
                <input 
                  type="hidden" 
                  name="tag" 
                  id="tag" 
                  value="<?= !empty($tag) ? $tag : ''  ?>">
                <input 
                  type="hidden" 
                  name="type" 
                  id="type" 
                  value="page">
                <button type="submit" id="form_validate" class="btn btn-primary pull-right">Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Categories -->
  <?php if (!empty($permissions['element']['category'])) { ?>
  <div class="row">
    <div class="col-md-12">
      <div class="card" id="content">
        <div class="card-header">
          Categories
          <button data-toggle="tooltip" data-original-title="Add Categories" class="btn-loading btn btn-primary pull-right add_category"> 
            <i class="fa fa-plus" aria-hidden="true"></i>  
            Add Category
          </button>
        </div>
        <div class="card-block">

          <!-- Table -->
          <table class="table table-hover table-striped">
            <thead>
              <tr>

                <!-- TH Name  -->
                <th>Name</th>

                <!-- TH Action -->
                <th data-sortable="false">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($categories as $element) { ?>
                <tr>

                  <!-- TB Order -->
                  <td><?= $element->name ?></td>

                  <!-- TB Buttons -->                  
                  <td>

                    <!-- Edit -->
                    <button 
                      data-id="<?= $element->id ?>" 
                      data-toggle="tooltip" 
                      title="Edit" 
                      type="button" 
                      class="btn-loading btn btn-warning btn-sm edit_category ">
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>

                    <!-- Delete -->
                    <button 
                      data-title="<?= $element->name ?>" 
                      data-id="<?= $element->id ?>" 
                      data-toggle="tooltip" 
                      title="Delete" 
                      type="button" 
                      class="btn-loading btn btn-danger btn-sm delete_category" 
                      data-content="Name: <?= $element->name ?>">
                      <i class="fa fa-remove" aria-hidden="true"></i>
                    </button>

                  </td>

                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

  <!-- Element -->
  <?php if (!empty($permissions['element'])) { ?>
  <div class="row">
    <div class="col-md-12">
      <div class="card" id="content">
        <div class="card-header">
          Elements
          <button data-toggle="tooltip" data-original-title="Add Element" class="btn-loading btn btn-primary pull-right add"> 
            <i class="fa fa-plus" aria-hidden="true"></i>  
            Add Element
          </button>
        </div>
        <div class="card-block">

          <!-- Table -->
          <table class="table table-hover table-striped">
            <thead>
              <tr>

                <!-- TH Order -->                
                <th>Order</th>

                <!-- TH Image -->
                <?php if (!empty($permissions['element']['image'])) { ?>
                <th><?= $permissions['element']['image'] ?></th>
                <?php } ?>

                <!-- TH Icon -->
                <?php if (!empty($permissions['element']['icon'])) { ?>
                <th><?= $permissions['element']['icon'] ?></th>
                <?php } ?>

                <!-- TH Category -->
                <?php if (!empty($permissions['element']['category'])) { ?>
                <th><?= $permissions['element']['category'] ?></th>
                <?php } ?>

                <!-- TH Title -->
                <th>Title</th>

                <!-- TH Action -->
                <th data-sortable="false">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data["page_elements"] as $element) { ?>
                <tr>

                  <!-- TB Order -->
                  <td><?= $element->order ?></td>

                  <!-- TB Image -->        
                  <?php if (!empty($permissions['element']['image'])) { ?>
                    <td>
                      <?php if (!empty($element->image)) { ?>
                        <img src="/assets/img/page/<?= $element->image ?>" style="height:50px" alt="">
                      <?php } ?>
                    </td>
                  <?php } ?>

                  <!-- TB Icon -->
                  <?php if (!empty($permissions['element']['icon'])) { ?>
                    <td>
                      <?php if (!empty($element->icon)) { ?>
                        <div class="iconWrapper"> 
                          <i class="fa <?= $element->icon ?>" aria-hidden="true"></i>
                        </div>
                      <?php } ?>
                    </td>
                  <?php } ?>

                  <!-- TB Category -->
                  <?php if (!empty($permissions['element']['category'])) { ?>
                    <td><?= $element->category ?></td>
                  <?php } ?>

                  <!-- TB Section -->                  
                  <td><?= $element->section ?></td>

                  <!-- TB Buttons -->                  
                  <td>

                    <!-- Edit -->
                    <button 
                      data-id="<?= $element->id ?>" 
                      data-toggle="tooltip" 
                      title="Edit" 
                      type="button" 
                      class="btn-loading btn btn-warning btn-sm edit ">
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>

                    <!-- Delete -->
                    <button 
                      data-title="<?= $element->section ?>" 
                      data-id="<?= $element->id ?>" 
                      data-toggle="tooltip" 
                      title="Delete" 
                      type="button" 
                      class="btn-loading btn btn-danger btn-sm delete" 
                      data-content="Title: <?= $element->section ?>">
                      <i class="fa fa-remove" aria-hidden="true"></i>
                    </button>

                  </td>

                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
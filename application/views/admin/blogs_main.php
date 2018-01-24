<div class="container-fluid">
  <div class="row header">
    <div class="col-md-6">
      <?php
      if (!empty($page)) {
        echo '<h1>'.ucfirst($page).'</h1>';
      } 
      ?>
    </div>
    <div class="col-md-6">
      <button data-toggle="tooltip" data-original-title="Add User" class="btn-loading btn btn-primary pull-right add"> 
        <i class="fa fa-plus" aria-hidden="true"></i>  
        Add Article
      </button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card" id="content">
        <div class="card-block">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Image</th>
                <th>Date</th>
                <th>Category</th>
                <th>Title</th>
                <th data-sortable="false">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $cat_name = array();
                foreach ($categories as $cat) { 
                  $cat_name[$cat->id]=$cat->name;
                }
              ?>
              <?php foreach ($data as $element) { ?>
                <tr>
                  <td>
                    <?php if (!empty($element->image)) { ?>
                    <img src="/assets/img/blog/<?= $element->image ?>" class="image_table">
                    <?php } ?>
                  </td>
                  <td><?= dbdate_to_date($element->date) ?></td>
                  <td><?= !empty($cat_name[$element->cat_id]) ? $cat_name[$element->cat_id] : 'None' ?></td>
                  <td><?= $element->title ?></td>
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
                      data-title="<?= $element->title ?>" 
                      data-id="<?= $element->id ?>" 
                      data-toggle="tooltip" 
                      title="Delete" 
                      type="button" 
                      class="btn-loading btn btn-danger btn-sm delete" 
                      data-content="Title: <?= $element->title ?>">
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
</div>
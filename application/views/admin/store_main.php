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
      <button data-toggle="tooltip" data-original-title="Add Product" class="btn-loading btn btn-primary pull-right add"> 
        <i class="fa fa-plus" aria-hidden="true"></i>  
        Add Product
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
                <th>Position</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th data-sortable="false">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $element) { ?>
                <tr>
                  <td><?= $element->order ?></td>
                  <td>
                    <?php if (!empty($element->image)) { ?>
                    <img src="/assets/img/store/<?= $element->image ?>" class="image_table">
                    <?php } ?>
                  </td>
                  <td><?= $element->name ?></td>
                  <td>$<?= $element->price ?></td>
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
                      data-title="<?= $element->name ?>" 
                      data-id="<?= $element->id ?>" 
                      data-toggle="tooltip" 
                      title="Delete" 
                      type="button" 
                      class="btn-loading btn btn-danger btn-sm delete" 
                      data-content="Title: <?= $element->name ?>">
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
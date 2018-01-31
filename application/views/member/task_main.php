<?php
$params['active'] = 'account';
$this->view('elements_member/breadcrumbs',$params)
?>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <?php
      $params['active'] = 'services';
      $this->view('elements_member/members_menu',$params)
      ?>
    </div>
    <div class="col-md-9">
      <div class="row">
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
            Add Task
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Summary</th>
                    <th>Status</th>
                    <th data-sortable="false">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data as $element) { ?>
                    <tr>
                      <td><?= $element->date_created ?></td>
                      <td><?= $element->summary ?></td>
                      <td><?= $element->status ?></td>
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
                          data-title="<?= $element->summary ?>"
                          data-id="<?= $element->id ?>"
                          data-toggle="tooltip"
                          title="Delete"
                          type="button"
                          class="btn-loading btn btn-danger btn-sm delete"
                          data-content="Summary: <?= $element->summary ?>">
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

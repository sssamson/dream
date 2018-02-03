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
      <button data-toggle="tooltip" data-original-title="Add Task" class="btn-loading btn btn-primary pull-right add">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Add Task
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
                    <th>Id</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Summary</th>
                    <th>Status</th>
                    <th data-sortable="false">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data as $element) { ?>
                    <tr>
                      <td><?= $element->id ?></td>
                      <td><?= dbdate_to_date($element->date_created) ?></td>
                      <td><?= dbdate_to_date($element->last_updated) ?></td>
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

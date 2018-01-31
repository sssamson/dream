<div class="container-fluid">
  <div class="row header">
    <div class="col-md-6">
      <?php
      if (!empty($page)) {
        echo '<h1>'.ucfirst($page).'</h1>';
      }
      ?>
    </div>
    <div class="col-md-6"></div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card" id="content">
        <div class="card-block">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Client</th>
                <th>Email</th>
                <th>Total</th>
                <th>Status</th>
                <th data-sortable="false">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $element) { ?>
                <tr>
                  <td><?= $element['id'] ?></td>
                  <td><?= $element['date'] ?></td>
                  <td><?= $element['firstname'] ?> <?= $element['lastname'] ?></td>
                  <td><?= $element['email'] ?></td>
                  <td>$<?= $element['total'] ?></td>
                  <td><?= $element['status'] ?></td>
                  <td>
                    <!-- View -->
                    <button
                      data-id="<?= $element['id'] ?>"
                      data-toggle="tooltip"
                      title="View / Update Status"
                      type="button"
                      class="btn-loading btn btn-primary btn-sm view_order">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                    <!-- Delete -->
                    <button
                      data-title="$<?= $element['total'] ?>"
                      data-id="<?= $element['id'] ?>"
                      data-toggle="tooltip"
                      title="Delete"
                      type="button"
                      class="btn-loading btn btn-danger btn-sm order_delete"
                      data-content="Title: $<?= $element['total'] ?>">
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

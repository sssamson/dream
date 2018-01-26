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
          <div class="form-group">
            <label class="control-label"><b>Date</b>: </label>
            <input
              value="<?= !empty($data['order']->date) ? $data['order']->date : ''  ?>"
              type="text"
              class="form-control"
              readonly>
          </div>
          <div class="form-group">
            <label class="control-label" for="status"><b>Status</b>: </label>
            <select id="status" name="status" class="selectpicker form-control">
              <option value="pending" <?= $data['order']->status=='pending' ? 'selected' : '' ?>>Pending</option>
              <option value="active" <?= $data['order']->status=='active' ? 'selected' : '' ?>>Active</option>
              <option value="fulfilled" <?= $data['order']->status=='fulfilled' ? 'selected' : '' ?>>Fulfilled</option>
              <option value="cancelled" <?= $data['order']->status=='cancelled' ? 'selected' : '' ?>>Cancelled</option>
            </select>
          </div>
          <div class="form-group">
            <button
              data-id="<?= $data['order']->id ?>"
              data-toggle="tooltip"
              title="Update Status"
              type="button"
              class="btn-loading btn btn-primary btn-sm update_status">
              <i class="fa fa-pencil" aria-hidden="true"></i> Update Status
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
          <h4>Products:</h4>
          <hr>
          <?php
          foreach ($data['products'] as $product) {
          ?>
            <table class="table2">
              <tbody>
                <tr>
                  <td width="30%"><?= $product->name ?></td>
                  <td width="70%">$<?= $product->price ?></td>
                </tr>
                <tr>
                  <td width="30%">
                    <?php if (!empty($product->image)) { ?>
                      <img src="/assets/img/store/<?= $product->image ?>" class="image_table">
                    <?php } ?>
                  </td>
                  <td width="70%"><?= $product->description ?></td>
                </tr>
              </tbody>
            </table>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
          <h4>Client:</h4>
          <hr>
          <div class="row">
            <div class="col-3 label"><b>Name</b>: </div>
            <div class="col-9"><?= $data['order']->firstname ?> <?= $data['order']->lastname ?></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-3 label"><b>Email</b>: </div>
            <div class="col-9"><?= $data['order']->email ?></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-3 label"><b>Phone</b>: </div>
            <div class="col-9"><?= $data['order']->phone ?></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-3 label"><b>Address</b>: </div>
            <div class="col-9"><?= $data['order']->street ?><br><?= $data['order']->state ?> <?= $data['order']->zip ?></div>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>

</div>

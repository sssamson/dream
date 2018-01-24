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
        Add Appointment
      </button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card" id="content">
        <div class="card-block">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#current" role="tab" aria-controls="home"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Current and Future</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#past" role="tab" aria-controls="profile"><i class="fa fa-calendar-times-o" aria-hidden="true"></i> Past</a>
            </li>
          </ul>
          <div class="tab-content" id="tab-content">
            <div class="tab-pane active" id="current" role="tabpanel">
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Time</th>
                    <th>Client Name</th>
                    <th>Client Email</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th data-sortable="false">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach ($data as $element) { 
                    if (dbdate_less_now($element->schedule)) {
                  ?>
                    <tr>
                      <td><?= $element->id ?></td>
                      <td><?= dbdate_to_date($element->schedule) ?></td>
                      <td><?= $element->firstname ?> <?= $element->lastname ?></td>
                      <td><?= $element->email ?></td>
                      <td><?= $element->service_name ?></td>
                      <td><?= $element->status ?></td>
                      <td>
                        <!-- Edit -->
                        <button 
                          data-id="<?= $element->id ?>" 
                          data-toggle="tooltip" 
                          title="Edit" 
                          type="button" 
                          class="btn-loading btn btn-warning btn-sm edit">
                          <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                        <!-- Delete -->
                        <button 
                          data-title="<?= $element->service_name ?>" 
                          data-id="<?= $element->id ?>" 
                          data-toggle="tooltip" 
                          title="Delete" 
                          type="button" 
                          class="btn-loading btn btn-danger btn-sm delete" 
                          data-content="Title: <?= $element->service_name ?>">
                          <i class="fa fa-remove" aria-hidden="true"></i>
                        </button>
                      </td>
                    </tr>
                  <?php 
                    } 
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="tab-pane" id="past" role="tabpanel">
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Time</th>
                    <th>Client Name</th>
                    <th>Client Email</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th data-sortable="false">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach ($data as $element) { 
                    if (!dbdate_less_now($element->schedule)) {
                  ?>
                    <tr>
                      <td><?= $element->id ?></td>
                      <td><?= dbdate_to_date($element->schedule) ?> </td>
                      <td><?= $element->firstname ?> <?= $element->lastname ?></td>
                      <td><?= $element->email ?></td>
                      <td><?= $element->service_name ?></td>
                      <td><?= $element->status ?></td>
                      <td>
                        <!-- Edit -->
                        <button 
                          data-id="<?= $element->id ?>" 
                          data-toggle="tooltip" 
                          title="Edit" 
                          type="button" 
                          class="btn-loading btn btn-warning btn-sm edit">
                          <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                        <!-- Delete -->
                        <button 
                          data-title="<?= $element->service_name ?>" 
                          data-id="<?= $element->id ?>" 
                          data-toggle="tooltip" 
                          title="Delete" 
                          type="button" 
                          class="btn-loading btn btn-danger btn-sm delete" 
                          data-content="Title: <?= $element->service_name ?>">
                          <i class="fa fa-remove" aria-hidden="true"></i>
                        </button>
                      </td>
                    </tr>
                  <?php 
                    } 
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card" id="content">
        <div class="card-header">
          Calendar
        </div>
        <div class="card-block">
          <?php
          $params = array();
          $this->view('cart/calendar',$params);
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
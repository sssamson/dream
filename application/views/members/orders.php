<div class="col-md-12">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">My Orders</li>
    </ol>
  </nav>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <?php
      $params['active'] = 'orders';
      $this->view('elements_default/members_menu',$params)
      ?>
    </div>
    <div class="col-md-9" id="customer-orders">
      <div class="box">
        <h1>My orders</h1>
        <p class="lead">Your orders on one place.</p>
        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
        <hr>
        <table class="table table-hover">
            <thead>
              <tr>
                <th>Order</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th># 1735</th>
                <td>22/06/2013</td>
                <td>$ 150.00</td>
                <td><span class="label label-info">Being prepared</span>
                </td>
                <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a>
                </td>
              </tr>
              <tr>
                <th># 1735</th>
                <td>22/06/2013</td>
                <td>$ 150.00</td>
                <td><span class="label label-info">Being prepared</span>
                </td>
                <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a>
                </td>
              </tr>
              <tr>
                <th># 1735</th>
                <td>22/06/2013</td>
                <td>$ 150.00</td>
                <td><span class="label label-success">Received</span>
                </td>
                <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a>
                </td>
              </tr>
              <tr>
                <th># 1735</th>
                <td>22/06/2013</td>
                <td>$ 150.00</td>
                <td><span class="label label-danger">Cancelled</span>
                </td>
                <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a>
                </td>
              </tr>
              <tr>
                <th># 1735</th>
                <td>22/06/2013</td>
                <td>$ 150.00</td>
                <td><span class="label label-warning">On hold</span>
                </td>
                <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a>
                </td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

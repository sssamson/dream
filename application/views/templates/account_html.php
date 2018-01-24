<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $page['title'] ?></title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    <link href="/assets/account/css/font-awesome.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/datatables/DataTables-1.10.15/css/dataTables.bootstrap.css" rel="stylesheet">

    <?php 
    if (!empty($page['css'])) {
      echo output_css($page['css']); 
    }
    ?>

  </head>
  <body>

    <div class="container">
      <?= $page['content'] ?>
    </div>

    <?php
    $params = array();
    $this->view('elements_default/modals',$params);
    ?>

    <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/assets/vendor/tether/dist/js/tether.min.js"></script>
    <script src="/assets/vendor/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="/assets/vendor/pace/pace.min.js"></script>
    <script src="/assets/vendor/formvalidator/jquery.form-validator.min.js"></script>
    <script src="/assets/vendor/webui-popover/jquery.webui-popover.min.js"></script>
    <script src="/assets/vendor/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="/assets/vendor/datatables/DataTables-1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="/assets/vendor/datatables/DataTables-1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="/assets/vendor/datatables/Responsive-2.1.1/js/dataTables.responsive.min.js"></script>
    <script src="/assets/vendor/datatables/Responsive-2.1.1/js/responsive.bootstrap.min.js"></script>
    <script src="/assets/vendor/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="/assets/vendor/select2/js/select2.min.js"></script>
    <script src="/assets/back/js/global.js"></script>

    <?php 
    if (!empty($page['js'])) {
      echo output_java_script($page['js']); 
    }
    ?>
    <?php $this->view('elements_default/modals') ?>
  </body>
</html>
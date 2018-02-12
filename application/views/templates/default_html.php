<!doctype html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">

    <title><?= $page['title'] ?></title>
    <?php
    $params = array();
    $this->view('elements_default/css',$params);
    ?>
  </head>

  <body>
    <div id="wrapper">

      <?php
      $params = array();
      $this->view('elements_default/top-menu',$params);
      ?>

      <?php
      $params = array();
      $this->view('elements_default/header',$params);
      ?>

      <?= $page['content'] ?>

      <?php
      $params = array();
      $this->view('elements_default/footer',$params);
      ?>

    </div>

    <!-- Go to top button -->
    <a id="goToTop"><i class="fa fa-angle-up top-icon"></i><i class="fa fa-angle-up"></i></a>

    <?php $this->view('elements_default/js',$params) ?>
  </body>

</html>

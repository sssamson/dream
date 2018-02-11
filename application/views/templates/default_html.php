<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Your brand is a promise to clients but it’s also so much more. Your brand starts with you. Know who you are, know what you do and what you won’t do and deliver on that promise.">
    <!-- PAGE TITLE -->
    <title><?= $page['title'] ?></title>
    <?php
    $params = array();
    $this->view('elements_default/css',$params);
    ?>
    
    <?php
    $params = array();
    $this->view('elements_default/js',$params);
    ?>
</head>
<body>

  <img id="preloader" src="/assets/front/images/preloader.gif" alt="" />

  <div id="page">
    <?php
    $params = array();
    $this->view('elements_default/header',$params);
    ?>

    <?= $page['content'] ?>
  </div>

  <?php
  $params = array();
  $this->view('elements_default/footer',$params);
  ?>
</body>
</html>

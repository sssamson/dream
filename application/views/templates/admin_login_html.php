<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/assets/img/favicon.png">
    <title><?= $page['title'] ?></title>
    <?php
    $params = array();
    $this->view('elements_admin/_css',$params);
    ?>
  </head>

  <body class="app flex-row align-items-center bgimage">
    <div class="container">
      <?= $page['content'] ?>
    </div>
    <?php $this->view('elements_admin/_js',$params) ?>
    <script src="/assets/back/js/login.js"></script>
  </body>

</html>

<!doctype html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">

    <title><?= $page['title'] ?></title>
    <?php
    $params = array();
    $this->view('elements_default/_css',$params);
    ?>
  </head>

  <body>
    <?= $page['content'] ?>
    
    <?php $this->view('elements_default/_js',$params) ?>  
    <?php $this->view('elements_default/modals',$params) ?>  
  </body>
  
</html>
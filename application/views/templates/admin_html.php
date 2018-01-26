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

  <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">

    <?php $this->view('elements_admin/header',$params);?>

    <div class="app-body">
      <?php $this->view('elements_admin/sidebar',$params);?>
      <!-- Main content -->
      <main class="main">
        <?php $this->view('elements_admin/breadcrumbs',$params);?>
        <?= $page['content'] ?>
      </main>
    </div>

    <?php $this->view('elements_admin/footer',$params) ?>
    <?php $this->view('elements_admin/modals',$params) ?>
    <?php $this->view('elements_admin/_js',$params) ?>
  </body>
</html>

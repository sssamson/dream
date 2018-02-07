<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Your brand is a promise to clients but it’s also so much more. Your brand starts with you. Know who you are, know what you do and what you won’t do and deliver on that promise.">
    <meta name="author" content="Dontaye Carter">
    <!-- PAGE TITLE -->
    <title><?= $page['title'] ?></title>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="assets/front/bootstrap/css/bootstrap.min.css">
    <!-- ALL GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Lato:300,400,700&subset=latin-ext" rel="stylesheet">
    <!-- FONT AWESOME CSS -->
    <link rel="stylesheet" href="assets/front/fonts/font-awesome.min.css">
    <!-- OWL CAROSEL CSS -->
    <link rel="stylesheet" href="assets/front/owlcarousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/front/owlcarousel/css/owl.theme.css">
    <!-- MAGNIFIC CSS -->
    <link rel="stylesheet" href="assets/front/css/magnific-popup.css">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="assets/front/css/animate.min.css">
    <!-- MAIN STYLE CSS -->
    <link rel="stylesheet" href="assets/front/css/style.css">
    <!-- RESPONSIVE CSS -->
    <link rel="stylesheet" href="assets/front/css/responsive.css">
</head>
<body>
  <!-- START PRELOADER AREA-->
  <div class="preloader-area">
      <div class="preloader">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
      </div>
  </div>
  <!-- END PRELOADER AREA -->

  <?= $page['content'] ?>

  <?php
  $params = array();
  $this->view('elements_default/footer',$params);
  ?>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- LATEST JQUERY -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
  <!-- BOOTSTRAP JS -->
  <script src="assets/front/bootstrap/js/bootstrap.min.js"></script>
  <!-- OWL CAROUSEL JS  -->
  <script src="assets/front/owlcarousel/js/owl.carousel.min.js"></script>
  <!-- MIXITUP JS -->
  <script src="assets/front/js/jquery.mixitup.js"></script>
  <!-- PARALLAX JS -->
  <script src="assets/front/js/jquery.stellar.min.js"></script>
  <!-- PROGRESSBAR JS -->
  <script src="assets/front/js/jquery.appear.js"></script>
  <!-- MAGNIFICANT JS -->
  <script src="assets/front/js/jquery.magnific-popup.min.js"></script>
  <!-- YOUTUBE JS -->
  <script src="assets/front/js/jquery.mb.YTPlayer.min.js"></script>
  <script type="text/javascript">
      $('.player').mb_YTPlayer();
  </script>
  <!-- WOW JS -->
  <script src="assets/front/js/wow.min.js"></script>
  <!-- CONTACT FORM JS -->
  <script src="assets/front/_js/_email.js"></script>
  <!-- SCRIPT JS -->
  <script src="assets/front/js/scripts.js"></script>
</body>
</html>

<?php
$pre_link = '';
if ($page == 'blog') {
  $pre_link = '/';
}
?>
<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- START LOGO DESIGN AREA -->
                <div class="logo">
                    <a href="/">Carter Media</a>
                </div>
                <!-- END LOGO DESIGN AREA -->
            </div>
            <div class="col-md-9">
                <!-- START MENU DESIGN AREA -->
                <div class="mainmenu">
                    <div class="navbar navbar-nobg">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a class="smoth-scroll" href="<?= $pre_link ?>#home">Home <div class="ripple-wrapper"></div></a></li>
                                <li><a class="smoth-scroll" href="<?= $pre_link ?>#about">About</a></li>
                                <li><a class="smoth-scroll" href="<?= $pre_link ?>#portfolio">Portfolio</a></li>
                                <li><a class="smoth-scroll" href="<?= $pre_link ?>#testimonial">Testimonial</a></li>
                                <li><a class="smoth-scroll" href="<?= $pre_link ?>#bio">Bio</a></li>
                                <li><a class="smoth-scroll" href="<?= $pre_link ?>#blog">Blog</a></li>
                                <li><a class="smoth-scroll" href="<?= $pre_link ?>#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END MENU DESIGN AREA -->
            </div>
        </div>
    </div>
</div>

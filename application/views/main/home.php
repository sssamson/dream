<!-- START HOMEPAGE DESIGN AREA -->
<header id="home" class="welcome-area">
    <?php
    $params = array('page'=>'main');
    $this->view('elements_default/menu',$params);
    ?>
    <div class="welcome-image-area">
        <div class="display-table">
            <div class="display-table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-text text-center">
                                <div class="profession-name"><?= $data['page_header']->section ?></div>
                                <h2><?= $data['page_header']->subsection ?></h2>
                                <a href="#contact" class="smoth-scroll hire-me-btn">Contact Me &gt;</a>
                                <a href="#contact" class="smoth-scroll contact-me-btn">Hire Me &gt;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- / END HOMEPAGE DESIGN AREA -->

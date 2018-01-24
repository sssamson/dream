<section class="main-section alabaster">
  <!--main-section alabaster-start-->
  <div class="container">
    <div class="row">
      <figure class="col-lg-5 col-sm-4 wow fadeInLeft">
        <?= display_media($data['page_header']) ?>
      </figure>
      <div class="col-lg-7 col-sm-8 featured-work">
        <h2><?= $data['page_header']->section ?></h2>
        <p class="padding-b"><?= $data['page_header']->subsection ?></p>
        <?php foreach($data['page_elements'] as $element) { ?>
          <div class="featured-box">
            <div class="featured-box-col1 wow fadeInRight delay-02s">
              <?= display_media($element) ?>
            </div>
            <div class="featured-box-col2 wow fadeInRight delay-02s">
              <h3><?= $element->section ?></h3>
              <p><?= $element->subsection ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
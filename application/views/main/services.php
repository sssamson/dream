<section class="main-section" id="service">
  <!--main-section-start-->
  <div class="container">
    <h2><?= $data['page_header']->section ?></h2>
    <h6><?= $data['page_header']->subsection ?></h6>
    <div class="row">
      <div class="col-lg-4 col-sm-6 wow fadeInLeft delay-05s">
        <?php foreach($data['page_elements'] as $element) { ?>
          <div class="service-list">
            <div class="service-list-col1">
              <?= display_media($element) ?>
            </div>
            <div class="service-list-col2">
              <h3><?= $element->section ?></h3>
              <p><?= $element->subsection ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
      <figure class="col-lg-8 col-sm-6  text-right wow fadeInUp delay-02s">
        <?= display_media($data['page_header']) ?>
      </figure>
    </div>
  </div>
</section>
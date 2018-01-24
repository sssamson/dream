<section class="main-section paddind" id="Portfolio">
  <!--main-section-start-->
  <div class="container">
    <h2><?= $data['page_header']->section ?></h2>
    <h6><?= $data['page_header']->subsection ?></h6>

    <div class="portfolioFilter">
      <ul class="Portfolio-nav wow fadeIn delay-02s">
        <li><a href="#" data-filter="*" class="current">All</a></li>
        <?php foreach($category as $element) { ?>
        <li><a href="#" data-filter=".<?= str_replace(' ', '_', $element->name) ?>"><?= $element->name ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="portfolioContainer wow fadeInUp delay-04s">
    <?php foreach($data['page_elements'] as $element) { ?>
    <div class=" Portfolio-box <?= str_replace(' ', '_', $element->category) ?>">
      <a href="#"><img src="/assets/img/page/<?= $element->image ?>" alt=""></a>
      <h3><?= $element->section ?></h3>
      <p><?= $element->category ?></p>
    </div>
    <?php } ?>
  </div>
</section>
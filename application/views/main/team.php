<section class="main-section team" id="team">
  <!--main-section team-start-->
  <div class="container">
    <h2><?= $data['page_header']->section ?></h2>
    <h6><?= $data['page_header']->subsection ?></h6>
    <div class="team-leader-block clearfix">
      <?php foreach($data['page_elements'] as $element) { ?>
      <div class="team-leader-box">
        <div class="team-leader wow fadeInDown delay-03s">
          <div class="team-leader-shadow"><a href="#"></a></div>
          <?= display_media($element) ?>
          <ul>
            <li><a href="mailto:<?= $element->h2 ?>" class="fa fa-envelope-o"></a></li>
          </ul>
        </div>
        <h3 class="wow fadeInDown delay-03s"><?= $element->section ?></h3>
        <span class="wow fadeInDown delay-03s"><?= $element->subsection ?></span>
        <p class="wow fadeInDown delay-03s"><?= $element->h1 ?></p>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
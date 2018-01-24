<section class="main-section team" id="store">
  <div class="container">
    <h2><?= $data['page_header']->section ?></h2>
    <h6><?= $data['page_header']->subsection ?></h6>
    <div class="team-leader-block clearfix">
      <?php foreach($products as $element) { ?>
      <div class="team-leader-box">
        <div class="team-leader wow fadeInDown delay-03s">
          <div class="team-leader-shadow"><a href="#"></a></div>
          <img src="/assets/img/store/<?= $element->image ?>" alt="">
          <ul>
            <li><a href="/cart/add?id=<?= $element->id ?>" class="fa fa-envelope-o">Add to Cart</a></li>
          </ul>
        </div>
        <h3 class="wow fadeInDown delay-03s"><?= $element->name ?></h3>
        <span class="wow fadeInDown delay-03s"><?= $element->description ?></span>
        <p class="wow fadeInDown delay-03s">$<?= $element->price ?></p>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
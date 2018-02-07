<div class="container">
    <div class="row">
        <div class="col-md-8">
          <div class="comment-section wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.1s" data-wow-offset="0">
              <h4>By Category:</h4>
              <?php foreach($data as $element) { ?>
              <div class="single-comment">
                  <div class="row">
                      <div class="col-md-3 text-center">
                          <a href="/main/blog?id=<?= $element->id ?>"><img src="/assets/img/blog/<?= $element->image ?>" alt=""></a>
                      </div>
                      <div class="col-md-9">
                          <h4><b><a href="/main/blog?id=<?= $element->id ?>"><?= $element->title ?></a></b></h4>
                          <h5><?= db_seperate_date('date',$element->date) ?></h5>
                          <p><?= $element->intro ?></p>
                      </div>
                  </div>
              </div>
              <?php } ?>
          </div>
        </div>
        <!-- START SIDEBAR DESIGN AREA -->
        <div class="col-md-4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.1s" data-wow-offset="0">
          <?php
          $params['categories'] = $categories;
          $params['blogs'] = $blogs;
          $this->view('elements_default/blog_side',$params);
          ?>
        </div>
        <!-- / END START SIDEBAR DESIGN AREA -->
    </div>
</div>

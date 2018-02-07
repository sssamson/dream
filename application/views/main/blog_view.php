<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!-- START POST DESIGN AREA -->
            <div class="single-blog-details wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.1s" data-wow-offset="0">
                <h2><b><?= $data->title ?></b></h2>
                <h6 class="text-muted"><?= db_seperate_date('date',$data->date) ?> | Post By: Admin</h6>
                <?php if (!empty($data->image)) { ?>
                  <img src="/assets/img/blog/<?= $data->image ?>" class="img-responsive" alt="" width="50%" height="50%">
                <?php } ?>
                <p class="blog-description"><?= html_entity_decode($data->content) ?></p>
            </div>
            <!-- / END POST DESIGN AREA -->
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

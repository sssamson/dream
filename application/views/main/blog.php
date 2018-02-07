<!-- START BLOG DESIGN AREA -->
<section id="blog" class="blog-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-title">
                    <h2><span class="section-title-style left-section-title-style"><i></i><i></i><i></i></span> <?= $data['page_header']->section ?> <span class="section-title-style right-section-title-style"><i></i><i></i><i></i></span></h2>
                    <div data-wow-delay=".3s" class="hadding-area text-center wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <p class="no-margin"><?= $data['page_header']->subsection ?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php
        foreach($blog as $element) {
        ?>
        <div class="row blog-row">
          <!-- START SINGLE BLOG DESIGN AREA -->
            <div class="col-xs-12 col-sm-4 col-md-3 img-container">
                <a href="/main/blog?id=<?= $element->id ?>"><img src="/assets/img/blog/<?= $element->image ?>" alt="read more"></a>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9">
                <h2 class="no-margin"><a href="/main/blog?id=<?= $element->id ?>"><?= $element->title ?></a></h2>
                <div class="post-info">
                    <ul>
                        <li><?= db_seperate_date('date',$element->date) ?></li>
                    </ul>
                </div>
                <p class="no-margin"><?= $element->intro ?></p>
            </div>
          <!-- / END SINGLE BLOG DESIGN AREA -->
        </div>
        <?php } ?>

    </div>
</section>
<!-- / END BLOG DESIGN AREA -->

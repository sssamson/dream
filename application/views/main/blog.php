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
    <div class="container">
      <div class="row blog-row social-media">
        <div class="col-xs-12 col-sm-6 col-md-6 social">
          <div class="fb-page" data-href="https://www.facebook.com/CarterMediaGroup" data-tabs="timeline" data-width="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/CarterMediaGroup" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/CarterMediaGroup">The Carter Media Group, LLC.</a></blockquote></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 social">
          <a class="twitter-timeline" data-height="500" href="https://twitter.com/DontayeCarter?ref_src=twsrc%5Etfw">Tweets by DontayeCarter</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
    </div>
</section>
<!-- / END BLOG DESIGN AREA -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=1894759337440913&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

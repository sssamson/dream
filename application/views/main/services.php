<!-- START SERVICES DESIGN AREA -->
<section id="services" class="work-process-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-title">
                    <h2><span class="section-title-style left-section-title-style"><i></i><i></i><i></i></span> SERVICES <span class="section-title-style right-section-title-style"><i></i><i></i><i></i></span></h2>
                </div>
            </div>
        </div>
        <!-- START SINGLE SERVICE DESIGN AREA -->
        <?php foreach($data['page_elements'] as $element) { ?>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="service-grid clearfix">
                  <div class="image-holder">
                      <div class="chid-pernt">
                          <div class="child">
                              <?= display_media($element) ?>
                          </div>
                      </div>
                  </div>
                  <div class="text-box">
                      <h3><a href="/main/service?id=<?= $element->id ?>"><?= $element->section ?></a></h3>
                      <p><?= $element->subsection ?></p>
                  </div>
              </div>
          </div>
        </div>
        <?php } ?>
    </div>
</section>
<!-- / END SERVICES DESIGN AREA -->

<!-- START TESTIMONIAL DESIGN AREA -->
<section id="testimonial" class="testimonial-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-title">
                    <h2><span class="section-title-style left-section-title-style"><i></i><i></i><i></i></span> TESTIMONIALS <span class="section-title-style right-section-title-style"><i></i><i></i><i></i></span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="testimonial-list">
                <?php foreach($data['page_elements'] as $element) { ?>
                <!-- START SINGLE TESTIMONIAL DESIGN AREA -->
                <div class="single-testimonial text-center">
                    <p><?= $element->h1 ?></p>
                    <span class="name"><?= $element->section ?></span>
                    <span class="title"><?= $element->subsection ?></span>
                    <img src="/assets/img/page/<?= $element->image ?>" class="img-circle" alt="">
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- / END TESTIMONIAL DESIGN AREA -->

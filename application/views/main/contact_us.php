<!-- START CONTACT DESIGN AREA -->
<section id="contact" class="contact-me-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2><span class="section-title-style left-section-title-style"><i></i><i></i><i></i></span> <?= $data['page_header']->section ?> <span class="section-title-style right-section-title-style"><i></i><i></i><i></i></span></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- START CONTACT AREA-->
            <div class="column info-column col-md-6 col-sm-12 col-xs-12">
                <!-- START CONTACT INFORMATION -->
                <div class="contact-info">
                    <div class="text"><?= $data['page_header']->subsection ?></div>
                    <ul>
                        <li><i class="fa fa-map-marker"></i>Address<span><br>2227 Sandy Springs Place STE D368, Atlanta, Georgia, 30328</span></li>
                        <li><i class="fa fa-envelope"></i>Email<span><br>dontaye@cartermedia.net</span></li>
                        <li><i class="fa fa-phone-square"></i>Phone<span><br>(678) 551-1864</span></li>
                    </ul>
                </div>
                <!-- / END CONTACT INFORMATION -->
            </div>
            <!-- /END CONTACT AREA-->

            <div class="row clearfix">
                <!-- START CONTACT FORM AREA -->
                <div class="column form-column col-md-6 col-sm-12 col-xs-12">
                    <div class="contact-form default-form">
                        <form method="post" onsubmit="return false">
                            <div class="row clearfix">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="group-inner">
                                            <input class="contact" id="name" name="name" placeholder="Name" type="text" required>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="group-inner">
                                            <input class="contact" id="email" name="email" placeholder="Email" type="email" required>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="group-inner">
                                            <input class="contact" id="phone" name="phone" placeholder="Phone Number" type="text" required>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="group-inner">
                                            <textarea class="contact" id="message" name="message" placeholder="Message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" id="send_email" class="submit-btn-style col-md-12 col-sm-12 col-xs-12">SUBMIT &gt; </button>
                                    </div>
                                    <div class="message_response form-group col-md-12 col-sm-12 col-xs-12">
                                      <h5 align="center">Message Sent</h5>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- / END CONTACT FORM AREA -->
            </div>

        </div>
    </div>
</section>
<!-- / END CONTACT DESIGN AREA -->

<!--Plugins-->
<script src="/assets/front/js/jquery.js"></script>
<script src="/assets/front/js/plugins.js"></script>
<!--Template functions-->
<script src="/assets/front/js/functions.js"></script>
<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
<link rel="stylesheet" type="text/css" href="/assets/front/js/plugins/revolution/css/settings.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/assets/front/js/plugins/revolution/css/layers.css">
<link rel="stylesheet" type="text/css" href="/assets/front/js/plugins/revolution/css/navigation.css">
<script type="text/javascript" src="/assets/front/js/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/assets/front/js/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="/assets/front/js/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="/assets/front/js/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="/assets/front/js/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="/assets/front/js/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="/assets/front/js/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="/assets/front/js/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="/assets/front/js/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="/assets/front/js/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="/assets/front/js/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript">
  var tpj = jQuery;

  var revapi30;
  tpj(document).ready(function() {
      if (tpj("#rev_slider_30_1").revolution == undefined) {
          revslider_showDoubleJqueryError("#rev_slider_30_1");
      } else {
          revapi30 = tpj("#rev_slider_30_1").show().revolution({
              sliderType: "standard",
              jsFileLocation: "/assets/front/js/plugins/revolution/js/",
              sliderLayout: "fullscreen",
              dottedOverlay: "none",
              delay: 9000,
              navigation: {
                  keyboardNavigation: "off",
                  keyboard_direction: "horizontal",
                  mouseScrollNavigation: "off",
                  onHoverStop: "on",
                  touch: {
                      touchenabled: "on",
                      swipe_threshold: 75,
                      swipe_min_touches: 50,
                      swipe_direction: "horizontal",
                      drag_block_vertical: false
                  },
                  arrows: {
                      style: "hermes",
                      enable: true,
                      hide_onmobile: true,
                      hide_under: 600,
                      hide_onleave: true,
                      hide_delay: 200,
                      hide_delay_mobile: 1200,
                      tmp: '<div class="tp-arr-allwrapper">	<div class="tp-arr-imgholder"></div>	<div class="tp-arr-titleholder">{{title}}</div>	</div>',
                      left: {
                          h_align: "left",
                          v_align: "center",
                          h_offset: 0,
                          v_offset: 0
                      },
                      right: {
                          h_align: "right",
                          v_align: "center",
                          h_offset: 0,
                          v_offset: 0
                      }
                  }
              },
              responsiveLevels: [1240, 1024, 778, 480],
              visibilityLevels: [1240, 1024, 778, 480],
              gridwidth: [1240, 1024, 778, 480],
              gridheight: [868, 768, 960, 720],
              lazyType: "smart",
              shadow: 0,
              spinner: "off",
              stopLoop: "off",
              stopAfterLoops: -1,
              stopAtSlide: -1,
              shuffle: "off",
              autoHeight: "off",
              fullScreenAutoWidth: "off",
              fullScreenAlignForce: "off",
              fullScreenOffsetContainer: "",
              fullScreenOffset: "",
              disableProgressBar: "on",
              hideThumbsOnMobile: "off",
              hideSliderAtLimit: 0,
              hideCaptionAtLimit: 0,
              hideAllCaptionAtLilmit: 0,
              debugMode: false,
              fallbacks: {
                  simplifyAll: "off",
                  nextSlideOnWindowFocus: "off",
                  disableFocusListener: false,
              }
          });
      }
  }); /*ready*/

</script>

<?php
if (!empty($page['js'])) {
	echo output_java_script($page['js']);
}
?>

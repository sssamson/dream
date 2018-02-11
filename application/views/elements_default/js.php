<script src="/assets/front/js/jquery.min.js" type="text/javascript"></script>
<script src="/assets/front/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/front/js/jquery.prettyPhoto.js" type="text/javascript"></script>
<script src="/assets/front/js/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="/assets/front/js/superfish.min.js" type="text/javascript"></script>
<script src="/assets/front/js/jquery.flexslider-min.js" type="text/javascript"></script>
<script src="/assets/front/js/owl.carousel.js" type="text/javascript"></script>
<script src="/assets/front/js/jquery.mb.YTPlayer.js" type="text/javascript"></script>
<script src="/assets/front/js/animate.js" type="text/javascript"></script>
<script src="/assets/front/js/jquery.BlackAndWhite.js"></script>
<script src="/assets/front/js/myscript.js" type="text/javascript"></script>
<script>

  //PrettyPhoto
  jQuery(document).ready(function() {
    $("a[rel^='prettyPhoto']").prettyPhoto();
  });

  //BlackAndWhite
  $(window).load(function(){
    $('.client_img').BlackAndWhite({
      hoverEffect : true, // default true
      // set the path to BnWWorker.js for a superfast implementation
      webworkerPath : false,
      // for the images with a fluid width and height
      responsive:true,
      // to invert the hover effect
      invertHoverEffect: false,
      // this option works only on the modern browsers ( on IE lower than 9 it remains always 1)
      intensity:1,
      speed: { //this property could also be just speed: value for both fadeIn and fadeOut
        fadeIn: 300, // 200ms for fadeIn animations
        fadeOut: 300 // 800ms for fadeOut animations
      },
      onImageReady:function(img) {
        // this callback gets executed anytime an image is converted
      }
    });
  });

</script>

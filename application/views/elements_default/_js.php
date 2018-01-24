<!-- Standard -->
<script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets/vendor/tether/dist/js/tether.min.js"></script>
<script src="/assets/vendor/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
<script src="/assets/vendor/formvalidator/jquery.form-validator.min.js"></script>
<script src="/assets/vendor/datatables/DataTables-1.10.15/js/jquery.dataTables.min.js"></script>
<script src="/assets/vendor/datatables/DataTables-1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="/assets/vendor/datatables/Responsive-2.1.1/js/dataTables.responsive.min.js"></script>
<script src="/assets/vendor/datatables/Responsive-2.1.1/js/responsive.bootstrap.min.js"></script>
<script src="/assets/vendor/bootstrap-select/bootstrap-select.min.js"></script>
<script src="/assets/vendor/select2/js/select2.min.js"></script>
<script src="/assets/vendor/moment/moment.min.js"></script>
<script src="/assets/front/js/_global.js"></script>

<!-- Template -->
<script type="text/javascript" src="/assets/front/js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="/assets/front/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/assets/front/js/jquery.isotope.js"></script>
<script type="text/javascript" src="/assets/front/js/wow.js"></script>
<script type="text/javascript" src="/assets/front/js/classie.js"></script>
	

<script type="text/javascript">
	$(document).ready(function(e) {
		$('#test').scrollToFixed();
		$('.res-nav_click').click(function() {
			$('.main-nav').slideToggle();
			return false
		});

	});
</script>

<script>
	wow = new WOW({
		animateClass: 'animated',
		offset: 100
	});
	wow.init();
</script>


<script type="text/javascript">
	$().ready(function() {
		$('.main-nav li a, .servicelink').bind('click', function(event) {
			var $anchor = $(this);

			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top - 102
			}, 1500, 'easeInOutExpo');
			/*
			if you don't want to use the easing effects:
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1000);
			*/
			if ($(window).width() < 768) {
				$('.main-nav').hide();
			}
			event.preventDefault();
		});
	})
</script>

<script type="text/javascript">
	$().ready(function() {

		var $container = $('.portfolioContainer'),
			$body = $('body'),
			colW = 375,
			columns = null;


		$container.isotope({
			// disable window resizing
			resizable: true,
			masonry: {
				columnWidth: colW
			}
		});

		$(window).smartresize(function() {
			// check if columns has changed
			var currentColumns = Math.floor(($body.width() - 30) / colW);
			if (currentColumns !== columns) {
				// set new column count
				columns = currentColumns;
				// apply width to container manually, then trigger relayout
				$container.width(columns * colW)
					.isotope('reLayout');
			}

		}).smartresize(); // trigger resize to set container width
		$('.portfolioFilter a').click(function() {
			$('.portfolioFilter .current').removeClass('current');
			$(this).addClass('current');

			var selector = $(this).attr('data-filter');
			$container.isotope({

				filter: selector,
			});
			return false;
		});

	});
</script>

<?php 
if (!empty($page['js'])) {
	echo output_java_script($page['js']); 
}
?>
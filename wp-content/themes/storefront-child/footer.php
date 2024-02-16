<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>
</div><!-- .col-md-12 -->
</div><!-- .row -->
</div><!-- .container -->
</div><!-- #content -->

<?php do_action('storefront_before_footer'); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="col-full">

		<?php
		/**
		 * Functions hooked in to storefront_footer action
		 *
		 * @hooked storefront_footer_widgets - 10
		 * @hooked storefront_credit         - 20
		 */
		do_action('storefront_footer');
		?>

	</div><!-- .col-full -->
</footer><!-- #colophon -->

<?php do_action('storefront_after_footer'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/slick.min.js' id='waypoints-js'></script>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/bootstrap.min'></script>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/scripts.js' id='waypoints-js'></script>
<script type='text/javascript' src="<?php bloginfo('template_directory');?>/js/isotope.pkgd.min.js"></script>


<script>
	document.addEventListener('DOMContentLoaded', function() {
		var showFormBtns = document.querySelectorAll('.votebtn');
		var closeFormBtns = document.querySelectorAll('.closebtn');
		var contactFormPopups = document.querySelectorAll('.affiliate-pop-description');

		function toggleFormDisplay(btnIndex, event) {
			if (event) {
				event.preventDefault();
			}
			contactFormPopups[btnIndex].style.display = (contactFormPopups[btnIndex].style.display === 'none' || contactFormPopups[btnIndex].style.display === '') ? 'block' : 'none';
		}

		showFormBtns.forEach(function(btn, index) {
			btn.addEventListener('click', function(event) {
				toggleFormDisplay(index, event);
			});
		});

		closeFormBtns.forEach(function(closeBtn, index) {
			closeBtn.addEventListener('click', function(event) {
				toggleFormDisplay(index, event);
			});
		});
	});
</script>

</body>

</html>
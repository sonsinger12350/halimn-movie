<?php get_header(); ?>

	<div class="col-xs-12 carausel-sliderWidget home-movie-slide">
		<?php dynamic_sidebar('carousel-widget') ?>
	</div>

	<main id="main-contents" class="col-xs-12 col-sm-12">
		<?php
			if( is_active_sidebar( 'home-widget' ) ) {
			     dynamic_sidebar( 'home-widget' );
			} else {
				_e('This is widget area. Go to Appearance -> Widgets to add some widgets.', 'halimthemes');
			} ?>
	</main>

<?php get_footer(); ?>
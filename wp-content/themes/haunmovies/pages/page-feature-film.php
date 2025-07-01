<?php

	/**
	* Template Name: Most Viewed Movie
	*/
	get_header();
	$type = isset($_GET['sortby']) ? $_GET['sortby'] : '';
?>
<main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
	<?php if ( is_active_sidebar( 'halim-ad-above-category' ) ) { ?>
	    <div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
	        <?php dynamic_sidebar( 'halim-ad-above-category' ); ?>
	    </div>
	<?php } ?>
	<section>
			<div class="section-bar clearfix">
			   <h3 class="section-title">
					<span><?php _e('Most Viewed', 'halimthemes') ?></span>
					<span class="pull-right sortby">Sort by: <a<?php echo $type == '' ? ' class="active"' : ''; ?> href="<?php echo get_permalink(get_the_ID()); ?>">All post</a> / <a<?php echo $type == 'movie' ? ' class="active"' : ''; ?> href="?sortby=movie">Movie</a> / <a<?php echo $type == 'tv_series' ? ' class="active"' : ''; ?> href="?sortby=tv_series">TV Series</a></span>
			   </h3>
			</div>
			<div class="halim_box">
			<?php
				if ( get_query_var('paged') ) {
						$paged = get_query_var('paged');
					} elseif ( get_query_var('page') ) {
						$paged = get_query_var('page');
					} else {
						$paged = 1;
				}
				$post_format = halim_get_post_format_type($type);

				$posts_per_page = get_option( 'posts_per_page' );
				$args = array(
					'post_type'			=> 'post',
					'paged'      		=> $paged,
					'posts_per_page' 	=> $posts_per_page,
					'post_status' 		=> 'publish',
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key'   => 'halim_view_post_all'
						),
					)
				);
				if($type && $type != 'allpost') {
			        $args['tax_query'] = array(array(
			            'taxonomy' => 'post_format',
			            'field' => 'slug',
			            'terms' => array('post-format-'.$post_format),
			            'operator' => 'IN'
			        ));
				}
				$wp_query = new WP_Query( $args );
				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
					HaLimCore::display_post_items();
				endwhile; wp_reset_postdata(); endif; ?>
			</div>
		<div class="clearfix"></div>
		<?php halim_pagination(); ?>
	</section>
	<?php if ( is_active_sidebar( 'halim-ad-below-category' ) ) { ?>
	    <div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
	        <?php dynamic_sidebar( 'halim-ad-below-category' ); ?>
	    </div>
	<?php } ?>
</main>
<?php get_sidebar(); get_footer(); ?>
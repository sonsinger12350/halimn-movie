<?php
/**
* Template Name: Theater movie
*/
$sortby = $type = isset($_GET['sortby']) ? sanitize_text_field($_GET['sortby']) : '';
get_header();?>
<main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
	<?php if ( is_active_sidebar( 'halim-ad-above-category' ) ) { ?>
	    <div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
	        <?php dynamic_sidebar( 'halim-ad-above-category' ); ?>
	    </div>
	<?php } ?>
	<section>
			<div class="section-bar clearfix">
			   <h3 class="section-title">
					<span><?php _e('Theater movie', 'halimthemes') ?></span>
					<span class="pull-right sortby">Sort by: <a<?php echo $type == '' || $type == 'latest' ? ' class="active"' : ''; ?> href="?sortby=latest">Newest</a> / <a<?php echo $type == 'lastupdate' ? ' class="active"' : ''; ?> href="?sortby=lastupdate">Last Update</a> / <a<?php echo $type == 'mostview' ? ' class="active"' : ''; ?> href="?sortby=mostview">Most view</a></span>
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
				$posts_per_page = get_option( 'posts_per_page' );

				$args = array(
					'post_type'			=> 'post',
					'post_status' 		=> 'publish',
					'paged'      		=> $paged,
					'posts_per_page' 	=> $posts_per_page,
				);
                $args['tax_query'] = array(array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => array('post-format-audio'),
                    'operator' => 'IN'
                ));
			    if($sortby == 'lastupdate') {
			        $args['orderby'] = 'modified';
			    }

				if($sortby == 'mostview')
				{
					$args['orderby'] = 'meta_value_num';
		            $args['meta_query'] = array(
		                'relation' => 'AND',
		                array(
		                    'key'   => 'halim_view_post_all'
		                ),
		            );
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
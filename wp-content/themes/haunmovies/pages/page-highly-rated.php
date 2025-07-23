<?php

/**
* Template Name: Đánh giá cao
*/
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
				<span>Đánh giá cao</span>
			   </h3>
			</div>
			<div class="halim_box">
			<?php
				if ( get_query_var('paged') ) {
						$paged = get_query_var('paged');
					} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
						$paged = get_query_var('page');
					} else {
						$paged = 1;
				}
				$posts_per_page = get_option( 'posts_per_page' );

				$args = array(
					'post_type'			=> 'post',
					'paged'      		=> $paged,
					'posts_per_page' 	=> $posts_per_page,
					'post_status' 		=> 'publish',
					'meta_key' 			=> 'halim_user_rate',
					'orderby'  			=> 'meta_value_num',
					'order'    			=> 'DESC',
					'meta_query' => array(
						array(
							'key'     => 'halim_user_rate',
							'value'   => '',
							'compare' => '!=',
						)
					)
				);
				
				$wp_query = new WP_Query( $args );
				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
						global $post;

						$meta = get_post_meta($post->ID, '_halim_metabox_options', true );
						$post_title = $post->post_title;
						$rate = get_post_meta($post->ID, "halim_user_rate", true);
						$count = get_post_meta($post->ID, "halim_users_num", true);
						$rating = (!empty($rate) && !empty($count)) ? round($rate / $count, 2) : 0;
					?>
						<article class="col-md-3 col-sm-4 col-xs-6 thumb grid-item">
							<div class="halim-item">
								<a class="halim-thumb" href="<?= $post->guid ?>" title="<?= $post_title ?>">
									<figure>
										<img class="lazyload blur-up img-responsive" data-sizes="auto" data-src="<?= get_the_post_thumbnail_url( $post->ID, getDefaultImageSize() ); ?>" alt="<?= $post_title ?>" title="<?= $post_title ?>">
										<div class="rating-container">
											<span class="rating-score"><?= $rating ?></span>
											<span class="rating-star">⭐</span>
											<span class="rating-count">(<?= $count ?>)</span>
										</div>
									</figure>
									<div class="halim-post-title-box">
										<div class="halim-post-title ">
											<h2 class="entry-title"><?= $post_title ?></h2>
										</div>
									</div>
								</a>
							</div>
						</article>
					<?php
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
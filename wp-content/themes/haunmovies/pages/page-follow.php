<?php
/**
* Template Name: Tủ phim theo dõi
*/
get_header();?>
<style>
	.grid-item .remove-follow {
		
	}

	.grid-item .remove-follow {
		right: 0;
		top: 0;
		background: #9f1212;
		color: #fff;
		padding: 5px 10px;
		z-index: 9;
		transition: .7s;
		text-transform: capitalize;
		font-size: 12px;
		position: absolute;
	}
</style>
<main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
	<?php if ( is_active_sidebar( 'halim-ad-above-category' ) ) { ?>
	    <div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
	        <?php dynamic_sidebar( 'halim-ad-above-category' ); ?>
	    </div>
	<?php } ?>
	<section>
			<div class="section-bar clearfix">
			   <h3 class="section-title">
					<span><?php _e('Tủ phim theo dõi') ?></span>
			   </h3>
			</div>
			<div class="halim_box">
			<?php
				if ( get_query_var('paged') ) $paged = get_query_var('paged');
				elseif ( get_query_var('page') ) $paged = get_query_var('page');
				else $paged = 1;

				$posts_per_page = get_option( 'posts_per_page' );
				$followed = is_user_logged_in() ? get_user_meta(get_current_user_id(), 'halim_followed_movies', true) : [];

				if (!empty($followed)) {
					$args = array(
						'post_type' => 'post',
						'paged'      		=> $paged,
						'posts_per_page' 	=> $posts_per_page,
						'order'	=> 'DESC',
						'post__in' => $followed
					);

					$wp_query = new WP_Query( $args );
					if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
						$meta = get_post_meta($post->ID, '_halim_metabox_options', true );
						$post_title = $post->post_title;
						?>
							<article class="col-md-3 col-sm-4 col-xs-6 thumb grid-item">
								<div class="halim-item">
									<a class="halim-thumb" href="<?= $post->guid ?>" title="<?= $post_title ?>">
										<figure>
											<img class="lazyload blur-up img-responsive" data-sizes="auto" data-src="<?= $meta['halim_thumb_url'] ?>" alt="<?= $post_title ?>" title="<?= $post_title ?>">
										</figure>
										<span class="episode"><?= $meta['halim_episode'] ?></span>
										<span class="remove-follow" data-id="<?= $post->ID ?>"><i class="fa fa-times" aria-hidden="true"></i></span>
										<div class="halim-post-title-box">
											<div class="halim-post-title ">
												<h2 class="entry-title"><?= $post_title ?></h2>
											</div>
										</div>
									</a>
								</div>
							</article>
						<?php
					endwhile; wp_reset_postdata(); endif;
				}
				else {
					echo '<p class="text-center">Bạn chưa theo dõi phim nào.</p>';
				}
				?>
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
<script>
	$('body').on('click', '.remove-follow', function() {
		let post_id = $(this).attr('data-id');
		let item = $(this).closest('.halim-item');

		if (!post_id) return false;
		if (!confirm("Hủy theo dõi phim?")) return;

		$.ajax({
			url: halim.ajax_url,
			type: "POST",
			data: {
				action: "halim_follow_movie",
				nonce: halim_rate.follow_movie_nonce,
				post_id
			},
			success: function(rs) {
				if (rs.success) {
					item.remove();
					createToast({
						type: "success",
						text: "Đã hủy theo dõi phim"
					});
				}
				else {
					createToast({
						type: "error",
						text: "Có lỗi, vui lòng thử lại!"
					});
				}
			}
		});

		return false;
	});
</script>
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
	
	.clear-all {
		background: rgb(255 255 255/.1);
		color: var(--text-primary);
		padding: 8px 20px;
		border-radius: 25px;
		text-decoration: none;
		font-size: 14px;
		transition: all .3s ease;
		display: flex;
		align-items: center;
		gap: 5px
	}

	.clear-all:hover {
		background: var(--btn-bg-color);
		color: #fff;
	}

	.clear-all i {
		font-size: 14px
	}

	@media (max-width: 480px) {
		.clear-all {
			text-align: center;
			font-size: 13px;
			padding: 8px 16px;
		}
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
			   <h3 class="section-title d-flex justify-content-between">
					<span><?php _e('Tủ phim theo dõi') ?></span>
					<a href="javascript:void(0)" class="clear-all"><i class="fas fa-trash"></i> Xóa tất cả</a>
			   </h3>
			</div>
			<?php if (!is_user_logged_in()): ?>
				<div class="alert alert-danger">
					<strong>Chú ý:</strong> Bạn cần 
					<a href="javascript:void(0)" onclick="showModalLogin()">
					<b>Đăng Nhập</b>
					</a> tài khoản để có thể lưu phim theo dõi vào tài khoản của bạn, nếu không tủ phim này sẽ mất khi bạn xóa lịch sử trình duyệt !!!
				</div>
			<?php endif; ?>
			<div class="halim_box">
				<?php
					if ( get_query_var('paged') ) $paged = get_query_var('paged');
					elseif ( get_query_var('page') ) $paged = get_query_var('page');
					else $paged = 1;

					$posts_per_page = get_option( 'posts_per_page' );
					$followed = is_user_logged_in() ? get_user_meta(get_current_user_id(), 'halim_followed_movies', true) : json_decode($_COOKIE['halim_followed_movies'], true);

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
												<img class="lazyload blur-up img-responsive" data-sizes="auto" data-src="<?= get_the_post_thumbnail_url( $post->ID, 'medium' ); ?>" alt="<?= $post_title ?>" title="<?= $post_title ?>">
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
	$('body').on('click', '.remove-follow', function(e) {
		e.preventDefault();

		let post_id = $(this).attr('data-id');
		let item = $(this).closest('.halim-item');

		if (!post_id) return false;

		showCustomConfirm({
			title: 'Xác nhận hủy theo dõi',
			message: 'Bạn có chắc chắn muốn hủy theo dõi phim này?',
			confirmText: 'Hủy theo dõi',
			cancelText: 'Hủy',
			onConfirm: function () {
				$.ajax({
					url: halim.ajax_url,
					type: "POST",
					data: {
						action: "halim_follow_movie",
						nonce: '<?= wp_create_nonce("follow_movie_nonce") ?>',
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
			}
		});

		return false;
	});

	$('body').on('click', '.clear-all', function() {
		let btn = $(this);
		let btnText = btn.html();

		showCustomConfirm({
			title: 'Xác nhận xóa phim theo dõi',
			message: 'Bạn có chắc muốn xóa tất cả phim theo dõi?',
			confirmText: 'Xóa',
			cancelText: 'Hủy',
			onConfirm: function () {
				btn.prop('disabled', true);
				btn.html('<i class="fa fa-spinner fa-spin"></i>');

				$.ajax({
					url: halim.ajax_url,
					type: "POST",
					data: {
						action: "halim_follow_movie",
						nonce: '<?= wp_create_nonce('follow_movie_nonce') ?>',
						clear_all: 1
					},
					success: function(rs) {
						btn.prop('disabled', false);
						btn.html(btnText);
						if (rs.success) {
							$('.halim_box .grid-item').remove();
							createToast({
								type: "success",
								text: "Đã xóa tất cả phim theo dõi"
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
			}
		});

		return false;
	});
</script>
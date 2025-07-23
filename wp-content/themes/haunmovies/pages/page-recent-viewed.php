<?php

/**
* Template Name: Lịch sử xem phim
*/
get_header();?>

<link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/page-recent-viewed.css"/>

<main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
	<?php if ( is_active_sidebar( 'halim-ad-above-category' ) ) { ?>
	<div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
		<?php dynamic_sidebar( 'halim-ad-above-category' ); ?>
	</div>
	<?php } ?>
	<section>
		<div class="section-bar clearfix">
			<div class="section-title d-flex justify-content-between">
				<span><?php echo __( 'Lịch sử xem phim' ); ?></span>
				<a href="javascript:void(0)" class="clear-history" id="delete-history-user"><i class="fas fa-trash"></i> Xóa tất cả</a>
			</div>
		</div>
		<?php if (!is_user_logged_in()): ?>
			<div class="alert-box">
				<strong>Chú ý:</strong> Bạn cần 
				<a href="javascript:void(0)" onclick="showModalLogin()">
					<b>Đăng Nhập</b>
				</a> tài khoản để lưu lịch sử xem phim. Nếu không, lịch sử sẽ mất khi bạn xóa bộ nhớ trình duyệt!
			</div>
		<?php endif; ?>
		<div class="search-container"><input type="text" class="search-input" placeholder="Tìm kiếm phim trong lịch sử..." id="history-search"></div>
		<?php
		if (is_user_logged_in()) $history = get_user_meta(get_current_user_id(), 'halim_watch_history', true);
		else $history = isset( $_COOKIE['halim_recent_posts'] ) ? json_decode( stripslashes($_COOKIE['halim_recent_posts']), true ) : null;

		if (!empty($history)) {
			echo '<div class="history-grid">';
			foreach ($history as $item) {
				$post_id = $item['post_id'];
				$server = $item['server'];
				$episode = $item['episode'];
				$time = $item['time'];

				$post = get_post($post_id);
				if (!$post || $post->post_status != 'publish') continue;

				$title = esc_html($post->post_title);
				$meta = get_post_meta($post_id, '_halim_metabox_options', true);
				$org_title = isset($meta['halim_original_title']) ? $meta['halim_original_title'] : '';
				$post_slug = cs_get_option("halim_watch_url") . '-' . basename(get_permalink($post_id));
				$watch_link = home_url("/") . "$post_slug/$episode-sv$server.html";
				$image_url = get_the_post_thumbnail_url( $post_id, 'medium' );
				$metaPost = get_post_meta($post_id, "_halimmovies", true);
    			$dataPlayer = json_decode(stripslashes($metaPost), true);

				foreach ($dataPlayer[($server-1)]["halimmovies_server_data"] as $key => $value) {
					if ($value['halimmovies_ep_slug'] == $episode) {
						$episodeTitle = $value['halimmovies_ep_name'];
						break;
					}
				}
			?>
				<div class="history-card">
					<a href="<?= esc_url($watch_link) ?>" title="<?= $title ?>" class="history-content">
						<div class="history-thumbnail">
							<img src="<?= esc_url($image_url) ?>" alt="<?= $title ?>" loading="lazy">
						</div>
						<div class="history-info">
							<div class="history-info-title"><?= $title ?></div>
							<div class="history-info-episode">
								<i class="fas fa-play"></i> Đã xem <?= esc_html($episodeTitle) ?>
							</div>
							<div class="history-info-time">
								<i class="fas fa-clock"></i> <?= getDateDiff(date('Y-m-d H:i:s', $time)) ?>
							</div>
						</div>
					</a>
					<span class="delete-history" data-id="<?= esc_attr($post_id); ?>">
						<i class="fas fa-times"></i>
					</span>
				</div>
		<?php
			}
			echo '</div>';
		}
		else {
			echo '<p class="text-center w-100">Không có dữ liệu.</p>';
		}
		?>
		<div class="clearfix"></div>
	</section>
	<?php if ( is_active_sidebar( 'halim-ad-below-category' ) ) { ?>
		<div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
			<?php dynamic_sidebar( 'halim-ad-below-category' ); ?>
		</div>
	<?php } ?>
</main>
<?php get_sidebar(); get_footer(); ?>
<script>
	jQuery(function($) {
		$('.search-input').on('input', function() {
			let keywork = $(this).val();

			if (keywork) {
				$('.history-grid .history-card').each(function() {
					if (($(this).find('.history-info-title').html().toLowerCase()).indexOf(keywork.toLowerCase()) != -1) {
						$(this).show();
					}
					else {
						$(this).hide();
					}
				});
			}
			else {
				$('.history-grid .history-card').show();
			}
		});

		$('body').on('click', '.delete-history', function(e) {
			e.preventDefault();

			let post_id = $(this).attr('data-id');
			let item = $(this).closest('.history-card');

			if (!post_id) return false;

			showCustomConfirm({
				title: 'Xác nhận xóa lịch sử xem phim',
				message: 'Bạn có chắc muốn xóa lịch sử xem phim này?',
				confirmText: 'Xóa',
				cancelText: 'Hủy',
				onConfirm: function () {
					$.ajax({
						url: halim.ajax_url,
						type: "POST",
						data: {
							action: "delete_history",
							nonce: '<?= wp_create_nonce('delete_history_nonce') ?>',
							post_id
						},
						success: function(rs) {
							if (rs.success) {
								item.remove();
								createToast({
									type: "success",
									text: "Đã xóa khỏi lịch sử"
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
			})
		});

		$('body').on('click', '#delete-history-user', function() {
			showCustomConfirm({
				title: 'Xác nhận xóa lịch sử xem phim',
				message: 'Bạn có chắc muốn xóa tất cả lịch sử xem phim?',
				confirmText: 'Xóa',
				cancelText: 'Hủy',
				onConfirm: function () {
					$.ajax({
						url: halim.ajax_url,
						type: "POST",
						data: {
							action: "delete_history",
							nonce: '<?= wp_create_nonce('delete_history_nonce') ?>',
							clear_all: 1
						},
						success: function(rs) {
							if (rs.success) {
								$('.history-grid .history-card').remove();
								createToast({
									type: "success",
									text: "Đã xóa khỏi lịch sử"
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
			})
		});
	});
</script>
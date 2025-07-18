<?php

$episode         = get_query_var('halim_episode');
$server          = get_query_var('halim_server');
$episode_display = cs_get_option('halim_episode_display');
$meta            = get_post_meta($post->ID, '_halim_metabox_options', true);
$time            = explode(' ', esc_html($post->post_date));
$date            = $time[0];
$episode_slug = get_query_var('episode_slug') ? wp_strip_all_tags(get_query_var('episode_slug')) : '';
$list_movie_follow = list_movie_follow();
$title = halim_get_the_title($post->ID);
$rate = get_post_meta($post->ID, "halim_user_rate", true);
$countRate = get_post_meta($post->ID, "halim_users_num", true);
$rating = (!empty($rate) && !empty($countRate)) ? round($rate / $countRate, 2) : 0;
$ratingIcon = [
	'5' => [
		'image' => get_template_directory_uri().'/assets/images/rate-5.webp',
		'text' => 'Đỉnh nóc'
	],
	'4' => [
		'image' => get_template_directory_uri().'/assets/images/rate-4.webp',
		'text' => 'Hay ho'
	],
	'3' => [
		'image' => get_template_directory_uri().'/assets/images/rate-3.webp',
		'text' => 'Tạm ổn'
	],
	'2' => [
		'image' => get_template_directory_uri().'/assets/images/rate-2.webp',
		'text' => 'Nhạt nhòa'
	],
	'1' => [
		'image' => get_template_directory_uri().'/assets/images/rate-1.webp',
		'text' => 'Thảm họa'
	]
];
$facebookFanPage = cs_get_option("halim_fb_profile_url");

$showtime = get_post_meta($post->ID, 'halim_showtime_movies', true );
$showtime_text = '';

if (!empty($showtime['halim_showtime_movies'])) {
	$list_showtime = list_showtime();
	$showtime_converted = [];

	foreach ($showtime['halim_showtime_movies'] as $k) {
		$showtime_converted[] = '<span>' . $list_showtime[$k] . '</span>';
	}

	$showtime_text = implode(', ', $showtime_converted);
}

$related_movie = get_post_meta($post->ID, '_custom_related_movie', true);

if (have_posts()): while (have_posts()): the_post();
?>
	<link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/movie-info.css?v=<?= time() ?>" />
	<style>
		
	</style>
		<div class="clearfix"></div>
		<?php dynamic_sidebar('halim-ad-above-player') ?>
		<div class="clearfix"></div>
		<?php do_action('halim_player_default', $meta); ?>
		<div class="clearfix"></div>
		<?php dynamic_sidebar('halim-ad-below-player') ?>
		<div class="clearfix"></div>
		<?php if (!empty($related_movie)): ?>
			<ul id="list-movies-part" class="list-movies-part">
				<?php foreach ($related_movie as $v): ?>
					<li class="movies-part">
						<a href="<?= get_permalink($v['post_id']) ?>" class="<?= $v['post_id'] == $post->ID ? 'active' : '' ?>" title="Phần 1"><?= esc_html($v['title']) ?></a>
					</li>
				<?php endforeach ?>
			</ul>
		<?php endif ?>
		<div class="filter-episode d-flex justify-content-between align-items-center">
			<div>
				<span>
					<i class="hl-search"></i> Tìm tập nhanh <i class="hl-angle-down"></i>
				</span>
				<span class="list-episode-filter" id="list_episode_filter">
					<input id="keyword-ep" name="q" type="text" autocomplete="off" placeholder="Nhập số tập">
				</span>
				<img id="loading-ep" style="display: none;" src="<?= get_template_directory_uri() ?>/assets/images/ajax-loader.gif">
				<div id="suggestions-ep" style="display: none;"></div>
			</div>
			<div class="last" data-id="<?= $post->ID ?>">
				<?php if (in_array($post->ID, list_movie_follow())): ?>
					<button type="button" id="follow-btn" class="button-default bg-lochinvar followed">
						<i class="fa-sharp fa-solid fa-bookmark"></i>
						<div class="follow-btn">Hủy Theo Dõi</div>
					</button>
				<?php else: ?>
					<button type="button" id="follow-btn" class="button-default bg-lochinvar">
						<i class="fa-sharp fa-solid fa-bookmark"></i>
						<div class="follow-btn">Theo Dõi</div>
					</button>
				<?php endif ?>
			</div>
		</div>

		<?php do_action('halim_before_single_watch_content', $post->ID); ?>

		<div class="entry-content htmlwrap clearfix collapse <?php echo cs_get_option('post_content_display_watch_page') == 'visible' ? 'in' : ''; ?>" id="expand-post-content">
			<article id="post-<?php echo $post->ID; ?>" class="item-content post-<?php echo $post->ID; ?>">
				<?php the_content(); ?>
			</article>
		</div>
		<div class="clearfix"></div>
		<?php
		if (isEpisodePagenav($meta) || $episode_display == 'show_paging_eps') {
			HaLimCore_Helper::halim_episode_pagination($post->ID, $server, $episode, false);
		} elseif ($episode_display == 'show_tab_eps') {
			HaLimCore_Helper::halim_show_all_eps_table($post->ID, $server, $episode_slug);
		} else {
			HaLimCore_Helper::halim_show_all_eps_list($post->ID, $server, $episode_slug, true);
		}
		?>
		<div class="clearfix"></div>

		<?php do_action('halim_after_single_watch_content', $post->ID); ?>

		<?php if (!empty($showtime_text)): ?>
			<div class="halim_showtime_movies" style="text-transform: uppercase;">
				<p>
					<b>Lịch chiếu vào <?= $showtime_text ?></b>
				</p>
			</div>
		<?php endif ?>

		<div class="title-block watch-page mb-4">
			<div class="title-wrapper full">
				<?php echo '<h1 class="entry-title"><a href="'.get_the_permalink().'" title="'.$title.'" class="tl">'.$title.'</a></h1>'; ?>
			</div>

			<div class="ratings_wrapper">
				<div class="halim-rating-container">
					<div class="halim-star-rating">
						<span class="halim-star-icon">★</span>
						<span class="halim-rating-score total-rating"><?= $rating ?></span>
						<span class="halim-rating-slash">/</span>
						<span class="halim-rating-max">5</span>
						<span class="halim-rating-votes">(<span class="total-vote"><?= $countRate ?></span> lượt)</span>
					</div>
					<button type="button" class="halim-rating-button">Đánh Giá</button>
				</div>
			</div>
		</div>

		<div class="text-center mb-4">
			<iframe src="//www.facebook.com/plugins/likebox.php?href=<?= $facebookFanPage ?>&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color=f4f4f4&amp;header=false" scrolling="no" frameborder="0" allowtransparency="true" width="340" height="130"></iframe>
		</div>
	<?php
	endwhile;
endif;
?>

<div class="halim-comments">
		<?php
			if (cs_get_option('enable_site_comment') == 1 && comments_open()) :
				if (class_exists('WpdiscuzCore')) {
					comments_template();
				} else {
					echo '<div class="halim--notice">This theme requires the following plugin: <a href="https://wordpress.org/plugins/wpdiscuz/" rel="nofollow" target="_blank">wpDiscuz Comments</a></div>';
				}
			endif;
		?>
	</div>
<?php

if (cs_get_option('enable_disqus_comment') == 1) : ?>

	<div class="htmlwrap clearfix">
		<div id="disqus_thread"></div>
		<script>
			var disqus_shortname = '<?php echo cs_get_option('disqus_shortname'); ?>';
			(function() {
				var dsq = document.createElement('script');
				dsq.async = true;
				dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			})();
		</script>

	</div>
<?php endif; ?>
<div id="lightout"></div>
<!-- Modal rating -->
<div class="movie-rating-modal-overlay" id="ratingModal">
	<div class="movie-rating-modal">
		<div class="movie-rating-modal-header">
			<button class="movie-rating-modal-close close-modal-rating">✕</button>
			<h2 class="movie-rating-movie-title"><?= $the_title ?></h2>
			<div class="movie-rating-movie-rating">
				<span class="movie-rating-rating-icon">★</span>
				<span><span class="total-rating"><?= $rating ?></span> / <span class="total-vote"><?= $countRate ?></span> lượt đánh giá</span>
			</div>
		</div>
		<div class="movie-rating-modal-body">
			<h3 class="movie-rating-rating-title">Bạn đánh giá phim này thế nào?</h3>
			<div class="movie-rating-rating-options" id="ratingOptions">
				<?php foreach($ratingIcon as $k => $v): ?>
					<div class="movie-rating-rating-option" data-value="<?= $k ?>">
						<img src="<?= $v['image'] ?>" alt="<?= $v['text'] ?>">
						<span class="movie-rating-rating-option-text"><?= $v['text'] ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="movie-rating-modal-footer">
			<button class="movie-rating-btn movie-rating-btn-primary" id="submitRatingBtn" value="<?= $post->ID ?>">Gửi đánh giá</button>
			<button class="movie-rating-btn movie-rating-btn-secondary close-modal-rating">Đóng</button>
		</div>
	</div>
</div>
<!-- End of Modal rating -->
<div class="modal fade" id="ajax-reportModal" tabindex="-1" role="dialog" style="display: none;">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title text-success">
					<i class="hl-attention"></i> Report
				</h4>
			</div>
			<form action="" id="report-movie-error-form">
				<div class="modal-body" style="overflow:hidden;">
					<div class="halim-content col-xs-12">
						<div class="halim-message"></div>
						<div class="halim-form">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="input-name">Name or Email*</label>
									<div class="col-md-12">
										<input type="text" class="form-control input-name" name="name" required>
									</div>
								</div>
								<div class="form-group">
									<label for="input-content">
										<br>Your message* </label>
									<div class="col-md-12">
										<textarea rows="5" class="form-control input-content col-md-12" name="message" required></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger pull-right"> Report</button>
					<img class="loading-img" style="display:none;" src="https://hoathinh3d.gg/wp-content/plugins/halim-movie-report/loading.gif">
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		$('#report').click(function() {
			$('#ajax-reportModal').modal('show');
		});

		$('#report-movie-error-form').submit(function(e) {
			e.preventDefault();

			let name = $(this).find('input[name="name"]').val();
			let message = $(this).find('textarea[name="message"]').val();
			let post_id = <?= $post->ID ?>;
			let episodeElement = $('.halim-episode.active .halim-btn');
			let episode = episodeElement.html();
			let server = episodeElement.data('server');
			let btnReport = $(this).find('button[type="submit"]');
			let btnText = btnReport.text();

			if (!name || !message || !post_id || !episode) {
				createToast({
					type: "error",
					text: "Vui lòng nhập đầy đủ thông tin"
				});
				return false;
			}

			btnReport.prop('disabled', true);
			btnReport.html('<i class="fa fa-spinner fa-spin"></i>');

			$.ajax({
				url: halim.ajax_url,
				type: "POST",
				data: {
					action: "halim_report_movie_error",
					nonce: '<?= wp_create_nonce("report_movie_error_nonce") ?>',
					name,
					message,
					post_id,
					episode,
					server
				},
				success: function(rs) {
					btnReport.html(btnText);

					if (rs.success) {
						$('#ajax-reportModal .halim-message').html('<div class="alert alert-success" role="alert">Cảm ơn bạn đã gửi tin nhắn lỗi. Chúng tôi sẽ khắc phục sự cố trong thời gian sớm nhất có thể.</div>');
						$('#ajax-reportModal .halim-form').hide();
					} else {
						createToast({
							type: "error",
							text: "Có lỗi, vui lòng thử lại!"
						});
					}
				}
			});

			return false;
		});
	});
</script>
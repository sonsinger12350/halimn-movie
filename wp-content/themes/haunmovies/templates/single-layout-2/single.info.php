<?php
	$episode         = get_query_var('halim_episode');
	$episode_slug    = get_query_var('episode_slug');
	$server          = get_query_var('halim_server');
	$type_slug       = cs_get_option('halim_url_type');
	$watch_slug      = cs_get_option('halim_watch_url');
	$episode_slug    = cs_get_option('halim_episode_url');
	$server_slug     = cs_get_option('halim_server_url');
	$post_slug       = basename(get_permalink($post->ID));
	$episode_display = cs_get_option('halim_episode_display');
	$meta            = get_post_meta($post->ID, '_halim_metabox_options', true );
	$org_title       = isset($meta['halim_original_title']) && $meta['halim_original_title'] !='' ? $meta['halim_original_title'] : '';
	$quality         = isset($meta['halim_quality']) && $meta['halim_quality'] !='' ? $meta['halim_quality'] : '';
	$halim_episode   = isset($meta['halim_episode']) && $meta['halim_episode'] !='' ? $meta['halim_episode'] : halim_add_episode_name_to_the_title(halim_get_last_episode($post->ID));
	$runtime         = isset($meta['halim_runtime']) && $meta['halim_runtime'] !='' ? $meta['halim_runtime'] : '';
	$imdb_rating     = isset($meta['halim_rating']) && $meta['halim_rating'] ? $meta['halim_rating'] : '';
	$imdb_votes      = isset($meta['halim_votes']) && $meta['halim_votes'] ? $meta['halim_votes'] : '';
	$trailer         = isset($meta['halim_trailer_url']) ? $meta['halim_trailer_url'] : '';
	$is_copyright    = isset($meta['is_copyright']) ? $meta['is_copyright'] : '';
	$is_adult        = isset($meta['is_adult']) ? $meta['is_adult'] : '';
	$time            = explode(' ', esc_html($post->post_date));
	$date            = $time[0];

	$the_title = cs_get_option('display_custom_title') ? halim_get_the_title($post->ID) : get_the_title($post->ID);
	$rate = get_post_meta($post->ID, "halim_user_rate", true);
	$countRate = get_post_meta($post->ID, "halim_users_num", true);
	$rating = (!empty($rate) && !empty($countRate)) ? round($rate / $countRate, 2) : 0;
	$categories = get_the_category();
	$showtime = get_post_meta($post->ID, 'halim_showtime_movies', true );
	$showtime_text = '';
	$list_movie_follow = list_movie_follow();
	$watch_url = cs_get_option('watch_btn_display') == 'first_episode' ? halim_get_first_episode_link($post->ID) : halim_get_last_episode_link($post->ID);

	if (!empty($showtime['halim_showtime_movies'])) {
		$list_showtime = list_showtime();
		$showtime_converted = [];

		foreach ($showtime['halim_showtime_movies'] as $k) {
			$showtime_converted[] = '<span style="color: #FFA500;">' . $list_showtime[$k] . '</span>';
		}

		$showtime_text = implode(', ', $showtime_converted);
	}

	if($trailer != '') {
		if(strpos($trailer, 'imdb.com')) {
			preg_match('/\/video\/imdb\/(.*?)\//is', $trailer, $imdb_embed);
			$trailer_url = 'https://www.imdb.com/videoembed/'.$imdb_embed[1];
		}
		else {
			$yt_id = HALIMHelper::getYoutubeId($trailer);
			$trailer_url = 'https://www.youtube.com/embed/'.$yt_id;
		}
	}
	else $trailer_url = '';
	$ratingIcon = [
		'5' => [
			'image' => get_stylesheet_directory_uri().'/assets/images/rate-5.webp',
			'text' => 'Đỉnh nóc'
		],
		'4' => [
			'image' => get_stylesheet_directory_uri().'/assets/images/rate-4.webp',
			'text' => 'Hay ho'
		],
		'3' => [
			'image' => get_stylesheet_directory_uri().'/assets/images/rate-3.webp',
			'text' => 'Tạm ổn'
		],
		'2' => [
			'image' => get_stylesheet_directory_uri().'/assets/images/rate-2.webp',
			'text' => 'Nhạt nhòa'
		],
		'1' => [
			'image' => get_stylesheet_directory_uri().'/assets/images/rate-1.webp',
			'text' => 'Thảm họa'
		]
	];
?>

<link rel="stylesheet" href="<?= get_stylesheet_directory_uri() ?>/assets/css/movie-info.css?v=<?= time() ?>"/>

<!-- Modal rating -->
<div class="movie-rating-modal-overlay" id="ratingModal">
    <div class="movie-rating-modal">
        <div class="movie-rating-modal-header">
            <button class="movie-rating-modal-close close-modal">✕</button>
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
            <button class="movie-rating-btn movie-rating-btn-primary" id="submitRatingBtn">Gửi đánh giá</button>
            <button class="movie-rating-btn movie-rating-btn-secondary close-modal">Đóng</button>
        </div>
    </div>
</div>
<!-- End of Modal rating -->

<div class="halim-movie-wrapper tpl-2 info-movie">
	<div class="head ah-frame-bg">
		<div class="first">
			<img src="<?php echo halim_image_display('movie-thumb'); ?>" alt="<?= $the_title ?>">
		</div>
		<div class="last">
			<div class="name">
				<div>Tên</div>
				<div>
					<h1 class="movie_name"><?= $the_title ?></h1>
				</div>
			</div>
			<?php if(!empty($meta['halim_original_title'])) : ?>
				<div class="name_other">
					<div>Tên Khác</div>
					<div>
						<p class="org_title"><?= $meta['halim_original_title'] ?></p>
					</div>
				</div>
			<?php endif; ?>
			<div class="list_cate">
				<?php if (!empty($categories)): ?>
				<div>Thể Loại</div>
				<div>
					<?php foreach ($categories as $v): ?>
						<a href="<?= get_category_link( $v->term_id ) ?>" rel="category tag"><?= $v->name ?></a>
					<?php endforeach ?>
				</div>
				<?php endif; ?>
			</div>
			<div>
				<div>Tập mới nhất</div>
				<div>
					<span class="new-ep"><?= $halim_episode ?></span>
				</div>
			</div>
			<div>
				<div>Thông Tin Khác</div>
				<div>
					<?php
						if(has_term('', 'release')){
							$term_obj_list = get_the_terms($post->ID, 'release');
							$released = $term_obj_list[0];
							echo '<span class="released"><i class="hl-calendar"></i> <a href="'.home_url('/').$released->taxonomy.'/'.trim($released->slug).'" rel="tag">'.$released->name.'</a></span>';
						}

						if (!empty($runtime)) echo '<i class="hl-clock"></i> '.$runtime;
						if (!empty($imdb_rating)) echo '<i class="imdb-icon" data-rating="'.$imdb_rating.'"></i>';
					?>
				</div>
			</div>
			<div>
				<div>Đánh Giá</div>
				<div class="ratings_wrapper single-info">
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
		</div>
	</div>
	<div class="d-flex justify-content-between p-3 mb-3">
        <div class="d-flex justify-content-between">
            <a href="<?= $watch_url ?>" class="button-default bg-lochinvar" title="Xem tập mới nhất">
                <i class="fa-sharp fa-regular fa-circle-play"></i>Xem Phim 
			</a>
        </div>
        <div class="last">
			<?php if (in_array($post->ID, $list_movie_follow)): ?>
				<div id="follow-btn" class="button-default bg-lochinvar followed">
					<i class="fa-sharp fa-solid fa-bookmark"></i>
					<div class="follow-btn">Hủy Theo Dõi</div>
				</div>
			<?php else: ?>
				<div id="follow-btn" class="button-default bg-lochinvar">
					<i class="fa-sharp fa-solid fa-bookmark"></i>
					<div class="follow-btn">Theo Dõi</div>
				</div>
			<?php endif ?>
        </div>
    </div>
	<div class="filter-episode">
        <span>
            <i class="hl-search"></i> Tìm tập nhanh <i class="hl-angle-down"></i>
        </span>
        <span class="list-episode-filter" id="list_episode_filter">
            <input id="keyword-ep" name="q" type="text" autocomplete="off" placeholder="Nhập số tập">
        </span>
        <img id="loading-ep" style="display: none;" src="<?= get_stylesheet_directory_uri() ?>/assets/images/ajax-loader.gif">
        <div id="suggestions-ep" style="display: none;"></div>
    </div>
	<div id="halim-list-server" class="list-eps-ajax">
		<?php
            if(isEpisodePagenav($meta) || $episode_display == 'show_paging_eps') {
                HaLimCore_Helper::halim_episode_pagination($post->ID, $server, $episode, false);
            } elseif ($episode_display == 'show_tab_eps') {
                HaLimCore_Helper::halim_show_all_eps_table($post->ID, $server, $episode_slug);
            } else {
                HaLimCore_Helper::halim_show_all_eps_list($post->ID, $server, $episode_slug, true);
            }
        ?>
	</div>
	<?php if (!empty($showtime_text)): ?>
		<div class="halim_showtime_movies" style="text-transform: uppercase;">
			<p>
				<b>Lịch chiếu vào <?= $showtime_text ?></b>
			</p>
		</div>
	<?php endif ?>
	<div class="entry-content htmlwrap clearfix">
        <div class="section-title">
            <span>Nội dung</span>
        </div>
        <div class="video-item halim-entry-box">
			<article id="post-<?php echo $post->ID; ?>" class="item-content <?php echo cs_get_option('post_content_display_detail_page') == 'visible' ? 'toggled' : ''; ?>">
                <?php the_content(); ?>
             </article>
             <div class="item-content-toggle">
                <span class="show-more" data-single="true" data-showmore="<?php _e('Show more', 'halimthemes'); ?>..." data-showless="<?php _e('Show less', 'halimthemes'); ?>..."><?php $txt = cs_get_option('post_content_display_detail_page') == 'visible' ? 'Show less' : 'Show more';  _e($txt, 'halimthemes'); ?>...</span>
            </div>
        </div>
    </div>
</div>
<script>
	jQuery(function($) {
		$('body').on('click', '.halim-rating-button', function(e) {
			$('.movie-rating-modal-overlay').addClass('active');
		});

		$('body').on('click', '.close-modal', function(e) {
			$('.movie-rating-modal-overlay').removeClass('active');
		});

		$('body').on("click", ".movie-rating-rating-option", function() {
			$('.movie-rating-rating-option').removeClass('selected');       
			$(this).addClass('selected');       
		});

		$('body').on("click", "#submitRatingBtn", function() {
			let selectedOption = $('.movie-rating-rating-option.selected');
			let totalVote = $('.total-vote').text();

			if (selectedOption.length === 0) {
				createToast({
					type: "warning",
					text: "Vui lòng chọn một đánh giá trước khi gửi."
				});
				return false;
			}

	        return $.post(halim_rate.ajaxurl, {
	            action: "halim_rate_post",
	            nonce: halim_rate.nonce,
	            post: '<?= $post->ID ?>',
	            value: selectedOption.attr('data-value'),
	        },
	        function(data){
				if(data !== 'Voted'){
					$(".total-rating").html(data);
					$(".total-vote").html(parseInt(totalVote) + 1);
					createToast({
						type: "success",
						text: halim_rate.your_rating
					});
					$('.movie-rating-modal-overlay').removeClass('active');
				} else {
					createToast({
						type: "info",
						text: 'Bạn đã đánh giá phim này rồi!'
					});
				}
	        }, "html"), !1
	    });

		$('body').on("input", "#keyword-ep", function() {
			let keyword = $(this).val().trim();
			
			if (keyword.length <= 0) {
				console.log(1);
				$('#halim-list-server .halim-list-eps .halim-episode').show();
				return false;
			}
			console.log(2);
			$('#halim-list-server .halim-list-eps .halim-episode').each(function() {
				let ep = $(this).find('span').html();

				if (ep.indexOf(keyword) !== -1) {
					$(this).show();
				}
				else {
					$(this).hide();
				}
			});
	    });

		$('body').on("click", "#follow-btn", function() {
			if (halim.is_logged_in != '1') {
				createToast({
					type: "error",
					text: "Vui lòng đăng nhập để theo dõi phim!"
				});
				return;
			}

			$.ajax({
				url: halim_rate.ajaxurl,
				type: "POST",
				data: {
					action: "halim_follow_movie",
					nonce: halim_rate.nonce,
					post_id: '<?= $post->ID ?>'
				},
				success: function(rs) {
					console.log(rs);
					console.log(rs.data.action);
					if (rs.success) {
						if (rs.data.action == 'follow') {
							$('#follow-btn').addClass('followed');
							$('.follow-btn').text('Hủy Theo Dõi');
							createToast({
								type: "success",
								text: "Bạn đã theo dõi phim này!"
							});
						}
						else {
							$('#follow-btn').removeClass('followed');
							$('.follow-btn').text('Theo Dõi');
							createToast({
								type: "success",
								text: "Bạn đã bỏ theo dõi phim này!"
							});
						}
					}
					else {
						createToast({
							type: "error",
							text: "Có lỗi, vui lòng thử lại"
						});
					}
				}
			});
	    });
	})
</script>
<?php do_action('halim_after_single_content', $post->ID); ?>

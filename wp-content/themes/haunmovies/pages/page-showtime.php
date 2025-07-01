<?php

	/**
	* Template Name: Lịch chiếu
	*/
	get_header();

	$showtime = [
		'sun' => 'Chủ Nhật',
		'mon' => 'Thứ Hai',
		'tue' => 'Thứ Ba',
		'wed' => 'Thứ Tư',
		'thu' => 'Thứ Năm',
		'fri' => 'Thứ Sáu',
		'sat' => 'Thứ Bảy',
	];
	$day = isset($_GET['day']) ? $_GET['day'] : 'sun';
?>
<style>
	.page-showtime {
		margin-top: 16px;
	}

	.page-title {
		display: block;
		margin: 0 auto;
    	width: max-content;
		font-size: 28px;
		font-weight: 700;
		color: #f5f5f5;
		text-transform: uppercase;
		letter-spacing: 1px;
		position: relative;
		padding: 10px 25px;
		background: linear-gradient(135deg,#252525,#1c1c1c);
		border-radius: 12px;
		box-shadow: 0 4px 15px rgba(0,0,0,.3);
		border: 1px solid rgba(255,255,255,.08);
	}

	.page-title i {
		color: #00c6ff;
		margin-right: 12px;
		font-size: 24px;
		vertical-align: middle;
	}

	.page-title:after {
		content: "";
		position: absolute;
		bottom: -3px;
		left: 10%;
		width: 80%;
		height: 3px;
		background: linear-gradient(135deg,#00c6ff,#0ac2c2);
		background-size: 200% 200%;
		border-radius: 3px;
	}

	.day-tabs {
		display: flex;
		justify-content: center;
		gap: 12px;
		flex-wrap: wrap;
		margin-bottom: 25px;
		background: var(--gradient-card);
		padding: 18px;
		border-radius: 12px;
		border: 1px solid var(--border-light);
		box-shadow: var(--shadow-soft);
		position: relative;
		overflow: hidden;
		margin-top: 24px;
	}

	.day-tabs:after {
		content: "";
		position: absolute;
		top: 0;
		left: 0;
		width: 200%;
		height: 100%;
		background: linear-gradient(
			90deg,
			#fff0 0%,
			rgb(255 255 255/0.05) 50%,
			#fff0 100%
		);
		animation: shimmer var(--shimmer-speed) infinite;
		pointer-events: none;
	}

	.day-tab {
		flex: 0 0 100px;
		padding: 12px;
		text-align: center;
		cursor: pointer;
		background: var(--gradient-item);
		border-radius: 8px;
		border: 2px solid #fff0;
		font-size: 14px;
		font-weight: 500;
		color: var(--text-secondary);
		position: relative;
		overflow: hidden;
		transition: all var(--transition-speed) ease;
		min-width: 90px;
		z-index: 1;
	}

	.day-tab:before {
		content: "";
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: var(--gradient-primary);
		opacity: 0;
		border-radius: 6px;
		transition: opacity var(--transition-speed) ease;
		z-index: -1;
	}

	.day-tab.active {
		border-color: var(--primary-color);
		color: var(--text-primary);
		font-weight: 600;
		transform: translateY(-2px);
		box-shadow: 0 4px 12px var(--glow-primary);
	}

	.day-tab.active:before {
		opacity: 0.15;
	}

	.day-tab:hover:not(.active) {
		border-color: var(--primary-color);
		box-shadow: 0 4px 12px var(--glow-primary);
		transform: translateY(-2px);
		color: var(--text-primary);
	}

	.day-tab:hover:not(.active):before {
		opacity: 0.1;
	}

	.schedule-grid {
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
		gap: 20px;
		padding: 30px;
		background: var(--gradient-card);
		border-radius: 15px;
		border: 1px solid var(--border-light);
		box-shadow: var(--shadow-strong);
		position: relative;
		overflow: hidden;
	}

	.schedule-grid:after {
		content: "";
		position: absolute;
		top: 0;
		left: 0;
		width: 200%;
		height: 100%;
		background: linear-gradient(
			90deg,
			#fff0 0%,
			rgb(255 255 255/0.03) 50%,
			#fff0 100%
		);
		animation: shimmer var(--shimmer-speed) infinite;
		pointer-events: none;
	}

	.schedule-grid .schedule-item {
		display: flex;
		gap: 15px;
		padding: 15px;
		background: var(--gradient-item);
		border-radius: 10px;
		border: 1px solid var(--border-light);
		text-decoration: none;
		color: var(--text-primary);
		transition: all var(--transition-speed) ease;
		position: relative;
		overflow: hidden;
		z-index: 1;
	}

	.schedule-grid .schedule-item:before {
		content: "";
		position: absolute;
		top: 0;
		left: -100%;
		width: 100%;
		height: 100%;
		background: linear-gradient(
			90deg,
			transparent,
			rgb(0 198 255/0.1),
			transparent
		);
		transition: left 0.8s ease;
		z-index: 0;
	}

	.schedule-grid .schedule-item:hover {
		transform: translateY(-5px);
		border-color: var(--secondary-color);
		box-shadow: 0 8px 25px var(--glow-secondary);
	}

	.schedule-grid .schedule-item:hover:before {
		left: 100%;
	}

	.schedule-grid .schedule-item img {
		width: 65px;
		height: 90px;
		object-fit: cover;
		border-radius: 8px;
		z-index: 1;
		transition: all var(--transition-speed) ease;
		border: 2px solid #fff0;
	}

	.schedule-grid .schedule-item:hover img {
		border-color: var(--secondary-color);
		box-shadow: 0 0 15px rgb(255 62 111/0.4);
	}

	.schedule-grid .schedule-info {
		flex: 1;
		display: flex;
		flex-direction: column;
		justify-content: center;
		z-index: 1;
	}

	.schedule-grid .schedule-title {
		margin: 0;
		font-size: 16px;
		font-weight: 600;
		color: var(--text-primary);
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		overflow: hidden;
		transition: color var(--transition-speed) ease;
	}

	.schedule-grid .schedule-item:hover .schedule-title {
		color: var(--primary-color);
	}

	.schedule-grid .schedule-episode {
		color: var(--text-muted);
		font-size: 13px;
		margin-top: 8px;
		display: flex;
		align-items: center;
		gap: 6px;
	}

	.schedule-grid .schedule-episode i {
		font-size: 12px;
		color: var(--primary-color);
		transition: color var(--transition-speed) ease;
	}

	.schedule-grid .schedule-episode span {
		color: var(--primary-color);
		font-weight: 600;
		transition: color var(--transition-speed) ease;
	}

	.schedule-grid .schedule-item:hover .schedule-episode i,
	.schedule-grid .schedule-item:hover .schedule-episode span {
		color: var(--secondary-color);
	}

	@media (max-width: 1024px) {
		.schedule-grid {
			grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
			padding: 25px;
		}

		.page-title {
			font-size: 24px;
		}
	}

	@media (max-width: 767px) {
		.page-title {
			font-size: 20px;
			padding: 8px 15px;
		}

		.page-title i {
			font-size: 18px;
		}

		.day-tabs {
			padding: 12px;
			gap: 8px;
		}

		.day-tab {
			flex: 0 0 calc(25% - 8px);
			padding: 10px 8px;
			font-size: 13px;
			min-width: 70px;
		}

		.schedule-grid {
			grid-template-columns: 1fr;
			padding: 15px;
			gap: 15px;
		}

		.schedule-grid .schedule-item  {
			padding: 12px;
			gap: 12px;
		}

		.schedule-grid .schedule-item img {
			width: 55px;
			height: 75px;
		}

		.schedule-grid .schedule-title {
			font-size: 14px;
		}
	}
</style>
<main id="main-contents" class="col-xs-12 col-sm-12 col-md-8 page-showtime">
	<?php if ( is_active_sidebar( 'halim-ad-above-category' ) ) { ?>
	    <div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
	        <?php dynamic_sidebar( 'halim-ad-above-category' ); ?>
	    </div>
	<?php } ?>
	<section>
		<h1 class="page-title"> <i class="fas fa-film"></i> Lịch Chiếu</h1>
		<div class="day-tabs">
			<?php foreach ($showtime as $k => $v): ?>
				<a href="/lich-chieu?day=<?= $k ?>" class="day-tab <?= $k == $day ? 'active' : '' ?>"><?= $v ?></a>
			<?php endforeach; ?>
		</div>
		<div class="halim_box">
		<?php
			$args = array(
				'post_type'			=> 'post',
				'post_status' 		=> 'publish',
				'meta_query'     => array(
					array(
						'key'     => 'halim_showtime_movies',
						'value'   => $day,
						'compare' => 'LIKE',
					),
				),
			);

			$wp_query = new WP_Query( $args );
			$number = 1;

			?>
			<div class="schedule-grid" id="scheduleGrid">
			<?php
				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
					global $post;

					$meta = get_post_meta($post->ID, '_halim_metabox_options', true );
					$post_title = $post->post_title;
				?>
					<a href="<?= $post->guid ?>" class="schedule-item">
						<img src="<?= $meta['halim_thumb_url'] ?>" alt="<?= $post_title ?>" loading="lazy">
						<div class="schedule-info">
							<h3 class="schedule-title"><?= $post_title ?></h3>
							<div class="schedule-episode">
								<i class="fas fa-film"></i>
								<span><?= $meta['halim_episode'] ?></span>
							</div>
						</div>
					</a>
				<?php endwhile; wp_reset_postdata(); endif; ?>
			</div>
		</div>
	</section>
	<?php if ( is_active_sidebar( 'halim-ad-below-category' ) ) { ?>
	    <div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
	        <?php dynamic_sidebar( 'halim-ad-below-category' ); ?>
	    </div>
	<?php } ?>
</main>
<?php get_sidebar(); get_footer(); ?>
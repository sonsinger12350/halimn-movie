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
	$day = isset($_GET['day']) ? $_GET['day'] : strtolower(date('D'));
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

	.early-schedule {
		margin-bottom: 30px;
		padding: 25px;
		background: var(--gradient-card);
		border-radius: 15px;
		border: 1px solid var(--border-light);
		box-shadow: var(--shadow-strong);
		display: none;
		position: relative;
		overflow: hidden
	}

	.early-schedule.active {
		display: block
	}

	.early-schedule:after {
		content: "";
		position: absolute;
		top: 0;
		left: 0;
		width: 200%;
		height: 100%;
		background: linear-gradient(90deg,#fff0 0%,rgb(255 255 255/.03) 50%,#fff0 100%);
		animation: shimmer var(--shimmer-speed) infinite;
		pointer-events: none
	}

	.early-schedule h2 {
		text-align: center;
		margin-bottom: 25px;
		font-size: 22px;
		color: var(--accent-gold);
		text-transform: uppercase;
		position: relative;
		display: inline-block;
		left: 50%;
		transform: translateX(-50%);
		padding-bottom: 10px
	}

	.early-schedule h2:after {
		content: "";
		position: absolute;
		bottom: 0;
		left: 10%;
		width: 80%;
		height: 2px;
		background: var(--gradient-secondary);
		background-size: 200% 200%;
		animation: borderShimmer 5s ease infinite;
		border-radius: 2px
	}

	.early-schedule h2 i {
		margin-right: 10px;
		font-size: 20px;
		vertical-align: middle;
		color: var(--accent-gold)
	}

	.early-schedule .schedule-items {
		display: grid;
		gap: 20px;
		position: relative;
		z-index: 1
	}

	.early-schedule .schedule-item {
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
		margin-bottom: 0
	}

	.early-schedule .schedule-item:before {
		content: '';
		position: absolute;
		top: 0;
		left: -100%;
		width: 100%;
		height: 100%;
		background: linear-gradient(90deg,transparent,rgb(0 198 255/.1),transparent);
		transition: left .8s ease;
		z-index: 0
	}

	.early-schedule .schedule-item:hover {
		transform: translateY(-5px);
		border-color: var(--secondary-color);
		box-shadow: 0 8px 25px var(--glow-secondary)
	}

	.early-schedule .schedule-item:hover:before {
		left: 100%
	}

	.early-schedule .schedule-item img {
		width: 65px;
		height: 90px;
		object-fit: cover;
		border-radius: 8px;
		z-index: 1;
		transition: all var(--transition-speed) ease;
		border: 2px solid #fff0
	}

	.early-schedule .schedule-item:hover img {
		border-color: var(--secondary-color);
		box-shadow: 0 0 15px rgb(255 62 111/.4)
	}

	.early-schedule .schedule-info {
		flex: 1;
		display: flex;
		flex-direction: column;
		justify-content: center;
		z-index: 1
	}

	.early-schedule .schedule-title {
		margin: 0;
		font-size: 16px;
		font-weight: 600;
		color: var(--text-primary);
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		overflow: hidden;
		transition: color var(--transition-speed) ease
	}

	.early-schedule .schedule-item:hover .schedule-title {
		color: var(--primary-color)
	}

	.early-schedule .schedule-episode {
		color: var(--text-muted);
		font-size: 13px;
		margin-top: 8px;
		display: flex;
		align-items: center;
		gap: 6px
	}

	.early-schedule .schedule-episode i {
		font-size: 12px;
		color: var(--primary-color);
		transition: color var(--transition-speed) ease
	}

	.early-schedule .schedule-episode span {
		color: var(--primary-color);
		font-weight: 600;
		transition: color var(--transition-speed) ease
	}

	.early-schedule .schedule-item:hover .schedule-episode i,.early-schedule .schedule-item:hover .schedule-episode span {
		color: var(--secondary-color)
	}

	.early-time-sticker {
		position: absolute;
		top: -10px;
		left: -10px;
		background: var(--accent-gold);
		color: #000;
		padding: 6px 12px;
		border-radius: 0 8px 8px 0;
		font-size: 14px;
		font-weight: 700;
		z-index: 3;
		transform: rotate(-10deg);
		box-shadow: 0 4px 8px rgb(0 0 0/.3);
		text-shadow: 0 1px 1px rgb(255 255 255/.3)
	}

	@media (max-width: 1024px) {
		.schedule-grid {
			grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
			padding: 25px;
		}

		.page-title {
			font-size: 24px;
		}

		.early-schedule {
			padding: 20px
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

		.early-schedule {
			padding: 15px
		}

		.early-schedule h2 {
			font-size: 18px;
			margin-bottom: 20px
		}

		.early-schedule .schedule-items {
			grid-template-columns: 1fr!important
		}

		.schedule-grid {
			grid-template-columns: 1fr;
			padding: 15px;
			gap: 15px;
		}

		.schedule-grid .schedule-item,.early-schedule .schedule-item {
			padding: 12px;
			gap: 12px
		}

		.schedule-grid .schedule-item img,.early-schedule .schedule-item img {
			width: 55px;
			height: 75px
		}

		.schedule-grid .schedule-title,.early-schedule .schedule-title {
			font-size: 14px
		}

		.early-time-sticker {
			top: -8px;
			left: -8px;
			padding: 4px 8px;
			font-size: 12px
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
				<a href="javascript:void(0)" data-day="<?= $k ?>" class="day-tab <?= $k == $day ? 'active' : '' ?>"><?= $v ?></a>
			<?php endforeach; ?>
		</div>
		<div class="halim_box">
			<?= show_showtime_movies($day); ?>
		</div>
	</section>
	<?php if ( is_active_sidebar( 'halim-ad-below-category' ) ) { ?>
	    <div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
	        <?php dynamic_sidebar( 'halim-ad-below-category' ); ?>
	    </div>
	<?php } ?>
</main>
<?php get_sidebar(); get_footer(); ?>
<script>
	$('body').on('click', '.day-tab', function() {
		let btn = $(this);
		let day = btn.attr('data-day');
		
		$.ajax({
			url: halim.ajax_url,
			type: "POST",
			data: {
				action: "halim_get_showtime_movies",
				nonce: '<?= wp_create_nonce('halim_get_showtime_movies'); ?>',
				day: day
			},
			success: function(rs) {
				if (rs.success) {
					$('.day-tab.active').removeClass('active');
					btn.addClass('active');

					$('.halim_box').fadeOut(300, function() {
						$(this).html(rs.data.content).fadeIn(300);
					});
				}
				else {
					createToast({
						type: "error",
						text: rs.message
					});
				}
			}
		});
	});
</script>
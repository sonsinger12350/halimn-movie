<?php

	/**
	* Template Name: Top 10 lượt xem
	*/
	get_header();

	$list_type = array(
		'day' => [
			'key' => 'halim_view_post_day',
			'title' => 'Ngày',
		],
		'week' => [
			'key' => 'halim_view_post_week',
			'title' => 'Tuần',
		],
		'mon' => [
			'key' => 'halim_view_post_mon',
			'title' => 'Tháng',
		],
		'all' => [
			'key' => 'halim_view_post_all',
			'title' => 'Tất cả',
		],
	);
	$type = isset($_GET['type']) ? $_GET['type'] : 'day';
?>
<style>
	.grid-item .number {
		position: absolute;
		left: 0;
		top: 0;
		text-align: center;
		width: 44px;
		height: 53px;
		color: #fff;
		font-size: 18px;
		background: url('/wp-content/themes/haunmovies/assets/images/mod-num-icon.webp') no-repeat 0 0;
	}

	.grid-item .number.top-1 {
    	background-position: -50px 0;
	}

	.grid-item .number.top-2 {
    	background-position: -100px 0;
	}

	.grid-item .number.top-3 {
    	background-position: -150px 0;
	}

	.top-view-movie .nav-pills li a {
		padding: 5px 10px;
		background: #23232a;
		margin: 1px;
		color: #fff;
		font-weight: 600;
		font-size: 16px;
		line-height: 1em;
		text-transform: uppercase;
		line-height: 1.3;
	}

	.top-view-movie .nav-pills li.active a {
		background: linear-gradient(140deg, rgba(0, 77, 102, .8) 0%, rgba(0, 134, 179, .9) 50%, rgba(0, 191, 255, 1) 100%);
	}

	@media (max-width: 767px) {
		.nav-justified>li {
			float: left !important;
		}
	}

	@media (max-width: 350px) {
		.top-view-movie .nav-pills li a {
			padding: 5px 8px;
			font-size: 15px;
		}
	}
</style>
<main id="main-contents" class="col-xs-12 col-sm-12 col-md-8 top-view-movie">
	<?php if ( is_active_sidebar( 'halim-ad-above-category' ) ) { ?>
	    <div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
	        <?php dynamic_sidebar( 'halim-ad-above-category' ); ?>
	    </div>
	<?php } ?>
	<section>
			<div class="section-bar clearfix">
			   <h3 class="section-title">
					<span><?php _e('Top 10 lượt xem', 'halimthemes') ?></span>
			   </h3>
			</div>
			<ul class="nav nav-pills nav-justified">
				<?php foreach ($list_type as $k => $v): ?>
					<li role="presentation" data-type="<?= $k ?>" class="<?= $k == $type ? 'active' : '' ?>">
						<a href="/top-10?type=<?= $k ?>"><?= $v['title'] ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
			<div class="halim_box">
			<?php
				$args = array(
					'post_type'			=> 'post',
					'posts_per_page' 	=> 10,
					'post_status' 		=> 'publish',
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key'   => $list_type[$type]['key']
						),
					)
				);

				$wp_query = new WP_Query( $args );
				$number = 1;

				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
					global $post;

					$meta = get_post_meta($post->ID, '_halim_metabox_options', true );
					$post_title = $post->post_title;
				?>
					<article class="col-md-3 col-sm-4 col-xs-6 thumb grid-item">
						<div class="halim-item">
							<a class="halim-thumb" href="<?= $post->guid ?>" title="<?= $post_title ?>">
								<figure>
									<img class="lazyload blur-up img-responsive" data-sizes="auto" data-src="<?= get_the_post_thumbnail_url( $post->ID, 'medium' ); ?>" alt="<?= $post_title ?>" title="<?= $post_title ?>">
									<span class="number <?= $number <=3 ? 'top-'.$number : ''?>"><?= $number ?></span>
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
				$number++;
				endwhile;
				wp_reset_postdata();
				endif; ?>
			</div>
		<div class="clearfix"></div>
	</section>
	<?php if ( is_active_sidebar( 'halim-ad-below-category' ) ) { ?>
	    <div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
	        <?php dynamic_sidebar( 'halim-ad-below-category' ); ?>
	    </div>
	<?php } ?>
</main>
<?php get_sidebar(); get_footer(); ?>
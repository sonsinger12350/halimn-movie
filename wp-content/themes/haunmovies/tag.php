<?php get_header();?>
<main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
	<section>
		<?php if ( is_active_sidebar( 'halim-ad-above-category' ) ) { ?>
		    <div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
		        <?php dynamic_sidebar( 'halim-ad-above-category' ); ?>
		    </div>
		<?php } ?>
		<div class="section-bar clearfix">
		   <h3 class="section-title"><span><?php echo single_tag_title() ?></span></h3>
		</div>
		<div class="halim_box">
			<?php
			if(have_posts()): while(have_posts()): the_post();
				show_movie_in_loop();
			endwhile;?>
		</div>
		<div class="clearfix"></div>
		<?php halim_pagination(); ?>
		<?php endif;?>
		<?php if ( is_active_sidebar( 'halim-ad-below-category' ) ) { ?>
		    <div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
		        <?php dynamic_sidebar( 'halim-ad-below-category' ); ?>
		    </div>
		<?php } ?>
	</section>
</main>
<?php get_sidebar(); get_footer(); ?>
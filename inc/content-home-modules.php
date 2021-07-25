<?php
  // HOME main

  global $post;

  $template_url = get_template_directory_uri();
  $this_post_id = get_the_ID();
  $this_page_id = get_the_ID();
  $sidebar = get_field('show_sidebar_on_page', $this_post_id);

 ?>

 <?php if( have_rows('home_banners') ): ?>
 	<div id="section--home-slider" class="container-fluid no-pad">
 				<?php
 					while( have_rows('home_banners') ): the_row();
 		    		$image = get_sub_field('image');
 		    	?>
          <div class="row no-gutters slick-slide">
   					<div class="slide-left col-12 col-xs-12 col-md-7 col-lg-7 col-xl-5" style="background-image: url('<?php echo $template_url; ?>/inc/assets/img/home-news-bg.png'); ">
   						<div class="home-slider-left">
   							<h1 class="slider-heading" role="heading"><?php the_sub_field('heading'); ?></h1>
   							<div class="slider-intro" role="description"><?php the_sub_field('text'); ?></div>
                <?php
                      $button_link = get_sub_field('button_link');
                      $button_link_url = $button_link['url'];
                ?>
   							<a class="slider-button" role="link button" href="<?php echo $button_link_url; ?>"><?php the_sub_field('button_text'); ?> &nbsp; <i class="far fa-long-arrow-right"></i></a>
   						</div>
   					</div>
   					<div class="slide-right col-12 col-xs-12 col-md-5 col-lg-5 col-xl-7" style="background-image:url('<?php echo esc_url($image['url']); ?>');">
   						<div class="home-slider-right">
   							<!-- <img src="" alt="<?php echo esc_attr($image['alt']); ?>"/> -->
   						</div>
   					</div>
          </div>
 	    	<?php endwhile; ?>

 	</div>
 <?php endif; ?>


<?php if( have_rows('home_modules') ): ?>
    <?php while( have_rows('home_modules') ): the_row(); ?>
        <?php if ( get_row_layout() == 'home_news_tabs' ) { ?>
            <?php require get_template_directory() . '/inc/content-home-module-tabs.php'; ?>
        <?php } ?>
        <?php if ( get_row_layout() == 'home_microsites' ) { ?>
          <?php require get_template_directory() . '/inc/content-home-module-microsites.php'; ?>
        <?php } ?>
        <?php if ( get_row_layout() == 'home_custom_grid' ) { ?>
          <?php require get_template_directory() . '/inc/content-home-module-grid.php'; ?>
        <?php } ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php
/**
 * The template for displaying all pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

	get_header();

	$template_url = get_template_directory_uri();
	$this_post_id = get_the_ID();
	$this_page_id = get_the_ID();
	$sidebar = get_field('show_sidebar_on_page', $this_post_id);

	$page_top_background = get_field('page_top_background', 'options');
  $page_bottom_background  = get_field('page_bottom_background', 'options');

	$post_type_name = get_post_type( $ths_post_id );

	// If is QRG Download ...
	if ( get_field ('service_type_link', $this_page_id) ) {
		$redirect_download = get_field('service_type_link');
		wp_redirect($redirect_download['url']);
    exit();
	}
	if ( get_field ('service_type_link', $this_page_id) ) {
		$redirect_download = get_field('service_type_download');
		wp_redirect($redirect_download['url']);
    exit();
	}

?>


<?php while ( have_posts() ) : the_post(); ?>

	<div id="single-page-bg" style="background-image: url('<?php echo $page_top_background['url']; ?>'), url('<?php echo $page_bottom_background['url']; ?>');">


	<div id="single-page-header" class="body">
		<div class="container no-pad">
			<div class="row no-gutters">
				<div class="inner">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>

	<div id="single-page-content" <?php post_class(''); ?>>

		<div id="breadcrumbs" class="breadcrumbs body">
			<div class="container-fluid pad-1">
				<?php the_breadcrumb(); ?>
			</div>
		</div>

		<div class="container-fluid no-pad content-inner">
			<div class="row">
				<?php if (!$sidebar) { ?>
					<div class="main-content col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="inner-container print" itemprop="description">

							<?php require get_template_directory() . '/inc/custom-banner-header.php' ; 	// top banner ?>

							<?php require get_template_directory() . '/inc/content-std-page.php' ; 			// regular page content ?>

							<?php // begin dynamic contents
										require get_template_directory() . '/inc/content-dynamic.php'; 						// - QRGs
							?>


						</div>

          </div>

        <?php } else { ?>

					<div class="main-content col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
						<div class="inner-container print" itemprop="description">

							<?php require get_template_directory() . '/inc/custom-banner-header.php' ; 	// top banner ?>

							<?php require get_template_directory() . '/inc/content-std-page.php' ; 			// regular page content ?>

							<?php // begin dynamic contents
										require get_template_directory() . '/inc/content-dynamic.php'; 						// - QRGs
							?>

						</div>
					</div>

					<div class="sidebar-content col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
						<?php get_sidebar(); ?>
					</div>

				<?php } ?>

			</div>
		</div>

	</div>


	<?php if( have_rows('dynamic_page_content', $this_page_id) ): ?>
	<?php while ( have_rows('dynamic_page_content', $this_page_id) ) : the_row(); ?>

	   <?php if ( get_row_layout() == 'grid_of_items_customisable' ) : ?>
			 <?php if ( get_sub_field('use_separator') ) : ?>
				 <div class="single-page-content" <?php post_class(); ?> >
					 <div class="container-fluid no-pad content-inner">
			 			<div class="row">
		 					<div class="main-content col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		 						<div class="inner-container">
	      					<?php require get_template_directory() . '/inc/content-dynamic-grid-custom.php'; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			 <?php endif; ?>
		 <?php endif; ?>

	<?php endwhile; ?>
	<?php endif; ?>


</div>

<?php endwhile; ?>

<?php
get_footer();

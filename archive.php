<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

 $page_top_background = get_field('page_top_background', 'options');
 $page_bottom_background  = get_field('page_bottom_background', 'options');

get_header(); ?>


<?php
  $template_url = get_template_directory_uri();
?>

	<div id="single-page-bg" style="background-image: url('<?php echo $page_top_background['url']; ?>'), url('<?php echo $page_bottom_background['url']; ?>');">

	<div id="single-page-header" class="body">
		<div class="container no-pad">
			<div class="row no-gutters">
				<div class="inner">
					<h1 style="text-transform: capitalize;">
						<?php echo single_cat_title(''); ?>
					</h1>
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

        <div class="main-content col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="inner-container print" style="padding-bottom:70px;">

            <?php	if ( have_posts() ) : ?>

						<div class="row no-gutters">

							<?php	while ( have_posts() ) : the_post(); ?>

									<div class="grid-card-wrap col-6 col-sm-6 col-xs-6 col-md-6 col-lg-3 col-xl-3">
										<?php require get_template_directory() . '/inc/content-dynamic-single-grid-item.php'; ?>
									</div>

							<?php	endwhile; ?>

						</div>

						<?php the_posts_navigation();
						endif; ?>

					</div>
				</div>

				</div>
			</div>
	</div>
</div>

<?php
get_footer();

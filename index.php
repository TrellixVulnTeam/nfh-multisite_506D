<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>


<?php
  $template_url = get_template_directory_uri();
?>

<div id="single-page-bg" style="background-image: url('<?php echo $template_url; ?>/inc/assets/img/page-banner-bg.png'), url('<?php echo $template_url; ?>/inc/assets/img/page-lower-bg.png');">

	<div id="single-page-header" class="body">
		<div class="container no-pad">
			<div class="row no-gutters">
				<div class="inner">
					<h1>
						<?php echo the_title(); ?>
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

								<?php the_content(); ?>

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

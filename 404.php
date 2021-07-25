<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
					<h1>Page Not Found</h1>
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
            <h2>
              Page is not available
            </h2>
            <p style="padding-bottom:50px;">
              Unfortunately we couldn't find the page you were looking for. This may be caused by a broken or missing link. <BR /><BR />
              <a href="<?php echo site_url(); ?>">Click here to return to the Home page.</a>
            </p>
          </div>
        </div>

      </div>
    </div>

  </div>

</div>



<?php
get_footer();

<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					<h1>
						<?php printf( esc_html__( 'Searching:  %s', 'wp-bootstrap-starter' ), '<span>' . get_search_query() . '</span>' ); ?>
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

							<?php
							while ( have_posts() ) : the_post(); ?>
                 <a class="search-result" href="<?php the_permalink(); ?>">
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                    <p>
                    <?php
                      if (get_field('excerpt')) {
                        the_field('excerpt');
                      } else {
                        echo 'No excerpt';
                        //echo strip_tags(get_the_content());
                      }
                      ?>
                    </p>
                    <p>
                      Published on: <?php echo get_the_date(); ?>
                    </p>
                 </a>
							<?php
							endwhile; ?>

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

<?php
/**
 * Template Name: Home Page
 *
 * The template for displaying all pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header();

	$template_url = get_template_directory_uri();
	$this_post_id = get_the_ID();
	$sidebar = get_field('show_sidebar_on_page', $this_post_id);

?>

<?php require get_template_directory() . '/inc/content-home-modules.php'; ?>

<?php
get_footer();

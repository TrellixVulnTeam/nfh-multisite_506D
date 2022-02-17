<?php
/**
 * Custom template not in use -- was for testing API
 *
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>





<div style="padding:100px 50px;">




									<?php
									$request = file_get_contents('https://nfh.grindstone.dev/wp-json/wp/v2/posts?per_page=5');
									$json_decoded_request = json_decode( $request );
									foreach( $json_decoded_request as $apipost ) { ?>

											<h1>
												<?php echo $apipost->title->rendered; ?>
											</h1>

											<p>
												<?php
													if (!$apipost->content) {
														echo $apipost->content->rendered;
													}
												?>
											</p>

									<?php } ?>




</div>





<?php
get_footer();

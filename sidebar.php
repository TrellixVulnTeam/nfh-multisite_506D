<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

	global $post;
	$post_id = $post->ID;
	$post_type_name = get_post_type( $post_id );
	$hiderelated = get_field('hide_related_links');
	$showevents = get_field('show_related_events');

?>

<aside id="secondary" class="sidebar widget-area" role="complementary">

	<?php // top print/share
	 if (get_field('show_print_on_page', $post_id)) { ?>
		<div id="sidebar--top" class="top--btns sidebar--top" style="position:relative;">
			<div id="btn-print" class="btn-print btn" onclick="window.print();return false;" />
				<i class="fas fa-print"></i> &nbsp; Print this <?php echo $post_type_name; ?>
			</div>
			<div id="btn-share" class="btn-share btn">
				<i class="fas fa-share"></i> &nbsp; Share this <?php echo $post_type_name; ?>
			</div>
			<div id="share-box" style="display:none; padding:20px 5px 0; text-align: center; line-height: 2.7;">
				<?php echo do_shortcode('[addtoany]'); ?>
			</div>
		</div>
	<?php } ?>

	<?php
		$terms = get_the_terms( get_the_ID(), 'departments' );
		if ( $terms && !is_wp_error( $terms ) ) : ?>
		<div class="sidebar sidebar--related related related-depts">
			<ul class="boxed">
				<?php
		  	foreach ( $terms as $term ) {
					$dept_name = $term->name;
					$dept_slug = $term->slug;
					$dept_link = esc_url( home_url( '' )) . '/departments/' . $dept_slug;
					?>
					<li>
						<a href="<?php echo $dept_link; ?>">
							<?php echo $term->name; ?>
						</a>
					</li>
			<?php } ?>
		</div>
	<?php endif; ?>


	<?php // if sub pages OR child pages
	if (get_field('show_sub_pages', $post_id)) { ?>
		<?php
			$children = wp_list_pages( 'title_li=&child_of='.$post->ID.'&echo=0&depth=1' );
			if ( $children) : ?>
				<div id="sidebar--subpages" class="sub-pages">
			    <ul class="boxed">
			        <?php echo $children; // <li> output ?>
			    </ul>
				</div>
			<?php endif; ?>
	<?php } ?>
	<?php if (get_field('show_sibling_pages', $post_id)) { ?>
	<div id="sidebar--subpages" class="sub-pages">
		<?php
			$children = wp_list_pages( 'title_li=&child_of='.$post->post_parent.'&echo=0&depth=1' );
			if ( $children) : ?>
		    <ul class="boxed">
		        <?php echo $children; // <li> output ?>
		    </ul>
			<?php endif; ?>
	</div>
	<?php } ?>

	<?php  // if  CUSTOM LINKS
	if ( get_field('add_custom_links') ) { ?>
			<div class="sidebar--subpages sidebar--custom-links custom-links">
				<?php if( get_field('heading_customlinks') ) { ?>
					<h3><?php the_field('heading_customlinks'); ?></h3>
				<?php }	?>

				<?php if( have_rows('links') ): ?>
					<?php while( have_rows('links') ): the_row();
							$link = get_sub_field('link');
							$link_url = $link['url'];
							$link_title = $link['title'];
						?>
						<ul class="boxed">
				        <li>
									<a href="<?php echo $link_url; ?>" title="<?php echo $link_title; ?>">
										   <?php echo $link_title; ?>
									</a>
								</li>
						</ul>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
	<?php }  ?>

	<?php if( have_rows('sidebar_additional_content') ): ?>
		<?php while( have_rows('sidebar_additional_content') ): the_row(); ?>
			<?php if( get_row_layout() == 'sidebar_related_information' ): ?>
				<?php if (get_sub_field('text_area')) : ?>
					<div class="sidebar--related related related-info">
						<h3>Related Information</h3>
						<?php the_sub_field('text_area'); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>

  <?php if ($post_type_name == "events") { ?>

		<div class="sidebar--events">
			<div class="events-info">
				<?php if( have_rows('sidebar_additional_content') ): ?>
				<h3>Event details</h3>
						<?php while( have_rows('sidebar_additional_content') ): the_row(); ?>
								<?php if( get_row_layout() == 'event_details' ): ?>
										<?php if (get_sub_field('date_of_event')) { ?>
											<div class="titled">
												Date
											</div>
											<p>
												<?php the_sub_field('date_of_event'); ?>
											</p>
										<?php } ?>
										<?php if (get_field('event_date')) { ?>
											<div class="titled">
												Date
											</div>
											<p>
												<?php the_field('event_date'); ?>
											</p>
										<?php } ?>
										<?php if (get_sub_field('time_of_event')) { ?>
											<div class="titled">
												Time
											</div>
											<p>
												<?php the_sub_field('time_of_event'); ?>
											</p>
										<?php } ?>
										<?php if (get_sub_field('location_of_event')) { ?>
											<div class="titled">
												Location
											</div>
											<p>
												<?php the_sub_field('location_of_event'); ?>
											</p>
										<?php } ?>
								<?php endif; ?>
						<?php endwhile; ?>
				<?php endif; ?>
				</div>
		</div>

	<?php } ?>


	<?php if ( ($post_type_name == "events") && (get_the_terms($post->ID, 'event_location')) ) { ?>
		<?php if ($showevents) { ?>
			<div class="sidebar--related sidebar--recent">
					<h3>Related Events</h3>
					<ul class="boxed">
						<?php
							$terms = get_the_terms( $post->ID, 'event_location' );
							if ( !empty( $terms ) ){
								$term = array_shift( $terms ); // get the first term
								$recentpost_cat = $term->slug;
							}
							$args = array(
									'numberposts' => '5',
									'post_type' => 'events',
									// 'post__not_in' => array( $post->ID ),
									'tax_query' => array(
												array(
														'taxonomy' => 'event_location',
														'field'    => 'slug',
														'terms'    => $recentpost_cat,
														'operator' => 'IN'
												)
									)
							);
							$recent_posts = wp_get_recent_posts( $args );
							foreach( $recent_posts as $recent ) { ?>
									<li>
										<a href="<?php echo get_permalink($recent["ID"]); ?>" title="<?php echo esc_attr($recent["post_title"]); ?>">
												 <?php echo $recent["post_title"]; ?>
										</a>
									</li>
							<?php
							}
					?>
					</ul>
			</div>
		<?php }  ?>
	<?php }  ?>

	<?php  // if page is bulletins, show heading
	if ($post_type_name == "bulletins") { // 'in This bulletin' is displayed with CSS see Line 174 + 175 ?>
		<div id="sidebar--bulletin">
				<div class="sidebar--inthis">
						<h3>In This Bulletin</h3>
						<?php if( have_rows('standard_page_content') ): ?>
							<ul class="boxed">
								<?php while( have_rows('standard_page_content') ): the_row(); ?>
										<?php if( get_row_layout() == 'free_text_with_heading' ): ?>
											<style type="text/css">.sidebar--inthis { display: block; }</style>
											<?php if (get_sub_field('heading_for_area')) : ?>
												<?php $anchor_h2 = sanitize_title_with_dashes(get_sub_field('heading_for_area')); ?>
												<li>
													<a href="#<?php echo $anchor_h2; ?>">
														<?php the_sub_field('heading_for_area'); ?>
													</a>
												</li>
											<?php endif; ?>
										<?php endif; ?>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
				</div>
		</div>
		<div id="sidebar--bulletin">
			<?php if ( ($post_type_name == "bulletins") && (get_the_terms($post->ID, 'bulletin_category')) ) { ?>
				<?php if (!$hiderelated) { ?>
				<div class="sidebar--related sidebar--recent">
						<h3>Recent Bulletins</h3>
						<ul class="boxed">
							<?php
							  $terms = get_the_terms( $post->ID, 'bulletin_category' );
								if ( !empty( $terms ) ){
									$term = array_shift( $terms ); // get the first term
									$recentpost_cat = $term->slug;
								}
								$args = array(
										'numberposts' => '5',
										'post_type' => 'bulletins',
										'post__not_in' => array( $post->ID ),
										'tax_query' => array(
									        array(
									            'taxonomy' => 'bulletin_category',
									            'field'    => 'slug',
									            'terms'    => $recentpost_cat,
									            'operator' => 'IN'
									        )
					    			)
								);
						    $recent_posts = wp_get_recent_posts( $args );

						    	foreach( $recent_posts as $recent )
									{ ?>
						        <li>
											<a href="<?php echo get_permalink($recent["ID"]); ?>" title="<?php echo esc_attr($recent["post_title"]); ?>">
												   <?php echo $recent["post_title"]; ?>
											</a>
										</li>
								<?php
						      }
								?>
						</ul>
				</div>
				<?php } ?>
			<?php } ?>

		</div>
	<?php }  ?>

	<?php
	if ( ($post_type_name == "news") && (get_the_terms($post->ID, 'news_category')) ) { ?>
		<?php if (!$hiderelated) { ?>
			<div class="sidebar--related sidebar--recent">
					<h3>Recent News</h3>
					<ul class="boxed">
						<?php
							$terms = get_the_terms( $post->ID, 'news_category' );
							if ( !empty( $terms ) ){
								$term = array_shift( $terms ); // get the first term
								$recentpost_cat = $term->slug;
							}
							$args = array(
									'numberposts' => '5',
									'post_type' => 'news',
									'post__not_in' => array( $post->ID ),
									'tax_query' => array(
												array(
														'taxonomy' => 'news_category',
														'field'    => 'slug',
														'terms'    => $recentpost_cat,
														'operator' => 'IN'
												)
									)
							);
							$recent_posts = wp_get_recent_posts( $args );
					    foreach( $recent_posts as $recent ) { ?>
					        <li>
										<a href="<?php echo get_permalink($recent["ID"]); ?>" title="<?php echo esc_attr($recent["post_title"]); ?>">
											   <?php echo $recent["post_title"]; ?>
										</a>
									</li>
							<?php
					    }
					?>
					</ul>
			</div>
		<?php }  ?>
	<?php } ?>



<?php dynamic_sidebar( 'sidebar-1' ); // load widgets if need? REMOVE ?>

</aside><!-- #secondary -->

<?php
  // HOME micro-sites module

  global $post;
  $template_url = get_template_directory_uri();
  $this_post_id = get_the_ID();
  $this_page_id = get_the_ID();
  $sidebar = get_field('show_sidebar_on_page', $this_post_id);

  $section_background = get_sub_field('section_background');

 ?>

  <?php $footerbg = get_template_directory_uri() . '/inc/assets/img/microsite_bg.jpg'; ?>

  <div class="section-microsites container-fluid no-pad" style="background-image:url('<?php echo $section_background['url']; ?>');" >
  	<div class="container content-grid pad-2">

  			<div class="row microsites-blurb">
          <div class="col-12 col-lg-3">
            <h2>Our Microsites</h2>
          </div>
          <div class="col-12 col-lg-9">
            <p class="blurb-text">
    				   <?php the_sub_field('microsites_blurb_text'); ?>
            </p>
          </div>
        </div>
        <div class="row">
          <?php
            $terms = get_terms([
              'taxonomy' => 'departments',
              'hide_empty' => false,
              'number'    => 4,
            ]);
            foreach($terms as $term) {
                $term_id = $term->term_id;
                $thumb_site = get_field('thumbnail', $term->taxonomy . '_' . $term->term_id);
                $showme = get_field('show_on_homepage', $term->taxonomy . '_' . $term->term_id);
                ?>
                <?php if ($showme) { ?>
                  <div class="col-12 col-xs-12 col-sm-6 col-lg-3">
                    <a class="microsite-icon dept-id-<?php echo $term_id; ?>" target="_blank" href="<?php echo get_field('website_url', $term->taxonomy . '_' . $term_id); ?>" title="<?php echo $term->name ?>" alt="<?php echo $term->name ?>" style="background-image:url('<?php echo $thumb_site['url']; ?>');"></a>
                  </div>
                <?php } ?>
            <?php } ?>
  			</div>

        <?php if ( get_sub_field('show_button') ) { ?>
        <div class="row">
          <div class="col-12 align-right">
            <?php $micrositelink = get_sub_field('microsite_button_link'); ?>
            <a class="btn black" href="<?php echo $micrositelink['url']; ?>" target=""><?php echo $micrositelink['title']; ?> &nbsp; &nbsp; <i class="far fa-long-arrow-right"></i></a>
          </div>
        </div>
        <?php } ?>

  	</div>
  </div>

<?php
  // used in Grindstone theming
  global $post;
  $template_url = get_template_directory_uri();
  $this_post_id = get_the_ID();
  $this_page_id = get_the_ID();
  $sidebar = get_field('show_sidebar_on_page', $this_post_id);
 ?>

<?php
  $post_title   =   get_the_title();
  $post_excerpt =   get_field('excerpt');
  $post_type    =   get_post_type();
  /*
  $post_news_category = (get_sub_field('item'))->post_title;
  $post_bulletin_category = (get_sub_field('item'))->post_title;
  $post_qrg_group = (get_sub_field('item'))->post_title;
  $post_department = (get_sub_field('item'))->post_title;
  $post_category = (get_sub_field('item'))->post_title;
  $post_locations= (get_sub_field('item'))->post_title;
  */
?>
<a href="<?php the_permalink(); ?>" class="grid-card-single">
<div class="grid-card">
  <div class="inner-wrap">

    <div class="date">
      <?php if ( $post_type == 'events' ) {
        $datef = get_field('event_date');
        $date = DateTime::createFromFormat('F j, Y', $datef);
        $datex = date_i18n($datef)
        ?>
         <i class="far fa-calendar-alt"></i> &nbsp; Event date:
         <?php echo get_field('event_date'); ?>
      <?php } else { // regular date ?>
        <?php echo get_the_date('F j, Y'); ?>
      <?php } ?>
    </div>

    <div class="title">
      <?php echo $post_title; ?>
    </div>
    <div class="content font-light">
      <?php
        if (get_field('excerpt')) {

          if(strlen( get_field('excerpt') ) > 90) {
            echo substr( get_field('excerpt') , 0, 90) . '...';
          } else {
            echo get_field('excerpt') . '...';
          }


        } else {
          echo 'No excerpt';
          //echo strip_tags(get_the_content());
        }
      ?>
    </div>
    <div class="category">
      <div class="tagged">


        <?php
        if (  wp_get_post_terms( get_the_id(), 'bulletin_category') ) {
            $terms1 = wp_get_post_terms( get_the_id(), 'bulletin_category');
            foreach ($terms1 as $t) {
              echo '<i class="fas fa-tag"></i> ';
              echo $t->name, '<span>,</span> ';
            }
        }
        if (  wp_get_post_terms( get_the_id(), 'news_category') ) {
            $terms2 = wp_get_post_terms( get_the_id(), 'news_category');
            foreach ($terms2 as $t) {
              echo '<i class="fas fa-tag"></i> ';
              echo $t->name, '<span>,</span> ';
            }
        }
        if (  wp_get_post_terms( get_the_id(), 'qrg_group') ) {
            $terms4 = wp_get_post_terms( get_the_id(), 'qrg_group');
            foreach ($terms4 as $t) {
              echo '<i class="fas fa-tag"></i> ';
              echo $t->name, '<span>,</span> ';
            }
        }
        if (  wp_get_post_terms( get_the_id(), 'departments') ) {
            $terms5 = wp_get_post_terms( get_the_id(), 'departments');
            foreach ($terms5 as $t) {
              echo '<i class="fas fa-tag"></i> ';
              echo $t->name, '<span>,</span> ';
            }
        }
        ?>
      </div>
      <?php
        if (  wp_get_post_terms( get_the_id(), 'event_location') ) {
            $terms3 = wp_get_post_terms( get_the_id(), 'event_location');
            echo '<div class="tagged">';
            echo '<i class="fas fa-map-marker-alt"></i> &nbsp;';
            foreach ($terms3 as $t) {
              echo $t->name, ' ';
            }
            echo '</div>';
        }
      ?>
    </div>
  </div>





  <?php $thumbterm = wp_get_post_terms( get_the_id(), 'bulletin_category');

    if (! $thumbterm == null) {

      $post_thumb = get_field('cat_thumb', $thumbterm[0]->taxonomy . '_' . $thumbterm[0]->term_id);

      ?>

      <div class="thumb" style="background-image:url('<?php echo esc_url($post_thumb['url']); ?>');"></div>

      <?php

    } else {

        $post_thumb   =   get_the_post_thumbnail_url(get_the_ID(),'large');

    }

  ?>

  <?php if (  (get_the_post_thumbnail_url()) && ($thumbterm == null) ) { ?>

    <div class="thumb" style="background-image:url('<?php echo esc_url($post_thumb); ?>');"></div>

  <?php } ?>






  <?php $thumbterm = wp_get_post_terms( get_the_id(), 'bulletin_category');

    if (!$thumbterm == null) {

    $post_color = get_field('cat_color', $thumbterm[0]->taxonomy . '_' . $thumbterm[0]->term_id);

    ?>

    <div class="bottom-arrow" style="background-color: <?php echo $post_color; ?>">
       <i class="far fa-long-arrow-right"></i>
    </div>

  <?php } else { ?>

    <div class="bottom-arrow ">
       <i class="far fa-long-arrow-right"></i>
    </div>

  <?php } ?>









</div>
</a>

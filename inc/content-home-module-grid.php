<?php

  // basically for EVENTS ,  with the teal green  background displaying


  global $post;
  $template_url = get_template_directory_uri();
  $this_post_id = get_the_ID();
  $this_page_id = get_the_ID();
  $sidebar = get_field('show_sidebar_on_page', $this_post_id);

 ?>


 <?php // build main terms

     $main_post_type = get_sub_field('grid_which_posts');    // grab main post type
     $posts_per_row = get_sub_field('grid_how_many'); // 3 or 4
     $heading = get_sub_field('heading');
     $blurb = get_sub_field('blurb_text');
     $showbutton = get_sub_field('show_button'); // true or false
     $buttonlink = get_sub_field('button_link');


     if ( get_sub_field('grid_which_posts') == 'news' ):
       $what_to_show = get_sub_field('filter_news_items');

     elseif ( get_sub_field('grid_which_posts') == 'bulletins' ):
       $what_to_show = get_sub_field('filter_bulletins_items');

     elseif ( get_sub_field('grid_which_posts') == 'qrg' ):
       $what_to_show = get_sub_field('filter_qrg_items');

     elseif ( get_sub_field('grid_which_posts') == 'events' ):
       $what_to_show = get_sub_field('filter_qrg_items');

     endif;

     // make sure is array : $what_to_show
     if ($what_to_show) {
         // make sure is an array
          if (!is_array($what_to_show)) {
             $what_to_show = array($what_to_show);
          };
          // make sure all values are integers
          $what_to_show = array_map('intval', $what_to_show);
     } elseif (!$what_to_show) {
       //
     }

     // $category_to_show = esc_html( $subcategory->slug );     // aka subcategory
 ?>

 <div class="container-fluid section-home-events--wrap" style="background:white;">

<div class="section-events container">


 <?php  // 1.  ARGS
  if (  ( $main_post_type == 'news' ) && ( !($what_to_show) )  )  {
    $args = array(
      'post_type'=> 'news',
      'post_status' => 'publish',
      'orderby' => 'date',
      'order'   => 'DESC',
      'posts_per_page' => 3,
    );

  } elseif ( ($main_post_type == 'news') && (($what_to_show)) )  {
     $args = array(
       'post_type'=> 'news',
       'post_status' => 'publish',
       'orderby' => 'date',
       'order'   => 'DESC',
       'posts_per_page' => 3,
       'tax_query' => array(
         array(
           'taxonomy' => 'news_category',
           'field' => 'ID',
           'terms' => $what_to_show
         )
       )
     );

   } elseif ( $main_post_type == 'bulletins' ) {
    $args = array(
      'post_type'=> 'bulletins',
      'post_status' => 'publish',
      'orderby' => 'date',
      'order'   => 'DESC',
      'posts_per_page' => 3,
      'tax_query' => array(
        array(
          'taxonomy' => 'bulletin_category',
          'field' => 'ID',
          'terms' => $what_to_show
        )
      )
    );

  } elseif ( $main_post_type == 'qrg' ) {
    $args = array(
      'post_type'=> 'qrg',
      'post_status' => 'publish',
      'orderby' => 'date',
      'order'   => 'DESC',
      'posts_per_page' => 3,
      'tax_query' => array(
        array(
          'taxonomy' => 'qrg_group',
          'terms' => $what_to_show
        )
      )
    );

  } elseif ( $main_post_type == 'events' ) { // show ONLY future dated events

    $today = date('Ymd');

    $args = array(
      'post_type'=> 'events',
      'post_status' => 'publish',
      'orderby'   => 'meta_value_num',
      'order' => 'ASC',
      'posts_per_page' => 3,
      'meta_query' => array(
        array(
            'key'     => 'event_date',
            'compare' => '>',
            'value'   => $today,
          ),
        )
    );

  } else { // keep it standard
    $args = array(
      'post_type'=> 'news',
      'post_status' => 'publish',
      'orderby' => 'date',
      'order'   => 'DESC',
      'posts_per_page' => 3,
    );

 }

 $result = new WP_Query($args);

 ?>

 <?php if ($result->have_posts()) : ?>

     <div class="section-home-events--content row no-gutters grid-custom grid-custom-<?php echo $main_post_type; ?>">
         <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-3">
           <div class="section-home-events--title">
             <h2><?php echo $heading; ?></h2>
             <div class="blurb">
               <?php echo $blurb; ?>
             </div>
             <?php if ($showbutton) { ?>
               <div class="btn-link">
                 <a href="<?php echo $buttonlink['url']; ?>"><?php echo $buttonlink['title']; ?>  <i class="far fa-long-arrow-right"></i></a>
               </div>
            <?php } ?>
           </div>
         </div>
         <?php while ( $result->have_posts() ) : $result->the_post(); ?>
           <?php if ( $posts_per_row == '3' ) { ?>
             <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
               <?php require get_template_directory() . '/inc/content-dynamic-single-grid-item.php'; ?>
             </div>
         <?php } else { ?>
           err /
         <?php } ?>
         <?php endwhile; ?>
     </div>

</div>

<?php endif; ?>
<?php wp_reset_postdata(); ?>

</div>

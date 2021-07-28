<?php
  // used in Grindstone theming

  global $post;
  $template_url = get_template_directory_uri();
  $this_post_id = get_the_ID();
  $this_page_id = get_the_ID();
  $sidebar = get_field('show_sidebar_on_page', $this_post_id);

  $pre_posts_per_row = get_sub_field('posts_per_row');
  // echo $pre_posts_per_row[0];
  $pre_posts = $pre_posts_per_row;
 ?>

 <?php if( have_rows('manual_item') ): // check repeater ?>
   <div class="section row no-gutters grid-custom">
       <?php while( have_rows('manual_item') ): the_row(); ?>
         <?php
           $post_title = (get_sub_field('item'))->post_title; // set the post_title and others
           $itemobj = get_sub_field('item');
           $item_id = $itemobj->ID;
           $post_type_name = get_post_type( $item_id );

           /*$post_excerpt = (get_sub_field('item'))->post_title;
           $post_thumb = (get_sub_field('item'))->post_title;
           $post_news_category = (get_sub_field('item'))->post_title; // build categories to show if available
           $post_bulletin_category = (get_sub_field('item'))->post_title;
           $post_qrg_group = (get_sub_field('item'))->post_title;
           $post_department = (get_sub_field('item'))->post_title;
           $post_category = (get_sub_field('item'))->post_title;
           $post_locations= (get_sub_field('item'))->post_title;*/
         ?>
         <?php if ( $pre_posts == '2' ) { // if row of 3 ?>
           <div class="grid-card-wrap col-6 col-sm-6 col-xs-6 col-md-6 col-lg-6 col-xl-6">
         <?php } elseif ( $pre_posts == '3' ) { // if row of 3 ?>
           <div class="grid-card-wrap col-6 col-sm-6 col-xs-6 col-md-6 col-lg-4 col-xl-4">
         <?php } elseif ( $pre_posts == '4' ) { // if row of 4 ?>
           <div class="grid-card-wrap col-6 col-sm-6 col-xs-6 col-md-6 col-lg-3 col-xl-3">
         <?php } ?>
             <a href="<?php the_permalink($item_id); ?>" class="grid-card-single">
               <div class="grid-card <?php if ( $post_type_name == "profiles" ) { ?>profile-grid<?php } ?>">

                 <?php if ( $post_type_name == "profiles" ) { ?>
                   <?php if (get_the_post_thumbnail_url($item_id)) { ?>
                     <div class="thumb thumb-small" style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url($item_id)); ?>');"></div>
                   <?php } ?>
                 <?php } ?>

                 <div class="inner-wrap">
                   <?php if (get_sub_field('show_date')) { ?>
                     <div class="date">
                       <?php echo get_the_date('F j, Y'); ?>
                     </div>
                   <?php } ?>
                   <div class="title">
                     <?php
                       if (get_sub_field('custom_title')) {
                         the_sub_field('custom_title');
                       } else {
                         echo $post_title;
                       }
                     ?>
                   </div>
                   <div class="content font-light">
                     <?php
                       if (get_field('excerpt', $item_id)) {

                         if(strlen( get_field('excerpt', $item_id) ) > 90) {
                           echo substr( get_field('excerpt', $item_id) , 0, 90) . '...';
                         } else {
                           echo get_field('excerpt', $item_id) . '...';
                         }


                       } else {
                         echo 'No excerpt';
                         //echo strip_tags(get_the_content());
                       }
                     ?>
                   </div>
                   <?php if (get_sub_field('show_tags')) { ?>
                       <div class="category">

                         <div class="tagged">
                         <i class="fas fa-tag"></i>
                           <?php
                           if (  wp_get_post_terms( $item_id, 'bulletin_category') ) {
                               $terms1 = wp_get_post_terms( $item_id, 'bulletin_category');
                               foreach ($terms1 as $t) {
                                 echo $t->name, '<span>,</span> ';
                               }
                           }
                           if (  wp_get_post_terms( $item_id, 'news_category') ) {
                               $terms2 = wp_get_post_terms( $item_id, 'news_category');
                               foreach ($terms2 as $t) {
                                 echo $t->name, '<span>,</span> ';
                               }
                           }
                           if (  wp_get_post_terms( $item_id, 'qrg_group') ) {
                               $terms4 = wp_get_post_terms( $item_id, 'qrg_group');
                               foreach ($terms4 as $t) {
                                 echo $t->name, '<span>,</span> ';
                               }
                           }
                           if (  wp_get_post_terms( $item_id, 'departments') ) {
                               $terms5 = wp_get_post_terms( $item_id, 'departments');
                               foreach ($terms5 as $t) {
                                 echo $t->name, '<span>,</span> ';
                               }
                           }
                           ?>
                         </div>
                         <?php
                           if (  wp_get_post_terms( $item_id, 'event_location') ) {
                               $terms3 = wp_get_post_terms( $item_id, 'event_location');
                               echo '<div class="tagged">';
                               echo '<i class="fas fa-map-marker-alt"></i> &nbsp;';
                               foreach ($terms3 as $t) {
                                 echo $t->name, ' ';
                               }
                               echo '</div>';
                           }
                         ?>

                       </div>
                   <?php } ?>
                 </div>

                 <?php if ( $post_type_name == "profiles" ) { ?>

                 <?php } else {  ?>

                   <?php if (get_sub_field('thumbnail')) {
                     $thumbm = get_sub_field('thumbnail');
                     ?>
                     <div class="thumb" style="background-image:url('<?php echo $thumbm['url']; ?>');"></div>
                   <?php } ?>
                   <?php if (get_the_post_thumbnail_url($item_id)) { ?>
                     <div class="thumb" style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url($item_id)); ?>');"></div>
                   <?php } ?>

                   <div class="bottom-arrow">
                      <i class="fas fa-arrow-right"></i>
                   </div>


                 <?php } ?>

               </div>
             </a>
           </div>

       <?php endwhile; ?>
   </div>
 <?php endif; ?>

<?php

  // HOME TABS
  // black area with tabs on Home Pg

  // used in Grindstone theming

  global $post;
  $template_url = get_template_directory_uri();
  $this_post_id = get_the_ID();
  $this_page_id = get_the_ID();
  $sidebar = get_field('show_sidebar_on_page', $this_post_id);

 ?>

<div id="section--home-tabbed" class="section--home-tabbed container-fluid" style="background: #20bfb4;">
 <div class="container">
 <div class="row">
    <div class="col-12">
     <div class="section--home-tabbed-nav">
       <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
         <li class="nav-item" role="presentation">
           <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Latest News</a>
         </li>
         <li class="nav-item" role="presentation">
           <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false">Words from Russell</a>
         </li>
         <li class="nav-item" role="presentation">
           <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="#ex1-tabs-3" role="tab" aria-controls="ex1-tabs-3" aria-selected="false">Executive Bulletins</a>
         </li>
       </ul>
     </div>
   </div>
 </div>
 </div>
</div>

<div id="section--home-tabbed-content" class="section--home-tabbed-content container-fluid">

 <div class="container tabs-pad">
  <div class="row">
    <div class="col-12">
       <div class="tab-content" id="ex1-content">

         <div class="TAB-1-CONTENT tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
               <div class="container-fluid no-pad no-gutters content-grid section-cards-dark">
                 <div class="row no-gutters  tab-slide-1">

                   <!-- latest Russel post -->
                    <?php
                      $args = array(
                        'post_type' => 'bulletins',
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order'   => 'DESC',
                        'posts_per_page' => '1',
                        'paged' => '',
                        'tax_query' => array(
                          array(
                            'taxonomy' => 'bulletin_category',
                            'field' => 'slug',
                            'terms' => 'words-from-russell'
                          )
                        ),
                      );
                      query_posts($args); ?>
                    <?php
                      $total = $wp_query->post_count;
                      $i = 0;
                    ?>
                    <?php while( have_posts() ): the_post(); ?>
                        <?php if ( $i == 0 ) echo ''; ?>
                        <div class="grid-card-wrap col-12 col-sm-6 col-sm-6 col-lg-3" style="">
                            <?php require get_template_directory() . '/inc/content-dynamic-single-grid-item.php'; ?>
                        </div>
                        <?php $i++; ?>
                        <?php
                        // if we're at the end close the row
                        if ( $i == $total ) {
                            echo '';
                        } else {
                            /**
                             * Perform modulus calculation to check whether $i / 2 is whole number
                             * if true close row and open a new one
                             */
                            if ( $i % 4 == 0 ) {
                                echo '';
                            }
                        }
                        ?>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>

                    <!-- latest Bulletin post post -->

                    <?php
                      $args = array(
                        'post_type' => 'bulletins',
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order'   => 'DESC',
                        'posts_per_page' => '1',
                        'paged' => '',
                        'tax_query' => array(
                          array(
                            'taxonomy' => 'bulletin_category',
                            'field' => 'slug',
                            'terms' => 'words-from-russell',
                            'operator' => 'NOT IN',
                          )
                        ),
                      );
                      query_posts($args); ?>
                    <?php
                      $total = $wp_query->post_count;
                      $i = 0;
                    ?>
                    <?php while( have_posts() ): the_post(); ?>
                        <?php if ( $i == 0 ) echo ''; ?>
                        <div class="grid-card-wrap col-12 col-sm-6 col-sm-6 col-lg-3" style="">
                            <?php require get_template_directory() . '/inc/content-dynamic-single-grid-item.php'; ?>
                        </div>
                        <?php $i++; ?>
                        <?php
                        // if we're at the end close the row
                        if ( $i == $total ) {
                            echo '';
                        } else {
                            /**
                             * Perform modulus calculation to check whether $i / 2 is whole number
                             * if true close row and open a new one
                             */
                            if ( $i % 4 == 0 ) {
                                echo '';
                            }
                        }
                        ?>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>

                    <!-- latest Bulletin post post -->

                    <?php
                      $args = array(
                        'post_type' => 'news',
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order'   => 'DESC',
                        'posts_per_page' => '2',
                        'paged' => '',
                      );
                      query_posts($args); ?>
                    <?php
                      $total = $wp_query->post_count;
                      $i = 0;
                    ?>
                    <?php while( have_posts() ): the_post(); ?>
                        <?php if ( $i == 0 ) echo ''; ?>
                        <div class="grid-card-wrap col-12 col-sm-6 col-sm-6 col-lg-3" style="">
                            <?php require get_template_directory() . '/inc/content-dynamic-single-grid-item.php'; ?>
                        </div>
                        <?php $i++; ?>
                        <?php
                        // if we're at the end close the row
                        if ( $i == $total ) {
                            echo '';
                        } else {
                            /**
                             * Perform modulus calculation to check whether $i / 2 is whole number
                             * if true close row and open a new one
                             */
                            if ( $i % 4 == 0 ) {
                                echo '';
                            }
                        }
                        ?>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>

                </div>
               </div>
         </div>

         <div class="TAB-2-CONTENT tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2" style="background: black; color: white;">
             <div class="container-fluid no-gutters no-pad content-grid section-cards-dark">
               <div class="row no-gutters tab-slide-1">
               <?php
                $args = array(
                   'post_type' => 'bulletins',
                   'post_status' => 'publish',
                   'orderby' => 'date',
                   'order'   => 'DESC',
                   'posts_per_page' => '4',
                   'paged' => '',
                   'tax_query' => array(
                     array(
                       'taxonomy' => 'bulletin_category',
                       'field' => 'slug',
                       'terms' => 'words-from-russell'
                     )
                   ),
                 );
                query_posts($args); ?>
                 <?php
                   $total = $wp_query->post_count;
                   $i = 0;
                 ?>
                 <?php while( have_posts() ): the_post(); ?>
                     <?php if ( $i == 0 ) echo ''; ?>
                     <div class="grid-card-wrap col-12 col-sm-6 col-sm-6 col-lg-3" style="">
                         <?php require get_template_directory() . '/inc/content-dynamic-single-grid-item.php'; ?>
                     </div>
                     <?php $i++; ?>
                     <?php
                     // if we're at the end close the row
                     if ( $i == $total ) {
                         echo '';
                     } else {
                         /**
                          * Perform modulus calculation to check whether $i / 2 is whole number
                          * if true close row and open a new one
                          */
                         if ( $i % 4 == 0 ) {
                             echo '';
                         }
                     }
                     ?>
                 <?php endwhile; ?>
               <?php wp_reset_query(); ?>
              </div>
             </div>
         </div>

         <div class="TAB-3-CONTENT tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
               <div class="container-fluid no-gutters no-pad content-grid section-cards-dark">
                 <div class="row no-gutters tab-slide-1">
                 <?php
                 $args = array(
                    'post_type' => 'bulletins',
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order'   => 'DESC',
                    'posts_per_page' => '4',
                    'paged' => '',
                    'tax_query' => array(
                                    array(
                                        'taxonomy' => 'bulletin_category',
                                        'field' => 'slug',
                                        'terms' => 'words-from-russell',
                                        'include_children' => true,
                                        'operator' => 'NOT IN'
                                      )
                                   ),
                  );
                  query_posts($args); ?>
                   <?php
                     $total = $wp_query->post_count;
                     $i = 0;
                   ?>
                   <?php while( have_posts() ): the_post(); ?>
                       <?php if ( $i == 0 ) echo ''; ?>
                         <div class="grid-card-wrap col-12 col-sm-6 col-sm-6 col-lg-3" style="">
                             <?php require get_template_directory() . '/inc/content-dynamic-single-grid-item.php'; ?>
                         </div>
                       <?php $i++; ?>
                       <?php
                       // if we're at the end close the row
                       if ( $i == $total ) {
                           echo '';
                       } else {
                           /**
                            * Perform modulus calculation to check whether $i / 2 is whole number
                            * if true close row and open a new one
                            */
                           if ( $i % 4 == 0 ) {
                               echo '';
                           }
                       }
                       ?>
                   <?php endwhile; ?>
                 <?php wp_reset_query(); ?>
                </div>
               </div>
         </div>

       </div>



   </div>

  </div>

 </div>

</div>

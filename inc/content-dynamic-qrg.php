<?php
  // used in Grindstone theming

  global $post;
  $template_url = get_template_directory_uri();
  $this_post_id = get_the_ID();
  $this_page_id = get_the_ID();
  $sidebar = get_field('show_sidebar_on_page', $this_post_id);

 ?>

<?php
  // BUILD TERMS
    $what_to_show = get_sub_field('qrg_block_types');

    if ( (get_sub_field('choose_qrg_group')) && ($what_to_show == 'qrggroup')  ) {
     $qrg_group = get_sub_field('choose_qrg_group');
     $category_to_show = esc_html( $qrg_group->slug );
     // set up args
     var_dump($category_to_show); // test

    } elseif ( (get_sub_field('choose_qrg_dept')) && ($what_to_show == 'qrgdepartment') ) {
     $qrg_dept = get_sub_field('choose_qrg_dept');
     $category_to_show = esc_html( $qrg_dept->slug );
     // set up args
     var_dump($category_to_show); // test
    }
?>

 <div class="section the_content services_module">

   <div class="row">
     <div class="col-12 col-sm-8">
       <h2 class="filter-head">Filter by</h2>
       <div class="select_wrapper" style="background: #fff; ">
         <form method="get"action="<?php the_permalink($this_page_id); ?>">
           <select id="the_services_location" name="categories"  onchange="this.form.submit();">
             <option value="">Category</option>
             <option class="" value="">Show All</option>
             <?php $the_categories = '';
                  $terms = get_terms(
                            array(
                                   'taxonomy'   => 'qrg_group',
                                    'hide_empty' => true,
                                )
                            );

                   if ( ! empty( $terms ) && is_array( $terms ) ) {
                     foreach ( $terms as $term ) {
                       $the_categories = '<option class="'.$term->slug.'" name="'.$term->slug.'" value="'.$term->slug.'">'.$term->name.'</option>'.$the_categories;
                     }
                   }
                 echo $the_categories;
             ?>
            </select>
        </form>
       </div>
     </div>
       <div class="col-12 col-sm-4 align-right alignright">
         <div style="padding-right:20px;">
         <h2 class="filter-head filter-search">Search</h2>
         <div class="select_wrapper search" style="background: #fff; width:280px !important;">
             <input type="text" id="searchqrg" name="searchqrg" onchange="">
          </div>
          </div>
       </div>
   </div>

     <?php if ( get_sub_field('qrg_introduction_text') ): ?>

     <div class="row">
       <div class="col-12 intro-text">
         <hr/>
         <?php the_sub_field('qrg_introduction_text'); ?>
       </div>
     </div>
     <?php endif; ?>

     <?php // OVERVIEW: BUILD THE ALPHABET OF SERVICES

      // 1. BUILD QUERY & args
       $the_alphabet = array();

       if ( isset( $_POST['categories'] ) ) {
         $category = $_POST['categories'];
       } elseif ( isset( $_GET['categories'] ) ) {
         $category = $_GET['categories'];
       }

       if (  ( $what_to_show == 'alphabet' ) && ( ( isset($_POST['categories']) ) || ( isset($_GET['categories']) ) )  ) {
         $args = array(
           'post_type'=> 'qrg',
           'post_status' => 'publish',
           'posts_per_page' => -1,
           'paged' => $paged ,
           'tax_query' => array(
             array(
               'taxonomy' => 'qrg_group',
               'field' => 'slug',
               'terms' => $category,
               'operator' => 'AND',
             )
           )
         );
         ?>
         <script type="text/javascript">
         (function($){
           $(document).ready(function(){
             $('option.<?php echo $category; ?>').attr('selected', true);
             var headingadd = $('option.<?php echo $category; ?>').text();
             $('#single-page-header h1').append(': ' + headingadd);
           });
         })(jQuery);
         </script>
         <?php

       } elseif ( $what_to_show == 'alphabet' ) {


                   if ( isset( $_POST['search'] ) ) {
                    $searchterm = $_POST['search'];
                   } elseif ( isset( $_GET['search'] ) ) {
                    $searchterm = $_GET['search'];
                   }

                  $args = array(
                    'post_type'=> 'qrg',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    // 's' => $searchterm,
                  );


       } elseif ( $what_to_show == 'qrggroup' ) {
         $args = array(
           'post_type'=> 'qrg',
           'post_status' => 'publish',
           'posts_per_page' => -1,

           'tax_query' => array(
             array(
               'taxonomy' => 'qrg_group',
               'field'    => 'slug',
               'terms' => $category_to_show
             )
           )
         );

       } elseif ( $what_to_show == 'qrgdepartment' ) {
         $args = array(
           'post_type'=> 'qrg',
           'post_status' => 'publish',
           'posts_per_page' => -1,

           'tax_query' => array(
             array(
               'taxonomy' => 'departments',
               'field'    => 'slug',
               'terms' => $category_to_show
             )
           )
         );

       } else { // keep it standard
         $args = array(
           'post_type'=> 'qrg',
           'post_status' => 'publish',
           'posts_per_page' => -1,
         );
       }

       $result = new WP_Query( $args );
       if ( $result-> have_posts() ) :
         while ( $result->have_posts() ) : $result->the_post();

            $the_letter = get_field('service_letter');
            array_push($the_alphabet, $the_letter);

         endwhile;
       endif; wp_reset_postdata();

       // 2. REMOVE DUPLICATES in ARRAY
       $the_alphabet = array_unique($the_alphabet);

       // 3. ALPHABETISE the ARRAY
       sort($the_alphabet);

     ?>

     <div class="black-bg">
       <ul id="the_alphabet_links">
         <?php //  LOOP THROUGH  $the_alphabet
           foreach($the_alphabet as $letter){
             echo '<li letter="'.$letter.'" title="click here to show all categories for '.$letter.'">'.$letter.'</li>';
           }
         ?>
         <li letter="all" class="active">ALL</li>
       </ul>
     </div>

     <script>
     (function($){

       $(document).ready(function(){

         let the_alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
         for (let i = 0; i < the_alphabet.length ; i++) {

           let the_current_char = $('#the_alphabet_links li:eq('+i+')').text();
           let letter = the_alphabet[i];

           // console.log(the_current_char, letter);
           if(the_current_char == letter ){
             //
           } else {
             $('<li class="redundant">'+letter+'</li>').insertBefore('#the_alphabet_links li:eq('+i+')');
           }

         }

       });

       })(jQuery);

     </script>

     <?php // -------------------
           //     LIST OF RESULTS

       foreach($the_alphabet as $letter){
         echo '<div class="letter_group_wrapper" letter="'.$letter.'">';
         echo '<h4 class="the_letter" letter="'.$letter.'">'.$letter.'</h4>';

         ?><ul class="service_listings" letter="<?php echo $letter; ?>"><?php
         //Commenting this code helped fixing the Qrg list display Bug

           if($what_to_show=='alphabet'){
             $args = array(
               'post_type'=> 'qrg',
               'meta_key' => 'service_letter',
               'meta_value' => $letter,
               'post_status' => 'publish',
               'posts_per_page' => -1,
               'orderby' => 'title',
               'order' => 'ASC'
             );

           } elseif ( $what_to_show == 'qrggroup' ) {
             $args = array(
               'post_type'=> 'qrg',
               'meta_key' => 'service_letter',
               'meta_value' => $letter,
               'post_status' => 'publish',
               'posts_per_page' => -1,
               'orderby' => 'title',
               'order' => 'ASC',

               'tax_query' => array(
                 array(
                   'taxonomy' => 'qrg_group',
                   'field'    => 'slug',
                   'terms' => $category_to_show,
                 )
               )
             );

           } elseif ( $what_to_show == 'qrgdepartment' ) {
             $args = array(
               'post_type'=> 'qrg',
               'meta_key' => 'service_letter',
               'meta_value' => $letter,
               'post_status' => 'publish',
               'posts_per_page' => -1,
               'orderby' => 'title',
               'order' => 'ASC',

               'tax_query' => array(
                 array(
                   'taxonomy' => 'departments',
                   'field'    => 'slug',
                   'terms' => $category_to_show,
                 )
               )
             );

           }

           $result = new WP_Query( $args );
           if ( $result-> have_posts() ) :
             while ( $result->have_posts() ) : $result->the_post();
              $result_id = $result->page_id;
             /* ------------------------------------------
                Build out the results here, for all QUERYS
             */
              ?>
                <?php // check if is download or qrg-page link
                  $qrg_status = get_field('service_type', $result_id); // external / download / contentpg (regular page)
                ?>

                 <?php if   ($qrg_status == 'contentpg') {
                    $qrgicon = 'file-alt';
                   ?>
                   <a href="<?php the_permalink(); ?>" alt="Content Page Link" style="display:block;">
                 <?php } elseif ($qrg_status == 'external') {
                   $qrgicon = 'external-link-alt';
                   $qrg_external = get_field('service_type_link');
                   ?>
                   <a href="<?php echo $qrg_external['url']; ?>" alt="External Link" target="_blank" style="display:block;">
                 <?php } elseif ( ($qrg_status == 'download') ) {
                   $qrgicon = 'download';
                   $qrg_download = get_field('service_type_download');
                   ?>
                    <a href="<?php echo $qrg_download['url']; ?>" alt=" Download File Link" target="_blank" style="display:block;">
                  <?php } ?>
                   <li class="qrg-item-listing qrg-item-listing-<?php echo $letter; ?>">
                      <div class="row justify-content-between">
                          <div class="col-12 col-md-7">
                            <h5>
                              <i class="fas fa-<?php echo $qrgicon; ?> large"></i>
                              <?php the_field('service_name'); ?>
                            </h5>
                          </div>
                          <div class="col-6 col-md-5 align-right">
                            <span class="date">
                              <i class="fas fa-clock"></i>
                              <?php printf( __( 'Last modified: %s', 'textdomain' ), get_the_modified_date() ); ?>
                            </span>
                            <?php if ($qrg_status == 'download') {
                                $filesize = filesize( get_attached_file( $qrg_download['ID'] ) );
                                $filesize = size_format($filesize, 2);
                              ?>
                              <span class="size" style="padding-left:30px;">
                                <i class="fas fa-file-alt"></i>
                                <?php echo $filesize; ?>
                              </span>
                            <?php } ?>
                          </div>
                      </div>
                   </li>
                </a>

               <?php
             endwhile;
           endif; wp_reset_postdata();
         ?></ul><?php

         echo '</div>';
       }
     ?>

 </div>

 <script>

 (function($){

   $(document).ready(function(){

     $('#the_alphabet_links li').each(function(){
       $(this).click(function(){
         // FOR THE A-Z
         let the_letter = $(this).attr('letter');
         $('#the_alphabet_links li').removeClass('active');
         $(this).addClass('active');

         // RESET LOCATIONS FILTER
         $('#the_services_location option').removeAttr('selected');
         $('#the_services_location option[value="all"]').attr('selected',true);

         // SHOW / HIDE
         if(the_letter=='all'){
           $('h4.the_letter').hide();
           $('ul.service_listings').hide();
           $('h4.the_letter').fadeIn();
           $('ul.service_listings').fadeIn();
           $('ul.service_listings li').fadeIn();
           $('.letter_group_wrapper').fadeIn();
         }else{
           $('h4.the_letter').hide();
           $('ul.service_listings').hide();
           $('h4.the_letter[letter="'+the_letter+'"]').fadeIn();
           $('ul.service_listings[letter="'+the_letter+'"]').fadeIn();
           $('ul.service_listings[letter="'+the_letter+'"] li').fadeIn();
           $('.letter_group_wrapper').fadeIn();
         }
       });
     });


    $('#searchqrg').keyup(function(){
      var searchterm = this.value.toLowerCase();

      if(searchterm == "") {
        $('.letter_group_wrapper, .qrg-item-listing').show();
      }
      else {
        $('.qrg-item-listing').each(function(){
          var itemlisting = $(this).text().toLowerCase();
          $(this).toggle(itemlisting.indexOf(searchterm) !== -1);
         // $(this).parents('.letter_group_wrapper').toggle(itemlisting.indexOf(searchterm) !== -1);
         // $('.letter_group_wrapper').hide();
         // $(this).parent().parent().parent().show();
        });
      }

    });

    $('#the_services_location').change(function() {
      // RESET
      $('h4.the_letter').show();
      $('ul.service_listings').show();
      $('ul.service_listings li').show();
      $('.letter_group_wrapper').show();
      // WHAT IS SELECTED

      let the_filter_location = $('#the_services_location option:selected').val();

      // HIDE
      $('ul.service_listings li').hide();
      // WORK OUT WHAT TO SHOW
      $('ul.service_listings li').each(function(){
        let the_classes = $(this).attr('class');
        if (the_classes.indexOf(the_filter_location) >= 0){
          $(this).attr('state','visible');
          $(this).fadeIn();
        }else{
          $(this).attr('state','hidden');
        }
      });

       // IF LETTER GROUPS ARE NOW EMPTY
       setTimeout(function(){
       $('.letter_group_wrapper').each(function(){
         let the_letter = $(this).attr('letter');
         let the_number_of_services_visible = $(this).children('ul').children('li[state="visible"]').length;
         if(the_number_of_services_visible == 0){
           $(this).hide();
         }
       });
       }, 1);
     });

   }); // close DOCUMENT.READY

   })(jQuery);

 </script>

<?php
  // used in Grindstone theming

  global $post;
  $template_url = get_template_directory_uri();
  $this_post_id = get_the_ID();
  $this_page_id = get_the_ID();
  $sidebar = get_field('show_sidebar_on_page', $this_post_id);

 ?>

  <?php if ( is_singular('news') ) { ?>
    <div class="the-date">
      <B>Published on <?php echo get_the_date(); ?></B>
    </div>
  <?php } ?>
  <?php if ( is_singular('bulletins') ) { ?>
    <div class="the-date">
      <B>Published on <?php echo get_the_date(); ?></B>
    </div>
  <?php } ?>
  <?php if ( is_singular('qrg') ) { ?>
    <div class="the-date">
      <B>Published on <?php echo get_the_date(); ?></B>
    </div>
  <?php } ?>

 <?php if( have_rows('standard_page_content') ): ?>
     <?php while( have_rows('standard_page_content') ): the_row(); ?>

        <?php if ( is_singular('profiles') ) {
          $featured_img_url2 = get_the_post_thumbnail_url(get_the_ID(),'large');
          ?>
          <img src="<?php echo $featured_img_url2 ;?>" style="float:left; padding:0px 30px 30px 0px; width: 220px;" align="left"/>
          <h2 style="padding:10px 0;"><?php the_title(); ?></h2>
          <h5 class="secondary_accent_colour" style="padding-bottom:10px;">
            <?php the_field('excerpt'); ?>
          </h5>
        <?php } ?>

        <?php if ( is_singular('events') ) { ?>
          <div style="display:none;">
          <?php while( have_rows('sidebar_additional_content') ): the_row(); ?>
              <?php if( get_row_layout() == 'event_details' ): ?>
                  <?php if (get_field('event_date')) { ?>
                    <div class="row">
                      <div class="col-2">
                        Date:
                      </div>
                      <div class="col">
                        <?php the_field('event_date'); ?>
                      </div>
                    </div>
                  <?php } ?>
                  <?php if (get_sub_field('time_of_event')) { ?>
                    <div class="row">
                      <div class="col-2">
                        Time:
                      </div>
                      <div class="col">
                        <?php the_sub_field('time_of_event'); ?>
                      </div>
                    </div>
                  <?php } ?>
                  <?php if (get_sub_field('location_of_event')) { ?>
                    <div class="row">
                      <div class="col-2">
                        Location:
                      </div>
                      <div class="col">
                      <?php the_sub_field('location_of_event'); ?>
                      </div>
                    </div>
                  <?php } ?>
              <?php endif; ?>
          <?php endwhile; ?>
          <BR/>
        </div>
        <?php } ?>

        <?php if( get_row_layout() == 'free_text_wysiwyg' ): ?>
           <div class="free-text-area">
             <?php the_sub_field('free_text_area'); ?>
           </div>

         <?php elseif( get_row_layout() == 'free_text_with_heading' ): ?>
           <div class="free-text-area">
             <?php $anchor_h2 = sanitize_title_with_dashes(get_sub_field('heading_for_area')); ?>
             <h2 class="h2" id="<?php echo $anchor_h2; ?>"><?php the_sub_field('heading_for_area'); ?></h2>
             <?php the_sub_field('free_text_area'); ?>
           </div>

         <?php elseif( get_row_layout() == 'image' ): ?>
             <?php $image = get_sub_field('content_image'); ?>
             <figure><?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
             <figcaption><?php echo $image['caption']; ?></figcaption></figure>

         <?php elseif( get_row_layout() == 'accordion_group' ): ?>
             <h2 class="h2"><?php the_sub_field('accordion_group_title'); ?></h2>

             <?php if( have_rows('the_accordion') ): ?>

                 <ul class="accordions">
                 <?php while( have_rows('the_accordion') ): the_row(); ?>
                     <li class="accordion-group">
                         <div class="accordion-title">
                           <?php the_sub_field('accordion_title'); ?>
                         </div>
                         <div class="accordion-content">
                           <?php the_sub_field('accordion_content'); ?>
                         </div>
                     </li>
                 <?php endwhile; ?>
                 </ul>

              <?php endif; ?>
         <?php endif; ?>

     <?php endwhile; ?>
 <?php endif; ?>


   <?php if ( is_singular('events') ) { ?>
     <B style="font-size: 15px; padding:3s30px 0px;display:block;">Published on <?php echo get_the_date(); ?></B>
   <?php } ?>

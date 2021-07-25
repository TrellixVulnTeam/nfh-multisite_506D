<?php
  // used in Grindstone theming

  global $post;

  $template_url = get_template_directory_uri();
  $this_post_id = get_the_ID();
  $sidebar = get_field('show_sidebar_on_page', $this_post_id);

 ?>

<?php if (get_field('heading')) :
       if (get_field('banner_heading')) :  ?>
        <div class="inner-banner-heading">
          <?php $banner_img = get_field('banner_heading'); ?>
          <?php echo wp_get_attachment_image( $banner_img['ID'], 'large' ); ?>
        </div>
<?php endif;
     endif ?>

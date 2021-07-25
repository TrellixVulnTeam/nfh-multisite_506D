<?php
  // used in Grindstone theming

  global $post;
  $template_url = get_template_directory_uri();
  $this_post_id = get_the_ID();
  $this_page_id = get_the_ID();
  $sidebar = get_field('show_sidebar_on_page', $this_post_id);

 ?>



<?php if( have_rows('dynamic_page_content', $this_page_id) ): ?>

  <?php while ( have_rows('dynamic_page_content', $this_page_id) ) : the_row(); ?>

   <?php if (get_row_layout() == 'qrg_module') : // if QRG block chosen ?>
        <?php require get_template_directory() . '/inc/content-dynamic-qrg.php'; // bring in the QRG builder ?>
   <?php endif; ?>

   <?php if ( get_row_layout() == 'grid_of_items_customisable' ) : ?>
       <?php if ( !get_sub_field('use_separator') ) : ?>
         <?php require get_template_directory() . '/inc/content-dynamic-grid-custom.php'; ?>
       <?php endif; ?>
   <?php endif; ?>

   <?php if ( get_row_layout() == 'grid_of_items_manual' ) : ?>
       <?php require get_template_directory() . '/inc/content-dynamic-grid-manual.php'; ?>
   <?php endif; ?>

 <?php endwhile; ?>

<?php endif; ?>

<?php
// if ( get_row_layout() == 'xxxx' ) :
// require get_template_directory() . '/inc/';
?>

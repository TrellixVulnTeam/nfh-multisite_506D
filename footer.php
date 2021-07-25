<?php
/**
 *  Grindstone customize - 2021 June
 *
 */

 global $post;
 if (isset($post)) {
   $post_id = $post->ID;
   $post_type_name = get_post_type( $post_id );
 }

?>
<?php  $footerbg = get_template_directory_uri() . '/inc/assets/img/footer-bg.png'; ?>
<footer id="colophon" class="footer-wrap" role="contentinfo" style="background-image:url('<?php echo $footerbg; ?>');">
  <div class="container-fluid footer-wrap-upper">
      <div class="footer-inner container">
        <div class="row">
            <div class="col-12">
              <div class="footer-upper align-center">
                <?php  $footerlogo = get_field('logo_footer', 'options');
                if ($footerlogo) : ?>
                    <a class="logo--main logo--footer" href="<?php echo esc_url( home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                      <img src="<?php echo $footerlogo['url']; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                    </a>
               <?php
                endif; ?>
               <?php
                $sublogo_footer = get_field('sublogo_footer', 'options');
                if ($sublogo_footer) :
               ?>
                 <a class="logo--sub" href="<?php echo esc_url( home_url( '/' )); ?>" title="Western Health" alt="Western Health">
                   <img src="<?php echo $sublogo_footer['url']; ?>" alt="Western Health">
                 </a>
               <?php
                endif; ?>
             </div>
          </div>
        </div>
    	</div>
  </div>
  <div class="container-fluid footer-wrap-lower">
    <div class="footer-inner container">
      <div class="row">
          <div class="col-12">
            <div class="footer-lower align-left">
              <div class="footer--links">
                &copy; <?php echo date('Y'); ?> <?php echo ''.get_bloginfo('name').''; ?>. All rights reserved.
                <div class="list">
                  <?php
                    echo strip_tags(wp_nav_menu(array(
                    'container'       => false,
                    'menu_id'         => false,
                    'menu_class'      => 'footer-bottom-links',
                    'depth'           => 1,
                    'echo'            => false,
                    'items_wrap'      => '%3$s',
                    'before'           => '<span> • </span>',
                  )  ), '<a>' ) ;
                  ?>
                </div>
              </div>
              <div>
              </div>
              <div class="footer--social">
                <a href="<?php the_field('facebook_url', 'options'); ?>" target="_blank">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="<?php the_field('twitter_url', 'options'); ?>" target="_blank">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="<?php the_field('youtube_url', 'options'); ?>" target="_blank">
                  <i class="fab fa-youtube"></i>
                </a>
                <a href="<?php the_field('instagram_url', 'options'); ?>" target="_blank">
                  <i class="fab fa-instagram"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="footer--credits">
              <a class="credits" href="https://grindstone.com.au" target="_blank" title="Site by Grindstone | Website Support" alt="Site by Grindstone Creative (Geelong, Australia)"><img src="<?php echo get_template_directory_uri(); ?>/inc/assets/img/grindstone.svg" class="footer-logo" style="width:110px; height:auto;"></a>
            </div>
          </div>
        </div>
      </div>
  </div>
</footer>

<?php wp_footer(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>

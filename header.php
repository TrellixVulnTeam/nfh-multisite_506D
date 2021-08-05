<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

 if (isset($post)) {
   global $post;
   $post_id = $post->ID;
   $post_type_name = get_post_type( $post_id );
 }

 // Sub-Site Theming
 // -------------------
 // Add the classes into elements as required

 // Colours

 $header_menu_link_accent = get_field('header_menu_link_accent', 'options'); // menu link underlines
 $search_button = get_field('search_button', 'options'); // search icon
 $footer_background_colour = get_field('footer_background_colour', 'options');
 $main_accent_colour = get_field('main_accent_colouur', 'options'); // used for links, accents on tabs, sub headings inside pages, arrows, and more
 $secondary_accent_colour = get_field('secondary_accent_colour', 'options');
 $grid_card_border_colour = get_field('grid_card_border_colour', 'options');
 $grid_card_background_colour = get_field('grid_card_background_colour', 'options');
 $item_color_1 = get_field('item_color_1', 'options');  // automatic colouring on the grid items, bottom arrow accent colours
 $item_color_2 = get_field('item_color_2', 'options');
 $item_color_3 = get_field('item_color_3', 'options');
 $item_color_4 = get_field('item_color_4', 'options');

 $home_banner_background = get_field('home_banner_background', 'options');
 $home_button_links = get_field('button_links', 'options');
 $news_background = get_field('news_background', 'options');
 $news_background_active = get_field('news_background_active', 'options');
 $page_top_background = get_field('page_top_background', 'options');
 $page_bottom_background  = get_field('page_bottom_background', 'options');

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/inc/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/inc/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/inc/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/inc/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/inc/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
    <style type="text/css">

      .heading1 { font-family: 'intelo-bold', Helvetica, sans-serif; }
      .header_menu_link_accent { color: <?php echo $header_menu_link_accent ;?>; }
      .search_button { color: <?php echo $search_button; ;?> }
      .footer_background_colour { color: <?php echo $footer_background_colour ;?>; }
      .main_accent_colour { color: <?php echo $main_accent_colour ;?>; }
      .secondary_accent_colour { color: <?php echo $secondary_accent_colour ;?>; }
      .grid_card_border_colour { color: <?php echo $grid_card_border_colour ;?>; }
      .grid_card_background_colour { color: <?php echo $grid_card_background_colour ;?>; }
      .item_color_1 { color: <?php echo $item_color_1 ;?>; }
      .item_color_2 { color: <?php echo $item_color_2 ;?>; }
      .item_color_3 { color: <?php echo $item_color_3 ;?>; }
      .item_color_4 { color: <?php echo $item_color_4 ;?>; }
      .home_button_link { color: <?php echo $home_button_links; ?>; }
      .news_background { color: <?php echo $news_background; ?>; }
      .news_background_active { color: <?php echo $news_background_active; ?>; }

      footer .footer-lower .footer--social a:hover, .footerbg .footer-lower .footer--social a:hover { background: transparent; } .home_banner_background { background-image: url('<?php echo $home_banner_background['url']; ?>') !important; } .page_top_background { background-image: url('<?php echo $page_top_background['url']; ?>') !important; } .page_bottom_background { background-image: url('<?php echo $page_bottom_background['url']; ?>') !important; } header .header-desktop-menu .current_page_item a, header .header-desktop-menu .current-page-ancestor a, header .header-desktop-menu li a:hover { border-bottom: 10px solid<?php echo $header_menu_link_accent; ?>; } #search-btn, #search-modal .close { background:<?php echo $search_button; ?>; } .btn.black:hover { background-color:<?php echo $secondary_accent_colour; ?>; } .topbar .menu-quicklinks .dropdown-menu li.highlight a { background:<?php echo $search_button; ?>!important; color: white !important; } .topbar .menu-quicklinks .dropdown-menu li.highlight a:hover { background: black !important; } #section--home-tabbed { background-color:<?php echo $news_background; ?>; } .section--home-tabbed-content, .section--home-tabbed .nav-link.active { background-color:<?php echo $news_background_active; ?>; } .topbar--right a.sub:hover, .topbar .dropdown-menu a:hover, .topbar .menu-quicklinks a:hover { background-color:<?php echo $header_menu_link_accent; ?>!important; } div .grid-card-wrap:nth-child(4n+1) .grid-card .bottom-arrow { background:<?php echo $item_color_1; ?>!important; } div .grid-card-wrap:nth-child(4n+2) .grid-card .bottom-arrow { background:<?php echo $item_color_2; ?>!important; } div .grid-card-wrap:nth-child(4n+3) .grid-card .bottom-arrow { background:<?php echo $item_color_3; ?>!important; } div .grid-card-wrap:nth-child(4n+4) .grid-card .bottom-arrow { background:<?php echo $item_color_4; ?>!important; } .section-events .title, .profile-grid .content { color:<?php echo $secondary_accent_colour; ?>; } .section-events .bottom-arrow, .section-events .btn-link a:hover { background-color:<?php echo $secondary_accent_colour; ?>!important; } footer, .footerbg { background-color:<?php echo $footer_background_colour; ?>; } #single-page-content #breadcrumbs a, .single-page-content #breadcrumbs a, #single-page-content #breadcrumbs, .single-page-content #breadcrumbs { color: white; } .sidebar h3, .sidebar.related-depts ul.boxed li a, .inner-container ul.service_listings i, .sidebar.related-depts ul.boxed li a:before, .sidebar--recent ul.boxed li a:before, h2.filter-head { color:<?php echo $secondary_accent_colour; ?>; } .btn-print { } .sidebar ul.boxed li a:hover, .inner-container ul.accordions .accordion-title:before, .btn-share, .inner-container ul#the_alphabet_links li:hover { background-color:<?php echo $main_accent_colour; ?>; } .btn-print { background-color:<?php echo $footer_background_colour; ?>; }


    </style>

    <style type="text/css" media="print">
      body { visibility:hidden; padding: 0; margin: 0; }
      .print { visibility:visible; margin-top:-100px; }
      #subhead, #masthead, #single-page-header { display: none; }
    </style>

    <script src="https://kit.fontawesome.com/d9a1c28d57.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


<body <?php body_class(''); ?>>

<?php // WordPress 5.2 wp_body_open implementation
  if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); }
  else { do_action( 'wp_body_open' ); }
?>


<div id="page" class="site">

  <div style="background: black;">
  <header id="subhead" class="subhead subheader topbar body" role="navigation" >
    <div class="container-fluid no-gutters" style="padding-right:0;">
      <div class="row justify-content-between align-items-center">
         <div class="col-12 col-md-6 col-lg col-xl-4 topbar--left">
            <?php if (get_field('show_text_label', 'options')) { ?>
              <?php the_field('topbar_textlabel', 'options'); ?>
            <?php } ?>

            <?php if (get_field('show_link_label', 'options')) { ?>
              <span class="second">
                <?php $topleftlink = get_field('topbar_linkurl', 'options'); ?>
                <a target="_blank" href="<?php echo $topleftlink['url']; ?>"><?php the_field('topbar_linklabel', 'options'); ?></a>
              </span>
            <?php } ?>

            <?php if (get_field('show_link_label_2', 'options')) { ?>
              <span class="head-divider"> • </span>
              <span class="third">
                <?php $topleftlink2 = get_field('topbar_linkurl_2', 'options'); ?>
                <a target="_blank" href="<?php echo $topleftlink2['url']; ?>"><?php the_field('topbar_linklabel_2', 'options'); ?></a>
              </span>
            <?php } ?>
         </div>

         <div class="col-12 col-md-6 col-lg col-xl-8 topbar--right font-alt">

         <?php if ( get_field('show_custom_links', 'options') ): ?>
           <?php if( have_rows('custom_links', 'options') ): ?>
            <div class="topbar--title custom-links-desktop">
            <?php while( have_rows('custom_links', 'options') ): the_row();
                $toplink = get_sub_field('link');
                ?>
                <a class="sub" href="<?php echo get_the_permalink($toplink->ID) ?>">
                    <?php echo $toplink->post_title; ?>
                </a>
            <?php endwhile; ?>
            </div>
          <?php endif; ?>
        <?php endif; ?>

          <div class="topbar--menu menu-quicklinks">
            <?php
             wp_nav_menu(array(
              'menu'     =>  'Quicklinks',
              'depth'    =>  '2',
              'walker'   =>  new WP_Bootstrap_Navwalker(),
            ));
            ?>
          </div>

          <div class="topbar--menu">
           <?php
            wp_nav_menu(array(
             'menu'     =>  'Top Bar Menu',
             'depth'    =>  '2',
             'walker'   =>  new WP_Bootstrap_Navwalker(),
           ));
           ?>
          </div>


         </div>
      </div>
    </div>
  </header>
  </div>


	<header id="masthead" class="site-header navbar-static-top body <?php echo wp_bootstrap_starter_bg_class(); ?>" role="navigation">
        <div class="container-fluid">
            <div class="row justify-content-between">

                <div class="col-8 col-sm-8 col-md-8 col-lg-7 col-xl-3">
                    <?php
                      $headerlogo = get_field('logo_header', 'options');
                      if ($headerlogo) :
                    ?>
                      <a class="logo--main" href="<?php echo esc_url( home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        <img src="<?php echo $headerlogo['url']; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                      </a>
                    <?php endif; ?>
                    <?php
                      $sublogo = get_field('sublogo', 'options');
                      if ($sublogo) :
                    ?>
                      <a class="logo--sub" href="<?php echo esc_url( home_url( '/' )); ?>" title="Western Health" alt="Western Health">
                        <img src="<?php echo $sublogo['url']; ?>" alt="Western Health">
                      </a>
                    <?php endif; ?>
                </div>

                 <div class="col desktop-only" role="navigation">
                     <?php
                     wp_nav_menu(array(
                     'theme_location'    => 'primary',
                     'container'       => 'desktop-nav',
                     'container_id'    => 'desktop-nav',
                     'container_class' => 'justify-content-end',
                     'menu_id'         => false,
                     'menu_class'      => 'header-desktop-menu',
                     'depth'           => 3,
                     ));
                     ?>
                 </div>

                 <div class="col-2 col-sm-2 col-md-2 col-lg-4 align-right mobile-only mobile-btn-contain">
                     <input type="checkbox" id="menu-toggle" class="menu-toggle-btn" aria-expanded="false" aria-label="Toggle Mobile Menu navigation links" role="navigation"/>
                     <label for="menu-toggle" class="menu-toggle-label"><i></i></label>
                 </div>

                <div class="col-2 col-lg-1 col-xl-1 align-right">
                  <a id="search-btn" class="search-btn" role="search">
                    <i class="fa fa-search"></i>
                  </a>
                </div>


            </div>
        </div>
	</header>

  <nav id="mobile-menu" class="mobile-menu-container">
    <div class="mobile-menu-popdown" role="navigation">
        <?php
        wp_nav_menu(array(
        'theme_location'    => 'primary',
        'container'       => 'mobile-nav',
        'container_id'    => 'mobile-nav',
        'container_class' => 'justify-content-end',
        'menu_id'         => false,
        'menu_class'      => 'mobile-menu',
        'depth'           => 3,
        ));
        ?>

        <?php if ( get_field('show_custom_links', 'options') ): ?>
          <?php if( have_rows('custom_links', 'options') ): ?>
           <ul class="mobile-menu custom-links--mobile">
           <?php while( have_rows('custom_links', 'options') ): the_row();
               $toplink = get_sub_field('link');
               ?>
               <li>
                 <a class="sub" href="<?php echo get_the_permalink($toplink->ID) ?>">
                     <?php echo $toplink->post_title; ?>
                 </a>
              </li>
           <?php endwhile; ?>
         </ul>
         <?php endif; ?>
       <?php endif; ?>

    </div>
  </nav>

  <div id="search-modal" class="search-modal-container">
    <div class="search-modal-inner" role="search">
      <div class="close"><i class="fa far fa-times"></i></div>
      <?php get_search_form(); ?>
    </div>
  </div>

  <div class="locker"></div>

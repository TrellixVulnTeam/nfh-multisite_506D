<?php
/**
 * WP Bootstrap Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_Starter
 */

if ( ! function_exists( 'wp_bootstrap_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_bootstrap_starter_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Bootstrap Starter, use a find and replace
	 * to change 'wp-bootstrap-starter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-bootstrap-starter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'wp-bootstrap-starter' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

    function wp_boostrap_starter_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'wp_boostrap_starter_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'wp_bootstrap_starter_setup' );


/**
 * Add Welcome message to dashboard
 */
function wp_bootstrap_starter_reminder(){
        $theme_page_url = 'grindstone.com.au';

            if(!get_option( 'triggered_welcomet')){
                $message = sprintf(__( 'Welcome! please visit the <a style="color: #fff; font-weight: bold;" href="%1$s" target="_blank">theme\'s</a> page for access to dozens of tips and in-depth tutorials.', 'wp-bootstrap-starter' ),
                    esc_url( $theme_page_url )
                );

                printf(
                    '<div class="notice is-dismissible" style="background-color: #6C2EB9; color: #fff; border-left: none;">
                        <p>%1$s</p>
                    </div>',
                    $message
                );
                add_option( 'triggered_welcomet', '1', '', 'yes' );
            }

}
add_action( 'admin_notices', 'wp_bootstrap_starter_reminder' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bootstrap_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_bootstrap_starter_content_width', 1170 );
}
add_action( 'after_setup_theme', 'wp_bootstrap_starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_bootstrap_starter_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'wp-bootstrap-starter' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'wp-bootstrap-starter' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'wp-bootstrap-starter' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'wp-bootstrap-starter' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wp_bootstrap_starter_widgets_init' );


function wp_bootstrap_starter_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( home_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "wp-bootstrap-starter" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "wp-bootstrap-starter" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "wp-bootstrap-starter" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter( 'the_password_form', 'wp_bootstrap_starter_password_form' );



// Allow SVG - not in by default anymore.
// if persist, use UNFILTERED WP UPLOADS mod

add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );


// --------------------------------------------------------
// --------------------------------------------------------
//
//	Grindstone 2021 _ Custom WP Development
//
// --------------------------------------------------------
// --------------------------------------------------------

add_theme_support( 'automatic-feed-links' ); // for rss / feeds / seo to have this

add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'customize-selective-refresh-widgets' );

add_theme_support( 'html5',
								array(
									'search-form',
									'comment-form',
									'comment-list',
									'gallery',
									'caption',
								)
);


// --------------------------------------------------------
// Defaults

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load plugin compatibility file.
 */
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';




// ----------------------------------------------------
//    Enqueue scripts and styles for GRINDSTONE THEME


// include File Generator
function generate_file_version( $path ) {
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );
	$file_version  = $theme_version . '.' . filemtime( get_stylesheet_directory() . $path );
	return $file_version;
}



// custom image sizes

//add_image_size( 'custom-size', 220, 180, true ); // 220 pixels wide by 180 pixels tall, hard crop mode
add_image_size( 'xlarge', 1600, 1800 ); // 220 pixels wide by 180 pixels tall, soft proportional crop mode


// starter scripts
function wp_bootstrap_starter_scripts() {


        wp_enqueue_style( 'wp-bootstrap-starter-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );
        wp_enqueue_style( 'wp-bootstrap-starter-fontawesome-cdn', get_template_directory_uri() . '/inc/assets/css/fontawesome.min.css' );
				wp_enqueue_style( 'appcss', get_template_directory_uri() . '/build/css/app.css', array(), filemtime(get_stylesheet_directory() . '/build/css/app.css'), 'all' );

		wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

	// load bootstrap js
    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        wp_enqueue_script('wp-bootstrap-starter-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1/dist/umd/popper.min.js', array(), '', true );
    	wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js', array(), '', true );
			wp_enqueue_script( 'appjs', get_template_directory_uri() . '/inc/assets/js/app.js', array(), filemtime(get_stylesheet_directory() . '/inc/assets/js/app.js'), true );

    } else {
        wp_enqueue_script('wp-bootstrap-starter-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true );
        wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.bundle.min.js', array(), '', true );
				wp_enqueue_script( 'appjs', get_template_directory_uri() . '/inc/assets/js/app.js', array(), filemtime(get_stylesheet_directory() . '/inc/assets/js/app.js'), true );

    }
    wp_enqueue_script('wp-bootstrap-starter-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true );
	wp_enqueue_script( 'wp-bootstrap-starter-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_starter_scripts' );




// ------------------------------------------------
// Remove Gutenberg default

add_filter( 'use_block_editor_for_post', '__return_false' );
//remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
}

add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );
// Don't load Gutenberg-related stylesheets.
function remove_block_css() {
		wp_dequeue_style('remove_block_css');
}

add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );



// shove YOAST to bottom
// ----------
add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );


// ------------------------------------------------
// Create options pages for clients

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'parent_slug'	=> 'site-general-settings',
	));

}

	/*
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Department Settings',
			'menu_title'	=> 'Departments',
			'parent_slug'	=> 'site-general-settings',
		));
	*/

// ------------------------
// custom breadcrumbs

function the_breadcrumb() {

    $sep = '<div class="bc-separator"> < </div>';

    if (!is_front_page()) {

			// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a>' . $sep;

				// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
				if ( !is_search() ) {

					// post type
					if (  ( get_post_type( get_the_ID() ) == 'bulletins' ) &&  (!has_term('words-from-russell', 'bulletin_category'))   )  {
						echo '<a href="'.site_url().'/executive-bulletins/">Bulletins</a>';
					}

					if (  ( get_post_type( get_the_ID() ) == 'bulletins' ) &&  (has_term('words-from-russell', 'bulletin_category'))   )  {
						echo '<a href="'.site_url().'/westerly-words-from-russell/">Words from Russell</a>';
					}

					if ( get_post_type( get_the_ID() ) == 'news' ) {
						echo '<a href="'.site_url().'/news-updates/">News & Updates</a>';
					}

					if ( get_post_type( get_the_ID() ) == 'profiles' ) {
						$terms1 = get_the_terms( $post->ID, 'department' );
						echo '<a href="'.site_url().'/nursing-midwifery-profile/">Nursing & Midwifery Profiles</a>';
						echo $sep;
						echo '<a href="'. site_url() .'/nursing-midwifery-profile#dept-'. $terms1[0]->slug .'">' . $terms1[0]->name . '</a>';
					}

					if ( get_post_type( get_the_ID() ) == 'events' ) {
						echo '<a href="'.site_url().'/westerly-events/">Events</a>';
					}

					if ( get_post_type( get_the_ID() ) == 'qrg' ) {
						echo '<a href="'.site_url().'/resources/">Resources</a>';
					}

					if ( get_post_type( get_the_ID() ) == 'qrg' ) {
						echo '<a href="'.site_url().'/quick-reference-guides/">Quick Reference Guides</a>';
					}

					if ( is_post_type_archive( 'bulletins' ) ) {
						echo '<a href="'.site_url().'/executive-bulletins/">Bulletins</a>';
					}

					if ( is_404() ) {
						echo '<a href="'.site_url().'">404 Error: Page not found</a>';
					}

				}

				if ( is_search() ) {
					echo '<a href="'.site_url().'">Search Results</a>';
				}


				global $post;
				if ( is_page() && $post->post_parent ) {
					$post_parent_id = $post->post_parent;

					$anc = get_post_ancestors( $post->ID );
					krsort($anc);
          $anc_link = get_page_link( $post->post_parent );

          foreach ( $anc as $ancestor ) { ?>
              <a href="<?php echo $anc_link; ?>"><?php echo get_the_title($ancestor); ?></a><?php echo $sep; ?>
         	 <?php }

				}

				// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }

				// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }

				// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) {
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}

// ---------------------
// custom OG image tags

add_action('wp_head', 'og_custom_meta');
function og_custom_meta(){
    //if( is_front_page() ) { // 																	'. get_the_post_thumbnail_url(get_the_ID(),'full')   .'
			global $post;
			echo '<meta property="og:image" content="' . get_template_directory_uri() . '/inc/assets/img/og-img.jpg" />';

			//echo '<meta name="' .   . '"/>'
    //}
}


add_filter( 'Yoast\WP\ACF\blacklist_name', function ( $blacklist_name ) {
    $blacklist_name->add( the_content() );
    return $blacklist_name;
});



// -----------------------------------------------------------
// populate a backend ACF field, to allow selecting Post Types
		/*
			NOT USED , made it manual in the end

		add_filter('acf/load_field/name=grid_which_posts', 'acf_load_post_types'); // pass the field we need  to populate
		function acf_load_post_types($field) { 													// pass the field in, grid_which_posts
		    foreach ( get_post_types( '', 'names' ) as $post_type ) {		// get ALL post types, loop through Each found
		       $field['choices'][$post_type] = $post_type; 							// set & build the Array  [choices]
		    }
		    return $field;																							// return the [choices] fields all finished as an array
																																		// Fin. This will populate & show on the WP admin page when editing now!
		}

		*/



// ------------------------
// insert






// ------------------------
// insert






// ------------------------
// insert





// ------------------------
// insert






// ------------------------
// insert

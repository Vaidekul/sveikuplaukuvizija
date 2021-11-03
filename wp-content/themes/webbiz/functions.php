<?php
/**
 * webbiz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package webbiz
 */

if ( ! function_exists( 'webbiz_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function webbiz_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on webbiz, use a find and replace
		 * to change 'webbiz' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'webbiz', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'webbiz' ),
			'menu-2' => esc_html__( 'Mobile Menu', 'webbiz' ),
			'menu-3' => esc_html__( 'Sidebar Menu', 'webbiz' ),
			'menu-4' => esc_html__( 'Sveiku Plauku Vizija', 'webbiz' ),
			'menu-5' => esc_html__( 'Darbo Laikas', 'webbiz' ),
			'menu-6' => esc_html__( 'Informacija', 'webbiz' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'webbiz_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		/**
		* Add support for SVG image uploads
		*
		*/
		function add_svg_to_upload_mimes( $upload_mimes ) {
			$upload_mimes['svg'] = 'image/svg+xml';
			$upload_mimes['svgz'] = 'image/svg+xml';
			return $upload_mimes;
		}
		add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );
	}
endif;
add_action( 'after_setup_theme', 'webbiz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function webbiz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'webbiz_content_width', 640 );
}
add_action( 'after_setup_theme', 'webbiz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function webbiz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'webbiz' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'webbiz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Store Sidebar', 'webbiz' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'webbiz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'webbiz_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function webbiz_scripts() {
	
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fontawesome/css/fontawesome.css' );
	wp_enqueue_style( 'fontawesome-all', get_template_directory_uri() . '/fontawesome/css/fontawesome-all.css' );
	wp_enqueue_style( 'slick', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css' );
	wp_enqueue_style( 'slick_theme', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css' );
	wp_enqueue_style( 'aos', '//cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css' );
	// Styles
	if ( defined( 'WP_LOCAL_DEV' ) && WP_LOCAL_DEV ) {
		wp_enqueue_style( 'webbiz-style', get_template_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory().'/style.css')  );
	} else {
		wp_enqueue_style( 'webbiz-style', get_template_directory_uri() . '/style.min.css', array(), filemtime( get_stylesheet_directory().'/style.min.css')  );
	}

	// Scripts
	$google_key = get_field('google_maps_key', 'option');
	if($google_key) {
		wp_enqueue_script('wbproject-g-maps-js', '//maps.googleapis.com/maps/api/js?v=3.exp&key='.$google_key, '', '', true );
	}
	wp_enqueue_script( 'acf-google-maps', get_template_directory_uri() . '/js/acf-google-maps.js', array(), '20151215', true );
	wp_enqueue_script( 'webbiz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'webbiz-modernizer', get_template_directory_uri() . '/js/modernizr.js', array(), '20151215', true );
	wp_enqueue_script( 'webbiz-browser', get_template_directory_uri() . '/js/browser_detect.js', array(), '20151215', true );
	wp_enqueue_script( 'webbiz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( defined( 'WP_LOCAL_DEV' ) && WP_LOCAL_DEV ) {
		wp_register_script( 'webbiz-custom', get_template_directory_uri() . '/js/dist/bundle.js', array('jquery'), filemtime( get_stylesheet_directory().'/js/dist/bundle.js'), true );
	} else {
		wp_register_script( 'webbiz-custom', get_template_directory_uri() . '/js/dist/bundle.js', array('jquery'), filemtime( get_stylesheet_directory().'/js/dist/bundle.js'), true );
	}
	$backup_img = get_field('backup_img', 'option');
	$backup_img = $backup_img['url'];
	$local_array = array(
		'site_url' => get_home_url(),
		'post_per_page' => get_option( 'posts_per_page' ),
		'page_id' => get_the_id(),
		'backup_img' => $backup_img
	);

	wp_localize_script( 'webbiz-custom', 'local_vars', $local_array );		

	wp_enqueue_script( 'webbiz-custom');
}
add_action( 'wp_enqueue_scripts', 'webbiz_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
 require get_template_directory() . '/inc/webbiz-functions.php';
 require get_template_directory() . '/inc/minify-html.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
// if ( class_exists( 'WooCommerce' ) ) {
// 	require get_template_directory() . '/inc/woocommerce.php';
// }

// Load Woocommerce customisations
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce/general.php';
}

// DIV SHORTCODE. Usage: [div id="ID" class="CLASS"]xxxx[/div]
function createDiv($atts, $content = null) {
	extract(shortcode_atts(array(
	   'id' => "",
	   'class' => "",
	), $atts));
 return '<div id="'. $id . '" class="'. $class . '" />' . $content . '</div>';
 }
 add_shortcode('div', 'createDiv');

  /* IF Affiliate code set cookie */
function if_name_set_cookie($ref, $name){
	if(isset($_GET[$ref])){
		$path = $_SERVER['HTTP_HOST'] == "localhost" ? '/' : null;
		$domain =($_SERVER['HTTP_HOST'] != 'localhost')? $_SERVER['HTTP_HOST'] : false;
		setcookie($name, $_GET[$ref], time()+ 86400 * 30, '/', $domain);  /* expire in 24 hour */
	}
}
if_name_set_cookie('refid', 'affiliatedTo');
if_name_set_cookie('cmp', 'campaignId');
function is_cookie_set($ref, $name){
	if(isset($_GET[$ref])){
		return $cookie =$_GET[$ref];
	}else{
		if(isset($_COOKIE[$name])){
			return $cookie = $_COOKIE[$name];
		}else{
			return $cookie = '';
		}
	}
}

// // To change add to cart text on single product page
// add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
// function woocommerce_custom_single_add_to_cart_text() {
//     return __( 'Į krepšelį', 'woocommerce' ); 
// }

// // To change add to cart text on product archives(Collection) page
// add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
// function woocommerce_custom_product_add_to_cart_text() {
//     return __( 'Įsigyti', 'woocommerce' );
// }

add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_select_options_text' );
  function custom_select_options_text() {
  global $product;
  $product_type = $product->product_type;
  switch ( $product_type ) {
  case 'subscription':
  return __( 'Pasirinkti', 'woocommerce' ); /*change 'Options' for Simple Subscriptions */
  case 'variable-subscription':
  return __( 'Pasirinkti', 'woocommerce' ); /*change 'Options' for Variable Subscriptions */
  case 'variable':
  return __( 'Pasirinkti', 'woocommerce' ); /*change 'Options' for Variable Products */
  case 'simple':
  return __( 'Į krepšelį', 'woocommerce' ); /*change 'Add to Cart' for Simple Products */
  break;
      }
  }

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 21;
  return $cols;
}

function remove_image_zoom_support() {
	remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );

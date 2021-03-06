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
			'menu-7' => esc_html__( 'Pilnas Mobile Menu', 'webbiz' ),
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
//     return __( '?? krep??el??', 'woocommerce' ); 
// }

// // To change add to cart text on product archives(Collection) page
// add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
// function woocommerce_custom_product_add_to_cart_text() {
//     return __( '??sigyti', 'woocommerce' );
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
  return __( '?? krep??el??', 'woocommerce' ); /*change 'Add to Cart' for Simple Products */
  break;
      }
  }

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options ???> Reading
  // Return the number of products you wanna show per page.
  $cols = 21;
  return $cols;
}

function remove_image_zoom_support() {
	remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );




// add_filter( 'yith_wcan_ajax_frontend_classes', 'uncode_yith_ajax_filters' );

// function uncode_yith_ajax_filters( $opts ){
// 	$opts['container'] = '.isotope-container';
// 	$opts['pagination'] = '.pagination';
// 	$opts['result_count'] = '.woocommerce-result-count';
// 	$opts['scroll_top'] = '.isotope-system';
// 	return $opts;
// }

// function action_woocommerce_shortcode_products_loop_no_results( $attributes ) {
// 	echo __( 'My custom message', 'woocommerce' );
// }
// add_action( 'woocommerce_shortcode_products_loop_no_results', 'action_woocommerce_shortcode_products_loop_no_results', 10, 1 );

// add_action( 'woocommerce_no_products_found', function(){
// 	remove_action( 'woocommerce_no_products_found', 'wc_no_products_found', 10 );

// 	// HERE change your message below
// 	$message = __( 'No products were found matching your selection.', 'woocommerce' );

// 	echo '<p class="woocommerce-info error">' . $message .'</p>';

// }, 9 );

/** Remove product data tabs */
 
add_filter( 'woocommerce_product_tabs', 'my_remove_product_tabs', 98 );
 
function my_remove_product_tabs( $tabs ) {
  unset( $tabs['additional_information'] ); // To remove the additional information tab
  return $tabs;
}


add_filter('woocommerce_dropdown_variation_attribute_options_args', 'custom_dropdown_choice', 10);
function custom_dropdown_choice( $args ){
	$args['selected'] = $args['options'][0];
	// echo "<pre>";
	// print_r($args);
	// echo "</pre>";
  // $args['show_option_none'] = "-- Select an option --";
	// echo '<select name="" id="">	<option value="">My name</option></select>';


  return $args;
  
}
/* Return all keys for product search */
function return_keys(){
	$key = $e = [];
	$data = $_GET['data'];
	
	foreach($data as $item){
		$key[] = strtoupper($item['name'] . intval($item['value']));
	}
		
	if(in_array('A1', $key) and in_array('B4', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['A1', 'B4']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['A1', 'B4']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['C4', 'B4']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['C5', 'B4']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['C6', 'B4']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['C1', 'B1', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['C1', 'B2', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['C1', 'B3', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['C1', 'B4', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C2', $key) and in_array('D2', $key)){ $key = ['C2', 'B1', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['A1', 'B1', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C4', $key) and in_array('D2', $key)){ $key = ['C4', 'B1', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C5', $key) and in_array('D2', $key)){ $key = ['C5', 'B1', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C6', $key) and in_array('D2', $key)){ $key = ['C6', 'B1', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C2', $key) and in_array('D2', $key)){ $key = ['C2', 'B2', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['A1', 'B2', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C4', $key) and in_array('D2', $key)){ $key = ['C4', 'B2', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C5', $key) and in_array('D2', $key)){ $key = ['C5', 'B2', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C6', $key) and in_array('D2', $key)){ $key = ['C6', 'B2', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C2', $key) and in_array('D2', $key)){ $key = ['B3', 'C2', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['A1', 'C3', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C4', $key) and in_array('D2', $key)){ $key = ['B3', 'C4', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['C5', 'B3', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['B1', 'C1']; }
	elseif(in_array('A2', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A2', 'B1']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A3']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A4']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['C1', 'B2']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A1', 'B3']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A1', 'B4']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['B1', 'C2']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['A1', 'B1']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['C4', 'B1']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C5', $key) and in_array('D1', $key)){ $key = ['C5', 'B1']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['C6', 'B1']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['C2', 'B2']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['A1', 'B2']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['C4', 'B2']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C5', $key) and in_array('D1', $key)){ $key = ['C5', 'B2']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['C6', 'B2']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['C2', 'B3']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['A1', 'B3']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['C4', 'B3']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['C5', 'B3']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['C6', 'B3']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C6', $key) and in_array('D2', $key)){ $key = ['B3', 'C6', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C2', $key) and in_array('D2', $key)){ $key = ['C2', 'B4', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['A1', 'B4', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C4', $key) and in_array('D2', $key)){ $key = ['C4', 'B4', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C5', $key) and in_array('D2', $key)){ $key = ['C5', 'B4', 'D2']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C6', $key) and in_array('D2', $key)){ $key = ['C6', 'B4', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A2', 'B1']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A2', 'B2']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['B3', 'C1']; }
	elseif(in_array('A2', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A2', 'B4']; }
	elseif(in_array('A2', $key) and in_array('B1', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['B1', 'C2']; }
	elseif(in_array('A2', $key) and in_array('B1', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['A2', 'B1']; }
	elseif(in_array('A2', $key) and in_array('B1', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['C4', 'B1']; }
	elseif(in_array('A2', $key) and in_array('B1', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['C5', 'B1']; }
	elseif(in_array('A2', $key) and in_array('B1', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['B1', 'C6']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['C2', 'B2']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['B2', 'C3']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['C4', 'B2']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C5', $key) and in_array('D1', $key)){ $key = ['C5', 'B2']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['C6', 'B2']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A2', 'B3']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['B3', 'C2']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['B3', 'C3']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['C4', 'B3']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C5', $key) and in_array('D1', $key)){ $key = ['B3', 'C5']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['B3', 'C6']; }
	elseif(in_array('A2', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['C1', 'B4']; }
	elseif(in_array('A2', $key) and in_array('B4', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['C2', 'B4']; }
	elseif(in_array('A2', $key) and in_array('B4', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['A2', 'B3']; }
	elseif(in_array('A2', $key) and in_array('B4', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['B4', 'C4']; }
	elseif(in_array('A2', $key) and in_array('B4', $key) and in_array('C5', $key) and in_array('D1', $key)){ $key = ['B4', 'C5']; }
	elseif(in_array('A2', $key) and in_array('B4', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['B4', 'C6']; }
	elseif(in_array('A2', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['C1', 'B1', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['C1', 'B2', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['C1', 'B3', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['C1', 'B4', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C2', $key) and in_array('D2', $key)){ $key = ['C2', 'B2', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['A2', 'B2', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C4', $key) and in_array('D2', $key)){ $key = ['B2', 'C4', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C5', $key) and in_array('D2', $key)){ $key = ['C5', 'B2', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C6', $key) and in_array('D2', $key)){ $key = ['C6', 'B2', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['C1', 'B3', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C2', $key) and in_array('D2', $key)){ $key = ['B3', 'C2', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['A2', 'B3', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C4', $key) and in_array('D2', $key)){ $key = ['B3', 'C4', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C5', $key) and in_array('D2', $key)){ $key = ['B3', 'C5', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C6', $key) and in_array('D2', $key)){ $key = ['B3', 'C6', 'D2']; }
	elseif(in_array('A2', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['C1', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B1', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['C2', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B1', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['A2', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B1', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['C4', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B1', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['C5', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B1', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['A2', 'C6', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A2', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['C2', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['A2', 'B2', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['C4', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['C5', 'B2', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B2', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['C6', 'A2', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A2', 'B3', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['B3', 'C2', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['A2', 'B3', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C4', $key) and in_array('D4', $key)){ $key = ['C4', 'B3', 'D4']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['B3', 'C5', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B3', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['B3', 'A2', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A2', 'B4', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B4', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['B4', 'C2', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B4', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['B4', 'C3', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B4', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['B4', 'C4', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B4', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['B4', 'C5', 'D3']; }
	elseif(in_array('A2', $key) and in_array('B4', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['C6', 'B4', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['C1', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A1', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A1', 'B3', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A1', 'B4', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['C2', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['A1', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['C4', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B1', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['C5', 'D3']; }
	elseif(in_array('AI', $key) and in_array('B1', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['C6', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['C2', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['A1', 'B2', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['B2', 'C4', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['C5', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B2', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['A1', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['C2', 'B3', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['B3', 'C3', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['C4', 'D3', 'B3']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['C5', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B3', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['A1', 'D3', 'B3']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A1', 'B4', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['B4', 'C2', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['A1', 'B4', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['B4', 'C4', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['C5', 'B4', 'D3']; }
	elseif(in_array('A1', $key) and in_array('B4', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['A1', 'B4', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A3']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A3', 'B2']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A3', 'B3']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A3', 'B4']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['A3', 'D1']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['A3', 'D1']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['A3', 'C4']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C5', $key) and in_array('D1', $key)){ $key = ['A3']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['A3', 'C6']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A3']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['A3', 'C2']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['A3', 'D1']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['A3', 'C4']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C5', $key) and in_array('D1', $key)){ $key = ['A3']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['A3']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A3', 'B3']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['A3', 'B3']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['A3', 'B3']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['A3', 'D4']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C5', $key) and in_array('D1', $key)){ $key = ['A3', 'B3']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['A3', 'B3']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A3', 'B4']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['A3', 'B4']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['A3', 'B4']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['A3', 'C4']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C5', $key) and in_array('D1', $key)){ $key = ['A3', 'B4']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['A3', 'D1']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['A3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C2', $key) and in_array('D2', $key)){ $key = ['A3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['A3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C4', $key) and in_array('D2', $key)){ $key = ['A3', 'C4', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C5', $key) and in_array('D2', $key)){ $key = ['A3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C6', $key) and in_array('D2', $key)){ $key = ['A3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['A3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C2', $key) and in_array('D2', $key)){ $key = ['A3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['A3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C4', $key) and in_array('D2', $key)){ $key = ['A3', 'C4', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C5', $key) and in_array('D2', $key)){ $key = ['A3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C6', $key) and in_array('D2', $key)){ $key = ['A3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['A3', 'B3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C2', $key) and in_array('D2', $key)){ $key = ['A3', 'B3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['A3', 'B3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C4', $key) and in_array('D2', $key)){ $key = ['A3', 'C4', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C5', $key) and in_array('D2', $key)){ $key = ['A3', 'B3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C6', $key) and in_array('D2', $key)){ $key = ['A3', 'B3', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['A3', 'B4', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C2', $key) and in_array('D2', $key)){ $key = ['A4', 'B4', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['A3', 'B4', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C4', $key) and in_array('D2', $key)){ $key = ['A3', 'C4', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C5', $key) and in_array('D2', $key)){ $key = ['A3', 'B4', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C6', $key) and in_array('D2', $key)){ $key = ['A3', 'B4', 'D2']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['A3', 'C4', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B1', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['A3', 'C4', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B2', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['A3', 'C4', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B3', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['A3', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A3', 'B4', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['A3', 'B4', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['A3', 'B4', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['A3', 'C4', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['A3', 'B4', 'D3']; }
	elseif(in_array('A3', $key) and in_array('B4', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['A3', 'B4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A4']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['A4', 'C2']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['A4']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['A4', 'C4']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C5', $key) and in_array('D1', $key)){ $key = ['A4']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['A4']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A4']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['A4']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['A4']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['A4', 'C4']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C5', $key) and in_array('D1', $key)){ $key = ['A4']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['A4']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A4', 'B3']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['A4', 'B3']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['A4', 'B3']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['A4', 'C4']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C5', $key) and in_array('D1', $key)){ $key = ['A4', 'B3']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['A4', 'B3']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D1', $key)){ $key = ['A4', 'B4']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C2', $key) and in_array('D1', $key)){ $key = ['A4', 'B4']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C3', $key) and in_array('D1', $key)){ $key = ['A4', 'B4']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C4', $key) and in_array('D1', $key)){ $key = ['A4', 'C4']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C5', $key) and in_array('D1', $key)){ $key = ['A4', 'B4']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C6', $key) and in_array('D1', $key)){ $key = ['A4', 'B4']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['A4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C2', $key) and in_array('D2', $key)){ $key = ['A4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['A4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C4', $key) and in_array('D2', $key)){ $key = ['A4', 'C4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C5', $key) and in_array('D2', $key)){ $key = ['A4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C6', $key) and in_array('D2', $key)){ $key = ['A4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['A4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C2', $key) and in_array('D2', $key)){ $key = ['A4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['A4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C4', $key) and in_array('D2', $key)){ $key = ['A4', 'C4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C5', $key) and in_array('D2', $key)){ $key = ['A4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C6', $key) and in_array('D2', $key)){ $key = ['A4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['A4', 'D2', 'B3']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C2', $key) and in_array('D2', $key)){ $key = ['A4', 'B3', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['A4', 'B3', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C4', $key) and in_array('D2', $key)){ $key = ['A4', 'C4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C5', $key) and in_array('D2', $key)){ $key = ['A4', 'B3', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C6', $key) and in_array('D2', $key)){ $key = ['A4', 'B3', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D2', $key)){ $key = ['A4', 'B4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C2', $key) and in_array('D2', $key)){ $key = ['A4', 'B4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C3', $key) and in_array('D2', $key)){ $key = ['A4', 'B4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C4', $key) and in_array('D2', $key)){ $key = ['A4', 'B4', 'C4']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C5', $key) and in_array('D2', $key)){ $key = ['A4', 'B4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C6', $key) and in_array('D2', $key)){ $key = ['A4', 'B4', 'D2']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['A4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['A4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['A4', 'C4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['A4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B1', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['A4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['A4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['A4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['A4', 'C4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['A4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B2', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['A4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A4', 'B3', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['A4', 'B3', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['A4', 'D3', 'B3']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['A4', 'C4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['A4', 'B3', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B3', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['A4', 'B3', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C1', $key) and in_array('D3', $key)){ $key = ['A4', 'B4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C2', $key) and in_array('D3', $key)){ $key = ['A4', 'B4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C3', $key) and in_array('D3', $key)){ $key = ['A4', 'D3', 'B4']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C4', $key) and in_array('D3', $key)){ $key = ['A4', 'C4', 'B4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C5', $key) and in_array('D3', $key)){ $key = ['A4', 'B4', 'D3']; }
	elseif(in_array('A4', $key) and in_array('B4', $key) and in_array('C6', $key) and in_array('D3', $key)){ $key = ['A4', 'D3', 'B4']; }

	foreach($data as $item){
		if($item['name'] == 'e' or $item['name'] == 'E'){
			$key[] = strtoupper($item['name'] . intval($item['value']));
		}
	}

	return $key;
}

/* Register AJAX call */
add_action( 'wp_ajax_quiz_results', 'quiz_results' );
add_action( 'wp_ajax_nopriv_quiz_results', 'quiz_results' );

function quiz_results(){
	$e = [];
	$key = return_keys();

		$args = [
		'post_type' => 'product',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'pa_testas',
				'field' => 'slug',
				'terms' => $key,
			),
		)
		];
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
			// echo '<div class="container">';
			echo '<h2 class="mb-5" style="style="width: 100%;"">Jums tinkami produktai:</h2>';
			echo '<ul class="products row test-result ">';
			

	
		
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				get_template_part( 'template-parts/components/card-product-test' );
			}

			echo '</ul>';
			// echo '</div>';
		} else {
			echo '<ul class="products row" data-layout="elaina" data-uk-grid="">
			<li>Nerasta produkt?? pagal pasirinktus atsakymus.</li>
		</ul>';
		}
		
		wp_die();
}

function custom_track_product_view() {
	if ( ! is_singular( 'product' ) ) {
			return;
	}

	global $post;

	if ( empty( $_COOKIE['woocommerce_recently_viewed'] ) )
			$viewed_products = array();
	else
			$viewed_products = (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] );

	if ( ! in_array( $post->ID, $viewed_products ) ) {
			$viewed_products[] = $post->ID;
	}

	if ( sizeof( $viewed_products ) > 15 ) {
			array_shift( $viewed_products );
	}

	// Store for session only
	wc_setcookie( 'woocommerce_recently_viewed', implode( '|', $viewed_products ) );
}

add_action( 'template_redirect', 'custom_track_product_view', 20 );

add_shortcode( 'recently_viewed_products', 'bbloomer_recently_viewed_shortcode' );
 
function bbloomer_recently_viewed_shortcode() {
 
   $viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', wp_unslash( $_COOKIE['woocommerce_recently_viewed'] ) ) : array();
   $viewed_products = array_reverse( array_filter( array_map( 'absint', $viewed_products ) ) );
 
   if ( empty( $viewed_products ) ) return;
    
   $title = '<div class="last-seen"><h4 class="mt-4 pt-5">Taip pat ??i??r??jote</h4>';
   $product_ids = implode( ",", $viewed_products );
	 $close = '</div>';
 
   return $title . do_shortcode("[products limit='4' columns='4' ids='$product_ids']") . $close;
   
}

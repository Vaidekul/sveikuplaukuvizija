<?php 
// general customisations to woocommerce

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function webbiz_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'webbiz_woocommerce_setup' );


// AJAX cart count 
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

function iconic_cart_count_fragments( $fragments ) {
	
	$count = WC()->cart->get_cart_contents_count();

	if(!$count <= 0) {
		$fragments['div.header-cart-count'] = '<div class="header-cart-count">' . $count . '</div>';
		return $fragments;
	}
}


/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );


if ( ! function_exists( 'webbiz_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function webbiz_woocommerce_wrapper_before() {
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="container padding-med">
					<div class="row justify-content-center">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'webbiz_woocommerce_wrapper_before' );

if ( ! function_exists( 'webbiz_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function webbiz_woocommerce_wrapper_after() {
		?>	
					</div><!-- row -->
				</div> <!-- container -->
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'webbiz_woocommerce_wrapper_after' );


// disable product reviews
// add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
//   function wcs_woo_remove_reviews_tab($tabs) {
//     unset($tabs['reviews']);
//   return $tabs;
// }


/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function webbiz_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'webbiz_woocommerce_active_body_class' );



/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function webbiz_woocommerce_scripts() {
	wp_enqueue_style( 'webbiz-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'webbiz-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'webbiz_woocommerce_scripts' );


/**
 * Products per page.
 *
 * @return integer number of products.
 */
function webbiz_woocommerce_products_per_page() {
	return 8;
}
add_filter( 'loop_shop_per_page', 'webbiz_woocommerce_products_per_page' );


/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function webbiz_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'webbiz_woocommerce_thumbnail_columns' );


/**
 * Wrap product thumbnail open
 */
add_action('woocommerce_before_shop_loop_item_title', 'wrap_product_thumbnail_open', 9);

function wrap_product_thumbnail_open() {
  echo '<div class="shop-product-thumbnail">';
}

/**
 * Wrap product thumbnail close
 */
add_action('woocommerce_before_shop_loop_item_title', 'wrap_product_thumbnail_close', 11);

function wrap_product_thumbnail_close() {
  echo '</div>';
}


/**
 * Move Sidebar
 */
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_action('woocommerce_before_shop_loop', 'woocommerce_get_sidebar', 3);


/**
 * Opening div for header column
 */
add_action('woocommerce_before_main_content', 'header_wrapper_open', 50);

function header_wrapper_open() {
  echo '<div class="col-lg-10 col-md-12 mt-5 pt-5 woocommerce-wrapper">';
}

/**
 * Closing div for header column
 */
add_action('woocommerce_before_shop_loop', 'header_wrapper_close', 1);

function header_wrapper_close() {
  echo '</div>';
}



/**
 * Opening div for product column
 */
add_action('woocommerce_before_shop_loop', 'shop_loop_open_div', 5);

function shop_loop_open_div() {
  echo '<div class="col-lg-9 customised-product-page">';
}

/**
 * Closing div for product column
 */
add_action('woocommerce_after_shop_loop', 'shop_loop_close_div', 50);

function shop_loop_close_div() {
  echo '</div>';
}


/**
 * Opening div for sidebar col
 */
add_action('woocommerce_before_shop_loop', 'sidebar_col_open_div', 2);

function sidebar_col_open_div() {
  echo '<div class="col-lg-3 d-lg-block">';
}

/**
 * Closing div for sidebar col
 */
add_action('woocommerce_before_shop_loop', 'sidebar_col_close_div', 4);

function sidebar_col_close_div() {
  echo '</div>';
}


/**
 * Remove breadcrumbs
 */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);


add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
/**
 * woo_hide_page_title
 *
 * Removes the "shop" title on the main shop page
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
function woo_hide_page_title() {
	return false;
}

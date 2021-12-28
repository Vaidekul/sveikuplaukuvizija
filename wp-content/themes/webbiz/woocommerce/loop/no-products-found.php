<?php
/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;
$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
?>
<p class="woocommerce-info error"><?php esc_html_e( 'No products were found matching your selection.', 'woocommerce' ); ?></p>

<a href="<?= $shop_page_url; ?>" class="custom-link link--arrowed black">Grįžti į parduotuvę
	<svg class='arrow-icon' xmlns='http://www.w3.org/2000/svg' width='32', height='32', viewBox='0 0 32 32' preserveAspectRatio='xMinYMin'>
	<g fill='none', stroke='#000000', stroke-width='1.5', stroke-linejoin='round', stroke-miterlimit='10'>
		<circle class='arrow-icon--circle', cx='16', cy='16', r='15.12'></circle>
		<path class='arrow-icon--arrow' d='M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98' ></path>
	</g>
	</svg> 
</a>



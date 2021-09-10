<?php

/* WooCommerce: The Code Below Removes Checkout Fields
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_address_1']);
	unset($fields['billing']['billing_state']);
	return $fields;
}
*/





/**
 * @snippet       Maxlength @ WooCommerce Checkout Field
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 4.5
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 










function custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

wp_enqueue_style( 'child-style',
	get_stylesheet_directory_uri() . '/style.css',
	array(),
	wp_get_theme()->get('Version')
);

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
		echo '<ul class="products de-product uk-grid uk-child-width-1-2 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-5@l" data-layout="elaina" data-uk-grid="">';
	
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			wc_get_template_part( 'content', 'product' );
		}

		echo '</ul>';
	} else {
		echo '<ul class="products de-product uk-grid uk-child-width-1-2 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-5@l" data-layout="elaina" data-uk-grid="">
			<li>Nerasta produktų pagal pasirinktus atsakymus.</li>
		</ul>';
	}
	
	wp_die();
}

// Counts Columns for Flexible row and column layouts
function acf_column_count($field_name) {
	$columns = get_sub_field($field_name);
	$count = count($columns);
	return $count;
}

// allow .svg upload
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

// Padding
function wb_get_padding($padding, $margin = false) {
  switch ($padding) {
    case 'padding-min':
      return $margin ? 'pt-1 pb-1 mt-1 mb-1' : 'pt-1 pb-1';
      break;
    case 'padding-med':
      return $margin ? 'pt-3 pb-3 mt-3 mb-3' : 'pt-3 pb-3';
      break;
    case 'padding-max':
      return $margin ? 'pt-5 pb-5 mt-5 mb-5' : 'pt-5 pb-5';
      break;
    default:
      return '';
      break;
  }
}

<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/*
[0] => product_menu_type
[1] => product_ids
[2] => use_custom_product_item_picture
[3] => product_item_picture
[4] => custom_item_picture
[5] => item_picture_width
[6] => item_picture_height
[7] => item_picture_style
[8] => custom_name
[9] => custom_price
[10] => short_description
[11] => excerpt_length
[12] => heading_tag
[13] => custom_link
[14] => disable_link
[15] => product_menu_style
[16] => custom_color
[17] => heading_color
[18] => heading_hover_color
[19] => description_color
[20] => price_color
[21] => border_color
[22] => border_style
[23] => border_width
[24] => image_box_shadow
[25] => image_hover_box_shadow
[26] => custom_badge
[27] => badge_text
[28] => badge_text_color
[29] => badge_border_color
[30] => css_animation
[31] => animation_parallax
[32] => delay_animation
[33] => repeat_animation
[34] => el_class
[35] => margin
[36] => remove_top_margin
[37] => remove_bottom_margin
[38] => visibility
[39] => enable_dahz_lazy_shortcode
[40] => dahz_id
*/
global $product;

extract( $atts );

$image = '';

$link_open = '';

$badge = '';

$custom_price = sprintf(
	'
	<span class="de-price">
		%1$s
	</span>
	',
	$custom_price
);

if( $product_menu_type === 'product' ){

	global $product;

	$product = wc_get_product( $product_ids );

	if( !$product ) return;

	$custom_price = $product->get_price_html();

	$custom_name = get_the_title( $product_ids );

	$excerpt = empty( $short_description ) ? get_the_excerpt( $product_ids ) : $short_description;

	$excerpt = !empty( $excerpt ) ? $excerpt : strip_shortcodes( get_the_content( $product_ids ) );

	$short_description =  wp_trim_words( $excerpt, $excerpt_length, ' ... ');

	$custom_item_picture = $product_item_picture;

	if( empty( $use_custom_product_item_picture ) ) $custom_item_picture = get_post_thumbnail_id( $product_ids );

	$link_open = sprintf(
		'<a href="%1$s"%2$s>',
		get_permalink( $product_ids ),
		!empty( $custom_color ) && !empty( $heading_color ) ? " style='color:{$heading_color};'" : ''
	);

} else {

	$url = vc_build_link( $custom_link );

	if ( strlen( $custom_link ) > 0 && strlen( $url['url'] ) > 0 ) {

		$rel = '';

		if ( ! empty( $url['rel'] ) ) {

			$rel = ' rel="' . esc_attr( $url['rel'] ) . '"';

		}

		$link_open = sprintf(
			'<a href="%1$s" title="%2$s" target="%3$s"%4$s%5$s>',
			esc_url( $url['url'] ),
			esc_attr( $url['title'] ),
			( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ),
			$rel,
			!empty( $custom_color ) && !empty( $heading_color ) ? " style='color:{$heading_color};'" : ''
		);

	}

}

if( !empty( $custom_item_picture ) ){

	if( (int)$item_picture_width > 0 || (int)$item_picture_height > 0 ){

		$image = wpb_resize( $custom_item_picture, null, (int)$item_picture_width, (int)$item_picture_height, true );

		if( $image ) $image = sprintf(
			'
			<img src="%1$s" width="%2$s" height="%3$s" alt="%4$s" class="%5$s">
			',
			$image['url'],
			$image['width'],
			$image['height'],
			get_post_field( 'post_title', $custom_item_picture ),
			$item_picture_style . ' ' . $image_box_shadow . ' ' . $image_hover_box_shadow
		);

	} else {

		$image = wp_get_attachment_image(
			$custom_item_picture,
			'medium',
			false,
			array(
				'class' 		=> $item_picture_style . ' ' . $image_box_shadow . ' ' . $image_hover_box_shadow
			)
		);

	}

}

if( empty( $disable_link ) && !empty( $link_open ) ){

	$image = sprintf(
		'
		%1$s%2$s</a>
		',
		$link_open,
		$image
	);
	$custom_name = sprintf(
		'
		%1$s%2$s</a>
		',
		$link_open,
		$custom_name
	);

}

# setup container attribute
$container_attributes = array(
	'class' => array(
		'de-sc-product-menu--container uk-grid uk-width-1-1 uk-margin-remove-left',
		$product_menu_style == 'style-2' ? 'uk-text-center' : '',
	),
	'data-uk-grid' => ''
);

if( $border_style !== 'none' ){
	$border_line = $product_menu_style == 'style-2' ? 'left' : 'bottom';
	$border = array();
	$border[] = "border-{$border_line}-style:{$border_style};";
	$border[] = "border-{$border_line}-width:{$border_width};";
	$border[] = !empty( $border_color ) ? "border-{$border_line}-color:{$border_color};" : '';
	if( $product_menu_style == 'style-2' ) $border[] = 'min-height:10px';
}

if( !empty( $custom_badge ) ){

	$container_attributes['class'][] = 'uk-position-relative';
	$container_attributes['style'] = array();
	$container_attributes['style'][] = "border-style:solid;";
	$container_attributes['style'][] = "border-width:2px;";
	$container_attributes['style'][] = !empty( $badge_border_color ) ? "border-color:{$badge_border_color};" : '';
	$container_attributes['style'][] = 'margin-top: 2em;';
	$container_attributes['style'][] = 'padding:20px;';
	$badge = sprintf(
		'<span class="uk-padding-small" style="position:absolute;bottom:%3$s;left:-2px;background:%2$s;padding: 5px 20px;"><p%4$s>%1$s</p></span>',
		esc_html( $badge_text ),
		$badge_border_color,
		'100%',
		!empty( $badge_text_color ) ? " style='color:{$badge_text_color};'" : ''
	);

}
?>
<div <?php
	dahz_shortcode_set_attributes(
		$container_attributes,
		'product_menu_container',
		$atts
	); ?>>
	<?php
	echo sprintf(
		$product_menu_style == 'style-1'
			?
		'
		%10$s
		%5$s
		<div class="uk-width-expand %12$s">
			<div class="uk-grid uk-flex uk-flex-middle" data-uk-grid>
				<div class="uk-width-auto">
					<%1$s class="de-product-menu--title"%11$s>%2$s</%1$s>
				</div>
				<div class="uk-width-expand uk-inline uk-margin-small-left"><span class="uk-width-1 uk-position-center"%9$s></span></div>
				<div class="uk-width-auto">
					<%1$s%6$s>%3$s</%1$s>
				</div>
				<div class="uk-width-1 uk-margin-remove">
					<p%7$s>%4$s</p>
				</div>
			</div>
		</div>
		'
			:
		'
		%10$s
		<div class="uk-width-1 sada">
			%5$s
		</div>
		<div class="uk-width-1">
			<%1$s class="de-product-menu--title"%11$s>%2$s</%1$s>
		</div>
		<div class="uk-width-1"><span class="uk-width-auto"%9$s></span></div>
		<div class="uk-width-1">
			<p%7$s>%4$s</p>
		</div>
		<div class="uk-width-1">
			<h5%6$s>%3$s</h5>
		</div>
		',
		$heading_tag, #1
		$custom_name, #2
		$custom_price, #3
		$short_description, #4
		!empty( $image ) && ( $product_menu_style == 'style-1' ) ? '<div class="uk-width-auto" style="padding-left:0;">' . $image . '</div>' : $image, #5
		!empty( $custom_color ) && !empty( $price_color ) ? " style='color:{$price_color};'" : '', #6
		!empty( $custom_color ) && !empty( $description_color ) ? " style='color:{$description_color};'" : '', #7
		!empty( $border_color ) ? " style='color:{$border_color};'" : '', #8
		!empty( $border ) ? ' style="' . implode( '', $border ) . '"' : '', #9
		$badge, #10
		!empty( $custom_color ) && !empty( $heading_color ) ? " style='color:{$heading_color};'" : '', #11
		strpos($image, 'img') == false  && ( $product_menu_style == 'style-1' || $product_menu_style == 'style-2' ) ? 'uk-padding-remove-left' : '' #12
	);
	?>
</div>

<?php
	
$wrapper_attributes = array(
	'class' 			=> array(
		"uk-text-{$post_alignment}",
		$box_shadow,
		$hover_box_shadow,
		'entry-wrapper',
		!empty( $box_shadow ) || !empty( $hover_box_shadow ) || !empty( $bg_color ) ? 'uk-padding' : '',
	),
	'style' 			=> array(),
	'data-uk-margin'	=> 'margin:uk-margin-small',
);

if( !empty( $bg_color ) ) $wrapper_attributes['style'][] = "background:{$bg_color};";

$item_class = ! empty( $item_class ) ? $item_class : '';
	
?>
<li <?php post_class( 'de-sc-post-slider__item uk-margin-remove-bottom ' . $item_class );?>>
	<div <?php
		dahz_shortcode_set_attributes(
			$wrapper_attributes,
			'post_slider_items'
		);?>>
		<div class="de-sc-post-slider__content">
			<?php
			$meta_uppercase = !empty( $is_meta_uppercase ) ? esc_attr( "uk-text-uppercase" ) : '';
			dahz_framework_post_meta( 
				get_the_ID(),
				array(
					'items_wrap'	=> '<ul class="' . "uk-flex uk-flex-{$post_alignment}" . ' de-sc-post-slider__item--meta uk-text-small uk-subnav uk-subnav-divider uk-margin-small-bottom'. $meta_uppercase . '">%1$s</ul>',
					'metas'			=> array( 
						( empty( $is_hide_category ) ? 'categories' : '' )
					),
					'meta_params'	=> array( 'categories' => array( get_the_ID(), 'portfolio_categories' ) ),
				)
			);
			dahz_framework_title( array(
				'title_tag'	=> $title_element_tag,
				'class'		=> !empty( $is_title_uppercase ) ? 'de-sc-post-slider__item--title uk-text-uppercase uk-margin-remove' : 'de-sc-post-slider__item--title uk-margin-remove',
			) );
			?>
		</div>
	</div>
</li>
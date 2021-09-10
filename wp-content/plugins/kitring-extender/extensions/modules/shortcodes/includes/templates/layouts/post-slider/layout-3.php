<?php
	
$wrapper_attributes = array(
	'class' 			=> array(
		"uk-text-{$post_alignment}",
		'entry-wrapper uk-background-cover',
		$box_shadow,
		$hover_box_shadow,
		"de-ratio de-ratio-{$media_ratio}"
	),
	'style' 			=> array(),
	'data-uk-margin'	=> 'margin:uk-margin',
);

$wrapper_attributes['style'][] = ( !empty( $bg_color ) ) ? "background-color:{$bg_color};" : "background-color:#e0e0e0;";
	
$image_src = get_the_post_thumbnail_url( get_the_ID(), 'large' );

if( !empty( $image_src ) ) $wrapper_attributes['style'][] = "background-image:url({$image_src});";

$item_class = ! empty( $item_class ) ? $item_class : '';

?>
<li <?php post_class( 'de-sc-post-slider__item uk-margin-remove-bottom ' . $item_class );?>>
	<div <?php
		dahz_shortcode_set_attributes(
			$wrapper_attributes,
			'post_slider_items'
		);?>>
		<div class="de-ratio-content uk-inline-clip uk-transition-toggle">
			<div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default" style="<?php echo !empty( $overlay_color ) ? "background-color:{$overlay_color};" : '';?>">
				<?php
					$meta_uppercase = !empty( $is_meta_uppercase ) ? esc_attr( "uk-text-uppercase" ) : '';
					dahz_framework_post_meta( 
						get_the_ID(),
						array(
							'items_wrap'	=> '<ul class="' . "uk-flex uk-flex-{$post_alignment}" . ' de-sc-post-slider__item--meta uk-text-small uk-subnav uk-subnav-divider uk-margin-small-bottom'. $meta_uppercase . '">%1$s</ul>',
							'metas'			=> array( 
								( empty( $is_hide_category ) ? 'categories' : '' ),
								( empty( $is_hide_author ) ? 'author' : '' ),
								( empty( $is_hide_date ) ? 'date' : '' )
							),
						)
					);
					dahz_framework_title( array(
						'title_tag'	=> $title_element_tag,
						'class'		=> !empty( $is_title_uppercase ) ? 'de-sc-post-slider__item--title uk-text-uppercase uk-margin-remove' : 'de-sc-post-slider__item--title uk-margin-remove',
					) );
				?>
				<?php 
				if( empty( $is_hide_excerpt ) ):?>
					<?php
					$excerpt = dahz_framework_get_excerpt( 
						array(
							'button_type'	=> $button_type,
							'button_size'	=> $button_size,
							'show_readmore'	=> empty( $is_hide_button_readmore ) ,
							'num_words'		=> $excerpt_length,
						)
					);
					?>
					<?php if( ! empty( $excerpt ) ):?>
						<div class="de-archive__featured-content uk-margin uk-margin-remove-bottom">
							<?php echo $excerpt;?>
						</div>
					<?php endif;?>
				<?php endif;?>
			</div>
		</div>
	</div>
</li>
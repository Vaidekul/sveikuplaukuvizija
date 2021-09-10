<?php
/*
@Shortcode Attributes
	[0] => tagging_image
	[1] => action_type
	[2] => tagging_type
	[3] => icon_type
	[4] => icon_fontawesome
	[5] => icon_linea
	[6] => icon_openiconic
	[7] => icon_typicons
	[8] => icon_monosocial
	[9] => icon_entypo
	[10] => icon_size
	[11] => icon_color
	[12] => icon_bg_color
	[13] => is_pulse
	[14] => is_animate
	[15] => css_animation
	[16] => animation_parallax
	[17] => delay_animation
	[18] => repeat_animation
	[19] => el_class
	[20] => margin
	[21] => remove_top_margin
	[22] => remove_bottom_margin
	[23] => visibility
	[24] => enable_dahz_lazy_shortcode
	[25] => dahz_id
*/
if ( empty( $tagging_image ) ) {return;}
# Shortcode attributes
$shortcode_attr = array();

# Shortcode class
$shortcode_classes = array( 'uk-inline de-hotspot' );

# Dot attributes
$dot_attr = array();

# Dot class
$dot_classes = array( 'uk-position-absolute' );

# Button attributes
$button_attr = array();

# Button class
$button_classes = array( 'de-marker' );

# Button style
$button_styles = array();

# Icon attributes
$icon_attr = array();

# Icon class
$icon_classes = array( 'uk-position-z-index' );

# SETTING SHORTCODE
	# Add class
	if ( !empty( $shortcode_classes ) )
		$shortcode_attr['class'] = $shortcode_classes;

	# Animate
	if ( !empty( $is_animate ) )
		$shortcode_attr['data-uk-scrollspy'] = 'target: > div;cls: uk-animation-scale-up;delay: 500;';
# END OF SETTING SHORTCODE

# SETTING DOT
	# Quickview mode
	if ( $action_type === 'hover' )
		$dot_classes[] = 'uk-transition-toggle';

	# Add class
	if ( !empty( $dot_classes ) )
		$dot_attr['class'] = $dot_classes;

	# Lightbox
# END OF SETTING DOT

# SETTING BUTTON
	# Pulse
	if ( empty( $is_pulse ) )
		$button_classes[] = 'de-marker--pulse';

	# Quickview mode
	if ( $action_type === 'quickview' )
		$button_classes[] = 'de-quickview__button';

	# Bg color
	if ( !empty( $icon_bg_color ) )
		$button_styles[] = "background-color: {$icon_bg_color};";

	# Color
	if ( !empty( $icon_color ) )
		$button_styles[] = "color: {$icon_color};";

	# Icon size
	if ( !empty( $icon_size ) )
		$button_styles[] = sprintf( 'font-size: %s;', dahz_shortcodes_check_param_value( $icon_size, '16px' ) );

	# Add class
	if ( !empty( $button_classes ) )
		$button_attr['class'] = $button_classes;

	# Add style
	if ( !empty( $button_styles ) )
		$button_attr['style'] = $button_styles;
# END OF SETTING BUTTON

# SETTING ICON
	# Type
	switch( $tagging_type ) {
		case 'icon':
			$icon_attr['data-uk-icon'] = 'plus';
		break;
		case 'custom':
			$icon_classes[] = ${'icon_'. $icon_type};
		break;
	}

	# Add class
	if ( !empty( $icon_classes ) )
		$icon_attr['class'] = $icon_classes;
# END OF SETTING ICON

# PARSE PRODUCT SHOWCASE
$parse_tagging = json_decode( urldecode( $tagging_image ), true );
$parse_tagging = !is_array( $parse_tagging ) 
	?
	array(
		'dotsItem' 		=> array(),
		'dotsImageID'	=> ''
	)
	: 
	array_merge(
		array(
			'dotsItem' 		=> array(),
			'dotsImageID'	=> ''
		),
		$parse_tagging
	);

?>
<div <?php dahz_shortcode_set_attributes( $shortcode_attr ); ?>>
	<?php echo wp_get_attachment_image( $parse_tagging['dotsImageID'], 'full' ); ?>
	<?php if( !empty( $parse_tagging['dotsItem'] ) && is_array( $parse_tagging['dotsItem'] ) ):?>
		<?php foreach( $parse_tagging['dotsItem'] as $key => $dot ) :?>
			<?php
				$dots_attr = $dot_attr;
				$dot = array_merge(
					array(
						'dotsCoorX' => 0.0,
						'dotsCoorY'	=> 0.0,
						'dotsType'	=> 'product',
						'dotsValue'	=> array()
					),
					$dot
				);
				$dotx = $dot['dotsCoorX'];
				$doty = $dot['dotsCoorY'];
				$type = $dot['dotsType'];
				# SETTING DOT ADVANCE
				# X axis
				$dots_attr['style'] = array();
				$dots_attr['style'][] = sprintf( 'left: calc( %s%% - ( 32px / 2 ) );', $dotx );
				# Y axis
				$dots_attr['style'][] = sprintf( 'top: calc( %s%% - ( 32px / 2 ) );', $doty );
				# END OF SETTING DOT ADVANCE

				switch ($type) :
					case 'video':
						$dots_attr['data-uk-lightbox'] = '';
						$button_attr['href'] = !empty( $dot['dotsValue']['videoUrl'] ) ? $dot['dotsValue']['videoUrl'] : '#';
						?>
						<div <?php dahz_shortcode_set_attributes( $dots_attr ); ?>>
							<a <?php dahz_shortcode_set_attributes( $button_attr ); ?>>
								<span <?php dahz_shortcode_set_attributes( $icon_attr ); ?>>
								<?php if ( $tagging_type === 'number' ) : ?>
								<?php echo esc_html( $key + 1 ); ?>
								<?php endif; ?>
								</span>
							</a>
						</div>
						<?php
						break;
					case 'image':
						$dots_attr['data-uk-lightbox'] = '';
						$button_attr['href'] = !empty( $dot['dotsValue']['videoUrl'] ) ? $dot['dotsValue']['videoUrl'] : '#';
						?>
						<div <?php dahz_shortcode_set_attributes( $dots_attr ); ?>>						
						<?php
						if( isset( $dot['dotsValue']['imagesList'] ) && is_array( $dot['dotsValue']['imagesList'] ) ):
							$i = 0;
							foreach( $dot['dotsValue']['imagesList'] as $images ):
								
								if( $i === 0 ): $button_attr['href'] = !empty( $images['url'] ) ? $images['url'] : '#';?>
									<a <?php dahz_shortcode_set_attributes( $button_attr ); ?>>
										<span <?php dahz_shortcode_set_attributes( $icon_attr ); ?>>
										<?php if ( $tagging_type === 'number' ) : ?>
										<?php echo esc_html( $key + 1 ); ?>
										<?php endif; ?>
										</span>
									</a>
								<?php else:?>
									<a class="uk-hidden" href="<?php echo $images['url'];?>"></a>
								<?php endif; $i++;?>
								
							<?php endforeach;
							
						endif;
						?>
						</div>
						<?php
						break;
					
					default:
						$button_attr['href'] = '#';
						if( isset( $dots_attr['data-uk-lightbox'] ) ){
							unset( $dots_attr['data-uk-lightbox'] );
						}
						$dots_attr['class'][] = 'uk-inline';
						?>
						<div <?php dahz_shortcode_set_attributes( $dots_attr ); ?>>
							<a <?php dahz_shortcode_set_attributes(); ?>>
								<span <?php dahz_shortcode_set_attributes( $icon_attr ); ?>>
								<?php if ( $tagging_type === 'number' ) : ?>
								<?php echo esc_html( $key + 1 ); ?>
								<?php endif; ?>
								</span>
							</a>
							<?php if( ! empty( $dot['dotsValue']['textContent'] ) ):?>
								<div data-uk-drop="mode: <?php echo $action_type;?>;boundary:!.de-hotspot;">
									<div class="uk-card uk-card-body uk-card-default">
										<?php echo $dot['dotsValue']['textContent'];?>
									</div>
								</div>
							<?php endif;?>
						</div>
						<?php
						break; ?>
			<?php endswitch; ?>
		<?php endforeach; ?>
	<?php endif;?>
</div>
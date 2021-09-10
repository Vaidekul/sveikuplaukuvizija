<?php

/*
	style
    button_label
    button_style
    button_color
    button_hover_color
    button_outline_color
    button_outline_hover_color
    button_label_color
    button_label_hover_color
    button_size
    button_border_radius
    button_is_fullwidth
    button_alignment
    button_icon_type
    button_icon_fontawesome
    button_icon_openiconic
    button_icon_typicons
    button_icon_entypo
    button_icon_linecons
    button_icon_pixelicons
    button_icon_monosocial
    button_icon_position
    image
    image_size
    image_alignment
    enable_text_heading
    modal_heading
    modal_heading_background_color
    modal_heading_text_color
    border_color
    modal_size
    content_background_color
    enable_full_size_content
    content
*/

# Container style
$container_modal_style = array();

# Modal Dialog style
$modal_dialog_style = array();

# Modal Heading style
$modal_heading_style = array();

# Content style
$content_style = array();

# Modal Heading style
$modal_heading_container_style = array();

# Button Attr
$button_attr = array();
$button_icon = array();

# Close button
$close_button_render = '';
# ID
    $container_modal_style['id']                 =  'modal-popup-' . $dahz_id;

# Classes

    # Pre-defined Classes and Attribute
    $container_modal_style['class'][]              = 'de-sc-modal-popup';
    $container_modal_style['data-uk-modal'][]           = '';
    $modal_dialog_style['class'][]                 = 'uk-modal-dialog';
    $modal_heading_container_style['class'][]      = 'de-sc-modal-popup__heading uk-modal-header';
    $content_style['class']                        = 'uk-padding-large';

    # Is full Modal
    if ( !empty( $is_full_modal ) ) {
        $container_modal_style['class'][]           = 'uk-modal-full';
        //$modal_dialog_style['class'][]              = 'uk-flex uk-flex-center uk-flex-middle';
       // $modal_dialog_style['data-uk-height-viewport']   = '';
        $modal_heading_container_style['class'][]   = 'uk-position-top';
    }

    # Is not full modal
    // if ( empty( $is_full_modal ) ) {
        // $modal_dialog_style['class'][]                      = 'uk-margin-auto-vertical';
		// if ( !empty( $modal_height ) && !empty( $modal_style ) ){
            // $modal_dialog_style['style'][]    = 'height: ' . $modal_height . ';';
			// if ( !empty( $is_auto_overflow ) ) {

				// $content_style['data-uk-overflow-auto']     = '';
				// //$content_style['data-uk-height-viewport']   = 'offset-bottom: 100px';

			// }
		// }
    // }

    if ( !empty( $modal_style ) )
        $modal_dialog_style['class'][]              = 'uk-width-3-4@m uk-width-2-3@l uk-width-1-2@xl';


    # Is Auto Overflow
    // if ( !empty( $is_auto_overflow ) && empty( $is_full_modal ) ) {

        // $content_style['data-uk-overflow-auto']     = '';
        // $content_style['data-uk-height-viewport']   = 'offset-bottom: 100px';

    // }
	
	// if( empty( $is_full_modal ) && ! empty( $modal_height ) ){
		// $content_style['style'] = 'height: ' . $modal_height . ';';
	// }

    # Animation
        $container_modal_style['class'][]     = $animation;

# Inline style

    # Heading

    # Heading Title Color
    if ( !empty( $modal_heading_text_color ) )
        $modal_heading_style['style']              =  'color:' . $modal_heading_text_color;

    # Heading Border Color
    if ( !empty( $modal_border_color ) )
        $modal_heading_container_style['style'][]    = 'border-bottom:1px solid ' . $modal_border_color;

    # Content

    # Content Background Color
    if ( !empty( $background_color ) )
        $modal_dialog_style['style'][]    = 'background-color: ' . $background_color;

# Elements
    if ( !empty( $is_full_modal ) ) {

        $close_button_render     = '<button class="uk-modal-close-full uk-close-large" type="button" data-uk-close></button>';

    } else {

        $close_button_render     = '<button class="uk-modal-close-outside uk-close-large" type="button" data-uk-close></button>';

    }

# Button style
    # Predefined Class
    $button_attr['class'][] = "uk-button {$button_type} {$button_size}";
    $button_attr['data-uk-toggle'] = '';

    # Button Link
        $button_attr['href'] = '#modal-popup-' . esc_attr( $dahz_id );

	# Enable fullwidth
	if ( !empty( $is_fullwidth ) )
		$button_attr['class'][] = 'de-btn--full';

	# Box shadow
	if ( !empty( $box_shadow ) )
		$button_attr['class'][] = $box_shadow;

	// # Box shadow extra
	// if ( !empty( $is_extra_boxshadow ) )
	// 	$button_attr['class'][] = 'uk-box-shadow-bottom';

	# Box shadow hover
	if ( !empty( $hover_box_shadow ) )
		$button_attr['class'][] = $hover_box_shadow;

# BUTTON ICON
	# Icon
	$button_icon['class'] = array( ${'icon_'. $icon_type} );

	# Icon position
	if ( !empty( $icon_alignment ) ){
		$button_icon['class'][] = $icon_alignment;
		$button_icon['class'][] = 'uk-margin-small-right';
	} else {
		$button_icon['class'][] = 'uk-margin-small-left';
	}

	# Icon size
	$button_icon['style'] = sprintf( 'font-size: %s;', dahz_shortcodes_check_param_value( $icon_size, '22px' ) );

// Modal heading is available or not
$modal_is_heading = '';


// If heading is available
if( $enable_text_heading ) {
    $modal_is_heading = '
    <div ' . dahz_shortcode_set_attributes( $modal_heading_container_style, "dahz_modal_heading_container_shortcode", null, false ) . '>
        <h5 ' . dahz_shortcode_set_attributes( $modal_heading_style, "dahz_modal_heading_shortcode", null, false ) . ' > ' . esc_html__( $modal_heading, 'sobari_sc' ) . ' </h5>
    </div>
    ';
}

    $image         = isset( $image ) ? $image : '';

    $img = wpb_getImageBySize( array(
        'attach_id'  => $image,
        'thumb_size' => !empty( $image_size ) ? $image_size : 'large',
        'class'      => '',
    ) );
    if( $trigger == 'buttons' ) {
        $trigger     = '';
        $bottom_shadow = '';
        if ( !empty( $is_extra_boxshadow ) ) { $bottom_shadow .= 'uk-box-shadow-bottom'; }

        $trigger     .= '<div class="' . esc_attr( $alignment ) . ' ' . esc_attr( $bottom_shadow ) . '">';
        $trigger     .= '<a ' . dahz_shortcode_set_attributes( $button_attr, 'dahz_modal_button_shortcode', null, false  ) . ' >';
        $trigger     .= '<span class="uk-flex uk-flex-middle"><span>' . esc_html( $button_label ) . ' </span>';
        if ( $is_icon && !empty( ${'icon_'. $icon_type} ) ) {
			vc_icon_element_fonts_enqueue( $icon_type );
            $trigger .=  '<i ' . dahz_shortcode_set_attributes( $button_icon, 'dahz_modal_button_icon_shortcode', null, false  ) . ' ></i>';
        }
        $trigger     .= '</span></a>';
        $trigger     .= '</div>';

        // if ( !empty( $is_extra_boxshadow ) ) { $trigger .= '</div>'; }
    } else {
        $trigger = sprintf(
            '<a href="#%1$s" id="de-btn-shortcode--%1$s" class="de-sc-modal-popup__trigger ds-sc-modal-popup__trigger %2$s uk-flex uk-flex-%4$s" data-uk-toggle>
                %3$s
            </a>',
            'modal-popup-' . esc_html( $dahz_id ),
            esc_attr( $animation ),
            $img['thumbnail'],
            esc_attr( $image_alignment )
        );
    }


    echo $trigger;

    if ( !empty( $modal_style ) ):

        $split_image =  wp_get_attachment_url( $image_split );
    ?>

	<div <?php dahz_shortcode_set_attributes( $container_modal_style, 'dahz_modal_container_shortcode' ); ?> >
        <div <?php dahz_shortcode_set_attributes( $modal_dialog_style, 'dahz_modal_dialog_shortcode' ); ?>>
            <?php echo $close_button_render ?>
            <?php echo( $modal_is_heading ) ?>
            <div <?php dahz_shortcode_set_attributes(
				array(
					'class'	=> array(
						'uk-width-1-1 uk-modal-body uk-padding-remove',
					),
					'style'	=> array(
						( empty( $is_full_modal ) && ! empty( $modal_height ) ) ? 'height: ' . $modal_height . ';' : '',
						!empty( $is_full_modal ) ? 'height: 100vh;' : ''
					)
				),
				'dahz_modal_dialog_content' 
			); ?>>
				<div class="uk-child-width-1-2@s uk-height-1-1 uk-grid-collapse" data-uk-grid>
					<div>
						<div class="uk-background-cover uk-height-1-1" style="background-image: url('<?php echo esc_url( $split_image ) ?>');">
						</div>
					</div>
					<div <?php dahz_shortcode_set_attributes(
						array(
							'class'	=> array(
								'de-sc-modal-popup__content uk-padding',
								( ( !empty( $is_auto_overflow ) && empty( $is_full_modal ) ) || !empty( $is_full_modal ) || !empty( $modal_height ) ? 'uk-overflow-auto' : '' ),
								!empty( $is_full_modal ) ? 'uk-padding-remove-right uk-padding-remove-bottom' : ''
							),

						),
						'dahz_modal_dialog_content' 
					); ?>>
						
						<?php if( !empty( $is_full_modal ) ):?>
							<div <?php dahz_shortcode_set_attributes(
								array(
									'class'	=> array(
										'uk-height-1-1',
										'uk-padding uk-padding-remove-left uk-padding-remove-top',
										'uk-overflow-auto'
									),

								),
								'dahz_modal_dialog_content' 
							); ?>>
						<?php endif;?>
						
						<?php echo do_shortcode( $content ) ?>
						
						<?php if( !empty( $is_full_modal ) ):?>
							</div>
						
						<?php endif;?>
						
					</div>
				</div>
            </div>
        </div>
    </div>


    <?php else:?>

    <div <?php dahz_shortcode_set_attributes( $container_modal_style, 'dahz_modal_container_shortcode' ); ?> >
        <div <?php dahz_shortcode_set_attributes( $modal_dialog_style, 'dahz_modal_dialog_shortcode' ); ?>>
            <?php echo $close_button_render ?>
            <?php echo( $modal_is_heading ) ?>
            <div <?php dahz_shortcode_set_attributes(
				array(
					'class'	=> array(
						'uk-width-1-1 uk-padding-large uk-modal-body de-sc-modal-popup__content',
						( !empty( $is_auto_overflow ) && empty( $is_full_modal ) ? 'uk-overflow-auto' : '' )
					),
					'style'	=> array(
						( empty( $is_full_modal ) && ! empty( $modal_height ) ) ? 'height: ' . $modal_height . ';' : ''
					)
				),
				'dahz_modal_dialog_content' 
			); ?>>
                <?php echo do_shortcode( $content ) ?>
            </div>
        </div>
    </div>

    <?php endif;?>
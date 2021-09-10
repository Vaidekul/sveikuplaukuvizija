<?php

// wp_enqueue_script( "dahz-shortcode-image-gallery" );


$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

extract( $atts );
# SHORTCODE ATTR
$shortcode_attr = array( 'class' => array( $visibility, $margin, $el_class ) );

# remove margin top
if ( !empty( $remove_top_margin ) ) $shortcode_attr['class'][] = 'uk-margin-remove-top';

# remove margin bottom
if ( !empty( $remove_bottom_margin ) ) $shortcode_attr['class'][] = 'uk-margin-remove-bottom';

# CONTAINER ATTR
$parent_container_attr = array( 'class' => array( 'uk-grid' ) );

# HREF ATTR
$item_attr = array();

# HREF ATTR
$item_wrap_attr = array();

# IMAGE ATTR ARRAY
$image_attr = array();

# LI ATTR ARRAY
$li_attr = array();

# IMAGE HOVER ATTR ARRAY
$image_hover_attr = array( 'class' => '' );

# GENERATE ARRAY IMAGES SETTINGS VALUE

$image_array = vc_param_group_parse_atts( $images );


# CONTAINER PRE-DEFINED CLASS

$parent_container_attr['class'][] = 'de-sc-image-gallery';

$item_wrap_attr['class'][] = 'de-sc-image-gallery__item-wrap';

# GALLERY DISPLAY TYPE

switch ( $shortcode_style ) {

    # GRID
    case 'uk-grid':
		$parent_container_attr['data-uk-grid'] = array();
        # INSERT ATTRIBUTE FOR IMAGE & IMAGE HOVER

        # IMAGE RATIO
        if( $media_ratio !== 'uncrop' ) {

            # MAIN IMAGE
            $image_attr['class'] = 'de-ratio-content ';
            $item_wrap_attr['class'][] = 'de-ratio';
            $item_wrap_attr['class'][] = 'de-ratio-' . $media_ratio;

            # HOVER IMAGE
            $image_hover_attr['class'] .= 'de-ratio-content';

        }


        # HOVER IMAGE
        $image_hover_attr['class'] .= 'uk-hidden-hover uk-transition-fade';

        break;
    case 'uk-slider':
        # INITIALIZE SLIDER

        $shortcode_attr['data-uk-slider'][] = '';

        # CLASS SLIDER PARENT ITEM

        $parent_container_attr['class'][] = 'uk-slider-items';

        # MAIN IMAGE

        # INIT RATIO CROP IMAGE
        if( empty( $height ) || $height === 'auto' && $media_ratio !== 'uncrop' ) {

            $image_attr['class'] = 'de-ratio-content ';
            $image_hover_attr['class'] = 'de-ratio-content ';
            $item_wrap_attr['class'][] = 'de-ratio';
            $item_wrap_attr['class'][] = 'de-ratio-' . $media_ratio;

        }

        # HOVER IMAGE
        $image_hover_attr['class'] .= 'uk-hidden-hover uk-transition-fade  uk-position-top';

        # HEIGHT SETTING
        if( !empty( $height ) && $height !== 'auto' ) {

            $parent_container_attr['class'][] = 'uk-grid-match';

            $item_wrap_attr['class'][] = 'de-sc-image-gallery__height-handle uk-overflow-hidden';

            // $image_attr['uk-cover'] = '';
            //
            // $image_hover_attr['uk-cover'] = '';

            if( !empty( $min_height ) )
                $parent_container_attr['data-uk-height-viewport'][] = 'min-height:' . $min_height;
        }

        # VIEWPORT HEIGHT
        if( $height === 'viewport' )
            $parent_container_attr['data-uk-height-viewport'][] = 'offset-top: true;';

        # VIEWPORT HEIGHT MINUS 20 PERCENT
        if( $height === 'viewport-minus-percent' )
            $parent_container_attr['data-uk-height-viewport'][] = 'offset-top: true;offset-bottom: 20;';

        # VIEWPORT HEIGHT MINUS SECTION
        if( $height === 'viewport-minus-section' )
            $parent_container_attr['data-uk-height-viewport'][] = 'offset-top: true;offset-bottom: !.de-row +;';

        # Autoplay Attribute

        if( !empty( $auto_play_interval ) )
            $shortcode_attr['data-uk-slider'][]     = 'autoplay: true;autoplay-interval:' . $auto_play_interval . ';';

        # Disable Infinite Scroll

        if( empty( $enable_infinite ) ){
            $shortcode_attr['data-uk-slider'][]     = 'finite: true;';
		}			

        # Disable Infinite Scroll

        if( !empty( $enable_slide ) )
            $shortcode_attr['data-uk-slider'][]     = 'sets: true;';

        # Disable Infinite Scroll

        if( !empty( $enable_center_active ) )
            $shortcode_attr['data-uk-slider'][]     = 'center: true;';
        break;

    case 'masonry':
		$parent_container_attr['data-uk-grid'] = array();
        $parent_container_attr['data-view']         = 'masonry';
		$parent_container_attr['data-uk-grid'][] = 'masonry:true;';
		if( !empty( $enable_parallax ) ) $parent_container_attr['data-uk-grid'][] = "parallax:{$parallax_speed};";
        break;
    default:
        break;
}

# CLASS FOR PRE-SELECTED GRID GUTTER

$parent_container_attr['class'][] = $row_column_gap;

$parent_container_attr['data-gutter'][] = !empty( $row_column_gap ) ? $row_column_gap : 'uk-grid';

# BREAKPOINT SETTINGS

# Set phone portrait column
$parent_container_attr['class'][] = sprintf( 'uk-child-width-1-%s', $phone_potrait_column );

# Set phone landscape & tablet portrait column
$parent_container_attr['class'][] = sprintf( 'uk-child-width-1-%s@s', $phone_landscape_column );

# Set tablet landscape column
$parent_container_attr['class'][] = sprintf( 'uk-child-width-1-%s@m', $tablet_landscape_column );

# Set desktop column
$parent_container_attr['class'][] = sprintf( 'uk-child-width-1-%s@l', $columns );



# ITEM

# PRE-DEFINED ITEM CLASS

$item_attr['class'][] = 'de-sc-image-gallery__item';

    # ITEM WRAP

    // if( empty( $height ) || $height === 'auto' )
    //     $item_wrap_attr['class'][] = 'de-ratio';
    //
    // if( empty( $height ) || $height === 'auto' )
    //     $item_wrap_attr['class'][] = 'de-ratio-' . $media_ratio;

    $item_wrap_attr['class'][] = 'uk-transition-toggle';

# ITEM TAG ELEMENT

$tag = '';
$tag = !empty( $on_click ) ? 'a' : 'div';

# Hover effect
if ( $hover_effect === 'parallax-tilt' || $hover_effect === 'parallax-tilt-glare' ) {
	$li_attr['data-tilt'] = '';

	$li_attr['data-tilt-perspective'] = '4000';

	if ( $shortcode_style === 'carousel' ) {
		$li_attr['data-tilt-scale'] = '0.96';
	} else {
		$li_attr['data-tilt-scale'] = '1.04';
	}
}

# Box Shadow Item
if ( !empty( $image_box_shadow ) )
    $item_wrap_attr['class'][] = $image_box_shadow;

# Box Shadow Item
if ( !empty( $image_hover_box_shadow ) )
    $item_wrap_attr['class'][] = $image_hover_box_shadow;

# LIGHTBOX ON CLICK

if ( $on_click === 'lightbox' ) {

    # INITIALIZE LIGHTBOX ATTRIBUTE TRIGGER

    // $item_attr['data-uk-toggle'] = '';

    $parent_container_attr['data-uk-lightbox'][] = '';


}

# HOVER STATE
    # Hover effect
    if ( !empty( $hover_effect ) )
        $parent_container_attr['data-hover-effect'] = $hover_effect;

    # Hover style
    if ( !empty( $image_hover_style ) )
       $parent_container_attr['data-hover-style'] = $image_hover_style;


# HOVER STYLE STYLING

$hover_bg_color = !empty( $hover_bg_color ) ? 'style="background:' . esc_attr( $hover_bg_color ) . '"' : '';

# STYLE 1

# ICON COLOR

if ( $image_hover_style === 'style-1' )
    $icon_color = !empty( $icon_color ) ? 'style="color:' . esc_attr( $icon_color ) . '"' : '';

# STYLE 2 & STYLE 3

# IS SHOW CAPTION WHEN HOVER

if ( !empty( $show_caption_when_hover ) )
    $show_caption_when_hover = 'uk-hidden-hover';


?>
<div <?php dahz_shortcode_set_attributes( $shortcode_attr, 'dahz_image_gallery_shortcode' ); ?> class="de-shortcode__wrapper de-shortcode__wrapper--image_gallery" data-dahz-shortcode-key="<?php echo esc_attr( $dahz_id ) ?>">
    <div class="uk-position-relative">
		<div class="uk-slider-container">
			<ul <?php dahz_shortcode_set_attributes( $parent_container_attr, 'dahz_image_gallery_parent_container' ); ?>>
				<?php
				foreach ( $image_array as $image_item ) :
					// dahz_framework_debug($image_item);

					$rendered_img         = !empty( $image_item['image'] ) ? wp_get_attachment_image( $image_item['image'], 'full', '', $image_attr ) : '';

					$rendered_img_hover   = !empty( $image_item['image_hover'] ) ? wp_get_attachment_image( $image_item['image_hover'], 'full', '', $image_hover_attr ) : '';
					$image_object   = !empty( $image_item['image'] ) ? get_post( $image_item['image'] ) : '';

					$image_title    = !empty( $image_object->post_title ) ? $image_object->post_title : '';
					$image_caption  = !empty( $image_object->post_excerpt ) ? $image_object->post_excerpt : '';

					if ( $shortcode_style == 'masonry' ) {

						$li_attr['class'] = 'de-sc-image-gallery__item-outer';

						//$li_attr['data-width'] = $image_item['media_width'];

						//$li_attr['data-height'] = $image_item['media_height'];

					}

					if ( !empty( $on_click ) ) :
						switch ( $on_click ) {
							case 'lightbox':
							if ( !empty( $image_item['image'] ) )
							$item_attr['href'] = wp_get_attachment_image_src( $image_item['image'], 'full' )[0];
							break;
							case 'custom_link':
							$item_attr['href'] = !empty( $image_item['url_link'] ) ? esc_url( $image_item['url_link'] ) : '#';
							if ( !empty( $image_item['open_new_tab'] ) )
							$item_attr['target'] = '_blank';
							break;
						}

					endif;

					?>
					<li <?php dahz_shortcode_set_attributes( $li_attr, 'dahz_image_li' ) ?>>
						<<?php echo $tag ?> <?php dahz_shortcode_set_attributes( $item_attr, 'dahz_image_gallery_item' ); ?>>
						<div <?php dahz_shortcode_set_attributes( $item_wrap_attr, 'dahz_image_gallery_item_wrap' ); ?>>
							<?php echo $rendered_img; ?>
							<?php echo $rendered_img_hover; ?>
							<?php if ( !empty( $image_hover_style ) ): ?>
								<?php
								switch ( $image_hover_style ) {
									case 'style-1':
									?>
									<div class="de-sc-image-gallery__content uk-overlay uk-position-cover uk-hidden-hover uk-margin uk-margin-left uk-margin-right" <?php echo $hover_bg_color ?>>
										<div class="uk-position-center">
											<span uk-overlay-icon <?php echo $icon_color ?>></span>
										</div>
									</div>

									<?php
									break;

									case 'style-2':
									?>

									<div class="uk-overlay de-sc-image-gallery__item-caption uk-position-cover uk-visible-toggle">
										<div class="uk-position-center uk-flex uk-flex-column uk-flex-center uk-flex-middle uk-text-center">
											<h4 class="<?php echo esc_attr( $show_caption_when_hover ) ?>"><?php echo esc_html( $image_title ) ?></h4>
											<p class="<?php echo esc_attr( $show_caption_when_hover ) ?>"><?php echo esc_html( $image_caption ) ?></p>
										</div>
									</div>


									<?php
									break;
									case 'style-3':
									?>
									<div class="uk-overlay de-sc-image-gallery__item-caption uk-position-cover uk-margin-left uk-margin-right uk-margin-bottom uk-visible-toggle">
										<div class="uk-position-bottom-left uk-transition-slide-top-small <?php echo esc_attr( $show_caption_when_hover ) ?>">
											<h4><?php echo esc_html( $image_title ) ?></h4>
											<p><?php echo esc_html( $image_caption ) ?></p>
										</div>
										<div class="uk-position-bottom-right">
											<span class="<?php echo esc_attr( $show_caption_when_hover ) ?> uk-transition-slide-left-small" data-uk-icon="icon: arrow-right; ratio: 2;"></span>
										</div>
									</div>
									<?php
									break;
									case 'style-4':
									?>
									<div class="de-sc-image-gallery__item-caption uk-transition-slide-bottom uk-position-bottom uk-overlay" <?php echo $hover_bg_color ?>>
										<h4 class="<?php echo esc_attr( $show_caption_when_hover ) ?>"><?php echo esc_html( $image_title ) ?></h4>
										<p class="<?php echo esc_attr( $show_caption_when_hover ) ?>"><?php echo esc_html( $image_caption ) ?></p>
									</div>
									<?php
									break;
									default:
									# code...
									break;
								}
								endif; ?>
							</div>
							</<?php echo $tag ?>>
						</li>

					<?php endforeach; ?>

				</ul>

		</div>
    <?php
        if ( !empty( $show_slide_nav ) ) :
        ?>

        <a class="uk-slidenav-large uk-position-center-left<?php echo esc_attr( $slide_nav_position ) ?> <?php echo esc_attr( $slide_nav_breakpoint ) ?> <?php echo $show_slide_nav_when_hover = $show_slide_nav_when_hover ? 'uk-hidden-hover' : ''; ?> <?php echo $slide_nav_color = !empty( $slide_nav_color ) ? esc_attr( $slide_nav_color ) : ''; ?> uk-position-small" href="#" data-uk-slidenav-previous data-uk-slider-item="previous"></a>
        <a class="uk-slidenav-large uk-position-center-right<?php echo esc_attr( $slide_nav_position ) ?> <?php echo esc_attr( $slide_nav_breakpoint ) ?> <?php echo $show_slide_nav_when_hover = $show_slide_nav_when_hover ? 'uk-hidden-hover' : ''; ?> <?php echo $slide_nav_color = !empty( $slide_nav_color ) ? esc_attr( $slide_nav_color ) : ''; ?> uk-position-small" href="#" data-uk-slidenav-next data-uk-slider-item="next"></a>

        <?php
        endif;
        if ( !empty( $show_dot_nav ) ) :
            $count = 0;
            ?>
            <ul class="uk-dotnav uk-margin uk-flex uk-flex-center">

                <?php
                    foreach ( $image_array as $image_item ) : ?>
                        <li data-uk-slider-item="<?php echo esc_attr( $count ) ?>">
                            <a href=""></a>
                        </li>
                        <?php
                        $count++;
                    endforeach; ?>
            </ul>
            <?php
        endif;
     ?>
	</div>
</div>

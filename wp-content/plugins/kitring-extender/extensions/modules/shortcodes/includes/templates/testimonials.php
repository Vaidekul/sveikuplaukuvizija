<?php

$atts = vc_param_group_parse_atts( $values );

# Shortcode attributes
$shortcode_attr = array();

# Container attributes
$container_attributes = array( 'class' => array() );

// $hover_color = !empty( $hover_color ) ? $hover_color : '';
//
// $content_bg_color = !empty( $content_bg_color ) ? $content_bg_color : '#F2F2F2';
//
// $animation = !empty( $autoplay_interval ) ? 'autoplay:true;autoplay-interval:' . $autoplay_interval . 'ms;' : '';

# Testimonials Style

$shortcode_attr['class'][]     = 'de-sc-testimonials--' . $testimonial_style;

# Pre-defined Classes

$shortcode_attr['class'][]     = 'uk-position-relative de-sc-testimonials';

if( $slide_nav_position !== '-out' )
    $shortcode_attr['class'][]     = 'uk-slider-container';

# Init Slider
$shortcode_attr['data-uk-slider'] = array();

# Autoplay Attribute

if( !empty( $autoplay_interval ) )
	$shortcode_attr['data-uk-slider'][]     = 'autoplay: true;autoplay-interval:' . $autoplay_interval . ';';

# Disable Infinite Scroll

if( !empty( $is_disable_infinite_scroll ) )
	$shortcode_attr['data-uk-slider'][]     = 'finite: false;';

# Disable Infinite Scroll

if( ( $testimonial_style === 'style-3' || $testimonial_style === 'style-4' ) && !empty( $is_enable_in_sets ) )
	$shortcode_attr['data-uk-slider'][]     = 'sets: true;';

# Disable Infinite Scroll

if( ( $testimonial_style === 'style-3' || $testimonial_style === 'style-4' ) && !empty( $is_center_active_slide ) )
	$shortcode_attr['data-uk-slider'][]     = 'center: true;';


# ITEM CONTAINER SETTINGS

// $container_attributes['data-uk-grid']    = '';

if ( $testimonial_style === 'style-1' || $testimonial_style === 'style-2'  )
    $container_attributes['class'][]     = 'uk-slider-items';

if ( $testimonial_style === 'style-3' || $testimonial_style === 'style-4' ) {
    $container_attributes['data-uk-grid']    = '';

    $container_attributes['class'][] = "uk-slider-items {$column_gap} uk-grid";

    # Set phone portrait column

    $container_attributes['class'][] = sprintf( 'uk-child-width-%s', $phone_potrait_columns );

    # Set phone landscape & tablet portrait column

    $container_attributes['class'][] = sprintf( 'uk-child-width-%s@s', $phone_landscape_columns );

    # Set tablet landscape column

    $container_attributes['class'][] = sprintf( 'uk-child-width-%s@m', $tablet_landscape_columns );

    # Set desktop column

    $container_attributes['class'][] = sprintf( 'uk-child-width-%s@l', $desktop_landscape_columns );

}

$item_count = count( $atts );


?>



<div <?php
	dahz_shortcode_set_attributes(
		$shortcode_attr,
		'testimonials_shortcode',
		$atts
	); ?>>
    <div class="uk-position-relative uk-visible-toggle">
        <?php if( !empty( $slide_nav_position )  ) { echo '<div class="uk-slider-container">'; } ?>
        <ul <?php
            dahz_shortcode_set_attributes(
                $container_attributes,
                'testimonials_container',
                $atts
            ); ?>>
    <?php

switch ( $testimonial_style ) {
    case 'style-1':
        foreach ( $atts as $value ) {
            $image             = isset( $value['image'] ) ? $value['image'] : '';
            $name              = isset( $value['name'] ) ? $value['name'] : '';
            $role              = isset( $value['role'] ) ? $value['role'] : '';
            $url_link          = isset( $value['url_link'] ) ? $value['url_link'] : '';
            $stars_rating      = isset( $value['stars_rating'] ) ? $value['stars_rating'] : '';
            $quote_content     = isset( $value['quote_content'] ) ? $value['quote_content'] : '';
            $quote_color       = !empty( $quote_color ) ? 'color:' . $quote_color : '';
            $image_element =  !empty( $image ) ? wp_get_attachment_image( $image, 'thumbnail' ) : '<div class="de-sc-testimonials__empty-image"><i style="' . esc_attr( $quote_color ) . '" data-uk-icon="icon: quote-right; ratio: 3"></i></div>';
            // $image_element =  !empty( $image ) && $testimonial_style !== 'style-1' ? wp_get_attachment_image( $image, 'thumbnail' ) : '';

            ?>
            <li class="de-sc-testimonials__item uk-width-1-1">

                <a href="<?php echo esc_url( $url_link ) ?>" aria-label="Testimonials" class="uk-padding-large uk-padding-remove-vertical">
                    <div class="de-sc-testimonials__image">
                        <?php echo( $image_element ) ?>
                    </div>
                    <p class="de-sc-testimonials__content">
                        <?php esc_html_e( $quote_content ) ?>
                    </p>
                    <?php if ( $stars_rating !== 'hidden' ): ?>
                        <div class="de-sc-testimonials__ratings uk-margin">
                            <div class="star-rating"><span style="width: <?php echo esc_attr( $stars_rating ) ?>">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">2</span> customer ratings</span></div>
                        </div>
                    <?php endif; ?>
                    <div class="de-sc-testimonials__name uk-margin">
                        <h5><?php esc_html_e( $name ) ?></h5>
                    </div>
                    <div class="de-sc-testimonials__role">
                        <?php esc_html_e( $role, 'sobari_sc' ) ?>
                    </div>

                    </a>
                </li>

                <?php

            }
        break;

    case 'style-2':
        foreach ( $atts as $value ) {
            $image             = isset( $value['image'] ) ? $value['image'] : '';
            $name              = isset( $value['name'] ) ? $value['name'] : '';
            $role              = isset( $value['role'] ) ? $value['role'] : '';
            $url_link          = isset( $value['url_link'] ) ? $value['url_link'] : '';
            $stars_rating      = isset( $value['stars_rating'] ) ? $value['stars_rating'] : '';
            $quote_content     = isset( $value['quote_content'] ) ? $value['quote_content'] : '';
            $image_element =  !empty( $image ) ? wp_get_attachment_image( $image, 'thumbnail' ) : '';
            $image_element =  !empty( $image ) && $testimonial_style !== 'style-1' ? wp_get_attachment_image( $image, 'thumbnail' ) : '<div class="de-sc-testimonials__empty-image"></div>';

        ?>
        <li class="de-sc-testimonials__item uk-width-1-1">
            <a href="<?php echo esc_url( $url_link ) ?>" aria-label="Testimonials" class="uk-padding-large uk-padding-remove-vertical">
                <div class="de-sc-testimonials__quote-icon">
                </div>
                <div class="de-sc-testimonials__image">
                    <?php echo( $image_element ) ?>
                </div>
                        <p class="de-sc-testimonials__content">
                            <?php esc_html_e( $quote_content ) ?>
                        </p>
                        <?php if ( $stars_rating !== 'hidden' ): ?>
                            <div class="de-sc-testimonials__ratings uk-margin">
                                <div class="star-rating"><span style="width: <?php echo esc_attr( $stars_rating ) ?>">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">2</span> customer ratings</span></div>
                            </div>
                        <?php endif; ?>
                        <div class="de-sc-testimonials__name uk-margin-small-bottom">
                            <h5><?php esc_html_e( $name ) ?></h5>
                        </div>
                        <div class="de-sc-testimonials__role">
                            <?php esc_html_e( $role, 'sobari_sc' ) ?>
                        </div>
                </a>
            </li>

            <?php

        }
        break;

    case 'style-3':
        foreach ( $atts as $value ) {
            $image             = isset( $value['image'] ) ? $value['image'] : '';
            $name              = isset( $value['name'] ) ? $value['name'] : '';
            $role              = isset( $value['role'] ) ? $value['role'] : '';
            $url_link          = isset( $value['url_link'] ) ? $value['url_link'] : '';
            $stars_rating      = isset( $value['stars_rating'] ) ? $value['stars_rating'] : '';
            $quote_content     = isset( $value['quote_content'] ) ? $value['quote_content'] : '';
            $image_element =  !empty( $image ) ? wp_get_attachment_image( $image, 'thumbnail' ) : '';
            $image_element =  !empty( $image ) && $testimonial_style !== 'style-1' ? wp_get_attachment_image( $image, 'thumbnail' ) : '<div class="de-sc-testimonials__empty-image"></div>';

        ?>
        <li class="de-sc-testimonials__item">
            <a href="<?php echo esc_url( $url_link ) ?>" aria-label="Testimonials" class="uk-panel">
                <blockquote class="de-sc-testimonials__item__bubble">
                    <div class="de-sc-testimonials__item__bubble__content">
                        <p class="de-sc-testimonials__content uk-position-relative">
                            <span class="de-sc-testimonials__quote-icon uk-position-left-top">
                                <i data-uk-icon="icon: quote-right; ratio: 1"></i>
                            </span>
                            <?php esc_html_e( $quote_content ) ?>
                        </p>
                        <?php if ( $stars_rating !== 'hidden' ): ?>
                            <div class="de-sc-testimonials__ratings uk-margin">
                                <div class="star-rating"><span style="width: <?php echo esc_attr( $stars_rating ) ?>">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">2</span> customer ratings</span></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </blockquote>
                <div class="de-sc-testimonials__image uk-margin-medium-top">
                    <?php echo( $image_element ) ?>
                </div>
                <div class="de-sc-testimonials__name uk-margin-top uk-margin-small-bottom">
                    <h5><?php esc_html_e( $name ) ?></h5>

                </div>
                <div class="de-sc-testimonials__role">
                    <?php esc_html_e( $role, 'sobari_sc' ) ?>
                </div>

            </a>
        </li>

        <?php

        }
        break;
    case 'style-4':
        foreach ( $atts as $value ) {
            $image             = isset( $value['image'] ) ? $value['image'] : '';
            $name              = isset( $value['name'] ) ? $value['name'] : '';
            $role              = isset( $value['role'] ) ? $value['role'] : '';
            $url_link          = isset( $value['url_link'] ) ? $value['url_link'] : '';
            $stars_rating      = isset( $value['stars_rating'] ) ? $value['stars_rating'] : '';
            $quote_content     = isset( $value['quote_content'] ) ? $value['quote_content'] : '';
            $image_element     = !empty( $image ) ? wp_get_attachment_image( $image, 'thumbnail' ) : '';
            $image_element     = !empty( $image ) && $testimonial_style !== 'style-1' ? '<div class="de-sc-testimonials__image">' . wp_get_attachment_image( $image, 'thumbnail' ) . '</div>' : '';

            ?>
            <li class="de-sc-testimonials__item">
                <a href="<?php echo esc_url( $url_link ) ?>" aria-label="Testimonials" class="uk-panel uk-padding">
                    <div class="de-sc-testimonials__head">
                        <?php echo( $image_element ) ?>
                        <div class="de-sc-testimonials__name uk-margin-small-bottom">
                            <h5><?php esc_html_e( $name ) ?></h5>
                        </div>
                        <div class="de-sc-testimonials__role">
                            <?php esc_html_e( $role, 'sobari_sc' ) ?>
                        </div>
                    </div>
                    <p class="de-sc-testimonials__content">
                        <?php esc_html_e( $quote_content ) ?>
                    </p>
                    <?php if ( $stars_rating !== 'hidden' ): ?>
                        <div class="de-sc-testimonials__ratings uk-margin">
                            <div class="star-rating"><span style="width: <?php echo esc_attr( $stars_rating ) ?>">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">2</span> customer ratings</span></div>
                        </div>
                    <?php endif; ?>

                </a>
            </li>

        <?php

        }
        break;

}
$count = 0;
?>
    </ul>
    <?php if( !empty( $slide_nav_position ) ) { echo '</div>'; };
    if ( !empty( $is_show_slide_nav ) ) :
        if ( !empty( $slide_nav_position ) && $slide_nav_position !== '-out' ) { echo '<div class="uk-slidenav-container uk-position-' . $slide_nav_position . '">'; }?>

        <a <?php dahz_shortcode_set_attributes(
            array(
                'data-uk-slidenav-previous' => '',
                'data-uk-slider-item'       => 'previous',
                'href'                      => '#',
                'aria-label'                => 'Testimonials',
                'class'                     => sprintf(
                '%1$s %4$s %2$s %3$s',
                !empty( $slide_nav_position ) && $slide_nav_position !== '-out' ? '' : 'uk-position-center-left' . $slide_nav_position,
                !empty( $is_hover_show_slide_nav ) ? ' uk-hidden-hover' : '',
                !empty( $slide_nav_breakpoint ) ? " uk-visible{$slide_nav_breakpoint}" : '',
                $slide_nav_color
                )
                )
                ); ?>></a>
                <a <?php dahz_shortcode_set_attributes(
                array(
                'data-uk-slidenav-next' => '',
                'data-uk-slider-item'   => 'next',
                'href'                  => '#',
                'aria-label'                => 'Testimonials',
                'class'                 => sprintf(
                '%4$s %1$s %2$s %3$s',
                !empty( $slide_nav_position ) && $slide_nav_position !== '-out' ? '' : 'uk-position-center-right' . $slide_nav_position,
                !empty( $is_hover_show_slide_nav ) ? ' uk-hidden-hover' : '',
                !empty( $slide_nav_breakpoint ) ? " uk-visible{$slide_nav_breakpoint}" : '',
                $slide_nav_color
                )
                )
                ); ?>></a>
                <?php if ( !empty( $slide_nav_position ) && $slide_nav_position !== '-out' ) { echo '</div>'; } ?>
            <?php endif; ?>
            </div>
            <?php if ( !empty( $is_show_dot_nav ) ) : ?>
            <ul class="uk-dotnav uk-margin uk-flex <?php echo esc_attr( $dot_nav_position ) ?> <?php echo esc_attr( $slide_nav_color ) ?> <?php echo !empty( $dot_nav_breakpoint ) ? esc_attr( "uk-visible{$dot_nav_breakpoint}" ) : ''; ?> ">
                <?php
                    for ( $i=0; $i < $item_count ; $i++ ) {
                        ?>
                        <li data-uk-slider-item="<?php echo esc_attr( $i ) ?>">
                            <a href="" aria-label="Testimonials">
                            </a>
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 16 16" preserveAspectRatio="none"><circle cx="8" cy="8" r="6.215"></circle></svg>

                        </li>
                        <?php

                    }

                ?>
            </ul>
        <?php endif; ?>
</div>

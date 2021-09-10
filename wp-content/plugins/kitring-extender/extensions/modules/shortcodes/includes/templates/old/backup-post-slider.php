<?php

/*
	filter_post_by
    category_slug
    post_id
    order_by
    sort_by
    number_of_posts
    columns
    column_gap
    post_offset
    post_slider_style
    title_element_tag
    title_color
    is_title_uppercase
    is_hide_category
    is_category_uppercase
    is_hide_meta_category
    is_hide_avatar
    category_color
    is_hide_author
    is_hide_date
    is_meta_uppercase
    post_meta_color
    is_hide_excerpt
    excerpt_length
    excerpt_color
    is_hide_share
    share_color
    post_alignment
    is_disable_feature_image
    media_ratio
    media_hover_style
    bg_color
    box_shadow
    hover_box_shadow
    hover_border_color
    is_hide_button
    button_text
    phone_potrait_columns
    phone_landscape_columns
    tablet_landscape_columns
    is_show_slide_nav
    slide_nav_position
    is_show_slide_nav
    is_hover_show_slide_nav
    slide_nav_breakpoint
    is_show_dot_nav
    dot_nav_breakpoint
    autoplay_interval
    is_disable_infinite_scroll
    is_enable_in_sets
    is_center_active_slide
*/

# Shortcode attributes
$shortcode_attr = array();

# Slider attributes
$slider_attr = array();

# Loop attribute
$loop_attr = array();

# Item attribute
$item_attr = array();

# Content attribute
$content_attr = array();

# Title attribute
$title_attr = array();

# Shortcode Setting

    # Classes

    # Pre-defined Class

    $shortcode_attr['class'][]               = 'de-sc-post-slider';

    # Post Slider Style

    $shortcode_attr['data-slider-style']     = $post_slider_style;

    # Hover effect

	if ( !empty( $media_hover_style ) )
		$shortcode_attr['data-hover-effect'] = $media_hover_style;

    $slider_attr = array(
        'data-uk-slider' => array(),
        'class'			 => 'uk-visible-toggle'
    );

    $loop_attr['class'][]                    = 'uk-slider-items';

    # Autoplay Attribute

    if( !empty( $autoplay_interval ) )
        $slider_attr['data-uk-slider'][]     = 'autoplay: true;autoplay-interval:' . $autoplay_interval . ';';

    # Disable Infinite Scroll

    if( !empty( $is_disable_infinite_scroll ) )
        $slider_attr['data-uk-slider'][]     = 'finite: true;';

    # Disable Infinite Scroll

    if( !empty( $is_enable_in_sets ) )
        $slider_attr['data-uk-slider'][]     = 'sets: true;';

    # Disable Infinite Scroll

    if( !empty( $is_enable_in_sets ) )
        $slider_attr['data-uk-slider'][]     = 'center: true;';

# SETTING COLUMN ON ALL DEVICES

    # Activate Grid System

    $loop_attr['uk-grid'] = '';

	# Set column gap

	if ( !empty( $column_gap ) )
		$loop_attr['class'][] = $column_gap;

	# Set column per row

	# Set phone portrait column

	$loop_attr['class'][] = sprintf( 'uk-child-width-%s', $phone_potrait_columns );

	# Set phone landscape & tablet portrait column

	$loop_attr['class'][] = sprintf( 'uk-child-width-%s@s', $phone_landscape_columns );

	# Set tablet landscape column

	$loop_attr['class'][] = sprintf( 'uk-child-width-%s@m', $tablet_landscape_columns );

	# Set desktop column

	$loop_attr['class'][] = sprintf( 'uk-child-width-%s@l', $columns );

# END OF SETTING COLUMN ON ALL DEVICES

# SETTING SLIDER ITEMS

# CONTAINER SLIDER ITEM

    # Box Shadow Item

    if ( !empty( $box_shadow ) )
        $item_attr['class'][] = $box_shadow;

    # Hover Box Shadow Item

    if ( !empty( $hover_box_shadow ) )
        $item_attr['class'][] = $hover_box_shadow;

    # Item Background Color

    if ( !empty( $bg_color ) && $post_slider_style === 'layout-1' )
        $item_attr['style'][] = 'background:' . $bg_color . ';';

    # Item Background Color

    if ( $post_slider_style === 'layout-2' || $post_slider_style === 'layout-3' )
        $item_attr['class'][] = 'de-sc-post-slider__item-container uk-position-relative';

# END OF SLIDER CONTAINER

# CONTENT SLIDER ITEMS

	# Pre-defined Class

    $content_attr['class'][] = 'de-sc-post-slider__content uk-padding uk-overlay';

    # Class in layout-2

    if ( $post_slider_style === 'layout-2' )
        $content_attr['class'][] = 'uk-position-bottom-left uk-padding-small';

    # Class in layout-3

    if ( $post_slider_style === 'layout-3')
        $content_attr['class'][] = 'uk-position-center-left uk-padding-large';

    # Content Alignment

    if ( $post_slider_style === 'layout-1' )
        $content_attr['class'][] = 'de-sc-post-slider__align--' . $post_alignment;

    # Uppercase Title

    if( !empty( $is_title_uppercase ) )
        $content_attr['class'][]     = 'uppercased-title';

    # Uppercase Category

    if( !empty( $is_category_uppercase ) )
        $content_attr['class'][]     = 'uppercased-category';

    # Uppercase Category

    if( !empty( $is_meta_uppercase ) )
        $content_attr['class'][]     = 'uppercased-meta';

    # Styling

    # Title Color

    if ( !empty( $title_color ) && $post_slider_style === 'layout-1' )
		$title_attr['style'][] = sprintf( 'color: %s;', $title_color );

    # Content

    # Button Text

    if ( empty( $button_text ) && $post_slider_style === 'layout-3' )
		$button_text = 'Read More';

# END OF SETTING SLIDER ITEMS

// Setup Args Params

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args  = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'ignore_sticky_posts' => 1,
	'posts_per_page'      => $number_of_posts,
	'orderby'             => $order_by,
	'order'               => $sort_by,
	'paged'               => $paged,
    'offset'              => $post_offset
);


$get_categories_id = array_map( 'get_category_by_slug' , explode( ',', $category_slug ));

$array_category = array();

foreach ( $get_categories_id as $category_object ) {

    array_push( $array_category, $category_object->term_id );

}

// Additional Params
switch( $filter_post_by ) {

	case 'categories':

		$args['category__in'] = $array_category;

		break;

	case 'post_ids':

		$args['post__in'] = array_map( 'sanitize_title', explode( ',', $post_id ) );

		break;

}

// Setup Query
$query = new WP_Query( $args );

if ( $query->have_posts() ) : ?>

<div <?php dahz_shortcode_set_attributes( $shortcode_attr, 'dahz_post_slider_shortcode' ); ?>>
    <div <?php dahz_shortcode_set_attributes( $slider_attr, 'dahz_post_slider_slider' ); ?>>
        <ul <?php dahz_shortcode_set_attributes( $loop_attr, 'dahz_post_slider_slider' ); ?>>
            <?php switch ( $post_slider_style ) {
                case 'layout-3':
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                        <li class="de-sc-post-slider__item">
                            <div <?php dahz_shortcode_set_attributes( $item_attr, 'dahz_post_slider_item' ); ?>>
                                <?php if ( has_post_thumbnail() && empty( $is_disable_feature_image ) ) : ?>
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="de-ratio de-ratio-<?php echo esc_attr( $media_ratio ) ?>">
                                        <?php echo wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), '', '', array( "class" => 'de-ratio-content') ); ?>
                                    </a>
                                <?php endif; ?>
                                <div <?php dahz_shortcode_set_attributes( $content_attr, 'dahz_post_slider_content' ); ?>>
                                    <span class="de-sc-divider-ornament de-sc-divider-ornament--unhovered"></span>
                                    <div class="de-sc-post-slider__meta uk-margin">
                                        <?php
                                        $args_ava = array(
                                            'size' => 38,
                                            'height' => '',
                                            'width' => '',
                                            'default' =>'',
                                            'force_default' => '',
                                            'rating' => '',
                                            'scheme' => '',
                                            'class' => 'uk-border-circle'
                                        );
                                        echo get_avatar( get_the_ID(), 38, '', '', $args_ava );
                                        if ( $is_hide_author )	: add_filter( 'dahz_framework_render_author'	, function( $output ){ return false; }); endif;
                                        add_filter( 'dahz_framework_render_date'		, function( $output ){ return false; });;
                                        add_filter( 'dahz_framework_render_comment'	, function( $output ){ return false; });
                                        echo '<span class="by_separator uk-margin-small-left uk-margin-small-right">' . esc_html__( ' By ', 'sobari_sc' ) . '</span>';
                                        dahz_framework_render_archive_meta();
                                        echo '<span class="by_separator uk-margin-small-left uk-margin-small-right">' . esc_html__( ' in ', 'sobari_sc' ) . '</span>';
                                        if ( !$is_hide_meta_category ) : dahz_framework_render_archive_categories(); endif;
                                        ?>
                                    </div>
                                    <<?php echo $title_element_tag ?> >
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" <?php dahz_shortcode_set_attributes( $title_attr, 'dahz_post_slider_title' ); ?>><?php echo !empty( get_the_title() ) ? get_the_title() : get_permalink(); ?></a>
                                    </<?php echo $title_element_tag ?>>
                                    <span class="de-sc-divider-ornament de-sc-divider-ornament--hovered"></span>
                                    <?php

                                    if ( !$is_hide_excerpt ) :
                                        $excerpt_content     = wp_trim_excerpt();

                                        # Excerpt Length Setting
                                        if ( empty( $excerpt_length ))
                                        $excerpt_length = 20;

                                        if ( str_word_count( $excerpt_content, 0 ) > $excerpt_length ) {

                                            $words = str_word_count( $excerpt_content, 2 );
                                            $pos = array_keys( $words );
                                            $excerpt_content = substr( $excerpt_content, 0, $pos[$excerpt_length]) . '...';
                                        }

                                        ?>
                                        <p><?php echo $excerpt_content; ?></p>
                                    <?php
                                        endif;
                                        if (!$is_hide_button) :
                                    ?>
                                        <a href="<?php echo esc_url( get_permalink() ); ?>" class="de-sc-post-slider__button">
                                            <?php echo esc_html( $button_text, 'sobari_sc' ) ?> <span uk-icon="icon: arrow-right"></span>
                                        </a>
                                    <?php
                                        endif;
                                    ?>

                                </div>
                            </div>
                        </li>
                    <?php
                    endwhile;
                    break;
                default:
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                        <li class="de-sc-post-slider__item">
                            <div <?php dahz_shortcode_set_attributes( $item_attr, 'dahz_post_slider_item' ); ?>>
                                <?php if ( has_post_thumbnail() && empty( $is_disable_feature_image ) ) : ?>
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="de-ratio de-ratio-<?php echo esc_attr( $media_ratio ) ?>">
                                        <?php echo wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), '', '', array( "class" => 'de-ratio-content') ); ?>
                                    </a>
                                <?php endif; ?>
                                <div <?php dahz_shortcode_set_attributes( $content_attr, 'dahz_post_slider_content' ); ?>>
                                    <?php if ( !$is_hide_category ) : dahz_framework_render_archive_categories(); endif; ?>
                                    <<?php echo $title_element_tag ?> >
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" <?php dahz_shortcode_set_attributes( $title_attr, 'dahz_post_slider_title' ); ?>><?php echo !empty( get_the_title() ) ? get_the_title() : get_permalink(); ?></a>
                                    </<?php echo $title_element_tag ?>>
                                    <?php
                                    if ( $is_hide_author )	: add_filter( 'dahz_framework_render_author'	, function( $output ){ return false; }); endif;
                                    if ( $is_hide_date )	: add_filter( 'dahz_framework_render_date'		, function( $output ){ return false; }); endif;
                                    add_filter( 'dahz_framework_render_comment'	, function( $output ){ return false; });
                                    dahz_framework_render_archive_meta();

                                    if ( !$is_hide_excerpt ) :
                                        $excerpt_content     = wp_trim_excerpt();

                                        # Excerpt Length Setting
                                        if ( empty( $excerpt_length ))
                                        $excerpt_length = 20;

                                        if ( str_word_count( $excerpt_content, 0 ) > $excerpt_length ) {

                                            $words = str_word_count( $excerpt_content, 2 );
                                            $pos = array_keys( $words );
                                            $excerpt_content = substr( $excerpt_content, 0, $pos[$excerpt_length]) . '...';
                                        }

                                        ?>
                                        <p><?php echo $excerpt_content; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                <?php
                endwhile;
                    break;
            } ?>
        </ul>
        <?php
            if ( !empty( $is_show_slide_nav ) ) :
        ?>

        <a class="<?php echo esc_attr( $slide_nav_color ) ?> uk-slidenav-large uk-position-center-left<?php echo esc_attr( $slide_nav_position ) ?> <?php echo esc_attr( $slide_nav_breakpoint ) ?> <?php echo $is_hover_show_slide_nav = $is_hover_show_slide_nav ? 'uk-hidden-hover' : ''; ?> uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="<?php echo esc_attr( $slide_nav_color ) ?> uk-slidenav-large uk-position-center-right<?php echo esc_attr( $slide_nav_position ) ?> <?php echo esc_attr( $slide_nav_breakpoint ) ?> <?php echo $is_hover_show_slide_nav = $is_hover_show_slide_nav ? 'uk-hidden-hover' : ''; ?> uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>

        <?php
            endif;
            if ( !empty( $is_show_dot_nav ) ) :
                $count = 0;
        ?>
        <ul class="uk-dotnav uk-margin uk-flex uk-flex-center <?php echo esc_attr( $slide_nav_color ) ?>">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <li uk-slider-item="<?php echo esc_attr( $count ) ?>">
                <a href="">
                </a>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 16 16" preserveAspectRatio="none"><circle cx="8" cy="8" r="6.215"></circle></svg>
            </li>
            <?php
                $count++;
                endwhile;
            ?>
        </ul>
        <?php
            endif;
         ?>
    </div>
</div>

<?php wp_reset_postdata();
endif;

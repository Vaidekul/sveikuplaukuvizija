<?php

$pixel_icons = array(
	array( 'vc_pixel_icon vc_pixel_icon-alert' => __( 'Alert', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-info' => __( 'Info', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-tick' => __( 'Tick', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-explanation' => __( 'Explanation', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-address_book' => __( 'Address book', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-alarm_clock' => __( 'Alarm clock', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-anchor' => __( 'Anchor', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-application_image' => __( 'Application Image', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-arrow' => __( 'Arrow', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-asterisk' => __( 'Asterisk', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-hammer' => __( 'Hammer', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon' => __( 'Balloon', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon_buzz' => __( 'Balloon Buzz', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon_facebook' => __( 'Balloon Facebook', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon_twitter' => __( 'Balloon Twitter', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-battery' => __( 'Battery', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-binocular' => __( 'Binocular', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_excel' => __( 'Document Excel', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_image' => __( 'Document Image', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_music' => __( 'Document Music', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_office' => __( 'Document Office', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_pdf' => __( 'Document PDF', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_powerpoint' => __( 'Document Powerpoint', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_word' => __( 'Document Word', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-bookmark' => __( 'Bookmark', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-camcorder' => __( 'Camcorder', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-camera' => __( 'Camera', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-chart' => __( 'Chart', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-chart_pie' => __( 'Chart pie', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-clock' => __( 'Clock', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-fire' => __( 'Fire', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-heart' => __( 'Heart', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-mail' => __( 'Mail', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-play' => __( 'Play', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-shield' => __( 'Shield', 'sobari_sc' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-video' => __( 'Video', 'sobari_sc' ) ),
);

$fonts_array	= array( 'Google Fonts' );

$field_option = array(
	'columns'	=> array(
		__( 'Inherit', 'sobari_sc' )	=> 'inherit',
		__( '1 columns', 'sobari_sc' )	=> '1',
		__( '2 columns', 'sobari_sc' )	=> '2',
		__( '3 columns', 'sobari_sc' )	=> '3',
		__( '4 columns', 'sobari_sc' )	=> '4',
		__( '5 columns', 'sobari_sc' )	=> '5',
		__( '6 columns', 'sobari_sc' )	=> '6',
	),
	'source_font'	=> $fonts_array,
	'order_by'		=> array(
		'Date'			=> 'date',
		'ID'			=> 'id',
		'Author'		=> 'author',
		'Title'			=> 'title',
		'Modified'		=> 'modified',
		'Random'		=> 'random',
		'Comment Count' => 'comment_count',
		'Menu Order'	=> 'menu_order',
	),
	'product_order_by'		=> array(
		'Date'			=> 'date',
		'ID'			=> 'id',
		'Title'			=> 'title',
		'Random'		=> 'rand',
		'Menu Order'	=> 'menu_order',
		'Popularity'	=> 'popularity',
		'Rating'		=> 'rating'
	),
	'tax_order_by'		=> array(
		'Name'			=> 'name',
		'Slug'			=> 'slug',
		'Term Slug'		=> 'term_group',
		'Term ID'		=> 'term_id',
		'ID'			=> 'id',
		'Description'	=> 'description',
		'Parent'		=> 'parent',
		'Count'			=> 'count',
		'Include'		=> 'include'
	),
	'sort_by'	=> array(
		'Ascending'		=> 'asc',
		'Descending'	=> 'desc',
	),
	'alignment'	=> array(
		'Left'		=> 'left',
		'Center'	=> 'center',
		'Right'		=> 'right',
	),

	'tag'		=> array(
		'h1'	=> 'h1',
		'h2'	=> 'h2',
		'h3'	=> 'h3',
		'h4'	=> 'h4',
		'h5'	=> 'h5',
		'h6'	=> 'h6',
		'p'		=> 'p',
		'div'	=> 'div',
	),
	'pixel_icons'		=> $pixel_icons,
);

$field_option['padding_size'] = array(
	__( 'None', 'sobari_sc' )			=> '',
	__( 'Default', 'sobari_sc' )		=> 'uk-padding',
	__( 'Extra Small', 'sobari_sc' )	=> 'uk-padding-xsmall',
	__( 'Small', 'sobari_sc' )			=> 'uk-padding-small',
	__( 'Large', 'sobari_sc' )			=> 'uk-padding-large',
);

$field_option['margin_size'] = array(
	__( 'None', 'sobari_sc' )			=> 'uk-margin-remove',
	__( 'Default', 'sobari_sc' )		=> 'uk-margin',
	__( 'Medium', 'sobari_sc' )			=> 'uk-margin-medium',
	__( 'Small', 'sobari_sc' )			=> 'uk-margin-small',
	__( 'Large', 'sobari_sc' )			=> 'uk-margin-large',
);

$field_option['container_size'] = array(
	__( 'Default', 'sobari_sc' )	=> '',
	__( 'Small', 'sobari_sc' )		=> 'uk-container-small',
	__( 'Large', 'sobari_sc' )		=> 'uk-container-large',
	__( 'Expand', 'sobari_sc' )		=> 'uk-container-expand uk-padding-remove-horizontal',
);

$field_option['grid_gutter'] = array(
	__( 'Default', 'sobari_sc' )	=> '',
	__( 'Small', 'sobari_sc' )		=> 'uk-grid-small',
	__( 'Medium', 'sobari_sc' )		=> 'uk-grid-medium',
	__( 'Large', 'sobari_sc' )		=> 'uk-grid-large',
	__( 'Collapse', 'sobari_sc' )	=> 'uk-grid-collapse',
);

$field_option['flex_column_alignment'] = array(
	__( 'Top', 'sobari_sc' )		=> 'uk-flex-top',
	__( 'Middle', 'sobari_sc' )		=> 'uk-flex-middle',
	__( 'Bottom', 'sobari_sc' )		=> 'uk-flex-bottom',
	__( 'Stretch', 'sobari_sc' )	=> 'uk-flex-stretch',
);

$field_option['flex_content_alignment'] = array(
	__( 'Default', 'sobari_sc' )	=> '',
	__( 'Top', 'sobari_sc' )		=> 'uk-flex-top',
	__( 'Middle', 'sobari_sc' )		=> 'uk-flex-middle',
	__( 'Bottom', 'sobari_sc' )		=> 'uk-flex-bottom',
);

$field_option['border_style'] = array(
	__( 'None', 'sobari_sc' )		=> 'none',
	__( 'Hidden', 'sobari_sc' )		=> 'hidden',
	__( 'Dotted', 'sobari_sc' )		=> 'dotted',
	__( 'Dashed', 'sobari_sc' )		=> 'dashed',
	__( 'Solid', 'sobari_sc' )		=> 'solid',
	__( 'Double', 'sobari_sc' )		=> 'double',
	__( 'Groove', 'sobari_sc' )		=> 'groove',
	__( 'Ridge', 'sobari_sc' )		=> 'ridge',
	__( 'Inset', 'sobari_sc' )		=> 'inset',
	__( 'Outset', 'sobari_sc' )		=> 'outset',
	__( 'Initial', 'sobari_sc' )	=> 'initial',
	__( 'Inherit', 'sobari_sc' )	=> 'inherit',
);

$field_option['border_radius'] = array(
	__( '1', 'sobari_sc' )	=> '1px',
	__( '2', 'sobari_sc' )	=> '2px',
	__( '3', 'sobari_sc' )	=> '3px',
	__( '4', 'sobari_sc' )	=> '4px',
	__( '5', 'sobari_sc' )	=> '5px',
	__( '6', 'sobari_sc' )	=> '6px',
	__( '7', 'sobari_sc' )	=> '7px',
	__( '8', 'sobari_sc' )	=> '8px',
	__( '9', 'sobari_sc' )	=> '9px',
	__( '10', 'sobari_sc' )	=> '10px',
	__( '15', 'sobari_sc' )	=> '15px',
	__( '20', 'sobari_sc' )	=> '20px',
	__( '25', 'sobari_sc' )	=> '25px',
	__( '30', 'sobari_sc' )	=> '30px',
	__( '35', 'sobari_sc' )	=> '35px',
);

$field_option['image_size'] = array(
	__( 'Auto', 'sobari_sc' )		=> '',
	__( 'Cover', 'sobari_sc' )		=> 'uk-background-cover',
	__( 'Contain', 'sobari_sc' )	=> 'uk-background-contain',
);

$field_option['image_repeat'] = array(
	__( 'Repeat', 'sobari_sc' )		=> '',
	__( 'Repeat X', 'sobari_sc' )	=> 'uk-background-repeatx',
	__( 'Repeat Y', 'sobari_sc' )	=> 'uk-background-repeaty',
	__( 'No Repeat', 'sobari_sc' )	=> 'uk-background-norepeat',
);

$field_option['image_position'] = array(
	__( 'Top Left', 'sobari_sc' )		=> 'uk-background-top-left',
	__( 'Top Center', 'sobari_sc' )		=> 'uk-background-top-center',
	__( 'Top Right', 'sobari_sc' )		=> 'uk-background-top-right',
	__( 'Center Left', 'sobari_sc' )	=> 'uk-background-center-left',
	__( 'Center Center', 'sobari_sc' )	=> 'uk-background-center-center',
	__( 'Center Right', 'sobari_sc' )	=> 'uk-background-center-right',
	__( 'Bottom Left', 'sobari_sc' )	=> 'uk-background-bottom-left',
	__( 'Bottom Center', 'sobari_sc' )	=> 'uk-background-bottom-center',
	__( 'Bottom Right', 'sobari_sc' )	=> 'uk-background-bottom-right',
);
$field_option['position'] = array(
	__( 'Top Left', 'sobari_sc' )		=> 'position-top-left',
	__( 'Top Center', 'sobari_sc' )		=> 'position-top-center',
	__( 'Top Right', 'sobari_sc' )		=> 'position-top-right',
	__( 'Center Left', 'sobari_sc' )	=> 'position-center-left',
	__( 'Center Center', 'sobari_sc' )	=> 'position-center',
	__( 'Center Right', 'sobari_sc' )	=> 'position-center-right',
	__( 'Bottom Left', 'sobari_sc' )	=> 'position-bottom-left',
	__( 'Bottom Center', 'sobari_sc' )	=> 'position-bottom-center',
	__( 'Bottom Right', 'sobari_sc' )	=> 'position-bottom-right',
);

$field_option['image_effect'] = array(
	__( 'None', 'sobari_sc' )		=> '',
	__( 'Fixed', 'sobari_sc' )		=> 'uk-background-fixed',
	__( 'Parallax', 'sobari_sc' )	=> 'parallax',
);

$field_option['image_blend_mode'] = array(
	__( 'None' )						=> '',
	__( 'Multiply', 'sobari_sc' )		=> 'uk-background-blend-multiply',
	__( 'Screen', 'sobari_sc' )			=> 'uk-background-blend-screen',
	__( 'Overlay', 'sobari_sc' )		=> 'uk-background-blend-overlay',
	__( 'Darken', 'sobari_sc' )			=> 'uk-background-blend-darken',
	__( 'Lighten', 'sobari_sc' )		=> 'uk-background-blend-lighten',
	__( 'Color Dodge', 'sobari_sc' )	=> 'uk-background-blend-color-dodge',
	__( 'Color Burn', 'sobari_sc' )		=> 'uk-background-blend-color-burn',
	__( 'Hard Light', 'sobari_sc' )		=> 'uk-background-blend-hard-light',
	__( 'Soft Light', 'sobari_sc' )		=> 'uk-background-blend-soft-light',
	__( 'Difference', 'sobari_sc' )		=> 'uk-background-blend-difference',
	__( 'Exclusion', 'sobari_sc' )		=> 'uk-background-blend-exclusion',
	__( 'Hue', 'sobari_sc' )			=> 'uk-background-blend-hue',
	__( 'Saturation', 'sobari_sc' )		=> 'uk-background-blend-saturation',
	__( 'Color', 'sobari_sc' )			=> 'uk-background-blend-color',
	__( 'Luminosity', 'sobari_sc' )		=> 'uk-background-blend-luminosity',
);

$field_option['blend_mode'] = array(
	__( 'None' )						=> '',
	__( 'Multiply', 'sobari_sc' )		=> 'uk-blend-multiply',
	__( 'Screen', 'sobari_sc' )			=> 'uk-blend-screen',
	__( 'Overlay', 'sobari_sc' )		=> 'uk-blend-overlay',
	__( 'Darken', 'sobari_sc' )			=> 'uk-blend-darken',
	__( 'Lighten', 'sobari_sc' )		=> 'uk-blend-lighten',
	__( 'Color Dodge', 'sobari_sc' )	=> 'uk-blend-color-dodge',
	__( 'Color Burn', 'sobari_sc' )		=> 'uk-blend-color-burn',
	__( 'Hard Light', 'sobari_sc' )		=> 'uk-blend-hard-light',
	__( 'Soft Light', 'sobari_sc' )		=> 'uk-blend-soft-light',
	__( 'Difference', 'sobari_sc' )		=> 'uk-blend-difference',
	__( 'Exclusion', 'sobari_sc' )		=> 'uk-blend-exclusion',
	__( 'Hue', 'sobari_sc' )			=> 'uk-blend-hue',
	__( 'Saturation', 'sobari_sc' )		=> 'uk-blend-saturation',
	__( 'Color', 'sobari_sc' )			=> 'uk-blend-color',
	__( 'Luminosity', 'sobari_sc' )		=> 'uk-blend-luminosity',
);

$field_option['breakpoint'] = array(
	__( 'Always', 'sobari_sc' )							=> '',
	__( 'Small ( Phone Landscape )', 'sobari_sc' )		=> '@s',
	__( 'Medium ( Tablet Landscape )', 'sobari_sc' )	=> '@m',
	__( 'Large ( Desktop )', 'sobari_sc' )				=> '@l',
	__( 'Extra Large ( Large Screen )', 'sobari_sc' )	=> '@xl',
);

$field_option['strength'] = array(
	__( 'Light', 'sobari_sc' )		=> '33',
	__( 'Medium', 'sobari_sc' )		=> '66',
	__( 'Heavy', 'sobari_sc' )		=> '99',
	__( 'Very Heavy', 'sobari_sc' )	=> 'CC',
	__( 'Solid', 'sobari_sc' )		=> 'FF'
);

$field_option['gradient_direction'] = array(
	__( 'Left to Right', 'sobari_sc' )				=> 'to right',
	__( 'Left Bottom to Right Top', 'sobari_sc' )	=> 'to right top',
	__( 'Left Top to Right Bottom', 'sobari_sc' )	=> 'to right bottom',
	__( 'Bottom to Top', 'sobari_sc' )				=> 'to top',
);

$field_option['color_scheme'] = array(
	__( 'Default', 'sobari_sc' )	=> '',
	__( 'Light', 'sobari_sc' )	=> 'uk-light',
	__( 'Dark', 'sobari_sc' )	=> 'uk-dark',
);

$field_option['divider_style'] = array(
	''					=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-disable.svg",
	'curve'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-1.svg",
	'curve_asym'		=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-2.svg",
	'curve_asym_2'		=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-3.svg",
	'tilt'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-4.svg",
	'tilt_alt'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-5.svg",
	'triangle'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-6.svg",
	'fan'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-7.svg",
	'waves'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-8.svg",
	'speech'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-9.svg",
	'clouds'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-10.svg",
	'waves_opacity'		=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-11.svg",
	'waves_opacity_alt'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-12.svg",
	'curve_opacity'		=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-13.svg",
	'mountains'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-14.svg",
	'double_curve'		=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-15.svg",
	'gradient'			=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-16.svg",
	'triangle_opacity'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-17.svg",
	'triangle_opacity_2'=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_shape-top-style-18.svg",
);

$field_option['size_modifier_1'] = array(
	__( 'None', 'sobari_sc' )			=> '',
	__( 'Small', 'sobari_sc' )			=> 'small',
	__( 'Medium', 'sobari_sc' )			=> 'medium',
	__( 'Large', 'sobari_sc' )			=> 'large',
	__( 'Extra Large', 'sobari_sc' )	=> 'xlarge',
);

$field_option['size_modifier_2'] = array(
	__( 'None', 'sobari_sc' )			=> '',
	__( 'Small', 'sobari_sc' )			=> 'small',
	__( 'Default', 'sobari_sc' )		=> 'default',
	__( 'Large', 'sobari_sc' )			=> 'large',
);

$field_option['section_padding'] = array(
	__( 'Default', 'sobari_sc' )		=> '',
	__( 'None', 'sobari_sc' )			=> 'uk-padding-remove-vertical',
	__( 'Extra Small', 'sobari_sc' )	=> 'uk-section-xsmall',
	__( 'Small', 'sobari_sc' )			=> 'uk-section-small',
	__( 'Large', 'sobari_sc' )			=> 'uk-section-large',
	__( 'Extra Large', 'sobari_sc' )	=> 'uk-section-xlarge',
);

$field_option['delay_animation'] = array(
	__( 'None', 'sobari_sc' )				=> '',
	__( 'Default - ms 300', 'sobari_sc' )	=> '300',
	__( 'ms 100', 'sobari_sc' )				=> '100',
	__( 'ms 200', 'sobari_sc' )				=> '200',
	__( 'ms 300', 'sobari_sc' )				=> '300',
	__( 'ms 400', 'sobari_sc' )				=> '400',
	__( 'ms 500', 'sobari_sc' )				=> '500',
	__( 'ms 600', 'sobari_sc' )				=> '600',
	__( 'ms 700', 'sobari_sc' )				=> '700',
	__( 'ms 800', 'sobari_sc' )				=> '800',
	__( 'ms 900', 'sobari_sc' )				=> '900',
	__( 'ms 1000', 'sobari_sc' )			=> '1000',
	__( 'ms 1100', 'sobari_sc' )			=> '1100',
	__( 'ms 1200', 'sobari_sc' )			=> '1200',
	__( 'ms 1300', 'sobari_sc' )			=> '1300',
	__( 'ms 1400', 'sobari_sc' )			=> '1400',
	__( 'ms 1500', 'sobari_sc' )			=> '1500',
	__( 'ms 1600', 'sobari_sc' )			=> '1600',
	__( 'ms 1700', 'sobari_sc' )			=> '1700',
	__( 'ms 1800', 'sobari_sc' )			=> '1800',
	__( 'ms 1900', 'sobari_sc' )			=> '1900',
	__( 'ms 2000', 'sobari_sc' )			=> '2000',
);

$field_option['autoplay_interval'] = array(
	__( 'None', 'sobari_sc' )				=> '',
	__( 'Default - ms 300', 'sobari_sc' )	=> '300',
	__( 'ms 100', 'sobari_sc' )				=> '100',
	__( 'ms 200', 'sobari_sc' )				=> '200',
	__( 'ms 300', 'sobari_sc' )				=> '300',
	__( 'ms 400', 'sobari_sc' )				=> '400',
	__( 'ms 500', 'sobari_sc' )				=> '500',
	__( 'ms 600', 'sobari_sc' )				=> '600',
	__( 'ms 700', 'sobari_sc' )				=> '700',
	__( 'ms 800', 'sobari_sc' )				=> '800',
	__( 'ms 900', 'sobari_sc' )				=> '900',
	__( 'ms 1000', 'sobari_sc' )			=> '1000',
	__( 'ms 1100', 'sobari_sc' )			=> '1100',
	__( 'ms 1200', 'sobari_sc' )			=> '1200',
	__( 'ms 1300', 'sobari_sc' )			=> '1300',
	__( 'ms 1400', 'sobari_sc' )			=> '1400',
	__( 'ms 1500', 'sobari_sc' )			=> '1500',
	__( 'ms 1600', 'sobari_sc' )			=> '1600',
	__( 'ms 1700', 'sobari_sc' )			=> '1700',
	__( 'ms 1800', 'sobari_sc' )			=> '1800',
	__( 'ms 1900', 'sobari_sc' )			=> '1900',
	__( 'ms 2000', 'sobari_sc' )			=> '2000',
);

$field_option['animation'] = array(
	__( 'Fade', 'sobari_sc' )			 	 => 'uk-animation-fade',
	__( 'Scale Up', 'sobari_sc' )			 => 'uk-animation-scale-up',
	__( 'Scale Down', 'sobari_sc' )			 => 'uk-animation-scale-down',
	__( 'Slide Top 100%', 'sobari_sc' )		 => 'uk-animation-slide-top',
	__( 'Slide Bottom 100%', 'sobari_sc' )	 => 'uk-animation-slide-bottom',
	__( 'Slide Left 100%', 'sobari_sc' )	 => 'uk-animation-slide-left',
	__( 'Slide Right 100%', 'sobari_sc' )	 => 'uk-animation-slide-right',
	__( 'Slide Top Small', 'sobari_sc' )	 => 'uk-animation-slide-top-small',
	__( 'Slide Bottom Small', 'sobari_sc' )	 => 'uk-animation-slide-bottom-small',
	__( 'Slide Left Small', 'sobari_sc' )	 => 'uk-animation-slide-left-small',
	__( 'Slide Right Small', 'sobari_sc' )	 => 'uk-animation-slide-right-small',
	__( 'Slide Top Medium', 'sobari_sc' )	 => 'uk-animation-slide-top-medium',
	__( 'Slide Bottom Medium', 'sobari_sc' ) => 'uk-animation-slide-bottom-medium',
	__( 'Slide Left Medium', 'sobari_sc' )	 => 'uk-animation-slide-left-medium',
	__( 'Slide Right Medium', 'sobari_sc' )	 => 'uk-animation-slide-right-medium',
);

$field_option['loop_product_layout'] = array(
	'elaina'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-layout-1-elaina.svg",
	'ellen'		=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-layout-2-ellen.svg",
	'ellinor'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-layout-3-ellinor.svg",
	'ella'		=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-layout-4-ella.svg",
	'esmeralda'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-layout-5-esmeralda.svg",
	'eunika'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_product-layout-6-eunika.svg",
);

$field_option['operator'] = array(
	__( 'IN', 'sobari_sc' )		=> 'IN',
	__( 'AND', 'sobari_sc' )	=> 'AND',
	__( 'NOT IN', 'sobari_sc' )	=> 'NOT IN',
);

$field_option['product_filter'] = array(
	__( 'None', 'sobari_sc' )			=> '',
	__( 'Best Selling', 'sobari_sc' )	=> 'best_selling',
	__( 'On Sale', 'sobari_sc' )		=> 'on_sale',
	__( 'Top Rated', 'sobari_sc' )		=> 'top_rated',
);

$field_option['product_visibility'] = array(
	__( 'Visible', 'sobari_sc' )	=> 'visible',
	__( 'Catalog', 'sobari_sc' )	=> 'catalog',
	__( 'Search', 'sobari_sc' )		=> 'search',
	__( 'Hidden', 'sobari_sc' )		=> 'hidden',
	__( 'Featured', 'sobari_sc' )	=> 'featured',
);
$field_option['media_ratio'] = array(
	__( '1:1', 'sobari_sc' )	=> '1-1',
	__( '1:2', 'sobari_sc' )	=> '1-2',
	__( '2:1', 'sobari_sc' )	=> '2-1',
	__( '2:3', 'sobari_sc' )	=> '2-3',
	__( '3:2', 'sobari_sc' )	=> '3-2',
	__( '3:4', 'sobari_sc' )	=> '3-4',
	__( '4:3', 'sobari_sc' )	=> '4-3',
	__( '4:5', 'sobari_sc' )	=> '4-5',
	__( '5:4', 'sobari_sc' )	=> '5-4',
	__( '5:7', 'sobari_sc' )	=> '5-7',
	__( '7:5', 'sobari_sc' )	=> '7-5',
	__( '9:16', 'sobari_sc' )	=> '9-16',
	__( '16:9', 'sobari_sc' )	=> '16-9',
	__( 'uncrop', 'sobari_sc' )	=> 'uncrop',
);

return $field_option;

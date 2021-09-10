<?php

$columns = array(
	'1' => '1',
	'2' => '2',
	'3' => '3',
	'4' => '4',
	'5' => '5',
	'6' => '6',
);

$param = array(
	'name'			=> __( 'Category Showcase', 'sobari_sc' ),
	'base'			=> 'category_showcase',
	'description'	=> __( 'Show categories in style', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-brand-category-showcase.svg",
	'params'		=> array(),
);
# GENERAL
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'post_type',
	'heading'		=> __( 'Choose Loop Feed', 'sobari_sc' ),
	'description'	=> __( 'Choose post type taxonomy', 'sobari_sc' ),
	'value'			=> array(
		__( 'Post', 'sobari_sc' )		=> 'post',
		__( 'Portfolio', 'sobari_sc' )	=> 'portfolio',
		__( 'Product', 'sobari_sc' )	=> 'product',
	),
);
// $param['params'][] = array(
	// 'type'			=> 'dropdown',
	// 'param_name'	=> 'product_taxonomy',
	// 'heading'		=> __( 'Choose Brand / Categories', 'sobari_sc' ),
	// 'description'	=> __( 'Choose product categories or brands', 'sobari_sc' ),
	// 'value'			=> array(
		// __( 'Brands', 'sobari_sc' )		=> 'brands',
		// __( 'Categories', 'sobari_sc' )	=> 'categories',
	// ),
	// 'dependency'	=> array(
		// 'element'	=> 'post_type',
		// 'value'		=> 'product',
	// ),
// );
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'show_total_number',
	'heading'		=> __( 'Show Total Number of Items', 'sobari_sc' ),
	'description'	=> __( 'Display total items each categories', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'style',
	'heading'		=> __( 'Showcase Style', 'sobari_sc' ),
	'description'	=> __( 'Select showcase style', 'sobari_sc' ),
	'value'			=> array(
		__( 'Grid', 'sobari_sc' )		=> 'grid',
		__( 'Masonry', 'sobari_sc' )	=> 'masonry',
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'grid_column',
	'heading'		=> __( 'Grid Column', 'sobari_sc' ),
	'description'	=> __( 'Select grid column', 'sobari_sc' ),
	'value'			=> $columns,
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> 'grid',
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'ratio',
	'heading'		=> __( 'Media Ratio', 'sobari_sc' ),
	'description'	=> __( 'Specify aspect ratio for media', 'sobari_sc' ),
	'value'			=> dahz_shortcode_helper_get_field_option( 'media_ratio' ),
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> 'grid',
	),
);
$param['params'][] = array(
	'type'			=> 'param_group',
	'param_name'	=> 'post_categories',
	'heading'		=> '',
	'dependency'	=> array(
		'element'	=> 'post_type',
		'value'		=> 'post',
	),
	'params' => array(
		array(
			'type'			=> 'radio_button',
			'param_name'	=> 'post_categories_item',
			'heading'		=> __( 'Post Category Item to Display', 'sobari_sc' ),
			'description'	=> __( 'Display posts in a specified post category', 'sobari_sc' ),
			'value'			=> array(),
		),
		array(
			'type'			=> 'slider',
			'param_name'	=> 'media_width',
			'heading'		=> __( 'Media Width', 'sobari_sc' ),
			'description'	=> __( 'Setting for image width and height will work only if option is set to "masonry"', 'sobari_sc' ),
			'std'			=> '1',
			'settings'		=> array(
				'min'		=> 1,
				'max'		=> 6,
				'step'		=> 1,
			),
		),
		array(
			'type'			=> 'slider',
			'param_name'	=> 'media_height',
			'heading'		=> __( 'Media Height', 'sobari_sc' ),
			'description'	=> __( 'Setting for image width and height will work only if option is set to "masonry"', 'sobari_sc' ),
			'std'			=> '1',
			'settings'		=> array(
				'min'		=> 1,
				'max'		=> 6,
				'step'		=> 1,
			),
		),
	),
);
$param['params'][] = array(
	'type'			=> 'param_group',
	'param_name'	=> 'portfolio_categories',
	'heading'		=> '',
	'dependency'	=> array(
		'element'	=> 'post_type',
		'value'		=> 'portfolio',
	),
	'params' => array(
		array(
			'type'			=> 'radio_button',
			'param_name'	=> 'portfolio_categories_item',
			'heading'		=> __( 'Portfolio Category Item to Display', 'sobari_sc' ),
			'description'	=> __( 'Display portfolios in a specified portfolio category', 'sobari_sc' ),
			'value'			=> array(),//dahz_framework_category_showcase_categories('portfolio')
		),
		array(
			'type'			=> 'slider',
			'param_name'	=> 'media_width',
			'heading'		=> __( 'Media Width', 'sobari_sc' ),
			'description'	=> __( 'Setting for image width and height will work only if option is set to "masonry"', 'sobari_sc' ),
			'std'			=> '1',
			'settings'		=> array(
				'min'		=> 1,
				'max'		=> 6,
				'step'		=> 1
			)
		),
		array(
			'type'			=> 'slider',
			'param_name'	=> 'media_height',
			'heading'		=> __( 'Media Height', 'sobari_sc' ),
			'description'	=> __( 'Setting for image width and height will work only if option is set to "masonry"', 'sobari_sc' ),
			'std'			=> '1',
			'settings'		=> array(
				'min'		=> 1,
				'max'		=> 6,
				'step'		=> 1
			)
		),
	),
);
$param['params'][] = array(
	'type'			=> 'param_group',
	'param_name'	=> 'product_categories',
	'heading'		=> '',
	'dependency'	=> array(
		'element'	=> 'post_type',
		'value'		=> 'product',
	),
	'params' => array(
		array(
			'type'			=> 'radio_button',
			'param_name'	=> 'product_categories_item',
			'heading'		=> __( 'Product Category Item to Display', 'sobari_sc' ),
			'description'	=> __( 'Display products in a specified product category', 'sobari_sc' ),
			'value'			=> array(),//dahz_framework_category_showcase_categories('product_cat')
		),
		array(
			'type'			=> 'slider',
			'param_name'	=> 'media_width',
			'heading'		=> __( 'Media Width', 'sobari_sc' ),
			'description'	=> __( 'Setting for image width and height will work only if option is set to "masonry"', 'sobari_sc' ),
			'std'			=> '1',
			'settings'		=> array(
				'min'		=> 1,
				'max'		=> 6,
				'step'		=> 1
			)
		),
		array(
			'type'			=> 'slider',
			'param_name'	=> 'media_height',
			'heading'		=> __( 'Media Height', 'sobari_sc' ),
			'description'	=> __( 'Setting for image width and height will work only if option is set to "masonry"', 'sobari_sc' ),
			'std'			=> '1',
			'settings'		=> array(
				'min'		=> 1,
				'max'		=> 6,
				'step'		=> 1
			)
		),
	),
);
// $param['params'][] = array(
	// 'type'			=> 'param_group',
	// 'param_name'	=> 'product_brands',
	// 'heading'		=> '',
	// 'dependency'	=> array(
		// 'element'	=> 'product_taxonomy',
		// 'value'		=> 'brands',
	// ),
	// 'params' => array(
		// array(
			// 'type'			=> 'radio_button',
			// 'param_name'	=> 'product_brands_item',
			// 'heading'		=> __( 'Product Brand Item to Display', 'sobari_sc' ),
			// 'description'	=> __( 'Display products in a specified product brand', 'sobari_sc' ),
			// 'value'			=> array(),//dahz_framework_category_showcase_categories('product_brand')
		// ),
		// array(
			// 'type'			=> 'slider',
			// 'param_name'	=> 'media_width',
			// 'heading'		=> __( 'Media Width', 'sobari_sc' ),
			// 'description'	=> __( 'Setting for image width and height will work only if option is set to "masonry"', 'sobari_sc' ),
			// 'std'			=> '1',
			// 'settings'		=> array(
				// 'min'		=> 1,
				// 'max'		=> 6,
				// 'step'		=> 1
			// )
		// ),
		// array(
			// 'type'			=> 'slider',
			// 'param_name'	=> 'media_height',
			// 'heading'		=> __( 'Media Height', 'sobari_sc' ),
			// 'description'	=> __( 'Setting for image width and height will work only if option is set to "masonry"', 'sobari_sc' ),
			// 'std'			=> '1',
			// 'settings'		=> array(
				// 'min'		=> 1,
				// 'max'		=> 6,
				// 'step'		=> 1
			// )
		// ),
	// ),
// );
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'item_spacing_grid',
	'heading'		=> __( 'Spacing', 'sobari_sc' ),
	'description'	=> __( 'Set spacing between items', 'sobari_sc' ),
	'value'			=> dahz_shortcode_helper_get_field_option( 'grid_gutter' ),
);
# STYLING
$param['params'][] = array(
	'type'			=> 'radio_image',
	'param_name'	=> 'product_tax_style',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'heading'		=> __( 'Showcase Style', 'sobari_sc' ),
	'description'	=> __( 'Select style for showcase', 'sobari_sc' ),
	'std'			=> 'layout-1',
	'value'			=> array(
		'layout-1'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_brandcat-showcase-style-1.svg",
		'layout-2'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_brandcat-showcase-style-2.svg",
		'layout-3'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_brandcat-showcase-style-3.svg",
		'layout-4'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_brandcat-showcase-style-4.svg",
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'hover_effect',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'heading'		=> __( 'Hover Effect', 'sobari_sc' ),
	'description'	=> __( 'Select hover effect', 'sobari_sc' ),
	'value'			=> array(
		__( 'Zoom', 'sobari_sc' )					=> 'zoom',
		__( 'Zoom Glare', 'sobari_sc' )				=> 'zoom-glare',
		__( 'Push', 'sobari_sc' )					=> 'push',
		__( 'Push Glare', 'sobari_sc' )				=> 'push-glare',
		__( 'Parallax Tilt', 'sobari_sc' )			=> 'parallax-tilt',
		__( 'Parallax Tilt Glare', 'sobari_sc' )	=> 'parallax-tilt-glare',
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'box_shadow',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'heading'		=> __( 'Box Shadow', 'sobari_sc' ),
	'description'	=> __( 'Select box shadow style', 'sobari_sc' ),
	'value'			=> array(
		__( 'None', 'sobari_sc' )		=> '',
		__( 'Small', 'sobari_sc' )		=> 'uk-box-shadow-small',
		__( 'Medium', 'sobari_sc' )		=> 'uk-box-shadow-medium',
		__( 'Large', 'sobari_sc' )		=> 'uk-box-shadow-large',
		__( 'X-Large', 'sobari_sc' )	=> 'uk-box-shadow-xlarge',
	),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'is_extra_boxshadow',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'heading'		=> __( 'Add Extra Bottom Shadow', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'hover_box_shadow',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'heading'		=> __( 'Hover Box Shadow', 'sobari_sc' ),
	'description'	=> __( 'Select box shadow hover style', 'sobari_sc' ),
	'value'			=> array(
		__( 'None', 'sobari_sc' )		=> '',
		__( 'Small', 'sobari_sc' )		=> 'uk-box-shadow-hover-small',
		__( 'Medium', 'sobari_sc' )		=> 'uk-box-shadow-hover-medium',
		__( 'Large', 'sobari_sc' )		=> 'uk-box-shadow-hover-large',
		__( 'X-Large', 'sobari_sc' )	=> 'uk-box-shadow-hover-xlarge',
	),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'show_total_number_when_hover',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'heading'		=> __( 'Show Total Number of Item When Hover', 'sobari_sc' ),
	'description'	=> __( 'Total number of item will be shown when hovering', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'always_show_on_mobile',
	'heading'		=> __( 'Always Show on Mobile', 'sobari_sc' ),
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'description'	=> __( 'Total number of item will be shown when mobile', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'show_total_number_when_hover',
		'not_empty'	=> true,
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'param_name'	=> 'text_color',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'heading'		=> __( 'Text Color', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'param_name'	=> 'color_overlay',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'heading'		=> __( 'Color Overlay', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'param_name'	=> 'hover_text_color',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'heading'		=> __( 'Hover Text Color', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'param_name'	=> 'hover_border_color',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'heading'		=> __( 'Hover Border Color', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'param_name'	=> 'hover_color_overlay',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'heading'		=> __( 'Hover Color Overlay', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'param_name'	=> 'enable_gradient',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'heading'		=> __( 'Enable Gradient', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'param_name'	=> 'hover_color_overlay_2',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'heading'		=> __( 'Hover Color Overlay', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'enable_gradient',
		'not_empty'	=> true,
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'gradient_direction',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'heading'		=> __( 'Gradient Direction', 'sobari_sc' ),
	'value'			=> dahz_shortcode_helper_get_field_option( 'gradient_direction' ),
	'dependency'	=> array(
		'element'	=> 'enable_gradient',
		'not_empty'	=> true,
	),
);
# SETTING
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'phone_potrait_column_grid',
	'heading'		=> __( 'Phone Potrait Column', 'sobari_sc' ),
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
	'value'			=> $columns,
	'save_always'	=> true,
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> 'grid',
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'phone_landscape_column_grid',
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'heading'		=> __( 'Phone Landscape Column', 'sobari_sc' ),
	'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
	'value'			=> $columns,
	'save_always'	=> true,
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> 'grid',
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'tablet_landscape_column_grid',
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'heading'		=> __( 'Tablet Landscape Column', 'sobari_sc' ),
	'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
	'value'			=> $columns,
	'save_always'	=> true,
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> 'grid',
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'phone_potrait_column_masonry',
	'heading'		=> __( 'Phone Potrait Column', 'sobari_sc' ),
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
	'value'			=> array(
		'1' => '1',
		'2' => '2',
	),
	'save_always'	=> true,
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> 'masonry',
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'phone_landscape_column_masonry',
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'heading'		=> __( 'Phone Landscape Column', 'sobari_sc' ),
	'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
	'value'			=> array(
		'1' => '1',
		'2' => '2',
	),
	'save_always'	=> true,
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> 'masonry',
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'tablet_landscape_column_masonry',
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'heading'		=> __( 'Tablet Landscape Column', 'sobari_sc' ),
	'description'	=> __( 'Set the number column for each breakpoint', 'sobari_sc' ),
	'value'			=> array(
		'1' => '1',
		'2' => '2',
	),
	'save_always'	=> true,
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> 'masonry',
	),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'param_name'	=> 'media_ratio',
	'group'			=> __( 'Settings', 'sobari_sc' ),
	'heading'		=> __( 'Media Ratio', 'sobari_sc' ),
	'description'	=> __( 'Set the media ratio', 'sobari_sc' ),
	'value'			=> dahz_shortcode_helper_get_field_option( 'media_ratio' ),
	'save_always'	=> true,
	'dependency'	=> array(
		'element'	=> 'style',
		'value'		=> 'masonry',
	),
);

return $param;
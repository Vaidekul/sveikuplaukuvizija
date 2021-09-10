<?php

$param = array(
	'name'				=> esc_attr__( 'Post Tabs', 'sobari_sc' ),
	'base'				=> 'post_tabs',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Display post with filter in styles', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-post-portfolio-tab.svg",
	'params'			=> array(),
	'dahz_animated_on'	=> true
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Enable Masonry?', 'sobari_sc' ),
	'param_name'	=> 'enable_masonry',
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Enable Parallax?', 'sobari_sc' ),
	'param_name'	=> 'enable_parallax',
);

$param['params'][] = array(
	'type'			=> 'slider',
	'param_name'	=> 'parallax_speed',
	'heading'		=> __( 'Parallax Speed', 'sobari_sc' ),
	'description'	=> __( 'Setting for parallax speed', 'sobari_sc' ),
	'std'			=> '0',
	'settings'		=> array(
		'min'		=> 0,
		'max'		=> 600,
		'step'		=> 10,
	),
	'dependency'	=> array(
		'element'	=> 'enable_parallax',
		'not_empty'	=> true,
	),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Filter Post by', 'sobari_sc' ),
	'param_name'	=> 'filter_post_by',
	'std'			=> 'recent_post',
	'value'			=> array(
		__( 'Recent Post', 'sobari_sc' ) 	=> 'recent_post',
		__( 'Category', 'sobari_sc' ) 		=> 'categories',
		__( 'Post ID', 'sobari_sc' ) 		=> 'post_ids'
	),
    'description'	=> esc_attr__( 'Select post filter (Category, Recent Post or Post ID)', 'sobari_sc' ),
);

$param['params'][] = array(
	'type' 			=> 'autocomplete',
	'heading' 		=> esc_attr__( 'Select Post Categories', 'sobari_sc' ),
	'param_name' 	=> 'post_cat_ids',
	'settings' 		=> array(
		'multiple' 		=> 'true',
		'sortable' 		=> 'true',
		'unique_values' => 'true',
		'min_length' 	=> 1,
		'query_value'	=> 'category',
		'query_type'	=> 'taxonomy'
		// In UI show results except selected. NB! You should manually check values in backend
	),
	'save_always' => 'true',
	'description' => esc_attr__( 'Enter List of Post Categories', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'filter_post_by',
		'value'		=> 'categories',
	),
);

$param['params'][] = array(
	'type' 			=> 'autocomplete',
	'heading' 		=> esc_attr__( 'Select Posts', 'sobari_sc' ),
	'param_name' 	=> 'post_ids',
	'settings' 		=> array(
		'multiple' 		=> 'true',
		'sortable' 		=> 'true',
		'unique_values' => 'true',
		'min_length' 	=> 1,
		'query_value'	=> 'post',
		'query_type'	=> 'post'
		// In UI show results except selected. NB! You should manually check values in backend
	),
	'save_always' => 'true',
	'description' => __( 'Enter List of Post', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'filter_post_by',
		'value'		=> 'post_ids',
	),
);

$param['params'][] = array(
    'type'			=> 'dropdown',
    'heading'		=> esc_attr__( 'Order By', 'sobari_sc' ),
    'param_name'	=> 'order_by',
    'value'			=> array(
        __( 'None', 'sobari_sc' ) 	        => 'none',
        __( 'Date', 'sobari_sc' ) 	        => 'date',
        __( 'Id', 'sobari_sc' ) 	        => 'id',
        __( 'Author', 'sobari_sc' )	        => 'author',
        __( 'Title', 'sobari_sc' ) 		    => 'title',
        __( 'Modified', 'sobari_sc' ) 		=> 'modified',
        __( 'Random', 'sobari_sc' ) 		=> 'random',
        __( 'Comment Count', 'sobari_sc' )  => 'comment_count',
        __( 'Menu Order', 'sobari_sc' ) 	=> 'menu_order',
    ),
    'description'	=> esc_attr__( 'Sort retrieved posts by parameter. Defaults to Date', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'filter_post_by',
		'value'		=> array( 'post_ids', 'categories' ),
	),
);

$param['params'][] = array(
    'type'			=> 'dropdown',
    'heading'		=> esc_attr__( 'Sort By', 'sobari_sc' ),
    'param_name'	=> 'sort_by',
    'value'			=> array(
        'Ascending'		=> 'asc',
        'Descending'	=> 'desc',
    ),
	'dependency'	=> array(
		'element'	=> 'filter_post_by',
		'value'		=> array( 'post_ids', 'categories' ),
	),
    'description'	=> esc_attr__( 'Designates the ascending or descending order of the "order by" parameter. Default to "Descending"', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'textfield',
    'heading'		=> esc_attr__( 'Number of Posts', 'sobari_sc' ),
    'param_name'	=> 'number_of_posts',
	'std'			=> 8,
    'description'	=> esc_attr__( 'How many posts would you like to display? Enter as number example "4"', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'dropdown',
    'heading'		=> esc_attr__( 'Category Filter Alignment', 'sobari_sc' ),
    'param_name'	=> 'category_filter_alignment',
    'value'			=> array(
        __( 'Left', 'sobari_sc' ) => 'uk-flex-left',
        __( 'Center', 'sobari_sc' ) => 'uk-flex-center',
        __( 'Right', 'sobari_sc' ) => 'uk-flex-right',
    ),
    'description'	=> esc_attr__( 'Select filter alignment', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Active Color', 'sobari_sc' ),
	'param_name'	=> 'active_color',
    'edit_field_class'	=> 'vc_col-sm-6',
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Inactive Color', 'sobari_sc' ),
	'param_name'	=> 'inactive_color',
    'edit_field_class'	=> 'vc_col-sm-6',
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Active Border Color', 'sobari_sc' ),
	'param_name'	=> 'active_border_color',
);

$param['params'][] = array(
    'type'			=> 'dropdown',
    'heading'		=> esc_attr__( 'Columns', 'sobari_sc' ),
    'param_name'	=> 'columns',
    'std'			=> '1-2',
    'value'			=> array(
        __( '1 Column', 'sobari_sc' )	    => '1-1',
        __( '2 Columns', 'sobari_sc' )	    => '1-2',
        __( '3 Columns', 'sobari_sc' )	    => '1-3',
        __( '4 Columns', 'sobari_sc' )	    => '1-4',
        __( '5 Columns', 'sobari_sc' )	    => '1-5',
        __( '6 Columns', 'sobari_sc' )	    => '1-6',
        __( '5/6 Columns', 'sobari_sc' )	=> '5-6',
        __( '4/5 Columns', 'sobari_sc' )	=> '4-5',
        __( '3/5 Columns', 'sobari_sc' )	=> '3-5',
    ),
    'description'	=> esc_attr__( 'Please select the number of column you would like to display', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Column Gap (Gutter)', 'sobari_sc' ),
	'param_name'	=> 'column_gap',
	'std'			=> '',
	'value'			=> array(
		__( 'Default', 'sobari_sc' )               => '',
		__( 'Small', 'sobari_sc' )                 => 'uk-grid-small',
		__( 'Medium', 'sobari_sc' )                => 'uk-grid-medium',
		__( 'Large', 'sobari_sc' )                 => 'uk-grid-large',
		__( 'Collapse (No Gutter)', 'sobari_sc' )  => 'uk-grid-collapse',
	),
    'description'	=> esc_attr__( 'Select gap between product column', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'textfield',
    'heading'		=> esc_attr__( 'Post Offset', 'sobari_sc' ),
    'param_name'	=> 'post_offset',
    'description'	=> esc_attr__( 'Optionally enter a number e.g "2" to offset your posts by - useful for when you;re using multiple styles of this element on the same page and would like tem to no show duplicate posts', 'sobari_sc' ),
);

$param['params'][] = array(
	'type' 			=> 'radio_image',
	'heading' 		=> esc_attr__( 'Post Tabs Style', 'sobari_sc' ),
	'param_name' 	=> 'post_slider_style',
	'description' 	=> esc_attr__( 'Pick 1 style for testimonials', 'sobari_sc' ),
	'std'			=> 'layout-1',
	'value'			=> array(
		'layout-1'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_post-slider-tab-style-1.svg",
		'layout-2'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_post-slider-tab-style-2.svg",
		'layout-3'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_post-slider-tab-style-3.svg"
	),
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);


$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Title Element Tag', 'sobari_sc' ),
	'param_name'	=> 'title_element_tag',
	'std'			=> 'h3',
	'value'			=> array(
		__( 'H1', 'sobari_sc' ) => 'h1',
		__( 'H2', 'sobari_sc' ) => 'h2',
		__( 'H3', 'sobari_sc' ) => 'h3',
		__( 'H4', 'sobari_sc' ) => 'h4',
		__( 'H5', 'sobari_sc' ) => 'h5',
		__( 'H6', 'sobari_sc' ) => 'h6'
	),
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
    'description'	=> esc_attr__( 'Select element tag', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Title Color', 'sobari_sc' ),
	'param_name'	=> 'title_color',
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Uppercase Meta?', 'sobari_sc' ),
	'param_name'	=> 'is_meta_uppercase',
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Hide Category?', 'sobari_sc' ),
	'param_name'	=> 'is_hide_category',
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Hide Readmore Button?', 'sobari_sc' ),
	'param_name'	=> 'is_hide_button_readmore',
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Hide Post Meta : Author?', 'sobari_sc' ),
	'param_name'	=> 'is_hide_author',
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Hide Post Meta : Date?', 'sobari_sc' ),
	'param_name'	=> 'is_hide_date',
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Post Meta Color', 'sobari_sc' ),
	'param_name'	=> 'post_meta_color',
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Overlay Color', 'sobari_sc' ),
	'param_name'	=> 'overlay_color',
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'post_slider_style',
		'value'		=> array( 'layout-3' )
	),
);

$param['params'][] = array(
    'type'			=> 'checkbox',
    'heading'		=> esc_attr__( 'Hide Excerpt?', 'sobari_sc' ),
    'param_name'	=> 'is_hide_excerpt',
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'textfield',
    'heading'		=> esc_attr__( 'Excerpt Length', 'sobari_sc' ),
    'param_name'	=> 'excerpt_length',
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
    'description'   => esc_attr__(  'Maximum excerpt to show Value limited from 5-50' )
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Excerpt Color', 'sobari_sc' ),
	'param_name'	=> 'excerpt_color',
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Post Alignment', 'sobari_sc' ),
	'param_name'	=> 'post_alignment',
	'value'			=> array(
		__( 'Left', 'sobari_sc' )     => 'left',
		__( 'Center', 'sobari_sc' )   => 'center',
		__( 'Right', 'sobari_sc' )    => 'right',
	),
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'checkbox',
    'heading'		=> esc_attr__( 'Disable Feature Image?', 'sobari_sc' ),
    'param_name'	=> 'is_disable_feature_image',
    'value'			=> array( __( 'Yes', 'sobari_sc' ) => 'yes' ),
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Media Ratio', 'sobari_sc' ),
	'param_name'	=> 'media_ratio',
	'std'			=> '1-1',
	'value'			=> array(
		__( '1:1', 'sobari_sc' )    => '1-1',
		__( '2:1', 'sobari_sc' )    => '2-1',
		__( '3:2', 'sobari_sc' )    => '3-2',
		__( '4:3', 'sobari_sc' )    => '4-3',
		__( '5:7', 'sobari_sc' )    => '5-7',
		__( '16:9', 'sobari_sc' )   => '16-9',
		__( '1:2', 'sobari_sc' )    => '1-2',
		__( '2:3', 'sobari_sc' )    => '2-3',
		__( '3:4', 'sobari_sc' )    => '3-4',
		__( '4:5', 'sobari_sc' )    => '4-5',
		__( '5:4', 'sobari_sc' )    => '5-4',
		__( '7:5', 'sobari_sc' )    => '7-5',
		__( '9:16', 'sobari_sc' )   => '9-16',
	),
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'dropdown',
    'heading'		=> esc_attr__( 'Media Hover Style', 'sobari_sc' ),
    'param_name'	=> 'media_hover_style',
    'std'			=> 'zoom',
    'value'			=> array(
        __( 'Zoom', 'sobari_sc' )					=> 'zoom',
        __( 'Zoom Glare', 'sobari_sc' )				=> 'zoom-glare',
        __( 'Push', 'sobari_sc' )					=> 'push',
        __( 'Push Glare', 'sobari_sc' )				=> 'push-glare',
    ),
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Background Color', 'sobari_sc' ),
	'param_name'	=> 'bg_color',
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'box_shadow',
	'std'			=> '',
	'value'			=> array(
		__( 'None', 'sobari_sc' ) => '',
		__( 'Small', 'sobari_sc' ) => 'uk-box-shadow-small',
		__( 'Medium', 'sobari_sc' ) => 'uk-box-shadow-medium',
		__( 'Large', 'sobari_sc' ) => 'uk-box-shadow-large',
		__( 'X-Large', 'sobari_sc' ) => 'uk-box-shadow-xlarge',
	),
	'description'	=> esc_attr__( 'Select post tabs box shadow style', 'sobari_sc' ),
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Hover Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'hover_box_shadow',
	'value'			=> array(
		__( 'None', 'sobari_sc' ) => '',
		__( 'Small', 'sobari_sc' ) => 'uk-box-shadow-hover-small',
		__( 'Medium', 'sobari_sc' ) => 'uk-box-shadow-hover-medium',
		__( 'Large', 'sobari_sc' ) => 'uk-box-shadow-hover-large',
		__( 'X-Large', 'sobari_sc' ) => 'uk-box-shadow-hover-xlarge',
	),
	'description'	=> esc_attr__( 'Select post tabs hover hover box shadow style', 'sobari_sc' ),
    'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
);

dahz_shortcode_add_package( $param, dahz_shortcode_get_group_button( 'button', __( 'Styling', 'sobari_sc' ) ) );

// $param['params'][] = array(
// 	'type'			=> 'dropdown',
// 	'heading'		=> __( 'Height', 'sobari_sc' ),
// 	'param_name'	=> 'height',
// 	'value'			=> array(
// 		__( 'Auto', 'sobari_sc' )	=> 'auto',
// 		__( 'Viewport', 'sobari_sc' )	=> 'viewport',
// 		__( 'Viewport (Minus 20%)', 'sobari_sc' )	=> 'viewport-minus-percent',
// 		__( 'Viewport (Minus the following section)', 'sobari_sc' )	=> 'viewport-minus-section'
// 	),
// 	'dependency'	=> array(
// 		'element'	=> 'post_slider_style',
// 		'value'		=> array( 'layout-2', 'layout-3' )
// 	),
// 	'description'	=> esc_attr__( 'The height will adapt automatically based on its content. Alternatively, the height can adapt to the height of the viewport. Note: make sure no height is set in the section / row settings when using one of the option', 'sobari_sc' ),
// 	'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
//
// );
// $param['params'][] = array(
// 	'type'			=> 'slider',
// 	'heading'		=> esc_attr__( 'Min Height', 'sobari_sc' ),
// 	'param_name'	=> 'min_height',
// 	'settings'		=> array(
// 		'min'		=> 200,
// 		'max'		=> 800,
// 		'step'		=> 50
// 	),
// 	'dependency'	=> array(
// 		'element'	=> 'height',
// 		'value'		=> array( 'viewport', 'viewport-minus-percent', 'viewport-minus-section' )
// 	),
// 	'group' 	    => esc_attr__( 'Styling', 'sobari_sc' ),
// 	'description'	=> esc_attr__( 'Set the minimum height. This is useful if the content is too large on small devices', 'sobari_sc' )
// );

$param['params'][] = array(
    'type'			=> 'dropdown',
    'heading'		=> esc_attr__( 'Phone Potrait Column', 'sobari_sc' ),
    'param_name'	=> 'phone_potrait_columns',
    'std'			=> '1-1',
    'value'			=> array(
        __( '1 Column', 'sobari_sc' )	    => '1-1',
        __( '2 Columns', 'sobari_sc' )	    => '1-2',
        __( '3 Columns', 'sobari_sc' )	    => '1-3',
        __( '4 Columns', 'sobari_sc' )	    => '1-4',
        __( '5 Columns', 'sobari_sc' )	    => '1-5',
        __( '6 Columns', 'sobari_sc' )	    => '1-6',
        __( '5/6 Columns', 'sobari_sc' )	=> '5-6',
        __( '4/5 Columns', 'sobari_sc' )	=> '4-5',
        __( '3/5 Columns', 'sobari_sc' )	=> '3-5',
    ),
    'group'         => esc_attr__( 'Setting', 'sobari_sc' ),
    'description'	=> esc_attr__( 'Set the number column for each breakpoint', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'dropdown',
    'heading'		=> esc_attr__( 'Phone Landscape Column', 'sobari_sc' ),
    'param_name'	=> 'phone_landscape_columns',
    'std'			=> '1-1',
    'value'			=> array(
        __( '1 Column', 'sobari_sc' )	    => '1-1',
        __( '2 Columns', 'sobari_sc' )	    => '1-2',
        __( '3 Columns', 'sobari_sc' )	    => '1-3',
        __( '4 Columns', 'sobari_sc' )	    => '1-4',
        __( '5 Columns', 'sobari_sc' )	    => '1-5',
        __( '6 Columns', 'sobari_sc' )	    => '1-6',
        __( '5/6 Columns', 'sobari_sc' )	=> '5-6',
        __( '4/5 Columns', 'sobari_sc' )	=> '4-5',
        __( '3/5 Columns', 'sobari_sc' )	=> '3-5',
    ),
    'group'         => esc_attr__( 'Setting', 'sobari_sc' ),
    'description'	=> esc_attr__( 'Set the number column for each breakpoint', 'sobari_sc' ),
);

$param['params'][] = array(
    'type'			=> 'dropdown',
    'heading'		=> esc_attr__( 'Tablet Landscape Column', 'sobari_sc' ),
    'param_name'	=> 'tablet_landscape_columns',
    'std'			=> '1-1',
    'value'			=> array(
        __( '1 Column', 'sobari_sc' )	    => '1-1',
        __( '2 Columns', 'sobari_sc' )	    => '1-2',
        __( '3 Columns', 'sobari_sc' )	    => '1-3',
        __( '4 Columns', 'sobari_sc' )	    => '1-4',
        __( '5 Columns', 'sobari_sc' )	    => '1-5',
        __( '6 Columns', 'sobari_sc' )	    => '1-6',
        __( '5/6 Columns', 'sobari_sc' )	=> '5-6',
        __( '4/5 Columns', 'sobari_sc' )	=> '4-5',
        __( '3/5 Columns', 'sobari_sc' )	=> '3-5',
    ),
    'group'         => esc_attr__( 'Setting', 'sobari_sc' ),
    'description'	=> esc_attr__( 'Set the number column for each breakpoint', 'sobari_sc' ),
);

return $param;

<?php
/**
*
*/
$param = array(
	'name'				=> esc_attr__( 'Product Menu', 'sobari_sc' ),
	'base'				=> 'product_menu',
	'category'	=> array( 'WooCommerce', 'Content' ),
	'description'		=> esc_attr__( 'Create restaurant menu', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-product-menu.svg",
	'params'			=> array()
);
$param['params'][] = array(
	'type'			=> 'radio_image',
	'heading'		=> esc_attr__( 'Product Menu Type', 'sobari_sc' ),
	'param_name'	=> 'product_menu_type',
	'description'	=> esc_attr__( 'Product menu type.', 'sobari_sc' ),
	'std'			=> 'custom',
	'value'			=> array(
		'custom'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_menu-custom.svg",
		'product'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_menu-product.svg"
	)
);
$param['params'][] = array(
	'type'			=> 'autocomplete',
	'heading'		=> esc_attr__( 'Select Product', 'sobari_sc' ),
	'param_name'	=> 'product_ids',
	'settings'		=> array(
		'multiple'		=> false,
		'sortable'		=> false,
		'unique_values' => true,
		'min_length'	=> 1,
		'query_value'	=> 'product',
		'query_type'	=> 'product'
		// In UI show results except selected. NB! You should manually check values in backend
	),
	'dependency'	=> array(
		'element'	=> 'product_menu_type',
		'value'		=> 'product'
	),
	'save_always'	=> true,
	'description'	=> esc_attr__( 'Enter List of Products', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Use Custom Item Picture', 'sobari_sc' ),
	'param_name'	=> 'use_custom_product_item_picture',
	'dependency'	=> array(
		'element'	=> 'product_menu_type',
		'value'		=> 'product'
	)
);
$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> esc_attr__( 'Item Picture', 'sobari_sc' ),
	'param_name'	=> 'product_item_picture',
	'dependency'	=> array(
		'element'	=> 'use_custom_product_item_picture',
		'not_empty'	=> true
	)
);
$param['params'][] = array(
	'type'			=> 'attach_image',
	'heading'		=> esc_attr__( 'Item Picture', 'sobari_sc' ),
	'param_name'	=> 'custom_item_picture',
	'dependency'	=> array(
		'element'	=> 'product_menu_type',
		'value'		=> 'custom'
	)
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Width', 'sobari_sc' ),
	'param_name'	=> 'item_picture_width',
	'description'	=> __( 'Set the width and height in pixels (e.g. 600)', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Height', 'sobari_sc' ),
	'param_name'	=> 'item_picture_height',
	'description'	=> __( 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param['params'][] =  array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Image Style', 'sobari_sc' ),
	'param_name'	=> 'item_picture_style',
	'std'			=> '',
	'value'			=> array(
		__( 'None', 'upsob_sc' ) 		=> '',
		__( 'Circle', 'upsob_sc' ) 		=> 'uk-border-circle',
		__( 'Rounded', 'upsob_sc' ) 	=> 'uk-border-rounded',
	),
	'description'	=> __( 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically', 'sobari_sc' ),
	'edit_field_class'	=> 'vc_col-sm-6'
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Name', 'sobari_sc' ),
	'param_name'	=> 'custom_name',
	'std'			=> 'Item Name',
	'description'	=> __( 'Input custom name.', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'product_menu_type',
		'value'		=> 'custom'
	)
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Price', 'sobari_sc' ),
	'param_name'	=> 'custom_price',
	'std'			=> '$20',
	'description'	=> __( 'Input custom price.', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'product_menu_type',
		'value'		=> 'custom'
	)
);
$param['params'][] =  array(
	'type'			=> 'textarea',
	'heading'		=> __( 'Short Description', 'sobari_sc' ),
	'param_name'	=> 'short_description',
	'std'			=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
	'description'	=> __( 'Input short description.', 'sobari_sc' ),
);
$param['params'][] =  array(
	'type'			=> 'textfield',
	'heading'		=> __( 'Excerpt Length', 'sobari_sc' ),
	'param_name'	=> 'excerpt_length',
	'std'			=> 20,
	'description'	=> __( 'Input excerpt length .', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'product_menu_type',
		'value'		=> 'product'
	)
);
$param['params'][] =  array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Item Name Heading Tag', 'sobari_sc' ),
	'param_name'	=> 'heading_tag',
	'description'	=> __( 'Please select the desired heading tag for your item name .', 'sobari_sc' ),
	'std'			=> 'h6',
	'value'			=> array(
		__( 'H2', 'upsob_sc' )	=> 'h2',
		__( 'H3', 'upsob_sc' )	=> 'h3',
		__( 'H4', 'upsob_sc' )	=> 'h4',
		__( 'H5', 'upsob_sc' )	=> 'h5',
		__( 'H6', 'upsob_sc' )	=> 'h6',
		__( 'p', 'upsob_sc' )	=> 'p',
	)
);
$param['params'][] =  array(
	'type'			=> 'vc_link',
	'heading'		=> __( 'Item Link URL', 'sobari_sc' ),
	'param_name'	=> 'custom_link',
	'description'	=> __( 'Please enter the URL for your item.', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'product_menu_type',
		'value'		=> 'custom'
	)
);
$param['params'][] =  array(
	'type'			=> 'checkbox',
	'heading'		=> __( 'Disable Item Link', 'sobari_sc' ),
	'param_name'	=> 'disable_link',
	'description'	=> __( 'If yes, product link will not linked to single product.', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'product_menu_type',
		'value'		=> 'product'
	)
);
$param['params'][] = array(
	'type'			=> 'radio_image',
	'heading'		=> esc_attr__( 'Product Menu Style', 'sobari_sc' ),
	'param_name'	=> 'product_menu_style',
	'description'	=> esc_attr__( 'Product menu Style.', 'sobari_sc' ),
	'group'			=> __( 'Styling', 'upsob_sc' ),
	'std'			=> 'style-1',
	'value'			=> array(
		'style-1'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_menu-style-1.svg",
		'style-2'	=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/shortcode/df_menu-style-2.svg"
	)
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Custom Color', 'upsob_sc' ),
	'param_name'	=> 'custom_color',
	'group'			=> __( 'Styling', 'upsob_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Heading Color', 'upsob_sc' ),
	'param_name'	=> 'heading_color',
	'group'			=> __( 'Styling', 'upsob_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Heading Hover Color', 'upsob_sc' ),
	'param_name'	=> 'heading_hover_color',
	'group'			=> __( 'Styling', 'upsob_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Description Color', 'upsob_sc' ),
	'param_name'	=> 'description_color',
	'group'			=> __( 'Styling', 'upsob_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Price Color', 'upsob_sc' ),
	'param_name'	=> 'price_color',
	'group'			=> __( 'Styling', 'upsob_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Border Color', 'upsob_sc' ),
	'param_name'	=> 'border_color',
	'group'			=> __( 'Styling', 'sobari_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_color',
		'not_empty'	=> true
	),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Border Style', 'sobari_sc' ),
	'param_name'	=> 'border_style',
	'std'			=> 'none',
	'value'			=> array(
		__( 'None', 'sobari_sc' )	=> 'none',
		__( 'Solid', 'sobari_sc' )	=> 'solid',
		__( 'Double', 'sobari_sc' )	=> 'double',
		__( 'Dotted', 'sobari_sc' )	=> 'dotted',
		__( 'Dashed', 'sobari_sc' )	=> 'dashed',
	),
	'group'			=> __( 'Styling', 'upsob_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Border Width', 'sobari_sc' ),
	'param_name'	=> 'border_width',
	'std'			=> '1px',
	'value'			=> array(
		__( '1px', 'sobari_sc' )	=> '1px',
		__( '2px', 'sobari_sc' )	=> '2px',
		__( '3px', 'sobari_sc' )	=> '3px',
		__( '4px', 'sobari_sc' )	=> '4px',
		__( '5px', 'sobari_sc' )	=> '5px',
	),
	'group'			=> __( 'Styling', 'upsob_sc' ),
);

$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Image Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'image_box_shadow',
	'std'			=> '',
	'value'			=> array(
		__( 'None', 'sobari_sc' )	=> '',
		__( 'Small', 'sobari_sc' )	=> 'uk-box-shadow-small',
		__( 'Medium', 'sobari_sc' )	=> 'uk-box-shadow-medium',
		__( 'Large', 'sobari_sc' )	=> 'uk-box-shadow-large',
		__( 'X-large', 'sobari_sc' )=> 'uk-box-shadow-xlarge',
	),
	'group'			=> __( 'Styling', 'upsob_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> __( 'Image Hover Box Shadow', 'sobari_sc' ),
	'param_name'	=> 'image_hover_box_shadow',
	'std'			=> '',
	'value'			=> array(
		__( 'None', 'sobari_sc' )	=> '',
		__( 'Small', 'sobari_sc' )	=> 'uk-box-shadow-hover-small',
		__( 'Medium', 'sobari_sc' )	=> 'uk-box-shadow-hover-medium',
		__( 'Large', 'sobari_sc' )	=> 'uk-box-shadow-hover-large',
		__( 'X-large', 'sobari_sc' )=> 'uk-box-shadow-hover-xlarge',
	),
	'group'			=> __( 'Styling', 'upsob_sc' ),
);
$param['params'][] = array(
	'type'			=> 'checkbox',
	'heading'		=> esc_attr__( 'Custom Badge', 'upsob_sc' ),
	'param_name'	=> 'custom_badge',
	'group'			=> __( 'Styling', 'upsob_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Text Badge', 'upsob_sc' ),
	'param_name'	=> 'badge_text',
	'group'			=> __( 'Styling', 'upsob_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_badge',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Text Color', 'upsob_sc' ),
	'param_name'	=> 'badge_text_color',
	'group'			=> __( 'Styling', 'upsob_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_badge',
		'not_empty'	=> true
	),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Border Color', 'upsob_sc' ),
	'param_name'	=> 'badge_border_color',
	'group'			=> __( 'Styling', 'upsob_sc' ),
	'dependency'	=> array(
		'element'	=> 'custom_badge',
		'not_empty'	=> true
	),
);

return $param;

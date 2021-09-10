<?php
/**
*
*/
class Dahz_Framework_Shortcode_VC_Mapper {

	public $mapped_shortcodes = array(
		'vc_row' => array (
			'full_width',
			'gap',
			'full_height',
			'columns_placement',
			'equal_height',
			'content_placement',
			'video_bg',
			'video_bg_url',
			'video_bg_parallax',
			'parallax',
			'parallax_image',
			'parallax_speed_video',
			'parallax_speed_bg',
			'css_animation',
			'el_id',
			'disable_element',
			'el_class',
			'css'
		),
		'vc_row_inner' => array (
			'el_id',
			'equal_height',
			'content_placement',
			'gap',
			'disable_element',
			'el_class',
			'css'
		),
		'vc_column' => array (
			'video_bg',
			'video_bg_url',
			'video_bg_parallax',
			'parallax',
			'parallax_image',
			'parallax_speed_video',
			'parallax_speed_bg',
			'css_animation',
			'el_id',
			'el_class',
			'css',
			'width',
			'offset',
		),
		'vc_column_inner' => array (
			'el_id',
			'el_class',
			'css',
			'width',
			'offset',
		),
		'vc_section' => array (
			'full_width',
			'full_height',
			'content_placement',
			'video_bg',
			'video_bg_url',
			'video_bg_parallax',
			'parallax',
			'parallax_image',
			'parallax_speed_video',
			'parallax_speed_bg',
			'css_animation',
			'el_id',
			'disable_element',
			'el_class',
			'css',
		),
		'vc_custom_heading' => array (
			'source',
			'text',
			'link',
			'font_container',
			'use_theme_fonts',
			'google_fonts',
			'css_animation',
			'el_id',
			'el_class',
			'css',
		),
		'vc_text_separator' => array (
			'title',
			'add_icon',
			'i_type',
			'i_icon_fontawesome',
			'i_icon_openiconic',
			'i_icon_typicons',
			'i_icon_entypo',
			'i_icon_linecons',
			'i_icon_monosocial',
			'i_icon_material',
			'i_color',
			'i_custom_color',
			'i_background_style',
			'i_background_color',
			'i_custom_background_color',
			'i_size',
			'title_align',
			'align',
			'color',
			'accent_color',
			'style',
			'border_width',
			'el_width',
			'css_animation',
			'el_id',
			'el_class',
			'layout',
			'css',
		),
		'vc_tta_tabs' => array (
			'title',
			'style',
			'shape',
			'color',
			'no_fill_content_area',
			'spacing',
			'gap',
			'tab_position',
			'alignment',
			'autoplay',
			'active_section',
			'pagination_style',
			'pagination_color',
			'css_animation',
			'el_id',
			'el_class',
			'css',
		),
		'vc_tta_section' => array (
			'title',
			'tab_id',
			'add_icon',
			'i_position',
			'i_type',
			'i_icon_fontawesome',
			'i_icon_openiconic',
			'i_icon_typicons',
			'i_icon_entypo',
			'i_icon_linecons',
			'i_icon_monosocial',
			'i_icon_material',
			'el_class',
		),
		'vc_tta_accordion' => array (
			'title',
			'style',
			'shape',
			'color',
			'no_fill',
			'spacing',
			'gap',
			'c_align',
			'autoplay',
			'collapsible_all',
			'c_icon',
			'c_position',
			'active_section',
			'css_animation',
			'el_id',
			'el_class',
			'css',
		),
		'vc_column_text' => array (
			'content',
			'css_animation',
			'el_id',
			'el_class',
			'css',
		),
		'vc_empty_space' => array (
			'height',
			'el_id',
			'el_class',
			'css',
		),
		'vc_progress_bar' => array (
			'title',
			'values',
			'units',
			'bgcolor',
			'custombgcolor',
			'customtxtcolor',
			'options',
			'css_animation',
			'el_id',
			'el_class',
			'css',
		),
		'vc_pie' => array (
			'title',
			'value',
			'label_value',
			'units',
			'color',
			'custom_color',
			'css_animation',
			'el_id',
			'el_class',
			'css',
		),
		'vc_gallery' => array (
			'title',
			'type',
			'interval',
			'source',
			'images',
			'custom_srcs',
			'img_size',
			'external_img_size',
			'onclick',
			'custom_links',
			'custom_links_target',
			'css_animation',
			'el_id',
			'el_class',
			'css',
		),
		'vc_raw_js' => array (
			'content',
			'el_id',
			'el_class',
		),
		'vc_raw_html' => array (
			'content',
			'el_id',
			'el_class',
			'css',
		),
		'vc_widget_sidebar' => array (
			'title',
			'sidebar_id',
			'el_id',
			'el_class',
		),
		'vc_tta_pageable' => array (
			'title',
			'no_fill_content_area',
			'autoplay',
			'active_section',
			'pagination_style',
			'pagination_color',
			'tab_position',
			'css_animation',
			'el_id',
			'el_class',
			'css',
		),
		'vc_icon'	=> array(
			'type',
			'icon_fontawesome',
			'icon_openiconic',
			'icon_typicons',
			'icon_entypo',
			'icon_linecons',
			'icon_monosocial',
			'icon_material',
			'color',
			'custom_color',
			'background_style',
			'background_color',
			'custom_background_color',
			'size',
			'align',
			'link',
			'el_id',
			'el_class',
			'css',
			'css_animation',
		),
	);

	function __construct() {

		add_action( 'vc_after_init', array( $this, 'dahz_framework_remap_vc_shortcodes' ) );

		add_filter( 'vc_param_animation_style_list', array( $this, 'dahz_framework_remap_animation_style_list' ) );

		add_filter( 'vc_map_add_css_animation', array( $this, 'dahz_framework_remap_css_animation' ), 10, 2 );

		add_action( 'vc_mapper_init_after', array( $this, 'dahz_framework_shortcode_init_after_vc_mapper' ) );

	}

	public function dahz_framework_shortcode_init_after_vc_mapper(){
		
		include_once( DAHZEXTENDER_SHORTCODE_PATH . 'includes/config-vc-mapper/css_editor.php' );

	}

	public function dahz_framework_remap_css_animation( $data, $label ){

		$data = array(
			'type'			=> 'animation_style',
			'heading'		=> __( 'CSS Animation', 'js_composer' ),
			'param_name'	=> 'css_animation',
			'admin_label'	=> $label,
			'value'			=> '',
			'description'	=> __( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'js_composer' ),
		);

		return $data;

	}

	public function dahz_framework_remap_animation_style_list( $style_lists ){

		$style_lists = array();

		$style_lists[] = array(
			'label'		=> 'Animation',
			'values'	=> array(
				__( 'none', 'js_composer' ) => array(
					'value' => '',
					'type' => 'in',
				),
				__( 'fade', 'js_composer' ) => array(
					'value' => 'uk-animation-fade',
					'type' => 'in',
				),
				__( 'scale up', 'js_composer' ) => array(
					'value' => 'uk-animation-scale-up',
					'type' => 'in',
				),
				__( 'scale down', 'js_composer' ) => array(
					'value' => 'uk-animation-scale-down',
					'type' => 'in',
				),
				__( 'slide top', 'js_composer' ) => array(
					'value' => 'uk-animation-slide-top',
					'type' => 'in',
				),
				__( 'slide bottom', 'js_composer' ) => array(
					'value' => 'uk-animation-slide-bottom',
					'type' => 'in',
				),
				__( 'slide left', 'js_composer' ) => array(
					'value' => 'uk-animation-slide-left',
					'type' => 'in',
				),
				__( 'slide right', 'js_composer' ) => array(
					'value' => 'uk-animation-slide-right',
					'type' => 'in',
				),
				__( 'slide top small', 'js_composer' ) => array(
					'value' => 'uk-animation-slide-top-small',
					'type' => 'in',
				),
				__( 'slide bottom small', 'js_composer' ) => array(
					'value' => 'uk-animation-slide-bottom-small',
					'type' => 'in',
				),
				__( 'slide left small', 'js_composer' ) => array(
					'value' => 'uk-animation-slide-left-small',
					'type' => 'in',
				),
				__( 'slide right small', 'js_composer' ) => array(
					'value' => 'uk-animation-slide-right-small',
					'type' => 'in',
				),
				__( 'slide top medium', 'js_composer' ) => array(
					'value' => 'uk-animation-slide-top-medium',
					'type' => 'in',
				),
				__( 'slide bottom medium', 'js_composer' ) => array(
					'value' => 'uk-animation-slide-bottom-medium',
					'type' => 'in',
				),
				__( 'slide left medium', 'js_composer' ) => array(
					'value' => 'uk-animation-slide-left-medium',
					'type' => 'in',
				),
				__( 'slide right medium', 'js_composer' ) => array(
					'value' => 'uk-animation-slide-right-medium',
					'type' => 'in',
				),
				__( 'kenburns', 'js_composer' ) => array(
					'value' => 'uk-animation-kenburns',
					'type' => 'in',
				),
			),
		);
		return $style_lists;

	}

	public function dahz_framework_remap_vc_shortcodes(){

		$this->dahz_framework_remove_vc_shortcodes();

		$this->dahz_framework_remap_shortcodes();

	}

	public function dahz_framework_remove_vc_shortcodes(){

		vc_remove_element( "vc_message" );
		vc_remove_element( "vc_facebook" );
		vc_remove_element( "vc_tweetmeme" );
		vc_remove_element( "vc_googleplus" );
		vc_remove_element( "vc_pinterest" );
		vc_remove_element( 'vc_separator' );
		vc_remove_element( "vc_images_carousel" );
		vc_remove_element( "vc_btn" );
		vc_remove_element( "vc_cta" );
		vc_remove_element( "vc_posts_slider" );
		vc_remove_element( "vc_gmaps" );
		vc_remove_element( "vc_flickr" );
		vc_remove_element( "vc_wp_search" );
		vc_remove_element( "vc_wp_meta" );
		vc_remove_element( "vc_wp_recentcomments" );
		vc_remove_element( "vc_wp_calendar" );
		vc_remove_element( "vc_wp_pages" );
		vc_remove_element( "vc_wp_tagcloud" );
		vc_remove_element( "vc_wp_text" );
		vc_remove_element( "vc_wp_posts" );
		vc_remove_element( "vc_wp_categories" );
		vc_remove_element( "vc_wp_archives" );
		vc_remove_element( "vc_wp_rss" );
		vc_remove_element( "vc_message" );
		vc_remove_element( "vc_tabs" );
		vc_remove_element( "vc_tab" );
		vc_remove_element( "vc_tour" );
		vc_remove_element( "vc_accordion" );
		vc_remove_element( "vc_accordion_tab" );
		vc_remove_element( "product_attribute" );
		vc_remove_element( "top_rated_products" );
		vc_remove_element( "best_selling_products" );
		vc_remove_element( "product_categories" );
		vc_remove_element( "product_category" );
		vc_remove_element( "featured_products" );
		vc_remove_element( "recent_products" );
		vc_remove_element( "products" );
		vc_remove_element( "product" );
		vc_remove_element( "sale_products" );
		vc_remove_element( "rev_slider_vc" );
		vc_remove_element( "vc_tta_tour" );
		vc_remove_element( "vc_round_chart" );
		vc_remove_element( "vc_line_chart" );
		vc_remove_element( 'vc_single_image' );
		vc_remove_element( "vc_basic_grid" );
		vc_remove_element( "vc_media_grid" );
		vc_remove_element( "vc_masonry_grid" );
		vc_remove_element( "vc_masonry_media_grid" );
		vc_remove_element( "vc_toggle" );

	}

	public function dahz_framework_remap_shortcodes(){
		
		vc_map_update( 'vc_tta_pageable', array( 'name' => __( 'Slider', 'js_composer' ), 'category' => array( "Content" ) ) );
		vc_map_update( 'vc_row', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-row.svg", ) );
		vc_map_update( 'vc_row_inner', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-row.svg", ) );
		vc_map_update( 'vc_section', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-section.svg", ) );
		vc_map_update( 'vc_custom_heading', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-custom-heading.svg", ) );
		vc_map_update( 'vc_text_separator', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-text-separator.svg", ) );
		vc_map_update( 'vc_column_text', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-text-block.svg", ) );
		vc_map_update( 'vc_tta_accordion', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-accordion.svg", ) );
		vc_map_update( 'vc_tta_tabs', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-tab.svg", ) );
		vc_map_update( 'vc_empty_space', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-empty-space.svg", ) );
		vc_map_update( 'vc_progress_bar', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-progress-bar.svg", ) );
		vc_map_update( 'vc_pie', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-pie-cart.svg", ) );
		vc_map_update( 'vc_gallery', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-gallery.svg", ) );
		vc_map_update( 'vc_raw_js', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-js.svg", ) );
		vc_map_update( 'vc_raw_html', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-html.svg", ) );
		vc_map_update( 'vc_widget_sidebar', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-widgetised-sidebar.svg", ) );
		vc_map_update( 'vc_tta_pageable', array( 'icon' => DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-post-portfolio-slider.svg", ) );
		
		$dir = DAHZEXTENDER_SHORTCODE_PATH . 'includes/config-vc-mapper/';

		foreach( $this->mapped_shortcodes as $base => $params ){

			foreach( $params as $param ){
				
				vc_remove_param( $base, $param );

			}

			if( file_exists( $dir . "{$base}.php" ) ){

				$new_params = include( $dir . "{$base}.php" );

				vc_add_params( $base, $new_params );

			}

		}

	}

}

new Dahz_Framework_Shortcode_VC_Mapper();
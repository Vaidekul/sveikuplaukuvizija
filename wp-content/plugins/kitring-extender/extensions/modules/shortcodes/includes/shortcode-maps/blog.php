<?php
/**
* KW
*/
if( !class_exists( 'Sobari_Blog' ) ){

	class Sobari_Blog extends Dahz_Framework_Shortcode_Template {

		function __construct() {

			$param = array(
				'name'				=> esc_attr__( 'Blog', 'sobari_sc' ),
				'base'				=> 'blog',
				'description'		=> esc_attr__( 'Display blog loop', 'sobari_sc' ),
				'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/Blog.svg",
				'params'			=> array()
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Posts Display', 'sobari_sc' ),
				'param_name'	=> 'posts_display',
				'value'			=> array(
					'Grid'		=> 'grid',
					'Carousel'	=> 'carousel',
					'Masonry'	=> 'masonry'
				),
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Filter By', 'sobari_sc' ),
				'param_name'	=> 'filter_by',
				'value'			=> array(
					'Recent Post' 		=> 'recent_post',
					'Categories' 		=> 'categories',
					'Post ID' 			=> 'post_ids',
				),
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Order By', 'sobari_sc' ),
				'param_name'	=> 'order_by',
				'value'			=> array(
					'Date' 			=> 'date',
					'ID' 			=> 'id',
					'Author' 		=> 'author',
					'Title' 		=> 'title',
					'Modified' 		=> 'modified',
					'Random' 		=> 'random',
					'Comment Count' => 'comment_count',
					'Menu Order' 	=> 'menu_order',
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
					'element'	=> 'filter_by',
					'value'		=> 'post_ids',
				),
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
					'element'	=> 'filter_by',
					'value'		=> 'categories',
				),
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Columns', 'sobari_sc' ),
				'param_name'	=> 'columns',
				'value'			=> array(
					'1'	=> '1',
					'2'	=> '2',
					'3'	=> '3',
					'4'	=> '4',
					'5'	=> '5',
					'6'	=> '6',
				),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Total Posts', 'sobari_sc' ),
				'param_name'	=> 'total_posts',
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Pagination Type', 'sobari_sc' ),
				'param_name'	=> 'pagination_type',
				'value'			=> array(
					'None'				=> 'none',
					'Infinite Scroll'	=> 'infinite_scroll',
					'Load More Button'	=> 'load_more',
					'Number'			=> 'number',
				),
				'dependency'	=> array(
					'element'	=> 'posts_display',
					'value'		=> array( 'grid', 'masonry' ),
				),
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Post Style', 'sobari_sc' ),
				'param_name'	=> 'post_style',
				'value'			=> array(
					'Default'	=> 'default',
					'Light'		=> 'light',
					'Dark'		=> 'dark',
				),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Light Text Color', 'sobari_sc' ),
				'param_name'	=> 'light_text_color',
				'dependency'	=> array(
					'element'	=> 'post_style',
					'value'		=> 'light'
				),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Light Button Text Color', 'sobari_sc' ),
				'param_name'	=> 'button_light_text_color',
				'dependency'	=> array(
					'element'	=> 'post_style',
					'value'		=> 'light'
				),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Light Button Background Color', 'sobari_sc' ),
				'param_name'	=> 'button_light_bg_color',
				'dependency'	=> array(
					'element'	=> 'post_style',
					'value'		=> 'light'
				),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Dark Text Color', 'sobari_sc' ),
				'param_name'	=> 'dark_text_color',
				'dependency'	=> array(
					'element'	=> 'post_style',
					'value'		=> 'dark'
				),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Dark Button Text Color', 'sobari_sc' ),
				'param_name'	=> 'button_dark_text_color',
				'dependency'	=> array(
					'element'	=> 'post_style',
					'value'		=> 'dark'
				),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Dark Button Background Color', 'sobari_sc' ),
				'param_name'	=> 'button_dark_bg_color',
				'dependency'	=> array(
					'element'	=> 'post_style',
					'value'		=> 'dark'
				),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'checkbox',
				'heading'		=> esc_attr__( 'Display Categories', 'sobari_sc' ),
				'param_name'	=> 'is_display_categories',
				'value'			=> array( __( 'Yes, please', 'sobari_sc' ) => 'true' ),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'checkbox',
				'heading'		=> esc_attr__( 'Display Author', 'sobari_sc' ),
				'param_name'	=> 'is_display_author',
				'value'			=> array( __( 'Yes, please', 'sobari_sc' ) => 'true' ),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'checkbox',
				'heading'		=> esc_attr__( 'Display Date', 'sobari_sc' ),
				'param_name'	=> 'is_display_date',
				'value'			=> array( __( 'Yes, please', 'sobari_sc' ) => 'true' ),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'checkbox',
				'heading'		=> esc_attr__( 'Display Comment', 'sobari_sc' ),
				'param_name'	=> 'is_display_comment',
				'value'			=> array( __( 'Yes, please', 'sobari_sc' ) => 'true' ),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'checkbox',
				'heading'		=> esc_attr__( 'Display Excerpt', 'sobari_sc' ),
				'param_name'	=> 'is_display_excerpt',
				'value'			=> array( __( 'Yes, please', 'sobari_sc' ) => 'true' ),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'checkbox',
				'heading'		=> esc_attr__( 'Show Navigation Arrow', 'sobari_sc' ),
				'param_name'	=> 'nav_arrow',
				'value'			=> array( __( 'Yes, please', 'sobari_sc' ) => 'true' ),
				'dependency'	=> array(
					'element'	=> 'posts_display',
					'value'		=> 'carousel',
				),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Arrow Position', 'sobari_sc' ),
				'param_name'	=> 'arrow_position',
				'value'			=> array(
					'Inside'	=> 'inside',
					'Outside'	=> 'outside',
				),
				'dependency'	=> array(
					'element'	=> 'nav_arrow',
					'value'		=> 'true',
				),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'checkbox',
				'heading'		=> esc_attr__( 'Show Navigation Dots', 'sobari_sc' ),
				'param_name'	=> 'nav_dots',
				'value'			=> array( __( 'Yes, please', 'sobari_sc' ) => 'true' ),
				'dependency'	=> array(
					'element'	=> 'posts_display',
					'value'		=> 'carousel',
				),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'checkbox',
				'heading'		=> esc_attr__( 'Enable Auto Play', 'sobari_sc' ),
				'param_name'	=> 'enable_auto_play',
				'dependency'	=> array(
					'element'	=> 'style',
					'value'		=> 'carousel',
				),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Auto Play Duration', 'sobari_sc' ),
				'param_name'	=> 'auto_play_duration',
				'dependency'	=> array(
					'element'	=> 'enable_auto_play',
					'value'		=> 'true',
				),
				'group'			=> esc_attr__( 'Design Options', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Extra Class', 'sobari_sc' ),
				'param_name'	=> 'carousel_item_class',
				'description'	=> esc_attr__( 'Add extra class', 'sobari_sc' ),
			);

			// add_filter( "dahz_shortcode_build_css_blog", array( $this, 'dahz_framework_blog_style' ), 10, 4 );

			parent::dahz_framework_shortcode_maps(
				$param,
				array(
					// General
					"posts_display"				=> "grid",
					"filter_by"					=> "recent_post",
					"order_by"					=> "date",
					"sort_by"					=> "desc",
					"total_posts"				=> 9,
					"pagination_type"			=> "none",
					// Design Optin
					"columns"					=> 3,
					"post_style"				=> "default",
					"is_display_categories"		=> "true",
					"is_display_author"			=> "true",
					"is_display_date"			=> "true",
					"is_display_comment"		=> "true",
					"is_display_excerpt"		=> "true",
					"light_text_color"			=> "#fff",
					"button_light_text_color"	=> "#000",
					"button_light_bg_color"		=> "#fff",
					"dark_text_color"			=> "#000",
					"button_dark_text_color"	=> "#fff",
					"button_dark_bg_color"		=> "#000",
					"nav_arrow"					=> "true",
					"nav_dots"					=> "true",
					"auto_play_duration"		=> "2000"
				)
			);

		}

		public function dahz_framework_blog_style( $vc_style, $attr_array, $key ) {

			$uniqid = $key;

			extract( $attr_array );

			$vc_style .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-blog[data-post-style="light"] .de-carousel__arrow:hover,
				[data-dahz-shortcode-key="%1$s"] .de-sc-blog[data-post-style="light"] .de-sc-blog__entry *,
				[data-dahz-shortcode-key="%1$s"] .de-sc-blog[data-post-style="light"] .de-sc-pagination h5,
				[data-dahz-shortcode-key="%1$s"] .de-sc-blog[data-post-style="light"] .de-sc-pagination li a {
					color: %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-blog[data-post-style="dark"] .de-carousel__arrow:hover,
				[data-dahz-shortcode-key="%1$s"] .de-sc-blog[data-post-style="dark"] .de-sc-blog__entry *,
				[data-dahz-shortcode-key="%1$s"] .de-sc-blog[data-post-style="dark"] .de-sc-pagination h5,
				[data-dahz-shortcode-key="%1$s"] .de-sc-blog[data-post-style="dark"] .de-sc-pagination li a {
					color: %5$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-blog[data-post-style="light"] .de-btn {
					color: %3$s !important;
					background-color: %4$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-blog[data-post-style="dark"] .de-btn {
					color: %6$s !important;
					background-color: %7$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-blog[data-post-style="light"] .de-sc-pagination[data-pagination-type="load_more"] span {
					background: %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-blog[data-post-style="light"] .de-sc-pagination[data-pagination-type="infinite_scroll"] span {
					border-top-color: %2$s !important;
					border-bottom-color: %2$s !important;
					border-left-color: %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-blog[data-post-style="dark"] .de-sc-pagination[data-pagination-type="load_more"] span {
					background: %5$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-blog[data-post-style="dark"] .de-sc-pagination[data-pagination-type="infinite_scroll"] span {
					border-top-color: %5$s !important;
					border-bottom-color: %5$s !important;
					border-left-color: %5$s !important;
				}
				',
				$uniqid,
				!empty( $light_text_color ) ? $light_text_color : 'inherit',
				!empty( $button_light_text_color ) ? $button_light_text_color : 'inherit',
				!empty( $button_light_bg_color ) ? $button_light_bg_color : 'transparent',
				!empty( $dark_text_color ) ? $dark_text_color : 'inherit',
				!empty( $button_dark_text_color ) ? $button_dark_text_color : 'inherit',
				!empty( $button_dark_bg_color ) ? $button_dark_bg_color : 'inherit'
			);

			return $vc_style;

		}

	}

	new Sobari_Blog();

}

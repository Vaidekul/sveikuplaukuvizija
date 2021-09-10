<?php
/**
*
*/
class Dahz_Framework_Shortcode_Admin {

	function __construct() {

		add_filter( 'vc_form_fields_render_field_dahz_product_attribute_filter_param', array(
			$this,
			'dahz_product_attribute_filter_param_value',
		), 10, 4 );
		add_filter( 'vc_form_fields_render_field_category_showcase_post_categories_param', array(
			$this,
			'dahz_category_showcase_post_categories_param_value',
		), 10, 4 );
		add_filter( 'vc_form_fields_render_field_category_showcase_portfolio_categories_param', array(
			$this,
			'dahz_category_showcase_portfolio_categories_param_value',
		), 10, 4 );
		add_filter( 'vc_form_fields_render_field_category_showcase_product_categories_param', array(
			$this,
			'dahz_category_showcase_product_categories_param_value',
		), 10, 4 );
		add_filter( 'vc_form_fields_render_field_category_showcase_product_brands_param', array(
			$this,
			'dahz_category_showcase_product_brands_param_value',
		), 10, 4 );
		add_filter( 'vc_form_fields_render_field_dahz_product_attribute_attribute_param', array(
			$this,
			'dahz_product_attribute_param_value',
		), 10, 4 );
		add_filter( 'vc_form_fields_render_field_dahz-block_id_param', array(
			$this,
			'dahz_content_block_ids',
		), 10, 4 );
		add_filter( 'vc_form_fields_render_field_dahz_rev_slider_alias_param', array(
			$this,
			'dahz_rev_slider_alias',
		), 10, 4 );
		add_action( "dahz_shortcode_build_css_vc_tta_accordion", array(
			$this,
			'dahz_shortcode_accordion_style'
		), 10, 3 );
		add_action( 'dahz_shortcode_build_css_product_pair', array(
			$this,
			'product_pair_css'
		), 10, 3 );
		// add_action( 'dahz_shortcode_build_css_product_showcase', array(
			// $this,
			// 'product_showcase_css'
		// ), 10, 3 );
		// add_action( "dahz_shortcode_build_css_button", array(
			// $this,
			// 'dahz_framework_button_style'
		// ), 10, 3 );
		add_action( "dahz_shortcode_build_css_count_down", array(
			$this,
			'dahz_framework_count_down_style'
		), 10, 3 );
		add_action( "dahz_shortcode_build_css_milestone", array(
			$this,
			'dahz_framework_milestone_style'
		), 10, 3 );
		add_action( 'dahz_shortcode_build_css_modal_popup',
			array( $this,
			'modal_popup_css'
		), 10, 3 );
		add_action( "dahz_shortcode_build_css_image_carousel", array(
			$this,
			'dahz_framework_image_carousel_style'
		), 10, 3 );

		add_action( "dahz_shortcode_build_css_category_showcase", array(
			$this, 'dahz_framework_category_showcase_style'
		), 10, 3 );

		add_action( 'dahz_shortcode_build_css_cascading_image', array(
			$this, 'cascading_image_css'
		), 10, 3 );

		add_action( "dahz_shortcode_build_css_testimonials", array(
			$this, 'dahz_framework_testimonials_style'
		), 10, 3 );

		add_action( 'dahz_shortcode_build_css_flip_box', array(
			$this, 'flip_box_css'
		), 10, 3 );

		// add_action( 'dahz_shortcode_build_css_add_to_cart_custom', array(
			// $this, 'add_to_cart_custom_css'
		// ), 10, 3 );

		add_action( "dahz_shortcode_build_css_social_media", array(
			$this, 'dahz_framework_social_media_style'
		), 10, 3 );

		add_action( 'dahz_shortcode_build_css_scroll_to', array(
			$this, 'scroll_to_css'
		), 10, 3 );

		add_action( "dahz_shortcode_build_css_dahz_product_page", array(
			$this, 'dahz_framework_dahz_product_page_style'
		), 10, 3 );

		add_action( "dahz_shortcode_build_css_dahz_order_tracking_form", array(
			$this, 'dahz_framework_dahz_order_tracking_form_style'
		), 10, 3 );

		add_action( "dahz_shortcode_build_css_dahz_product_categories", array(
			$this, 'dahz_framework_product_categories_style'
		), 10, 3 );

		add_action( "dahz_shortcode_build_css_dahz_product_brands", array(
			$this, 'dahz_framework_product_categories_style'
		), 10, 3 );

		add_action( "dahz_shortcode_build_css_divider", array(
			$this, 'dahz_framework_divider_style'
		), 10, 3 );

		add_action( 'dahz_shortcode_build_css_dahz_banner_image', array(
			$this, 'dahz_framework_banner_image_style'
		), 10, 3 );

		add_action( 'dahz_shortcode_build_css_dahz_banner_multiple_button', array(
			$this, 'dahz_framework_banner_button_style'
		), 10, 3 );

		// add_action( 'dahz_shortcode_build_css_dahz_banner_info', array(
			// $this, 'dahz_framework_banner_info_style'
		// ), 10, 3 );
		add_action( 'dahz_shortcode_build_css_post_grid', array(
			$this, 'dahz_framework_post_slider_style'
		), 10, 3 );
		add_action( 'dahz_shortcode_build_css_post_slider', array(
			$this, 'dahz_framework_post_slider_style'
		), 10, 3 );

		add_action( 'dahz_shortcode_build_css_post_list', array(
			$this, 'dahz_framework_post_slider_style'
		), 10, 3 );
		add_action( 'dahz_shortcode_build_css_post_tabs', array(
			$this, 'dahz_framework_post_tabs_style'
		), 10, 3 );
		add_action( 'dahz_shortcode_build_css_vc_gallery', array(
			$this, 'dahz_framework_vc_gallery_style'
		), 10, 3 );
		add_action( 'dahz_shortcode_build_css_vc_custom_heading', array(
			$this, 'dahz_framework_vc_custom_heading_style'
		), 10, 3 );
		add_action( 'dahz_shortcode_build_css_team_member', array(
			$this, 'dahz_framework_team_member_style'
		), 10, 3 );
		add_action( "dahz_shortcode_build_css_icon_box", array(
			$this, 'dahz_framework_icon_box_style'
		), 10, 3 );
		add_action( "dahz_shortcode_build_css_icon_list", array(
			$this, 'dahz_framework_icon_list_style'
		), 10, 3 );
		add_action( "dahz_shortcode_build_css_product_menu", array(
			$this, 'dahz_framework_product_menu_style'
		), 10, 3 );
		// add_action( "dahz_shortcode_build_css_pricing_table", array(
			// $this, 'dahz_framework_pricing_table_style'
		// ), 10, 3 );
		add_action( "dahz_shortcode_build_css_dahz_product_tab", array(
			$this, 'dahz_framework_product_tab_style'
		), 10, 3 );
		add_action( "dahz_shortcode_build_css_before_after", array(
			$this, 'dahz_framework_before_after_style'
		), 10, 3 );
		add_action( "dahz_shortcode_build_css_portfolio_slider", array(
			$this, 'dahz_framework_post_slider_style'
		), 10, 3 );
		add_action( "dahz_shortcode_build_css_portfolio_list", array(
			$this, 'dahz_framework_post_slider_style'
		), 10, 3 );
		add_action( "dahz_shortcode_build_css_portfolio", array(
			$this, 'dahz_framework_post_slider_style'
		), 10, 3 );
		add_action( "dahz_shortcode_build_css_portfolio_tabs", array(
			$this, 'dahz_framework_post_tabs_style'
		), 10, 3 );
		add_action( "dahz_shortcode_build_css_vc_tta_pageable", array(
			$this, 'dahz_framework_vc_tta_pageable_style'
		), 10, 3 );
		add_action( "dahz_shortcode_build_css_vc_tta_tabs", array(
			$this, 'dahz_framework_vc_tta_tabs_style'
		), 10, 3 );

	}

	public function dahz_category_showcase_post_categories_param_value( $param_settings, $current_value, $map_settings, $atts ) {

		if ( isset( $param_settings['params'][0]['value'] ) ) {

			$param_settings['params'][0]['value'] = $this->dahz_framework_category_showcase_categories( 'post' );

		}

		return $param_settings;
	}
	public function dahz_category_showcase_portfolio_categories_param_value( $param_settings, $current_value, $map_settings, $atts ) {

		if ( isset( $param_settings['params'][0]['value'] ) ) {

			$param_settings['params'][0]['value'] = $this->dahz_framework_category_showcase_categories( 'portfolio' );

		}

		return $param_settings;
	}
	public function dahz_category_showcase_product_categories_param_value( $param_settings, $current_value, $map_settings, $atts ) {

		if ( isset( $param_settings['params'][0]['value'] ) ) {

			$param_settings['params'][0]['value'] = $this->dahz_framework_category_showcase_categories( 'product_cat' );

		}

		return $param_settings;
	}
	public function dahz_category_showcase_product_brands_param_value( $param_settings, $current_value, $map_settings, $atts ) {

		if ( isset( $param_settings['params'][0]['value'] ) ) {

			$param_settings['params'][0]['value'] = $this->dahz_framework_category_showcase_categories( 'product_brand' );

		}

		return $param_settings;
	}
	public function dahz_product_attribute_param_value( $param_settings, $current_value, $map_settings, $atts ) {

		if ( isset( $param_settings['value'] ) ) {

			$attributes_tax = wc_get_attribute_taxonomies();

			$attributes = array();

			foreach ( $attributes_tax as $attribute ) {

				$attributes[ $attribute->attribute_label ] = $attribute->attribute_name;

			}

			$param_settings['value'] = $attributes;

		}

		return $param_settings;
	}
	public function dahz_product_attribute_filter_param_value( $param_settings, $current_value, $map_settings, $atts ) {

		if ( isset( $atts['attribute'] ) ) {

			$value = $this->dahz_get_attribute_terms( $atts['attribute'] );

			if ( is_array( $value ) && ! empty( $value ) ) {

				$param_settings['value'] = $value;

			}

		}

		return $param_settings;

	}
	public function dahz_get_attribute_terms( $attribute ) {

		$terms = get_terms( 'pa_' . $attribute ); // return array. take slug

		$data = array();

		if ( ! empty( $terms ) && empty( $terms->errors ) ) {

			foreach ( $terms as $term ) {

				$data[ $term->name ] = $term->slug;

			}

		}

		return $data;

	}

	public function dahz_framework_category_showcase_categories( $category ) {

		switch( $category ) {
			case 'post':
				$post_categories = get_categories();
				$post_categories_radio = array();
				foreach( $post_categories as $category ) {
					$image_thumbnail_id = dahz_framework_get_term_meta( $category->taxonomy, $category->term_id, 'image_upload', '' );
					$image_thumbnail = wp_get_attachment_image( $image_thumbnail_id, 'thumbnail' );
					$post_categories_radio[$category->term_id] = !empty( $image_thumbnail ) ? $image_thumbnail : $category->name;
				}
				return $post_categories_radio;
				break;
			case 'product_cat':
				if ( !class_exists( 'Woocommerce' ) ) return;
				$product_categories = get_terms(
					array(
						'taxonomy' => 'product_cat',
						'hide_empty' => false,
					)
				);
				$product_categories_radio = array();
				foreach( $product_categories as $category ) {
					$image_thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
					$image_thumbnail = wp_get_attachment_image( $image_thumbnail_id );
					$product_categories_radio[$category->term_id] = !empty( $image_thumbnail ) ? $image_thumbnail : $category->name;
				}
				return $product_categories_radio;
				break;
			case 'portfolio':
				$portfolio_categories = get_terms(
					array(
						'taxonomy' => 'portfolio_categories',
						'hide_empty' => false,
					)
				);
				$portfolio_categories_radio = array();
				if ( !is_wp_error( $portfolio_categories ) ) {
					foreach( $portfolio_categories as $category ) {
						$image_thumbnail_id = dahz_framework_get_term_meta( $category->taxonomy, $category->term_id, 'image_upload', '' );
						$image_thumbnail = wp_get_attachment_image( $image_thumbnail_id, 'thumbnail' );
						$portfolio_categories_radio[$category->term_id] = !empty( $image_thumbnail ) ? $image_thumbnail : $category->name;
					}
				}
				return $portfolio_categories_radio;
				break;
			case 'product_brand':
				$product_brands = get_terms(
					array(
						'taxonomy' => 'brand',
						'hide_empty' => false,
					)
				);
				$product_brands_radio = array();
				if ( !is_wp_error( $product_brands ) ) {
					foreach( $product_brands as $category ) {
						$image_thumbnail_id = dahz_framework_get_term_meta( $category->taxonomy, $category->term_id, 'brand_image_upload', '' );
						$image_thumbnail = wp_get_attachment_image( $image_thumbnail_id, 'thumbnail' );
						$product_brands_radio[$category->term_id] = !empty( $image_thumbnail ) ? $image_thumbnail : $category->name;
					}
				}
				return $product_brands_radio;
				break;
		}

	}
	public function dahz_content_block_ids( $param_settings, $current_value, $map_settings, $atts ) {

		if ( isset( $param_settings['value'] ) ) {

			$cblock = get_posts( 'post_type="content-block"&numberposts=-1' );

			$conten_blocks = array();

			if ( $cblock ) {

				foreach ( $cblock as $cform ) {

					$conten_blocks[ $cform->post_title ] = $cform->post_name;

				}

			} else {

				$conten_blocks[ __( 'No Content Block found', 'uncode' ) ] = 0;

			}

			$param_settings['value'] = $conten_blocks;

		}

		return $param_settings;

	}
	public function dahz_rev_slider_alias( $param_settings, $current_value, $map_settings, $atts ) {

		if ( isset( $param_settings['value'] ) && ( is_plugin_active( 'revslider/revslider.php' ) || class_exists( 'RevSlider' ) ) ) {

			$slider = new RevSlider();

			$arrSliders = $slider->getArrSliders();

			$revsliders = array();

			if ( $arrSliders ) {

				foreach ( $arrSliders as $slider ) {
					/** @var $slider RevSlider */
					$revsliders[ $slider->getTitle() ] = $slider->getAlias();
				}

			} else {

				$revsliders[ __( 'No sliders found', 'js_composer' ) ] = 0;

			}

			$param_settings['value'] = $revsliders;

		}

		return $param_settings;

	}
	public function dahz_shortcode_accordion_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );
		$icon_open = '';
		$icon_close = '';
		$ratio = $icon_ratio * 20;
		$icon_content_open = '';
		if ( !empty( $icon ) ) {

			switch( $icon ) {
				case 'plus|minus':
					$icon_open = '\e909';
					$icon_close = '\e908';
					break;
				case 'expand|shrink':
					$icon_open = '\e905';
					$icon_close = '\e904';
					break;
				case 'chevron-up|chevron-down':
					$icon_open = '\e903';
					$icon_close = '\e902';
					break;
				case 'arrow-up|arrow-down':
					$icon_open = '\e901';
					$icon_close = '\e900';
					break;
				case 'more-open|more-close':
					$icon_open = '\e907';
					$icon_close = '\e906';
					break;
			}

		}
		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'
			[data-dahz-shortcode-key="%5$s"] .uk-accordion-title > %4$s::after {
				content: "%2$s";
				width: %1$spx;
				height: %1$spx;
				font-size:%1$spx;
				float: right;
				display:block;
			}
			[data-dahz-shortcode-key="%5$s"] .uk-open > .uk-accordion-title > %4$s::after {
				content: "%3$s";
				%8$s
			}
			[data-dahz-shortcode-key="%5$s"] .uk-accordion-title * {
				%10$s
			}
			[data-dahz-shortcode-key="%5$s"] li.uk-open .uk-accordion-title * {
				%11$s
			}
			[data-dahz-shortcode-key="%5$s"] li:after {
				border-bottom: 1px solid %9$s;
			}
			',
			$ratio, // 1
			$icon_open , // 2
			$icon_close, // 3
			$tag, // 4
			$dahz_id, // 5
			$icon_content_open, // 6
			!empty( $inactive_color ) ? 'color:' . esc_attr( $inactive_color ) . ';' : '', // 7
			!empty( $active_color ) ? 'color:' . esc_attr( $active_color ) . ';' : '', // 8
			$border_color, // 9
			!empty( $inactive_color ) ? 'color:' . esc_attr( $inactive_color ) . ';' : '', // 10
			!empty( $active_color ) ? 'color:' . esc_attr( $active_color ) . ';' : '' // 11
		);

	}
	public function product_pair_css( $vc_style, $attr_array, $dahz_id ) {

		$uniqid 	= $dahz_id;

		extract( $attr_array );

		// Icon In Button
		$color_frame = !empty( $color_frame ) ? $color_frame : '#ffffff';

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf('
				[data-dahz-shortcode-key="%1$s"] .de-sc-product-pair__container--framed .de-sc-product-pair__item__image:hover:after {
					border-color: %2$s;
				}

			',
			$uniqid,
			$color_frame
		);

	}

	public function product_showcase_css( $vc_style, $attr_array, $dahz_id ) {
		extract( $attr_array );

		if ( !empty( $hover_bg_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-btn--boxed:hover::after {
					background-color: %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-btn--outline:hover {
					border-color: %2$s !important;
				}
				',
				$dahz_id, # 1
				$hover_bg_color # 2
			);
		}

		if ( !empty( $hover_text_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-btn:hover {
					color: %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-btn--underline-thin:hover {
					box-shadow: inset 0 -1px 1px -1px %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-btn--underline-thick:hover {
					box-shadow: inset 0 -8px 1px -1px %2$s !important;
				}
				',
				$dahz_id, # 1
				$hover_text_color # 2
			);
		}

	}
	public function dahz_framework_button_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );

		$hover_attributes = '';

		if ( !empty( $hover_bg_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-btn--boxed:hover::after {
					background-color: %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-btn--outline:hover {
					border-color: %2$s !important;
				}
				',
				$dahz_id, # 1
				$hover_bg_color # 2
			);
		}

		if ( !empty( $hover_text_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-btn:hover {
					color: %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-btn--underline-thin:hover {
					box-shadow: inset 0 -1px 1px -1px %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-btn--underline-thick:hover {
					box-shadow: inset 0 -8px 1px -1px %2$s !important;
				}
				',
				$dahz_id, # 1
				$hover_text_color # 2
			);
		}
	}
	public function dahz_framework_count_down_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );


		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf('
			[data-dahz-shortcode-key="%1$s"] .de-sc-countdown-style-1 .uk-countdown-number {
				%2$s
				%3$s
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-countdown-style-1 .uk-countdown-separator {
				%4$s
				%5$s
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-countdown-style-1 .uk-countdown-label {
				%6$s
				%7$s
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-countdown-style-2 .uk-countdown-number,
			[data-dahz-shortcode-key="%1$s"] .de-sc-countdown-style-2 .uk-countdown-separator,
			[data-dahz-shortcode-key="%1$s"] .de-sc-countdown-style-2 .uk-countdown-label {
				%8$s
				%9$s
			}
			',
			esc_html( $dahz_id ),
			!empty( $number_font_size ) ? is_numeric( $number_font_size ) ? 'font-size:' . esc_attr( $number_font_size ) . 'px;' : 'font-size:' . $number_font_size . ';' : '',
			!empty( $number_color ) ? 'color:' . $number_color . ';' : '',
			!empty( $delimiter_font_size ) ? is_numeric( $delimiter_font_size ) ? 'font-size:' . esc_attr( $delimiter_font_size ) . 'px;' : 'font-size:' . $delimiter_font_size . ';' : '',
			!empty( $delimiter_color ) ? 'color:' . $delimiter_color . ';' : '',
			!empty( $label_font_size ) ? is_numeric( $label_font_size ) ? 'font-size:' . esc_attr( $label_font_size ) . 'px;' : 'font-size:' . $label_font_size . ';' : '',
			!empty( $label_color ) ? 'color:' . $label_color . ';' : '',
			!empty( $countdown_font_size ) ? is_numeric( $countdown_font_size ) ? 'font-size:' . esc_attr( $countdown_font_size ) . 'px;' : 'font-size:' . $countdown_font_size . ';' : '',
			!empty( $countdown_color ) ? 'color:' . $countdown_color . ';' : ''
		);

	}
	public function dahz_framework_milestone_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );

		switch ($milestone_number_font_family) {
			case 'primary':

				$font_array = get_theme_mod('typography_main_font');
				$font_family = $font_array['font-family'];
				break;
			case 'secondary':

				$font_array = get_theme_mod('typography_secondary_font');
				$font_family = $font_array['font-family'];
				break;
		}

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'
			[data-dahz-shortcode-key="%1$s"] .de-sc-milestone .de-sc-milestone__count {
				font-family: %9$s;
				%2$s
				%3$s
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-milestone .de-sc-milestone__symbol {
				%4$s
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-milestone .de-sc-milestone__title {
				%5$s
				%6$s
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-milestone .de-sc-milestone__subtitle {
				%7$s
				%8$s

			}

			',
			esc_attr( $dahz_id ),
			!empty( $milestone_counter_font_size ) ? is_numeric( $milestone_counter_font_size ) ? 'font-size:' . esc_attr( $milestone_counter_font_size ) . 'px;' : 'font-size:' . $milestone_counter_font_size . ';' : '',
			!empty( $milestone_counter_symbol_color ) ? 'color:' . $milestone_counter_symbol_color . ';' : '',
			!empty( $milestone_symbol_font_size ) ? is_numeric( $milestone_symbol_font_size ) ? 'font-size:' . esc_attr( $milestone_symbol_font_size ) . 'px;' : 'font-size:' . $milestone_symbol_font_size . ';' : '',
			!empty( $milestone_font_title_size ) ? is_numeric( $milestone_font_title_size ) ? 'font-size:' . esc_attr( $milestone_font_title_size ) . 'px;' : 'font-size:' . $milestone_font_title_size . ';' : '',
			!empty( $milestone_title_color ) ? 'color:' . $milestone_title_color . ';' : '',
			!empty( $milestone_font_subtitle_size ) ? is_numeric( $milestone_font_subtitle_size ) ? 'font-size:' . esc_attr( $milestone_font_subtitle_size ) . 'px;' : 'font-size:' . $milestone_font_subtitle_size . ';' : '',
			!empty( $milestone_subtitle_color ) ? 'color:' . $milestone_subtitle_color . ';' : '',
			esc_attr( $font_family )

		);

	}
	public function modal_popup_css( $vc_style, $attr_array, $dahz_id ) {
		$uniqid = $dahz_id;

		extract( $attr_array );

		// Get site width (for modal width purpose)
		$site_width = dahz_framework_get_option( 'layout_site_width', '1200px' );

		// If value empty
		$modal_heading_background_color    = !empty( $modal_heading_background_color ) ? $modal_heading_background_color : '' ;
		$modal_heading_text_color          = !empty( $modal_heading_text_color ) ? $modal_heading_text_color : '' ;

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf('

			@media only screen and (max-width: 1024px) {
				[data-dahz-shortcode-key="%1$s"] .de-sc-modal-popup {
					width: 100%%;
					margin: 0 20px;
				}
			}

			#de-sc-modal-popup--%1$s .de-sc-modal-popup__heading {
				border-bottom: 1px solid;
			}

			[data-dahz-shortcode-key="%1$s"],
			[data-dahz-shortcode-key="%1$s"] .de-sc-modal-popup__heading {
				border-color: %2$s;
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-modal-popup__heading h5 {
				color: %3$s;
			}
			',
			esc_html( $dahz_id ), // 1
			!empty( $border_color ) ? esc_html( $border_color ) : 'transparent', // 2
			!empty( $modal_heading_text_color ) ? esc_html( $modal_heading_text_color ) : 'inherit' // 3
		);

	}
	public function dahz_framework_image_carousel_style( $vc_style, $attr_array, $key ) {

		$uniqid = $key;

		extract( $attr_array );

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'
			@media print, screen and (min-width: %2$spx) {
				.de-sc-image-carousel[data-arrow-position="outside"] .de-carousel__arrow.left {
					left: -70px;
					padding-right: 20px;
				}
				.de-sc-image-carousel[data-arrow-position="outside"] .de-carousel__arrow.right {
					right: -70px;
					padding-left: 20px;
				}
				[data-vc-stretch-content="true"] .de-sc-image-carousel[data-arrow-position="outside"] .de-carousel__arrow.left {
					left: 0;
				}
				[data-vc-stretch-content="true"] .de-sc-image-carousel[data-arrow-position="outside"] .de-carousel__arrow.right {
					right: 0;
				}
			}
			@media print, screen and (max-width: %3$spx) and (min-width: 1024px) {
				.de-sc-image-carousel[data-single-center="true"] .slick-list {
					padding: 0 30px !important;
				}
			}
			',
			$uniqid,
			intval( get_theme_mod( 'layout_site_width', '1240px' ) ) + 200,
			intval( get_theme_mod( 'layout_site_width', '1240px' ) ) + 79,
			intval( get_theme_mod( 'layout_site_width', '1240px' ) )
		);

	}
	public function dahz_framework_category_showcase_style( $vc_style, $attr_array, $dahz_id ) {
		extract( $attr_array );

		if ( !empty( $hover_text_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-category-showcase .de-sc-product-categories__item:hover .de-sc-product-categories__item-detail {
					color: %2$s !important;
				}
				',
				$dahz_id, # 1
				$hover_text_color # 2
			);
		}

		if ( !empty( $hover_color_overlay ) ) {
			if ( !empty( $enable_gradient ) ) {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					[data-dahz-shortcode-key="%1$s"] .de-sc-category-showcase .uk-overlay {
						background: linear-gradient(%2$s, %3$s, %4$s);
					}
					',
					$dahz_id, # 1
					$gradient_direction, # 2
					$hover_color_overlay, # 3
					$hover_color_overlay_2 # 4
				);
			} else {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					[data-dahz-shortcode-key="%1$s"] .de-sc-category-showcase .uk-overlay {
						background: %2$s;
					}
					',
					$dahz_id, # 1
					$hover_color_overlay # 2
				);
			}

			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-category-showcase .de-sc-product-categories__item:hover .de-sc-product-categories__item-detail {
					background-color: transparent !important;
				}
				',
				$dahz_id # 1
			);
		}
	}
	public function cascading_image_css( $vc_style, $attr_array, $dahz_id ) {
		$uniqid = $dahz_id;
		$atts = vc_param_group_parse_atts( $attr_array['values']);

		$transform_arr = array(0);

		foreach ( $atts as $index => $value ) {
			if ( !empty( $value['offset_x'] ) && $value['offset_x'] != 0 ) $transform_arr[] = intval($value['offset_x']);
			if ( !empty( $value['offset_y'] ) && $value['offset_y'] != 0 ) $transform_arr[] = intval($value['offset_y']);

		}
		$transform_arr = max($transform_arr);

		switch($transform_arr) {
			case $transform_arr <= 10:
				$divider = 1;
				break;
			case $transform_arr <= 20:
				$divider = 1.2;
				break;
			case $transform_arr <= 30:
				$divider = 1.4;
				break;
			case $transform_arr <= 40:
				$divider = 1.6;
				break;
			case $transform_arr <= 50:
				$divider = 1.85;
				break;
			case $transform_arr <= 60:
				$divider = 2.1;
				break;
			case $transform_arr <= 70:
				$divider = 2.3;
				break;
			case $transform_arr <= 80:
				$divider = 2.55;
				break;
			case $transform_arr <= 90:
				$divider = 2.7;
				break;
			case $transform_arr < 100:
				$divider = 2.85;
				break;
			default:
				$divider = 2.85;

		}

		$transform_arr = floor($transform_arr/$divider);
		$count         = 0;
		// die();
		foreach ( $atts as $index => $value ) {

			$bg_color                   = !empty( $value['layer_bg_color'] ) ? $value['layer_bg_color'] : '';
			$offset_x                   = isset( $value['offset_x'] ) ? $value['offset_x'] : '';
			$offset_y                   = isset( $value['offset_y'] ) ? $value['offset_y'] : '';
			$animation                  = isset( $value['animation'] ) ? $value['animation'] : '';
			$time_between_animation     = !empty( $attr_array['delay_line_animation'] ) ? $attr_array['delay_line_animation'] : 200;
			$time_delay                 = $time_between_animation * $index;

			$count++;



			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf('
			[data-dahz-shortcode-key="%1$s"] .de-sc-cascading-image #%2$s.de-sc-cascading-image__item {
				animation-delay: %6$sms;
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-cascading-image #%2$s.de-sc-cascading-image__item .de-sc-cascading-image__img-wrap {
				-webkit-transform: translate( %4$s, %5$s );
				-ms-transform: translate( %4$s, %5$s );
				transform: translate( %4$s, %5$s );
			}
			',
			esc_attr( $uniqid ), // 1
			'cscd-item-' . $uniqid . '--' . $count, // 2
			!empty( $bg_color ) ? esc_attr( $bg_color ) : 'transparent', // 3
			esc_attr( $offset_x ), // 4
			esc_attr( $offset_y ), // 5
			// esc_attr( $transform_arr ), // 6
			esc_attr( $time_delay ) // 7
			);

		}

	}
	public function dahz_framework_testimonials_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );

		switch ( $quote_inherit_font ) {
			case 'primary':

				$font_array = get_theme_mod('typography_main_font');
				$font_family = $font_array['font-family'];
				break;
			case 'secondary':

				$font_array = get_theme_mod('typography_secondary_font');
				$font_family = $font_array['font-family'];
				break;
		}


		if ( !empty( $dot_color ) ) {

			if ( substr( $dot_color, 0, 4) === 'rgba' ) {

				$handled_dot_color = substr( $dot_color, 0, -3 ) . '2)';
				$handled_dot_color_hover = substr( $dot_color, 0, -3 ) . '3)';
				$handled_dot_color_active = substr( $dot_color, 0, -3 ) . '6)';

			} else if ( substr( $dot_color, 0, 4) === 'rgb(' ) {

				$handled_dot_color =  'rgba(' . substr( $dot_color, 4, -1 ) . ',0.2)';
				$handled_dot_color_hover =  'rgba(' . substr( $dot_color, 4, -1 ) . ',0.3)';
				$handled_dot_color_active =  'rgba(' . substr( $dot_color, 4, -1 ) . ',0.6)';

			} else {

				$default = 'rgb(0,0,0)';

				//Return default if no color provided
				if (empty($dot_color))
					  return $default;

				//Sanitize $color if "#" is provided
					if ($dot_color[0] == '#' ) {
						$dot_color = substr( $dot_color, 1 );
					}

					//Check if color has 6 or 3 characters and get values
					if (strlen($dot_color) == 6) {
							$hex = array( $dot_color[0] . $dot_color[1], $dot_color[2] . $dot_color[3], $dot_color[4] . $dot_color[5] );
					} elseif ( strlen( $dot_color ) == 3 ) {
							$hex = array( $dot_color[0] . $dot_color[0], $dot_color[1] . $dot_color[1], $dot_color[2] . $dot_color[2] );
					} else {
							return $default;

					}

					//Convert hexadec to rgb
					$rgb =  array_map('hexdec', $hex);

					$handled_dot_color = 'rgba(' . implode( "," , $rgb ) . ', 0.2)';
					$handled_dot_color_hover = 'rgba(' . implode( "," , $rgb ) . ', 0.3)';
					$handled_dot_color_active = 'rgba(' . implode( "," , $rgb ) . ', 0.6)';

			}

		}

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials .de-sc-testimonials__quote-icon {
				%2$s
				%10$s
				%11$s
				%12$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials .de-sc-testimonials__item * {
				%9$s
			}


			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials--style-4 .de-sc-testimonials__item > a {
				%22$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials--style-4 .de-sc-testimonials__item.uk-active > a {
				%3$s
				%4$s
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials .de-sc-testimonials__content,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials .star-rating:before {
				 %2$s
				 %10$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials .de-sc-testimonials__name h5 {
				%5$s
				%13$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials .de-sc-testimonials__name h5:hover {
				%6$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials .de-sc-testimonials__ratings .star-rating span:before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials .de-sc-testimonials__ratings .star-rating,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials .de-sc-testimonials__ratings .quantity .plus, .quantity .minus,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials .de-sc-testimonials__ratings p.stars a:hover:after, p.stars a:after,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials .de-sc-testimonials__ratings .star-rating span:before {
				%7$s
				%15$s
				%20$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials .star-rating:before {
				%15$s
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials .de-sc-testimonials__role {
				%8$s
				%14$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials--style-3 .de-sc-testimonials__item.uk-active .de-sc-testimonials__item__bubble__content {
				%4$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials--style-3 .de-sc-testimonials__item.uk-active .de-sc-testimonials__item__bubble:after {
				%19$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .de-sc-testimonials__item .de-sc-testimonials__item__bubble__content,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .de-sc-testimonials__item .de-sc-testimonials__name h5,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .de-sc-testimonials__item .de-sc-testimonials__content,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .de-sc-testimonials__ratings .star-rating:before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .de-sc-testimonials__ratings .star-rating span:before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .de-sc-testimonials__ratings .star-rating,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .de-sc-testimonials__ratings .quantity .plus, .quantity .minus,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .de-sc-testimonials__ratings p.stars a:hover:after, p.stars a:after,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .de-sc-testimonials__ratings .star-rating span:before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .de-sc-testimonials__role,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .de-sc-testimonials__item .de-sc-testimonials__name h5,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .de-sc-testimonials__item .de-sc-testimonials__content,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .de-sc-testimonials__ratings .star-rating:before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .de-sc-testimonials__ratings .star-rating span:before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .de-sc-testimonials__ratings .star-rating,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .de-sc-testimonials__ratings .quantity .plus, .quantity .minus,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .de-sc-testimonials__ratings p.stars a:hover:after, p.stars a:after,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .de-sc-testimonials__ratings .star-rating span:before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .de-sc-testimonials__role {
				%21$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .uk-active .de-sc-testimonials__ratings .star-rating span:before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .uk-active .de-sc-testimonials__ratings .star-rating span:before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .uk-active .de-sc-testimonials__ratings .star-rating,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .uk-active .de-sc-testimonials__ratings .quantity .plus, .quantity .minus,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .uk-active .de-sc-testimonials__ratings p.stars a:hover:after, p.stars a:after,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .uk-active .de-sc-testimonials__ratings .star-rating span:before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .uk-active .de-sc-testimonials__ratings .star-rating span:before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .uk-active .de-sc-testimonials__ratings .star-rating span:before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .uk-active .de-sc-testimonials__ratings .star-rating,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .uk-active.de-sc-testimonials__item .star-rating:before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .uk-active .de-sc-testimonials__ratings .quantity .plus, .quantity .minus,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .uk-active .de-sc-testimonials__ratings p.stars a:hover:after, p.stars a:after,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .uk-active .de-sc-testimonials__ratings .star-rating span:before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .uk-active.de-sc-testimonials__item .star-rating:before {
				%7$s
				%15$s
				%20$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .uk-active.de-sc-testimonials__item .de-sc-testimonials__name h5,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .uk-active.de-sc-testimonials__item .de-sc-testimonials__name h5 {
				%5$s
				%13$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .uk-active.de-sc-testimonials__item .de-sc-testimonials__name h5:hover,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .uk-active.de-sc-testimonials__item .de-sc-testimonials__name h5:hover {
				%6$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .uk-active.de-sc-testimonials__item .de-sc-testimonials__role,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .uk-active.de-sc-testimonials__item .de-sc-testimonials__role {
				%8$s
				%14$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-3 .uk-active.de-sc-testimonials__item .de-sc-testimonials__content,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .uk-active.de-sc-testimonials__item .de-sc-testimonials__content{
				 %2$s
			}

			[data-dahz-shortcode-key="%1$s"] .uk-dotnav > * > * {
				%16$s
			}
			[data-dahz-shortcode-key="%1$s"] .uk-dotnav > * > :hover,
			[data-dahz-shortcode-key="%1$s"] .uk-dotnav > * > :focus,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .uk-dotnav > * > :hover,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .uk-dotnav > * > :focus {
				%17$s
			}
			[data-dahz-shortcode-key="%1$s"] .uk-dotnav > .uk-active > *,
			[data-dahz-shortcode-key="%1$s"] .de-sc-testimonials.de-sc-testimonials--style-4 .uk-dotnav > .uk-active > * {
				%18$s
			}
			',
			/* 1 */  esc_attr( $dahz_id ),
			/* 2 */  !empty( $quote_color ) ? 'color:' . $quote_color . ';' : '',
			/* 3 */  !empty( $border_color ) ? 'border:1px solid ' . $border_color . ';' : '',
			/* 4 */  !empty( $background_color ) ? 'background-color:' . $background_color . ';' : '',
			/* 5 */  !empty( $name_color ) ? 'color:' . $name_color . ';' : '',
			/* 6 */  !empty( $name_hover_color ) ? 'color:' . $name_hover_color . ';' : '',
			/* 7 */  !empty( $rating_color ) ? 'color:' . $rating_color . ';' : '',
			/* 8 */  !empty( $role_color ) ? 'color:' . $role_color . ';' : '',
			/* 9 */  !empty( $custom_font_size ) ? 'font-family:' . esc_attr( $font_family ) . ';' : '',
			/* 10 */ !empty( $custom_font_size ) && !empty( $quote_font_size ) ? is_numeric( $quote_font_size ) ? 'font-size:' . esc_attr( $quote_font_size ) . 'px;' : 'font-size:' . $quote_font_size . ';' : '',
			/* 11 */ !empty( $custom_font_size ) && !empty( $quote_line_height ) ? 'line-height:' . esc_attr( $quote_line_height ) : '',
			/* 12 */ !empty( $custom_font_size ) && !empty( $quote_letter_spacing ) ? is_numeric( $quote_letter_spacing ) ? 'letter-spacing:' . esc_attr( $quote_letter_spacing ) . 'px;' : 'letter-spacing:' . $quote_letter_spacing . ';' : '',
			/* 13 */ !empty( $custom_font_size ) && !empty( $name_font_size ) ? is_numeric( $name_font_size ) ? 'font-size:' . esc_attr( $name_font_size ) . 'px;' : 'font-size:' . $name_font_size . ';' : '',
			/* 14 */ !empty( $custom_font_size ) && !empty( $role_font_size ) ? is_numeric( $role_font_size ) ? 'font-size:' . esc_attr( $role_font_size ) . 'px;' : 'font-size:' . $role_font_size . ';' : '',
			/* 15 */ !empty( $custom_font_size ) && !empty( $rating_icon_size ) ? is_numeric( $rating_icon_size ) ? 'font-size:' . esc_attr( $rating_icon_size ) . 'px;' : 'font-size:' . $rating_icon_size . ';' : '',
			/* 16 */ !empty( $dot_color ) ? 'background:' . esc_attr( $handled_dot_color ) . ';' : '',
			/* 17 */ !empty( $dot_color ) ? 'background:' . esc_attr( $handled_dot_color_hover ) . ';' : '',
			/* 18 */ !empty( $dot_color ) ? 'background:' . esc_attr( $handled_dot_color_active ) . ';' : '',
			/* 19 */ !empty( $background_color ) ? 'border-color:' . esc_attr( $background_color ) . ' transparent transparent;' : '',
			/* 20 */ !empty( $custom_font_size ) && !empty( $rating_icon_size ) ? is_numeric( $rating_icon_size ) ? 'height:' . esc_attr( $rating_icon_size ) . 'px;' : 'height:' . $rating_icon_size . ';' : '',
			/* 21 */ !empty( $inactive_color ) ? 'color:' . $inactive_color . ';' : '',
			/* 22 */ !empty( $inactive_color ) ? 'border: 1px solid ' . $inactive_color . ';' : ''
		);

	}
	public function flip_box_css( $vc_style, $attr_array, $dahz_id ) {

		$uniqid 	= $dahz_id;

		extract( $attr_array );

		$fb_icon_size 			 = !empty( $fb_icon_size ) ? $fb_icon_size : '';
		$fb_icon_color 			 = !empty( $fb_icon_color ) ? $fb_icon_color : '';
		$fb_bg_color 			 = !empty( $fb_bg_color ) ? $fb_bg_color : '';
		$bb_bg_color 			 = !empty( $bb_bg_color ) ? $bb_bg_color : '';

		$fb_icon_color = !empty( $enable_gradient_icon ) ? sprintf( 'background: linear-gradient(%1$s, %2$s 0%%, %3$s 100%%);background: -webkit-linear-gradient(%1$s, %2$s 0%, %3$s 100%%);background: -o-linear-gradient(%1$s, %2$s 0%, %3$s 100%%);-webkit-background-clip: text; -webkit-text-fill-color: transparent;display: initial;', $gradient_direction, !empty( $fb_icon_color ) ? $fb_icon_color : '#ffffff', !empty( $fb_icon_color_2 ) ? $fb_icon_color_2 : '#ffffff') : '';
		$fb_icon_color = !empty( $fb_icon_color ) ? $fb_icon_color : '';
		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf('
			[data-dahz-shortcode-key="%1$s"] .de-sc-flip-box .de-sc-flip-box__front-side i,
			[data-dahz-shortcode-key="%1$s"] .de-sc-flip-box .de-sc-flip-box__front-side i:before {
				%2$s
				%3$s
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-flip-box .de-sc-flip-box__front-side * {
				%4$s
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-flip-box .de-sc-flip-box__back-side * {
				%5$s
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-flip-box .de-sc-flip-box__front-side[data-is-bg-overlay="true"]:before {
				%6$s

			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-flip-box .de-sc-flip-box__back-side[data-is-bg-overlay="true"]:before {
				%7$s
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-flip-box .de-sc-flip-box__front-side,
			[data-dahz-shortcode-key="%1$s"] .de-sc-flip-box .de-sc-flip-box__back-side {
				%8$s
			}

			@media only screen and (max-width: 960px) {
				[data-dahz-shortcode-key="%1$s"] .de-sc-flip-box .de-sc-flip-box__front-side,
				[data-dahz-shortcode-key="%1$s"] .de-sc-flip-box .de-sc-flip-box__back-side {
					%9$s
				}
			}

			',
			$uniqid, // 1
			!empty( $fb_icon_size ) && $icon_source === 'icon' ? 'font-size:' . esc_attr( $fb_icon_size ) . 'px;' : 'font-size:60px;', // 2
			!empty( $fb_icon_color ) && $icon_source === 'icon' ? esc_attr( $fb_icon_color ) : '' , // 3
			!empty( $fb_text_color ) ? 'color:' . esc_attr( $fb_text_color ) . ';' : 'color:inherit;', // 4
			!empty( $bb_text_color ) ? 'color:' . esc_attr( $bb_text_color ) . ';' : 'color:inherit;', // 5
			!empty( $fb_bg_color ) ? 'background-color:' . esc_attr( $fb_bg_color ) . ';' : 'background-color:none;', // 6
			!empty( $bb_bg_color ) ? 'background-color:' . esc_attr( $bb_bg_color ) . ';' : 'background-color:none;', // 7
			!empty( $min_height ) ? 'min-height:' . esc_attr( $min_height ) . 'px;' : '0', // 8
			!empty( $min_height_mobile ) ? 'min-height:' . esc_attr( $min_height_mobile ) . 'px;' : 'min-height:0;' // 9
		);

	}
	public function add_to_cart_custom_css( $vc_style, $attr_array, $key ) {

		extract( $attr_array );

		switch ($button_style) {
			case 'de-btn de-btn--boxed de-btn--fill':
				if ( $custom_button_color_fill ) {
					DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
						'
						[data-dahz-shortcode-key="%1$s"] .de-sc-add-to-cart-custom .de-btn--fill {
							background-color: %2$s;
							color: %3$s;
							border-radius: %6$s;
						}
						[data-dahz-shortcode-key="%1$s"] .de-sc-add-to-cart-custom .de-btn--fill:hover::after {
							background-color: %4$s;
						}
						[data-dahz-shortcode-key="%1$s"] .de-sc-add-to-cart-custom .de-btn--fill:hover {
							color: %5$s;
						}
						',
						$key, // 1
						dahz_framework_sc_check_param_value( $fill_bg_color, '#333' ), // 2
						dahz_framework_sc_check_param_value( $fill_text_color, '#fff' ), // 3
						dahz_framework_sc_check_param_value( $fill_hover_bg_color, '#999' ), // 4
						dahz_framework_sc_check_param_value( $fill_hover_text_color, '#fff' ), // 5
						dahz_framework_sc_check_param_value( $fill_button_radius, '0' ) // 6
					);
				}
				break;
			case 'de-btn de-btn--boxed de-btn--outline':
				if ( $custom_button_color_outline ) {
					DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
						'
						[data-dahz-shortcode-key="%1$s"] .de-sc-add-to-cart-custom .de-btn--outline {
							color: %3$s;
							border-color: %2$s;
							border-radius: %6$s;
						}
						[data-dahz-shortcode-key="%1$s"] .de-sc-add-to-cart-custom .de-btn--outline:hover::after {
							background-color: %4$s;
						}
						[data-dahz-shortcode-key="%1$s"] .de-sc-add-to-cart-custom .de-btn--outline:hover {
							border-color: %4$s;
							color: %5$s;
						}
						',
						$key, // 1
						dahz_framework_sc_check_param_value( $outline_bg_color, '#333' ), // 2
						dahz_framework_sc_check_param_value( $outline_text_color, '#333' ), // 3
						dahz_framework_sc_check_param_value( $outline_hover_bg_color, '#999' ), // 4
						dahz_framework_sc_check_param_value( $outline_hover_text_color, '#fff' ), // 5
						dahz_framework_sc_check_param_value( $outline_button_radius, '0' ) // 6
					);
				}
				break;
			default:
				if ( $custom_button_color_text ) {
					DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
						'
						[data-dahz-shortcode-key="%1$s"] .de-sc-add-to-cart-custom .de-btn--text {
							color: %2$s;
						}
						[data-dahz-shortcode-key="%1$s"] .de-sc-add-to-cart-custom .de-btn--text:hover {
							color: %3$s;
						}
						',
						$key, // 1
						dahz_framework_sc_check_param_value( !empty( $text_text_color ) ? $text_text_color : '', '#fff' ), // 2
						dahz_framework_sc_check_param_value( $text_hover_text_color, '#fff' ) // 3
					);
				}
				break;
		}

	}

	public function dahz_framework_social_media_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'
			[data-dahz-shortcode-key="%1$s"] .de-sc-social-media i {
				color: %2$s;
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-social-media--outline a .de-social-media__inner-wrap {
				border-color: %2$s;
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-social-media a.de-sc-social-media__icon:hover i {
				color: %3$s;
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-social-media--outline a:hover .de-social-media__inner-wrap {
				border-color: %3$s;
			}
			',
			/* 1 - DAHZ ID */ 			$dahz_id,
			/* 2 - ICON COLOR */ 		$default_color,
			/* 3 - ICON HOVER COLOR */ 	$hover_color
		);
	}
	public function scroll_to_css( $vc_style, $attr_array, $key ) {

		extract( $attr_array );

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'
			[data-dahz-shortcode-key="%1$s"] .de-sc-scroll-to li a::after {
				border-color: %2$s;
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-scroll-to li.active a::after {
				border-color: %3$s;
			}
			',
			$key, // 1
			!empty( $scroll_color_dots ) ? $scroll_color_dots : '#999', // 2
			!empty( $scroll_color_dots_active ) ? $scroll_color_dots_active : '#333' // 3
		);

	}
	public function dahz_framework_dahz_product_page_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );

		switch ( $product_color_scheme ) {
			case 'light':

				$product_color_scheme = get_theme_mod('header_transparent_light_color');
				break;
			case 'dark':

				$product_color_scheme = get_theme_mod('header_transparent_dark_color');
				break;
		}

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'

			[data-dahz-shortcode-key="%1$s"],
			[data-dahz-shortcode-key="%1$s"] a {
				%10$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-product-single__wrapper .woocommerce-breadcrumb {
				%2$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-product-single__navigation-control__post {
				%3$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-tabs .description {
				%4$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-tabs .additional_information {
				%5$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-tabs .review {
				%6$s
			}

			[data-dahz-shortcode-key="%1$s"] .related.products {
				%7$s
			}

			[data-dahz-shortcode-key="%1$s"] .upsells.products {
				%8$s
			}

			',
			esc_attr( $dahz_id ), // 1
			!empty( $disable_breadcrumbs ) ? 'display:none' : '', // 2
			!empty( $disable_product_nav ) ? 'display:none' : '', // 3
			!empty( $disable_description_tab ) ? 'display:none' : '', // 4
			!empty( $disable_additional_information_tab ) ? 'display:none' : '', // 5
			!empty( $disable_review_tab ) ? 'display:none' : '', // 6
			!empty( $disable_related_tab ) ? 'display:none' : '', // 7
			!empty( $disable_upsells_products ) ? 'display:none' : '', // 8
			!empty( $disable_recently_view_products ) ? 'display:none' : '', // 9
			!empty( $product_color_scheme ) ? 'color:' . $product_color_scheme : '' // 10

		);
	}
	public function dahz_framework_dahz_order_tracking_form_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );

		switch ($color_scheme) {
			case 'light':

				$color_scheme = get_theme_mod('header_transparent_light_color');
				break;
			case 'dark':

				$color_scheme = get_theme_mod('header_transparent_dark_color');
				break;
		}

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'
			[data-dahz-shortcode-key="%1$s"] form.track_order,
			[data-dahz-shortcode-key="%1$s"] form.track_order label,
			[data-dahz-shortcode-key="%1$s"] form.track_order input {
				%2$s
				%3$s
			}

			',
			esc_attr( $dahz_id ),
			!empty( $color_scheme ) ? 'color:' . $color_scheme . ';' : '',
			!empty( $color_scheme ) ? 'border-color:' . $color_scheme . ';' : ''
		);
	}
	public function dahz_framework_product_categories_style( $vc_style, $attr_array, $dahz_id ) {
		extract( $attr_array );

		if ( !empty( $hover_text_color ) && empty( $product_color_scheme ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-product-categories__item:hover .de-sc-product-categories__item-detail {
					color: %2$s !important;
				}
				',
				$dahz_id, # 1
				$hover_text_color # 2
			);
		}

		if ( !empty( $hover_color_overlay ) ) {
			if ( !empty( $enable_gradient ) ) {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					[data-dahz-shortcode-key="%1$s"] .de-sc-product-categories__item .uk-overlay {
						background: linear-gradient(%2$s, %3$s, %4$s);
					}
					',
					$dahz_id, # 1
					$gradient_direction, # 2
					$hover_color_overlay, # 3
					$hover_color_overlay_2 # 4
				);
			} else {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					[data-dahz-shortcode-key="%1$s"] .de-sc-product-categories__item .uk-overlay {
						background-color: %2$s;
					}
					',
					$dahz_id, # 1
					$hover_color_overlay # 2
				);
			}
		}

	}
	public function dahz_framework_divider_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );
		
		$delay_line_animation = $delay_line_animation == 'none' ? 0 : $delay_line_animation;
		
		if( !empty( $enable_gradient ) ){
			
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-divider {
					background:-moz-linear-gradient( %2$s, %3$s 0%%, %4$s 100%% );
				}
				[data-dahz-shortcode-key="%1$s"] .de-divider {
					background:-webkit-gradient( %2$s, left bottom, color-stop( 0%%, %3$s ), color-stop( 100%%, %4$s ) );
				}
				[data-dahz-shortcode-key="%1$s"] .de-divider {
					background: -webkit-linear-gradient( %2$s, %3$s 0%%, %4$s 100%% );
				}
				[data-dahz-shortcode-key="%1$s"] .de-divider {
					background: -o-linear-gradient( %2$s, %3$s 0%%, %4$s 100%% );
				}
				[data-dahz-shortcode-key="%1$s"] .de-divider {
					background: -ms-linear-gradient( %2$s, %3$s 0%%, %4$s 100%% );
				}
				[data-dahz-shortcode-key="%1$s"] .de-divider {
					background: linear-gradient( %2$s, %3$s 0%%, %4$s 100%% );
				}
				',
				$dahz_id,
				$gradient_direction,
				! empty( $line_color ) ? $line_color : '#ffffff',
				! empty( $line_color_2 ) ? $line_color_2 : '#ffffff'
			);
			
		}
				
		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'
			@keyframes slideInFromLeft {
				0%% {
					max-width: 0;
				}
				100%% {
					max-width:%2$s;
				}
			}
			[data-dahz-shortcode-key="%1$s"] .de-divider {
				height:%3$s;%4$s%5$s%6$s
			}
			',
			$dahz_id,
			$line_type === 'small' && !empty( $custom_line_width ) ? $custom_line_width . 'px' : '200px',
			$line_thickness,
			$line_type === 'small' && !empty( $custom_line_width ) ? 'width:' . $custom_line_width . 'px;' : '',
			!empty( $line_color ) && empty( $enable_gradient ) ? 'background-color:' . $line_color . ';' : '',
			!empty( $enable_animate ) ? 'animation: slideInFromLeft ' . $delay_line_animation . 'ms;' : ''
		);
		
	}
	public function dahz_framework_banner_image_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );
		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'
			[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image > a .de-sc-banner-image__description {
				transition:.3s;
			}
			',
			$dahz_id,
			$hover_description_color
		);
		if( ! ( empty( $hover_description_color ) ) ){
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image > a:hover .de-sc-banner-image__description {
					color:%2$s!important;
				}
				
				',
				$dahz_id,
				$hover_description_color
			);
		}
		if( ! ( empty( $button_color ) ) ){
			
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image__content-wrap .uk-button.uk-button-text {
					color:%2$s!important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image__content-wrap .uk-button-text::before{
					border-bottom:1px solid %2$s;
				}
				',
				$dahz_id,
				$button_color
			);
		}
		if( ! ( empty( $button_hover_color ) ) ){
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image__content-wrap .uk-button.uk-button-text:focus,
				[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image__content-wrap .uk-button.uk-button-text:hover {
					color:%2$s!important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image__content-wrap .uk-button-text:hover::before,
				[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image__content-wrap .uk-button-text:focus::before{
					border-bottom:1px solid %2$s;
				}
				',
				$dahz_id,
				$button_hover_color
			);
		}
		if( ! ( empty( $hover_description_background_color ) ) ){
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image > a:hover .de-sc-banner-image__description {
					background-color:%2$s!important;
				}
				',
				$dahz_id,
				$hover_description_background_color
			);
		}
		# Min height
		if ( !empty( $mobile_min_height ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				@media (max-width: 959px) {
					[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image {
						min-height: %2$s;
					}
				}
				',
				$dahz_id, # 1
				is_numeric( $mobile_min_height ) ? "{$mobile_min_height}px" : $mobile_min_height # 2
			);
		}

		# Decode typography
		$typo_responsive = json_decode( urldecode( $custom_title_responsive_size ) );

		if ( !empty( $typo_responsive ) ) {
			# XS font size
			if ( !empty( $typo_responsive->xs_font_size ) ) {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					@media (max-width: 639px) {
						[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image__title {
							font-size: %2$s !important;
						}
					}
					',
					$dahz_id, # 1
					is_numeric( $typo_responsive->xs_font_size ) ? sprintf( '%spx', $typo_responsive->xs_font_size ) : $typo_responsive->xs_font_size # 2
				);
			}
			# XS line height
			if ( !empty( $typo_responsive->xs_line_height ) ) {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					@media (max-width: 639px) {
						[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image__title {
							line-height: %2$s !important;
						}
					}
					',
					$dahz_id, # 1
					$typo_responsive->xs_line_height # 2
				);
			}
			# S font size
			if ( !empty( $typo_responsive->s_font_size ) ) {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					@media (min-width: 640px) and (max-width: 959px) {
						[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image__title {
							font-size: %2$s !important;
						}
					}
					',
					$dahz_id, # 1
					is_numeric( $typo_responsive->s_font_size ) ? sprintf( '%spx', $typo_responsive->s_font_size ) : $typo_responsive->s_font_size # 2
				);
			}
			# S line height
			if ( !empty( $typo_responsive->s_line_height ) ) {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					@media (min-width: 640px) and (max-width: 959px) {
						[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image__title {
							line-height: %2$s !important;
						}
					}
					',
					$dahz_id, # 1
					$typo_responsive->s_line_height # 2
				);
			}
			# M font size
			if ( !empty( $typo_responsive->m_font_size ) ) {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					@media (min-width: 960px) and (max-width: 1199px) {
						[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image__title {
							font-size: %2$s !important;
						}
					}
					',
					$dahz_id, # 1
					is_numeric( $typo_responsive->m_font_size ) ? sprintf( '%spx', $typo_responsive->m_font_size ) : $typo_responsive->m_font_size # 2
				);
			}
			# M line height
			if ( !empty( $typo_responsive->m_line_height ) ) {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					@media (min-width: 960px) and (max-width: 1199px) {
						[data-dahz-shortcode-key="%1$s"] .de-sc-banner-image__title {
							line-height: %2$s !important;
						}
					}
					',
					$dahz_id, # 1
					$typo_responsive->m_line_height # 2
				);
			}
		}
	}
	public function dahz_framework_banner_button_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );

		# Decode button
		$buttons_decode  = json_decode( urldecode( $buttons ) );

		# Decode typography
		$typo_responsive = json_decode( urldecode( $custom_title_responsive_size ) );

		# Min height
		if ( !empty( $mobile_min_height ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				@media (max-width: 959px) {
					[data-dahz-shortcode-key="%1$s"] .de-sc-banner-button {
						min-height: %2$s;
					}
				}
				',
				$dahz_id, # 1
				is_numeric( $mobile_min_height ) ? "{$mobile_min_height}px" : $mobile_min_height # 2
			);
		}

		if ( !empty( $typo_responsive ) ) {
			# XS font size
			if ( !empty( $typo_responsive->xs_font_size ) ) {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					@media (max-width: 639px) {
						[data-dahz-shortcode-key="%1$s"] .de-sc-banner-button__title {
							font-size: %2$s !important;
						}
					}
					',
					$dahz_id, # 1
					is_numeric( $typo_responsive->xs_font_size ) ? sprintf( '%spx', $typo_responsive->xs_font_size ) : $typo_responsive->xs_font_size # 2
				);
			}
			# XS line height
			if ( !empty( $typo_responsive->xs_line_height ) ) {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					@media (max-width: 639px) {
						[data-dahz-shortcode-key="%1$s"] .de-sc-banner-button__title {
							line-height: %2$s !important;
						}
					}
					',
					$dahz_id, # 1
					$typo_responsive->xs_line_height # 2
				);
			}
			# S font size
			if ( !empty( $typo_responsive->s_font_size ) ) {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					@media (min-width: 640px) and (max-width: 959px) {
						[data-dahz-shortcode-key="%1$s"] .de-sc-banner-button__title {
							font-size: %2$s !important;
						}
					}
					',
					$dahz_id, # 1
					is_numeric( $typo_responsive->s_font_size ) ? sprintf( '%spx', $typo_responsive->s_font_size ) : $typo_responsive->s_font_size # 2
				);
			}
			# S line height
			if ( !empty( $typo_responsive->s_line_height ) ) {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					@media (min-width: 640px) and (max-width: 959px) {
						[data-dahz-shortcode-key="%1$s"] .de-sc-banner-button__title {
							line-height: %2$s !important;
						}
					}
					',
					$dahz_id, # 1
					$typo_responsive->s_line_height # 2
				);
			}
			# M font size
			if ( !empty( $typo_responsive->m_font_size ) ) {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					@media (min-width: 960px) and (max-width: 1199px) {
						[data-dahz-shortcode-key="%1$s"] .de-sc-banner-button__title {
							font-size: %2$s !important;
						}
					}
					',
					$dahz_id, # 1
					is_numeric( $typo_responsive->m_font_size ) ? sprintf( '%spx', $typo_responsive->m_font_size ) : $typo_responsive->m_font_size # 2
				);
			}
			# M line height
			if ( !empty( $typo_responsive->m_line_height ) ) {
				DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
					'
					@media (min-width: 960px) and (max-width: 1199px) {
						[data-dahz-shortcode-key="%1$s"] .de-sc-banner-button__title {
							line-height: %2$s !important;
						}
					}
					',
					$dahz_id, # 1
					$typo_responsive->m_line_height # 2
				);
			}
		}
	}
	public function dahz_framework_banner_info_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );

		if ( !empty( $hover_text_color ) ) {

			$thin = "{$hover_text_color}";

			$thick = "{$hover_text_color}";

			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-banner-info .de-btn:hover {
					color: %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-banner-info .de-btn--underline-thin:hover {
					box-shadow: inset 0 -1px 1px -1px %3$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-banner-info .de-btn--underline-thick:hover {
					box-shadow: inset 0 -8px 1px -1px %4$s !important;
				}
				',
				$dahz_id, # 1
				$hover_text_color, # 2
				$thin, # 3
				$thick # 4
			);
		}
	}
	public function dahz_framework_post_slider_style( $vc_style, $attr_array, $dahz_id ) {

		$uniqid 	= $dahz_id;
		
		extract( $attr_array );

		// Icon In Button

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'
			[data-dahz-shortcode-key="%1$s"] .de-sc-post-slider__item--meta a{
				color:%2$s;
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-post-slider__item--title a{
				color:%3$s;
			}
			[data-dahz-shortcode-key="%1$s"] .de-archive__featured-content{
				color:%4$s;
			}
			',
			$uniqid,
			!empty( $post_meta_color ) ? $post_meta_color : 'inherit',
			!empty( $title_color ) ? $title_color : 'inherit',
			!empty( $excerpt_color ) ? $excerpt_color : 'inherit'
			
		);

	}
	public function dahz_framework_post_list_style( $vc_style, $attr_array, $dahz_id ) {

		$uniqid 	= $dahz_id;

		extract( $attr_array );

		// Icon In Button

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf('
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list[data-list-style="layout-1"] .entry-categories a {
					%2$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list[data-list-style="layout-1"] .de-sc-post-list__item:hover .entry-categories a {
					%7$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list .entry-meta,
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list .entry-meta a {
					%3$s
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list[data-list-style="layout-2"] .de-sc-post-list__meta ,
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list[data-list-style="layout-2"] .de-sc-post-list__meta div a ,
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list[data-list-style="layout-2"] .de-sc-post-list__meta span,
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list[data-list-style="layout-2"] .de-sc-post-list__meta span a {
					%3$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list[data-list-style="layout-2"] .de-sc-post-list__item:hover .de-sc-post-list__meta ,
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list[data-list-style="layout-2"] .de-sc-post-list__item:hover .de-sc-post-list__meta div a ,
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list[data-list-style="layout-2"] .de-sc-post-list__item:hover .de-sc-post-list__meta span,
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list[data-list-style="layout-2"] .de-sc-post-list__item:hover .de-sc-post-list__meta span a {
					%8$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list .de-sc-post-list__item:hover .entry-meta,
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list .de-sc-post-list__item:hover .entry-meta a {
					%8$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list .de-sc-post-list__item:hover h1 a,
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list .de-sc-post-list__item:hover h2 a,
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list .de-sc-post-list__item:hover h3 a,
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list .de-sc-post-list__item:hover h4 a,
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list .de-sc-post-list__item:hover h5 a,
				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list .de-sc-post-list__item:hover h6 a {
					%6$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list[data-list-style="layout-1"] .entry-meta > p {
					%4$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list[data-list-style="layout-1"] .de-sc-post-list__item:hover {
					%9$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-post-list[data-list-style="layout-2"] .de-sc-post-list__item:hover a.de-ratio::before {
					%10$s
				}

			',
			/* 1 */ $uniqid,
			/* 2 */ !empty( $category_color ) ? 'color:' . esc_attr( $category_color ) . ';' : '',
			/* 3 */ !empty( $post_meta_color ) ? 'color:' . esc_attr( $post_meta_color ) . ';' : '',
			/* 4 */ !empty( $excerpt_color ) ? 'color:' . esc_attr( $excerpt_color ) . ';' : '',
			/* 5 */ !empty( $hover_border_color ) ? 'border-color:' . esc_attr( $hover_border_color ) . ';' : '',
			/* 6 */ !empty( $hover_title_color ) ? 'color:' . esc_attr( $hover_title_color ) . '!important;' : '',
			/* 7 */ !empty( $hover_category_color ) ? 'color:' . esc_attr( $hover_category_color ) . ';' : '',
			/* 8 */ !empty( $hover_post_meta_color ) ? 'color:' . esc_attr( $hover_post_meta_color ) . ';' : '',
			/* 9 */ !empty( $hover_bg_color ) ? 'background-color:' . esc_attr( $hover_bg_color ) . ';' : '',
			/* 10 */ !empty( $background_overlay_color ) ? 'background-color:' . esc_attr( $background_overlay_color ) . ';' : ''
		);

	}

	public function dahz_framework_post_tabs_style( $vc_style, $attr_array, $dahz_id ) {

		$uniqid 	= $dahz_id;
		
		extract( $attr_array );

		// Icon In Button

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'
			[data-dahz-shortcode-key="%1$s"] .de-sc-post-slider__item--meta a{
				color:%2$s;
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-post-slider__item--title a{
				color:%3$s;
			}
			[data-dahz-shortcode-key="%1$s"] .de-archive__featured-content{
				color:%4$s;
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-post-tabs__filter a{
				color:%5$s;
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-post-tabs__filter a:hover,
			[data-dahz-shortcode-key="%1$s"] .de-sc-post-tabs__filter a:focus,
			[data-dahz-shortcode-key="%1$s"] .de-sc-post-tabs__filter li.uk-active a{
				color:%6$s;
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-post-tabs__filter a{
				padding: 0!important;
				background: none;
				position: relative;
				z-index: 0;
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-post-tabs__filter a::before{
				content: "";
				position: absolute;
				bottom: 0;
				left: 0;
				right: 100%%;
				z-index: -1;
				border-bottom: 1px solid %7$s;
				transition: right 0.3s ease-out;
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-post-tabs__filter a:hover::before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-post-tabs__filter a:focus::before,
			[data-dahz-shortcode-key="%1$s"] .de-sc-post-tabs__filter li.uk-active a::before{
				right: 0;
			}
			',
			$uniqid,
			!empty( $post_meta_color ) ? $post_meta_color : 'inherit',
			!empty( $title_color ) ? $title_color : 'inherit',
			!empty( $excerpt_color ) ? $excerpt_color : 'inherit',
			!empty( $inactive_color ) ? $inactive_color : 'inherit',
			!empty( $active_color ) ? $active_color : 'inherit',
			!empty( $active_border_color ) ? $active_border_color : 'inherit'
			
		);
		
	}

	public function dahz_framework_vc_gallery_style( $vc_style, $attr_array, $dahz_id ) {

		$uniqid 	= $dahz_id;

		extract( $attr_array );

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf('
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-2"] .de-sc-image-gallery__item::before,
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-3"] .de-sc-image-gallery__item::before {
						%2$s
					}
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-2"] .de-sc-image-gallery__item:hover::before,
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-3"] .de-sc-image-gallery__item:hover::before {
						%3$s
					}
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-2"] .de-sc-image-gallery__item .de-sc-image-gallery__item-caption h4,
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-2"] .de-sc-image-gallery__item .de-sc-image-gallery__item-caption p,
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-3"] .de-sc-image-gallery__item .de-sc-image-gallery__item-caption h4,
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-3"] .de-sc-image-gallery__item .de-sc-image-gallery__item-caption p {
						%4$s
					}
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-2"] .de-sc-image-gallery__item:hover .de-sc-image-gallery__item-caption h4,
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-2"] .de-sc-image-gallery__item:hover .de-sc-image-gallery__item-caption p,
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-3"] .de-sc-image-gallery__item:hover .de-sc-image-gallery__item-caption h4,
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-3"] .de-sc-image-gallery__item:hover .de-sc-image-gallery__item-caption p {
						%5$s
					}
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-2"] .de-sc-image-gallery__item .de-sc-image-gallery__item-caption {
						%6$s
					}
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-3"] .de-sc-image-gallery__item .de-sc-image-gallery__item-caption [data-uk-icon] {
						%7$s
					}
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-4"] .de-sc-image-gallery__item .de-sc-image-gallery__item-caption h4,
					[data-dahz-shortcode-key="%1$s"] .de-sc-image-gallery[data-hover-style="style-4"] .de-sc-image-gallery__item .de-sc-image-gallery__item-caption p {
						%4$s
					}
				',
				/* 1 - Dahz Id */ 				 $uniqid,
				/* 2 - Overlay Color */ 		 !empty( $overlay_color ) ? 'background-color:' . esc_attr( $overlay_color ) . ';' : '',
				/* 3 - Hover Overlay Color*/ 	 !empty( $hover_bg_color ) ? 'background-color:' . esc_attr( $hover_bg_color ) . ';' : '',
				/* 4 - Text Color */ 			 !empty( $text_color ) ? 'color:' . esc_attr( $text_color ) . ';' : '',
				/* 5 - Hover Text Color */ 		 !empty( $hover_text_color ) ? 'color:' . esc_attr( $hover_text_color ) . ';' : '',
				/* 6 - Frame Line Color*/ 		 !empty( $border_color ) ? 'border-color:' . esc_attr( $border_color ) . ';' : '',
				/* 7 - Color Arrow Icon COlor */ !empty( $arrow_color ) ? 'color:' . esc_attr( $arrow_color ) . ';' : ''
		);

	}
	public function dahz_framework_vc_custom_heading_style( $vc_style, $attr_array, $dahz_id ) {

		$uniqid 	= $dahz_id;

		extract( $attr_array );

		$parsed_custom_font_size = vc_param_group_parse_atts( $custom_font_size );

		// extract( $parsed_custom_font_size );

		if( $custom_responsive_size ) {

			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf('
				@media only screen and (max-width: 640px) {
					[data-dahz-shortcode-key="%1$s"].de-sc-heading > h1,
					[data-dahz-shortcode-key="%1$s"].de-sc-heading > h2,
					[data-dahz-shortcode-key="%1$s"].de-sc-heading > h3,
					[data-dahz-shortcode-key="%1$s"].de-sc-heading > h4,
					[data-dahz-shortcode-key="%1$s"].de-sc-heading > h5,
					[data-dahz-shortcode-key="%1$s"].de-sc-heading > h6,
					[data-dahz-shortcode-key="%1$s"].de-sc-heading > p,
					[data-dahz-shortcode-key="%1$s"].de-sc-heading > div {
						%2$s
						%3$s
					}
				}
				@media only screen and (max-width: 960px) {
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > h1,
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > h2,
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > h3,
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > h4,
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > h5,
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > h6,
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > p,
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > div {
						%4$s
						%5$s
					}
				}
				@media only screen and (max-width: 1200px) {
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > h1,
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > h2,
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > h3,
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > h4,
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > h5,
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > h6,
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > p,
					[data-dahz-shortcode-key="%1$s"] .de-sc-heading > div {
						%6$s
						%7$s
					}
				}
				',
				/* 1 - Dahz Id */ 			$uniqid,
				/* 2 - XS Font Size */ 	 	!empty( $parsed_custom_font_size['xs_font_size'] ) ? 'font-size:' . esc_attr( $parsed_custom_font_size['xs_font_size'] ) . ';' : '',
				/* 3 - XS Line Height */ 	!empty( $parsed_custom_font_size['xs_line_height'] ) ? 'line-height:' . esc_attr( $parsed_custom_font_size['xs_line_height'] ) . ';' : '',
				/* 4 - S Font Size */ 	 	!empty( $parsed_custom_font_size['s_font_size'] ) ? 'font-size:' . esc_attr( $parsed_custom_font_size['s_font_size'] ) . ';' : '',
				/* 5 - S Line Height */ 	!empty( $parsed_custom_font_size['s_line_height'] ) ? 'font-size:' . esc_attr( $parsed_custom_font_size['s_line_height'] ) . ';' : '',
				/* 6 - M Font Size */ 	 	!empty( $parsed_custom_font_size['m_font_size'] ) ? 'font-size:' . esc_attr( $parsed_custom_font_size['m_font_size'] ) . ';' : '',
				/* 7 - M Line Height */ 	!empty( $parsed_custom_font_size['m_line_height'] ) ? 'font-size:' . esc_attr( $parsed_custom_font_size['m_line_height'] ) . ';' : ''
			);
		}
	}

	public function dahz_framework_team_member_style( $vc_style, $attr_array, $dahz_id ) {

		$uniqid 	= $dahz_id;

		extract( $attr_array );

		$gradient_direction = !empty( $gradient_direction ) ? $gradient_direction : '0deg';

		$text_color         = !empty( $text_color ) ? $text_color : '' ;

		switch ( $gradient_direction ) {
			case 'left_to_right':
			$gradient_direction = '90deg';
			break;
			case 'left_top_to_right_bottom':
			$gradient_direction = '135deg';
			break;
			case 'left_bottom_to_right_top':
			$gradient_direction = '45deg';
			break;
			case 'top_to_bottom':
			$gradient_direction = 'to bottom';
			break;
		}

		// Text Color (get from header transparent style)
		$text_color = $text_color === 'light' ? dahz_framework_get_option( 'header_transparent_light_color', '#ffffff' ) : dahz_framework_get_option( 'header_transparent_dark_color', '#000000' );

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf('

			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--simple .de-sc-team-member__content .de-sc-team-member__image__content--name,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--simple .de-sc-team-member__content .de-sc-team-member__image__content--name a:link,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--simple .de-sc-team-member__content .de-sc-team-member__image__content--name a:visited {
				%2$s
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--simple .de-sc-team-member__content span.de-sc-team-member__content__socials .uk-icon-link:hover,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--simple .de-sc-team-member__content span.de-sc-team-member__content__socials .uk-icon-link:hover,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--simple .de-sc-team-member__content span.de-sc-team-member__content__socials a:link i:hover,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--simple .de-sc-team-member__content .de-sc-team-member__image__content--name:hover,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--simple .de-sc-team-member__content .de-sc-team-member__image__content--name a:hover {
				%3$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_centered_text .de-sc-team-member__content .de-sc-team-member__image__content--name,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_centered_text .de-sc-team-member__content .de-sc-team-member__image__content--name a,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_centered_text .de-sc-team-member__content p.de-sc-team-member__content__description__job-position,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_centered_text .de-sc-team-member__content p.de-sc-team-member__content__description__about,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_centered_text .de-sc-team-member__content span.de-sc-team-member__content__socials .uk-icon-link,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_centered_text .de-sc-team-member__content span.de-sc-team-member__content__socials .uk-icon-link:active,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_centered_text:hover .de-sc-team-member__content .de-sc-team-member__image__content--name,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_centered_text:hover .de-sc-team-member__content .de-sc-team-member__image__content--name a,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_centered_text:hover .de-sc-team-member__content p.de-sc-team-member__content__description__job-position,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_centered_text:hover .de-sc-team-member__content p.de-sc-team-member__content__description__about,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_centered_text:hover .de-sc-team-member__content span.de-sc-team-member__content__socials a:link i {
				%7$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_centered_text:hover .de-sc-team-member__image:before {
				background: -moz-linear-gradient(%4$s, %5$s 0%%, %6$s 100%%);
				background: -webkit-gradient(%4$s, left bottom, color-stop(0%%, %5$s ), color-stop(100%%, %6$s ));
				background: -webkit-linear-gradient(%4$s, %5$s 0%%, %6$s 100%%);
				background: -o-linear-gradient(%4$s, %5$s 0%%, %6$s 100%%);
				background: -ms-linear-gradient(%4$s, %5$s 0%%, %6$s 100%%);
				background: linear-gradient(%4$s, %5$s 0%%, %6$s 100%%);
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_slide_in_text .de-sc-team-member__image__content .de-sc-team-member__image__content--name,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_slide_in_text .de-sc-team-member__image__content .de-sc-team-member__image__content--name a:link,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_slide_in_text .de-sc-team-member__image__content .de-sc-team-member__image__content--name a:visited {
				%8$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_slide_in_text .de-sc-team-member__image__content p.de-sc-team-member__content__description__job-position {
				%9$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_slide_in_text:hover .de-sc-team-member__image__content .de-sc-team-member__image__content--name,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_slide_in_text:hover .de-sc-team-member__image__content .de-sc-team-member__image__content--name a:link,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_slide_in_text:hover .de-sc-team-member__image__content .de-sc-team-member__image__content--name a:visited,
			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_slide_in_text:hover .de-sc-team-member__image__content p.de-sc-team-member__content__description__job-position {
				%10$s
			}

			[data-dahz-shortcode-key="%1$s"] .de-sc-team-member.de-sc-team-member--hover_slide_in_text:hover .de-sc-team-member__image__content__overlay {
				background: -moz-linear-gradient(%11$s, %12$s 0%%, %13$s 100%%);
				background: -webkit-gradient(%11$s, left bottom, color-stop(0%%, %12$s ), color-stop(100%%, %13$s ));
				background: -webkit-linear-gradient(%11$s, %12$s 0%%, %13$s 100%%);
				background: -o-linear-gradient(%11$s, %12$s 0%%, %13$s 100%%);
				background: -ms-linear-gradient(%11$s, %12$s 0%%, %13$s 100%%);
				background: linear-gradient(%11$s, %12$s 0%%, %13$s 100%%);
			}
			',
			/* 1 - DAHZ ID */ 				$uniqid,
			/* 2 - NAME COLOR--1 */ 		!empty( $custom_color_style_1_name_color ) ? 'color:' . esc_attr( $custom_color_style_1_name_color ) . ';' : '',
			/* 3 - LINK HOVER COLOR--1 */ 	!empty( $custom_color_style_1_hover_link_color ) ? 'color:' .  esc_attr( $custom_color_style_1_hover_link_color ) . '!important;'  : '',
			/* 4 - GRADIENT DIRECTION--2 */ !empty( $custom_color_style_2_gradient_direction ) ? esc_attr( $custom_color_style_2_gradient_direction ) : '90deg',
			/* 5 - OVERLAY COLOR 1--1 */ 	!empty( $custom_color_style_2_hover_color_overlay_1 ) ? esc_attr( $custom_color_style_2_hover_color_overlay_1 ) : 'rgba(0,0,0,1)',
			/* 6 - OVERLAY COLOR 2--1 */ 	!empty( $custom_color_style_2_hover_color_overlay_2 ) ? esc_attr( $custom_color_style_2_hover_color_overlay_2 ) : 'rgba(0,0,0,0)',
			/* 7 - TEXT COLOR--2 */ 		!empty( $custom_color_style_2 ) ? 'color:' . esc_attr( $custom_color_style_2_hover_text_color ) : 'color: white;',
			/* 8 - NAME COLOR--3 */ 		!empty( $custom_color_style_3_name_color ) ? 'color:' . esc_attr( $custom_color_style_3_name_color ) : '',
			/* 9 - ROLE COLOR--3 */ 		!empty( $custom_color_style_3_role_bio_color ) ? 'color:' . esc_attr( $custom_color_style_3_role_bio_color ) : '',
			/* 10 - HOVER TEXT COLOR--3 */ 	!empty( $custom_color_style_3 ) ? 'color:' . esc_attr( $custom_color_style_3_hover_text_color ) : 'color:white',
			/* 11 - GRADIENT DIRECTION--3 */!empty( $custom_color_style_3_gradient_direction ) ? esc_attr( $custom_color_style_3_gradient_direction ) : '90deg',
			/* 12 - OVERLAY COLOR 1--3 */ 	!empty( $custom_color_style_3_hover_color_overlay_1 ) ? esc_attr( $custom_color_style_3_hover_color_overlay_1 ) : 'rgba(0,0,0,1)',
			/* 13 - OVERLAY COLOR 2--3 */ 	!empty( $custom_color_style_3_hover_color_overlay_2 ) ? esc_attr( $custom_color_style_3_hover_color_overlay_2 ) : 'rgba(0,0,0,0)'
			// !empty( $gradient_direction ) ? esc_html( $gradient_direction ) : '90deg',
			// !empty( $overlay_color_2 ) ? esc_html( $overlay_color_2 ) : 'rgba(255,255,255,0)'
		);

	}
	public function dahz_framework_icon_box_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );
		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'
			[data-dahz-shortcode-key="%1$s"] .de-sc-iconbox--icon{
				transform: translateZ(0);
				backface-visibility: hidden;
				transition: transform .3s ease;
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-iconbox--icon:hover{
				transform: scale(0.9);
			}
			',
			$dahz_id, # 1
			$icon_hover_color # 2
		);
		if ( !empty( $icon_hover_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-iconbox--icon:hover{
					color: %2$s !important;
				}
				',
				$dahz_id, # 1
				$icon_hover_color # 2
			);
		}

		if ( !empty( $icon_bg_hover_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-iconbox--icon:hover{
					background: %2$s !important;
					border-color: %2$s !important;
				}
				',
				$dahz_id, # 1
				$icon_bg_hover_color # 2
			);
		}

		if ( !empty( $button_hover_text_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-iconbox a:hover {
					color: %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-iconbox a.de-btn--underline-thin:hover {
					box-shadow: inset 0 -1px 1px -1px %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-iconbox a.de-btn--underline-thick:hover {
					box-shadow: inset 0 -8px 1px -1px %2$s !important;
				}
				',
				$dahz_id, # 1
				$button_hover_text_color # 2
			);
		}
	}

	public function dahz_framework_icon_list_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );
		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'
			[data-dahz-shortcode-key="%1$s"] .de-sc-iconlist--icon{
				transform: translateZ(0);
				backface-visibility: hidden;
				transition: transform .3s ease;
			}
			[data-dahz-shortcode-key="%1$s"] .de-sc-iconlist--icon:hover{
				transform: scale(.9);
			}
			',
			$dahz_id, # 1
			$icon_hover_color # 2
		);
		if ( !empty( $icon_hover_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-iconlist--icon:hover{
					color: %2$s !important;
				}
				',
				$dahz_id, # 1
				$icon_hover_color # 2
			);
		}

		if ( !empty( $icon_bg_hover_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-iconlist--icon:hover{
					background: %2$s !important;
				}
				',
				$dahz_id, # 1
				$icon_bg_hover_color # 2
			);
		}

		if ( !empty( $button_hover_text_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-sc-iconlist a:hover {
					color: %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-iconlist a.de-btn--underline-thin:hover {
					box-shadow: inset 0 -1px 1px -1px %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-iconlist a.de-btn--underline-thick:hover {
					box-shadow: inset 0 -8px 1px -1px %2$s !important;
				}
				',
				$dahz_id, # 1
				$button_hover_text_color # 2
			);
		}
	}

	public function dahz_framework_product_menu_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );
		if ( !empty( $heading_hover_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-product-menu--title a:hover,
				[data-dahz-shortcode-key="%1$s"] .de-product-menu--title:hover{
					color: %2$s !important;
				}
				',
				$dahz_id, # 1
				$heading_hover_color # 2
			);
		}

	}

	public function dahz_framework_pricing_table_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );

		if ( !empty( $hover_bg_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-btn--boxed:hover::after {
					background-color: %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-btn--outline:hover {
					border-color: %2$s !important;
				}
				',
				$dahz_id, # 1
				$hover_bg_color # 2
			);
		}

		if ( !empty( $hover_text_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .de-btn:hover {
					color: %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-btn--underline-thin:hover {
					box-shadow: inset 0 -1px 1px -1px %2$s !important;
				}
				[data-dahz-shortcode-key="%1$s"] .de-btn--underline-thick:hover {
					box-shadow: inset 0 -8px 1px -1px %2$s !important;
				}
				',
				$dahz_id, # 1
				$hover_text_color # 2
			);
		}

	}

	public function dahz_framework_product_tab_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );
		/*
		[15] => active_color
		[16] => inactive_color
		[17] => active_border_color
		*/
		if ( !empty( $inactive_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .uk-tab li a {
					color: %2$s;
					opacity:0.9;
				}
				[data-dahz-shortcode-key="%1$s"] .uk-tab li a:hover {
					opacity:1;
				}
				',
				$dahz_id, # 1
				$inactive_color # 2
			);
		}
		if ( !empty( $active_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .uk-tab li.uk-active a {
					color: %2$s;
				}
				',
				$dahz_id, # 1
				$active_color # 2
			);
		}
		if ( !empty( $active_border_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .uk-tab li a::after {
					content:"";
					border-bottom-color: %2$s;
					border-bottom-style:solid;
					position: absolute;
					bottom: 0;
					left: 0;
					width: 0;
					transition: width .3s;
				}
				[data-dahz-shortcode-key="%1$s"] .uk-tab li.uk-active a::after {
					right: 0;
					width: %3$s;
				}
				',
				$dahz_id, # 1
				$active_border_color, # 2
				'100%'
			);
		}
	}

	public function dahz_framework_before_after_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );

		if ( !empty( $active_icon_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .cd-handle.draggable .uk-icon {
					color: %2$s !important;
				}
				',
				$dahz_id, # 1
				$active_icon_color # 2
			);
		}
		if ( !empty( $marker_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .cd-handle{
					background-color: %2$s !important;
				}
				',
				$dahz_id, # 1
				$marker_color # 2
			);
		}
		if ( !empty( $active_marker_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .cd-handle.draggable {
					background-color: %2$s !important;
				}
				',
				$dahz_id, # 1
				$active_marker_color # 2
			);
		}

	}

	public function dahz_framework_portfolio_slider_style( $vc_style, $attr_array, $dahz_id ) {

		$uniqid 	= $dahz_id;
		extract( $attr_array );

		// Icon In Button

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf('
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-slider[data-slider-style="layout-1"] a.de-ratio::before,
				.de-sc-portfolio-slider[data-slider-style="layout-2"] .de-sc-portfolio-slider__item:hover .de-sc-portfolio-slider__item-container a.de-ratio::before,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-slider[data-slider-style="layout-4"] a.de-ratio::before,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-slider[data-slider-style="layout-5"] .de-sc-portfolio-slider__content {
					%2$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-slider[data-slider-style="layout-1"] .de-sc-portfolio-slider__item:hover a.de-ratio::before,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-slider[data-slider-style="layout-2"] .de-sc-portfolio-slider__item:hover a.de-ratio::before,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-slider[data-slider-style="layout-3"] .de-sc-portfolio-slider__item:hover .de-sc-portfolio-slider__overlay,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-slider[data-slider-style="layout-5"] .de-sc-portfolio-slider__item:hover .de-sc-portfolio-slider__content {
					%3$s
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-slider[data-slider-style="layout-1"] .de-sc-portfolio-slider__item:hover .de-sc-portfolio-slider__text *,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-slider[data-slider-style="layout-5"] .de-sc-portfolio-slider__item:hover .de-sc-portfolio-slider__text *,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-slider[data-slider-style="layout-1"] .de-sc-portfolio-slider__item:hover .de-sc-portfolio-slider__arrow i {
					%4$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-slider[data-slider-style="layout-2"] .de-sc-portfolio-slider__item-container:hover:before {
					%5$s

				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-slider[data-slider-style="layout-2"] .de-sc-portfolio-slider__item:hover .de-sc-portfolio-slider__content * {
					%6$s
				}

			',
			/* 1 - Dahz Id */ 				$uniqid,
			/* 2 - Overlay Color */ 		!empty( $overlay_color ) ? 'background-color:' . esc_attr( $overlay_color ) . ';': '',
			/* 3 - Hover Overlay Color */ 	!empty( $hover_overlay_color ) ? 'background-color:' . esc_attr( $hover_overlay_color ) . ';': '',
			/* 4 - Hover Text Color */ 		!empty( $hover_text_color ) ? 'color:' . esc_attr( $hover_text_color ) . '!important;': '',
			/* 5 - Border Color */ 			!empty( $border_color ) ? 'border-color:' . esc_attr( $border_color ) . ';' : '',
			/* 6 - Border Color */ 			!empty( $text_color ) ? 'color:' . esc_attr( $text_color ) . ';' : ''
		);

	}

	public function dahz_framework_portfolio_list_style( $vc_style, $attr_array, $dahz_id ) {

		$uniqid 	= $dahz_id;

		extract( $attr_array );

		// Icon In Button

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf('
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list[data-list-style="layout-1"] .entry-categories a {
					%2$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list[data-list-style="layout-1"] .de-sc-portfolio-list__item:hover .entry-categories a {
					%7$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list .entry-meta,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list .entry-meta a {
					%3$s
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list[data-list-style="layout-2"] .de-sc-portfolio-list__meta ,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list[data-list-style="layout-2"] .de-sc-portfolio-list__meta div a ,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list[data-list-style="layout-2"] .de-sc-portfolio-list__meta span,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list[data-list-style="layout-2"] .de-sc-portfolio-list__meta span a {
					%3$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list[data-list-style="layout-2"] .de-sc-portfolio-list__item:hover .de-sc-portfolio-list__meta ,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list[data-list-style="layout-2"] .de-sc-portfolio-list__item:hover .de-sc-portfolio-list__meta div a ,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list[data-list-style="layout-2"] .de-sc-portfolio-list__item:hover .de-sc-portfolio-list__meta span,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list[data-list-style="layout-2"] .de-sc-portfolio-list__item:hover .de-sc-portfolio-list__meta span a {
					%8$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list .de-sc-portfolio-list__item:hover .entry-meta,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list .de-sc-portfolio-list__item:hover .entry-meta a {
					%8$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list .de-sc-portfolio-list__item:hover h1 a,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list .de-sc-portfolio-list__item:hover h2 a,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list .de-sc-portfolio-list__item:hover h3 a,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list .de-sc-portfolio-list__item:hover h4 a,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list .de-sc-portfolio-list__item:hover h5 a,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list .de-sc-portfolio-list__item:hover h6 a {
					%6$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list[data-list-style="layout-1"] .entry-meta > p {
					%4$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list[data-list-style="layout-1"] .de-sc-portfolio-list__item:hover {
					%9$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-list[data-list-style="layout-2"] .de-sc-portfolio-list__item:hover a.de-ratio::before {
					%10$s
				}

			',
			/* 1 */ $uniqid,
			/* 2 */ !empty( $category_color ) ? 'color:' . esc_attr( $category_color ) . ';' : '',
			/* 3 */ !empty( $portfolio_meta_color ) ? 'color:' . esc_attr( $portfolio_meta_color ) . ';' : '',
			/* 4 */ !empty( $excerpt_color ) ? 'color:' . esc_attr( $excerpt_color ) . ';' : '',
			/* 5 */ !empty( $hover_border_color ) ? 'border-color:' . esc_attr( $hover_border_color ) . ';' : '',
			/* 6 */ !empty( $hover_title_color ) ? 'color:' . esc_attr( $hover_title_color ) . '!important;' : '',
			/* 7 */ !empty( $hover_category_color ) ? 'color:' . esc_attr( $hover_category_color ) . ';' : '',
			/* 8 */ !empty( $hover_portfolio_meta_color ) ? 'color:' . esc_attr( $hover_portfolio_meta_color ) . ';' : '',
			/* 9 */ !empty( $hover_bg_color ) ? 'background-color:' . esc_attr( $hover_bg_color ) . ';' : '',
			/* 10 */ !empty( $background_overlay_color ) ? 'background-color:' . esc_attr( $background_overlay_color ) . ';' : ''
		);

	}

	public function dahz_framework_portfolio_tabs_style( $vc_style, $attr_array, $dahz_id ) {

		$uniqid 	= $dahz_id;

		extract( $attr_array );

		// Icon In Button

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf('
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs[data-tabs-style="layout-1"] a.de-ratio::before,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs[data-tabs-style="layout-2"] .de-sc-portfolio-tabs__item:hover .de-sc-portfolio-tabs__item-container a.de-ratio::before,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs[data-tabs-style="layout-4"] a.de-ratio::before,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs[data-tabs-style="layout-5"] .de-sc-portfolio-tabs__content {
					%2$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs[data-tabs-style="layout-1"] .de-sc-portfolio-tabs__item:hover a.de-ratio::before,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs[data-tabs-style="layout-2"] .de-sc-portfolio-tabs__item:hover a.de-ratio::before,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs[data-tabs-style="layout-3"] .de-sc-portfolio-tabs__item:hover .de-sc-portfolio-tabs__overlay,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs[data-tabs-style="layout-5"] .de-sc-portfolio-tabs__item:hover .de-sc-portfolio-tabs__content {
					%3$s
				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs[data-tabs-style="layout-1"] .de-sc-portfolio-tabs__item:hover .de-sc-portfolio-tabs__text *,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs[data-tabs-style="layout-5"] .de-sc-portfolio-tabs__item:hover .de-sc-portfolio-tabs__text *,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs[data-tabs-style="layout-1"] .de-sc-portfolio-tabs__item:hover .de-sc-portfolio-tabs__arrow i {
					%4$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs[data-tabs-style="layout-2"] .de-sc-portfolio-tabs__item-container:hover:before {
					%5$s

				}
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs[data-tabs-style="layout-2"] .de-sc-portfolio-tabs__item:hover .de-sc-portfolio-tabs__content * {
					%6$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs .de-sc-portfolio-tabs__category-filter h4 > a:link,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs .de-sc-portfolio-tabs__category-filter h4 > a:visited {
					%7$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs .de-sc-portfolio-tabs__category-filter .uk-active h4 {
					%8$s
				}

				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs .de-sc-portfolio-tabs__category-filter .uk-active h4 a:link,
				[data-dahz-shortcode-key="%1$s"] .de-sc-portfolio-tabs .de-sc-portfolio-tabs__category-filter .uk-active h4 a:visited {
					%9$s
				}

			',
			/* 1 - Dahz Id */ 				$uniqid,
			/* 2 - Overlay Color */ 		!empty( $overlay_color ) ? 'background-color:' . esc_attr( $overlay_color ) . ';': '',
			/* 3 - Hover Overlay Color */ 	!empty( $hover_overlay_color ) ? 'background-color:' . esc_attr( $hover_overlay_color ) . ';': '',
			/* 4 - Hover Text Color */ 		!empty( $hover_text_color ) ? 'color:' . esc_attr( $hover_text_color ) . '!important;': '',
			/* 5 - Border Color */ 			!empty( $border_color ) ? 'border-color:' . esc_attr( $border_color ) . ';' : '',
			/* 6 - Border Color */ 			!empty( $text_color ) ? 'color:' . esc_attr( $text_color ) . ';' : '',
			/* 7 - Inactive Filter Color */ !empty( $inactive_color ) ? 'color:' . esc_attr( $inactive_color ) . ';' : '',
			/* 8 - Active Filter Border */  !empty( $active_border_color ) ? 'border-color:' . esc_attr( $active_border_color ) . ';' : '',
			/* 9 - Active Filter Color*/    !empty( $active_color ) ? 'color:' . esc_attr( $active_color ) . ';' : ''
		);


	}
	public function dahz_framework_vc_tta_pageable_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );

		if ( !empty( $row_display_divider_between ) && !empty( $row_divider_color ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .uk-slider-container li::before {
					border-left-color: %2$s !important;
				}
				',
				$dahz_id, # 1
				$row_divider_color # 2
			);
		}

		if ( !empty( $row_display_divider_between ) && !empty( $enable_center_active ) ) {
			DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
				'
				[data-dahz-shortcode-key="%1$s"] .uk-slider-container li::before {
					content: "";
					position: absolute;
					top: 0;
					bottom: 0;
					border-left: 1px solid #e5e5e5;
					border-left-width: 1px;
					border-left-style: solid;
					border-left-color: rgb(229, 229, 229);
				}
				',
				$dahz_id, # 1
				$row_divider_color # 2
			);
		}

	}

	public function dahz_framework_vc_tta_tabs_style( $vc_style, $attr_array, $dahz_id ) {

		extract( $attr_array );

		DahzExtender_Shortcodes::$shortcodes_custom_css .= sprintf(
			'
			[data-dahz-shortcode-key="%1$s"] .uk-tab li h1,
			[data-dahz-shortcode-key="%1$s"] .uk-tab li h2,
			[data-dahz-shortcode-key="%1$s"] .uk-tab li h3,
			[data-dahz-shortcode-key="%1$s"] .uk-tab li h4,
			[data-dahz-shortcode-key="%1$s"] .uk-tab li h5,
			[data-dahz-shortcode-key="%1$s"] .uk-tab li h6,
			[data-dahz-shortcode-key="%1$s"] .uk-tab li p {
				%2$s
			}
			[data-dahz-shortcode-key="%1$s"] .uk-tab li.uk-active h1,
			[data-dahz-shortcode-key="%1$s"] .uk-tab li.uk-active h2,
			[data-dahz-shortcode-key="%1$s"] .uk-tab li.uk-active h3,
			[data-dahz-shortcode-key="%1$s"] .uk-tab li.uk-active h4,
			[data-dahz-shortcode-key="%1$s"] .uk-tab li.uk-active h5,
			[data-dahz-shortcode-key="%1$s"] .uk-tab li.uk-active h6,
			[data-dahz-shortcode-key="%1$s"] .uk-tab li.uk-active p {
				%3$s
			}

			[data-dahz-shortcode-key="%1$s"] .uk-tab.uk-subnav-pill li.uk-active a {
				%6$s
			}

			[data-dahz-shortcode-key="%1$s"] .uk-tab.uk-subnav-pill li a:hover h1,
			[data-dahz-shortcode-key="%1$s"] .uk-tab.uk-subnav-pill li a:hover h2,
			[data-dahz-shortcode-key="%1$s"] .uk-tab.uk-subnav-pill li a:hover h3,
			[data-dahz-shortcode-key="%1$s"] .uk-tab.uk-subnav-pill li a:hover h4,
			[data-dahz-shortcode-key="%1$s"] .uk-tab.uk-subnav-pill li a:hover h5,
			[data-dahz-shortcode-key="%1$s"] .uk-tab.uk-subnav-pill li a:hover h6,
			[data-dahz-shortcode-key="%1$s"] .uk-tab.uk-subnav-pill li a:hover p {
				%7$s
			}

			[data-dahz-shortcode-key="%1$s"] .uk-tab.uk-subnav-pill li a:hover {
				%8$s
			}

			[data-dahz-shortcode-key="%1$s"].de-sc-tabs .uk-tab.uk-tab-left li,
			[data-dahz-shortcode-key="%1$s"].de-sc-tabs .uk-tab.uk-tab-right li,
			[data-dahz-shortcode-key="%1$s"].de-sc-tabs .uk-tab.uk-tab-top li,
			[data-dahz-shortcode-key="%1$s"].de-sc-tabs .uk-tab.uk-tab-bottom li {
				%5$s
			}

			[data-dahz-shortcode-key="%1$s"].de-sc-tabs .uk-tab li.uk-active {
				%4$s
			}
			',
			$dahz_id, # 1
			!empty( $active_color ) ? 'color:' . $active_color . ';' : '', # 2
			!empty( $inactive_color ) ? 'color:' . $inactive_color . ';' : '', # 3
			!empty( $active_border_color ) ? 'border-color:' . $active_border_color . '!important;' : '', # 4
			!empty( $inactive_border_color ) ? 'border-color:' . $inactive_border_color . '!important;' : '', # 5
			!empty( $active_bg_color ) ? 'background:' . $active_bg_color . ';' : '', # 6
			!empty( $inactive_hover_color ) ? 'color:' . $inactive_hover_color . ';' : '', # 7
			!empty( $inactive_hover_bg_color ) ? 'background:' . $inactive_hover_bg_color . ';' : '' # 8
		);

	}
}

new Dahz_Framework_Shortcode_Admin();

if ( !function_exists('sobari_shortcode_kses') ) {

	function sobari_shortcode_kses( $value ) {
		// Allow iframe, object, embed, a, p, em, strong and img tags in textarea fields.
		$allowed = wp_kses_allowed_html( 'post' );
		$allowed['a'] = array('href' => true, 'class' => true, 'target' => true );
		$allowed['p'] = array('style' => true, 'class' => true );
		$allowed['h1'] = array( 'style' => true, 'class' => true );
		$allowed['h2'] = array( 'style' => true, 'class' => true );
		$allowed['h3'] = array( 'style' => true, 'class' => true );
		$allowed['h4'] = array( 'style' => true, 'class' => true );
		$allowed['h5'] = array( 'style' => true, 'class' => true );
		$allowed['h6'] = array( 'style' => true, 'class' => true );
		$allowed['pre'] = array( 'width' => true );
		$allowed['img'] = array('src'   => true, 'alt'  => true );
		$allowed['em'] = array('class' => true );
		$allowed['strong'] = array();
		$allowed['blockquote'] = array( 'cite' => true, 'style' => true, 'class' => true );
		$allowed['ol'] = array( 'style' => true, 'class' => true );
		$allowed['ul'] = array( 'style' => true, 'class' => true );
		$allowed['li'] = array( 'style' => true, 'class' => true );
		$allowed['span'] = array( 'style' => true, 'class' => true );
		$allowed['hr'] = array( 'style' => true, 'class' => true );
		$allowed['del'] = array( 'style' => true, 'class' => true );
		return wp_kses( $value, $allowed );
	}

}

if ( !function_exists('helper_vc_fonts_poppins') ) {

	add_filter('vc_google_fonts_get_fonts_filter', 'helper_vc_fonts_poppins');

	function helper_vc_fonts_poppins( $fonts_list ) {
		$poppins = ( object ) array();
		$poppins->font_family = 'Poppins';
		$poppins->font_types = '300 light regular:300:normal,400 regular:400:normal,500 bold regular:500:normal,600 bold regular:600:normal,700 bold regular:700:normal';
		$poppins->font_styles = '100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		$poppins->font_family_description = esc_html_e( 'Select font family', 'helper' );
		$poppins->font_style_description = esc_html_e( 'Select font styling', 'helper' );
		$fonts_list[] = $poppins;

		return $fonts_list;
	}

}

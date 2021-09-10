<?php

if ( !class_exists( 'Dahz_Framework_Social_Icon_Customizer' ) ) {

	Class Dahz_Framework_Social_Icon_Customizer extends Dahz_Framework_Customizer_Extend {

		public function dahz_framework_set_customizer() {

			$dv_field = array();

			$transport = array(
				'selector'			=> '#de-site-header',
				'render_callback'	=> 'dahz_framework_get_header'
			);

			$dv_field[] = array(
				'type'		=> 'radio_image',
				'settings'	=> 'style',
				'label'		=> esc_html__( 'Social Style', 'df_textdomain' ),
				'default'	=> '16',
				'priority'	=> 12,
				'choices'	=> array(
					'default'	=> get_template_directory_uri() . '/assets/images/customizer/df_social-style-1.svg',
					'outline'	=> get_template_directory_uri() . '/assets/images/customizer/df_social-style-2.svg',
					'fill'		=> get_template_directory_uri() . '/assets/images/customizer/df_social-style-3.svg',
				),
				'partial_refresh'	=> array(
					'header_social_icon_size' => $transport
				)
			);

			$dv_field[] = array(
				'type'		=> 'text',
				'settings'	=> 'desktop_icon_size',
				'label'		=> esc_html__( 'Desktop icon ratio', 'df_textdomain' ),
				'description'=> __( 'Enter a size ratio, if you want the icon to appear larger than the default size, for example 1.5 or 2 to double the size', 'df_textdomain' ),
				'default'	=> '1',
				'priority'	=> 12,
				'partial_refresh' => array(
					'header_social_icon_desktop_icon_size' => $transport
				)
			);

			$dv_field[] = array(
				'type'		=> 'text',
				'settings'	=> 'mobile_icon_size',
				'description'=> __( 'Enter a size ratio, if you want the icon to appear larger than the default size, for example 1.5 or 2 to double the size', 'df_textdomain' ),
				'label'		=> esc_html__( 'Mobile icon ratio', 'df_textdomain' ),
				'default'	=> '1',
				'priority'	=> 12,
				'partial_refresh' => array(
					'header_social_icon_mobile_icon_size' => $transport
				)
			);

			$dv_field[] = array(
				'type'		=> 'slider',
				'choices'	=> array(
					'min'	=> '0',
					'max'	=> '100',
					'step'	=> '1',
				),
				'settings'	=> 'border_radius',
				'label'		=> esc_html__( 'Icon border radius', 'df_textdomain' ),
				'description'=> __( 'This option only for style 2&3', 'df_textdomain' ),
				'default'	=> 0,
				'priority'	=> 12,
				'partial_refresh' => array(
					'header_social_icon_border_radius' => $transport
				)
			);

			$dv_field[] = array(
				'type'       => 'color',
				'choices'     => array(
					'alpha' => true,
				),
				'settings'   => 'color',
				'label'      => __( 'Icon Color', 'df_textdomain' ),
				'default'    => '#000000',
				'priority'	 => 12,
				'transport'  => 'postMessage',
				'js_vars'    => array(
					array(
						'element'  => '.de-featured-area,.de-archive__header,.de-page__header,#de-archive-content.de-content-boxed,#de-archive-content.de-content-framed,#de-archive-content.de-content-fullwidth,#page.de-content-fullwidth,.de-page.de-content-boxed,.de-page.de-content-framed,.de-page.de-content-fullwidth,.de-single.de-content-boxed,.de-single.de-content-framed,.de-single.de-content-fullwidth,.de-404.de-content-boxed,.de-404.de-content-framed,.de-404.de-content-fullwidth,.calista,.coralie,.centaur,.catalina,.cloe,.de-portfolio-single,.de-sc-post-carousel__content,#de-product-container',
						'function' => 'css',
						'property' => 'background-color'
					),
				)
			);
			$dv_field[] = array(
				'type'       => 'color',
				'choices'    => array(
					'alpha'  => true,
				),
				'settings'   => 'hover_color',
				'label'      => __( 'Icon Hover Color', 'df_textdomain' ),
				'default'    => '#898484',
				'priority'	 => 12,
				'transport'  => 'postMessage',
				'js_vars'    => array(
					array(
						'element'  => '.de-featured-area,.de-archive__header,.de-page__header,#de-archive-content.de-content-boxed,#de-archive-content.de-content-framed,#de-archive-content.de-content-fullwidth,#page.de-content-fullwidth,.de-page.de-content-boxed,.de-page.de-content-framed,.de-page.de-content-fullwidth,.de-single.de-content-boxed,.de-single.de-content-framed,.de-single.de-content-fullwidth,.de-404.de-content-boxed,.de-404.de-content-framed,.de-404.de-content-fullwidth,.calista,.coralie,.centaur,.catalina,.cloe,.de-portfolio-single,.de-sc-post-carousel__content,#de-product-container',
						'function' => 'css',
						'property' => 'background-color'
					),
				)
			);
			
			$dv_field[] = array(
				'type'       => 'color',
				'choices'     => array(
					'alpha' => true,
				),
				'settings'   => 'background_color',
				'label'      => __( 'Icon Background Color', 'df_textdomain' ),
				'description'=> __( 'This option only for style 3', 'df_textdomain' ),
				'default'    => '#000000',
				'priority'	 => 12,
				'transport'  => 'postMessage',
				'js_vars'    => array(
					array(
						'element'  => '.de-featured-area,.de-archive__header,.de-page__header,#de-archive-content.de-content-boxed,#de-archive-content.de-content-framed,#de-archive-content.de-content-fullwidth,#page.de-content-fullwidth,.de-page.de-content-boxed,.de-page.de-content-framed,.de-page.de-content-fullwidth,.de-single.de-content-boxed,.de-single.de-content-framed,.de-single.de-content-fullwidth,.de-404.de-content-boxed,.de-404.de-content-framed,.de-404.de-content-fullwidth,.calista,.coralie,.centaur,.catalina,.cloe,.de-portfolio-single,.de-sc-post-carousel__content,#de-product-container',
						'function' => 'css',
						'property' => 'background-color'
					),
				)
			);
			$dv_field[] = array(
				'type'       => 'color',
				'choices'    => array(
					'alpha'  => true,
				),
				'settings'   => 'background_hover_color',
				'label'      => __( 'Icon Hover Color', 'df_textdomain' ),
				'description'=> __( 'This option only for style 3', 'df_textdomain' ),
				'default'    => '#898484',
				'priority'	 => 12,
				'transport'  => 'postMessage',
				'js_vars'    => array(
					array(
						'element'  => '.de-featured-area,.de-archive__header,.de-page__header,#de-archive-content.de-content-boxed,#de-archive-content.de-content-framed,#de-archive-content.de-content-fullwidth,#page.de-content-fullwidth,.de-page.de-content-boxed,.de-page.de-content-framed,.de-page.de-content-fullwidth,.de-single.de-content-boxed,.de-single.de-content-framed,.de-single.de-content-fullwidth,.de-404.de-content-boxed,.de-404.de-content-framed,.de-404.de-content-fullwidth,.calista,.coralie,.centaur,.catalina,.cloe,.de-portfolio-single,.de-sc-post-carousel__content,#de-product-container',
						'function' => 'css',
						'property' => 'background-color'
					),
				)
			);

			return $dv_field;

		}

	}

}

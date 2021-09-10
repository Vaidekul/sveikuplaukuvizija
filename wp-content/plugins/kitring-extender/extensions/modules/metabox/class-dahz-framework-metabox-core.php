<?php

if ( !class_exists( 'Dahz_Framework_Metabox_Core' ) ) {

	Class Dahz_Framework_Metabox_Core {

		public function __construct() {

			add_action( 'dahz_framework_register_metabox', array( $this, 'dahz_framework_register_metabox_core' ) );

			add_action( 'dahz_framework_metabox_dahz_meta_post', array( $this, 'dahz_framework_register_panel_metabox_core_post' ), 10 );

			add_action( 'dahz_framework_metabox_dahz_meta_page', array( $this, 'dahz_framework_register_panel_metabox_core_page' ), 10  );

		}

		public function dahz_framework_register_panel_metabox_core_post( $dahz_meta ) {

			$dahz_meta->dahz_framework_metabox_add_section( 'contents', esc_html__( 'Content', 'kitring' ) );

			$dahz_meta->dahz_framework_metabox_add_field(
				'contents',
				array(
					'id'			=> 'single_content_post_featured_image',
					'type'			=> 'select',
					'title'			=> esc_html__( 'Title Position', 'kitring' ),
					'description'	=> esc_html__('Allows you to choose Featured Image Layout on Single Post', 'kitring' ),
					'default'		=> 'top',
					'options'		=> array(
										'between'		=> esc_attr__('Before  Image', 'kitring'),
										'top'			=> esc_attr__('After Image', 'kitring'),
									)
				)
			);

			$dahz_meta->dahz_framework_metabox_add_field(
				'contents',
				array(
					'id'			=> 'single_sidebar_position',
					'type'			=> 'radio_image',
					'title'			=> esc_html__( 'Sidebar Position', 'kitring' ),
					'description'	=> esc_html__('Allows you to choose sidebars and their position', 'kitring' ),
					'default'		=> 'inherit',
					'options'		=> array(
										'fullwidth'		=> get_template_directory_uri() . '/dahz-framework/admin/assets/img/df_layout-full.svg',
										'sidebar-left'	=> get_template_directory_uri() . '/dahz-framework/admin/assets/img/df_layout-left.svg',
										'sidebar-right'	=> get_template_directory_uri() . '/dahz-framework/admin/assets/img/df_layout-right.svg',
										'inherit'		=> get_template_directory_uri() . '/dahz-framework/admin/assets/img/df_inherit.svg',
									)
				)
			);

		}

		public function dahz_framework_register_panel_metabox_core_page( $dahz_meta ) {

			$dahz_meta->dahz_framework_metabox_add_section( 'contents-page', esc_html__( 'Content', 'kitring' ), '',
				array(
					'operator'		=> '&&',
					array(
						'id'		=>'page_template',
						'operator'	=> '!==',
						'value'		=> 'cart-and-checkout.php'
					),
					array(
						'id'		=>'page_template',
						'operator'	=> '!==',
						'value'		=> 'portfolio-template.php'
					),
					array(
						'id'		=>'page_template',
						'operator'	=> '!==',
						'value'		=> 'shop-template.php'
					),
					array(
						'id'		=>'page_template',
						'operator'	=> '!==',
						'value'		=> 'faq-template.php'
					)
				)
			);

			$dahz_meta->dahz_framework_metabox_add_field(
				'contents-page',
				array(
					'id' 		=> 'layout',
					'type'		=> 'radio_image',
					'title'		=> esc_html__( 'Layout Style', 'kitring' ),
					'default'	=> 'fullwidth',
					'options'	=> array(
						'fullwidth'		=> get_template_directory_uri() . '/dahz-framework/admin/assets/img/df_layout-full.svg',
						'sidebar-left'	=> get_template_directory_uri() . '/dahz-framework/admin/assets/img/df_layout-left.svg',
						'sidebar-right'	=> get_template_directory_uri() . '/dahz-framework/admin/assets/img/df_layout-right.svg',
					),
					'dependencies'	=> array(
						array(
							'id'		=>'page_template',
							'operator'	=> '!==',
							'value'		=> 'blank-template.php'
						)
					)
				)
			);

		}

		public function dahz_framework_register_metabox_core() {

			dahz_framework_register_metabox(
				'dahz_meta_post',
				array(
					'title'		=> esc_html__( 'Dahz Metabox - Post', 'kitring' ),
					'post_type'	=> 'post',
					'priority'	=> 'default',
					'context'	=> 'normal'
				)
			);
			dahz_framework_register_metabox(
				'dahz_meta_page',
				array(
					'title'		=> esc_html__( 'Dahz Metabox - Page', 'kitring' ),
					'post_type'	=> 'page',
					'priority'	=> 'default',
					'context'	=> 'normal'
				)
			);
			dahz_framework_register_metabox(
				'dahz_meta_product',
				array(
					'title'		=> esc_html__( 'Dahz Metabox - Product', 'kitring' ),
					'post_type'	=> 'product',
					'priority'	=> 'default',
					'context'	=> 'normal'
				)
			);

		}

	}

	new Dahz_Framework_Metabox_Core();

}

<?php

if ( !class_exists( 'Dahz_Framework_Metabox_Extend' ) ){

	Class Dahz_Framework_Metabox_Extend{

		public $metaboxes = array();

		public $taxonomy_metaboxes = array();

		public function __construct(){

			add_action( 'admin_init', array( $this, 'dahz_framework_register_metabox' ) );

			add_action( 'admin_init', array( $this, 'dahz_framework_register_taxonomy_metabox' ) );

			add_action( 'save_post', array( $this, 'dahz_framework_metabox_save' ) );

			add_action('wp_ajax_request_oembed', array( $this, 'dahz_framework_oembed_request') );

			add_action( "edited_term", array( $this, 'dahz_framework_taxonomy_metabox_save' ), 10, 3 );

			add_action( "created_term", array( $this, 'dahz_framework_taxonomy_metabox_save' ), 10, 3 );

			add_action( 'admin_enqueue_scripts', array( $this, 'dahz_framework_register_taxonomy_script' ), 10, 3 );

		}


		public function dahz_framework_oembed_request(){
			echo wp_oembed_get( $_POST['renderItem'] );
			die();
		}

		public function dahz_framework_metabox_save( $post_id ) {

			//Checks save status
			$is_autosave = wp_is_post_autosave( $post_id );
			$is_revision = wp_is_post_revision( $post_id );
			$is_valid_nonce = ( isset( $_POST[ 'dahz_nonce' ] ) && wp_verify_nonce( $_POST[ 'dahz_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

			// Exits script depending on save status
			if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
				return;
			}

			$post_type = get_post_type( $post_id );

			foreach( $this->metaboxes as $metabox_id => $metabox ){

				if( $post_type != $metabox['post_type'] || !isset( $_POST[$metabox_id] ) ) continue;

				$current_metabox = get_post_meta( $post_id, $metabox_id, true );

				$current_metabox = !empty( $current_metabox ) ? $current_metabox : array();

				$meta_value = array_merge( $current_metabox, $_POST[$metabox_id] );

				do_action( "dahz_framework_save_metabox_value_{$metabox_id}", $meta_value, $post_id );

				update_post_meta( $post_id, $metabox_id, $meta_value );

			}

		}

		public function dahz_framework_register_taxonomy_metabox(){

			do_action( 'dahz_framework_register_taxonomy_metabox' );

			$this->taxonomy_metaboxes = apply_filters(

				'dahz_framework_taxonomy_metaboxes',

				$this->taxonomy_metaboxes

			);

			if( !empty( $this->taxonomy_metaboxes ) ){

				foreach( $this->taxonomy_metaboxes as $taxonomy ){

					add_action( "{$taxonomy}_edit_form_fields", array( $this, 'dahz_framework_taxonomy_metabox_init' ), 10, 2 );

					add_action( "{$taxonomy}_add_form_fields", array( $this, 'dahz_framework_taxonomy_metabox_init' ), 10, 2 );

				}

			}


		}

		public function dahz_framework_register_metabox(){

			do_action( 'dahz_framework_register_metabox' );

			$this->metaboxes = apply_filters(

				'dahz_framework_metaboxes',

				$this->metaboxes

			);
			if( !empty( $this->metaboxes ) ){

				add_action('admin_print_scripts-post.php', array( $this, 'dahz_framework_register_metabox_script' ) );

				add_action('admin_print_scripts-post-new.php', array( $this, 'dahz_framework_register_metabox_script' ) );

				add_action('admin_print_styles-post.php', array( $this, 'dahz_framework_register_metabox_style' ) );

				add_action('admin_print_styles-post-new.php', array( $this, 'dahz_framework_register_metabox_style' ) );

				add_action( 'add_meta_boxes', array( $this, 'dahz_framework_add_metaboxes' ) );

			}


		}

		public function dahz_framework_add_metaboxes(){

			foreach( $this->metaboxes as $id => $metabox ){

				if( empty( $metabox ) || empty( $metabox['title'] ) ) continue;

				add_meta_box(
					$id,
					!empty( $metabox['title'] ) ? $metabox['title'] : "",
					array( $this, 'dahz_framework_metabox_init' ),
					!empty( $metabox['post_type'] ) ? $metabox['post_type'] : "post",
					!empty( $metabox['context'] ) ? $metabox['context'] : "normal",
					!empty( $metabox['priority'] ) ? $metabox['priority'] : "default",
					array( 'id' => $id )
				);

			}

		}

		public function dahz_framework_taxonomy_metabox_init( $tag ){

			$taxonomy = is_object( $tag ) ? $tag->taxonomy : $tag;

			$term_id = is_object( $tag ) ? $tag->term_id : false;

			$tag = is_object( $tag ) ? $tag : false;

			$metabox_object = new Dahz_Framework_Taxonomy_Metabox( $taxonomy, $term_id, $tag );

			do_action( "dahz_framework_taxonomy_metabox_{$taxonomy}", $metabox_object );

			$metabox_object->dahz_framework_render_metabox();

		}

		public function dahz_framework_metabox_init( $post, $args ){

			$id = $args['id'];

			$metabox_object = new Dahz_Framework_Metabox( $id, $post );

			do_action( "dahz_framework_metabox_{$id}", $metabox_object );

			$metabox_object->dahz_framework_render_metabox();

		}

		public function dahz_framework_taxonomy_metabox_save( $term_id, $tt_id, $taxonomy ){

			$is_valid_nonce = ( isset( $_POST[ 'dahz_nonce' ] ) && wp_verify_nonce( $_POST[ 'dahz_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

			if( isset( $_POST[$taxonomy] ) ){

				$taxonomy_option = get_option( "dahz_framework_taxonomy_{$taxonomy}" );

				if( !is_array( $taxonomy_option ) ){

					$taxonomy_option = array();

				}

				$taxonomy_option[$term_id] = is_string( $_POST[$taxonomy] ) ? stripslashes_deep( $_POST[$taxonomy] ) : $_POST[$taxonomy];

				update_option( "dahz_framework_taxonomy_{$taxonomy}", $taxonomy_option, 'no' );

			}

		}

		public function dahz_framework_register_metabox_style( $hook ){

			wp_enqueue_style( 'dahz-framework-metabox-css', get_template_directory_uri().'/dahz-framework/admin/metabox/css/dahz-framework-metabox.css' );

			wp_enqueue_style( 'wp-color-picker' );

		}

		public function dahz_framework_register_metabox_script( $hook ){

			wp_enqueue_script( 'dahz-framework-metabox-js', get_template_directory_uri() . '/dahz-framework/admin/metabox/js/dahz-framework-metabox.js' );

			wp_enqueue_script( 'wp-color-picker' );

			wp_enqueue_media();

			wp_localize_script( 'dahz-framework-metabox-js', 'dfMetaboxLocalize',
				array(
					'title'      => esc_html__( 'Upload Image', 'kitring' ),
					'button'     => esc_html__( 'Use this image', 'kitring' ),
					'imageNone'  => DAHZ_FRAMEWORK_URI . 'admin/assets/img/none.png',
					'imgTagging' => plugin_dir_url('') . 'dahz-sobari-shortcode/assets/images/tagging.png',
				)
			);

			wp_enqueue_script( 'dahz-framework-metabox-js' );

		}

		public function dahz_framework_register_taxonomy_script( $hook ){

			if( 'term.php' == $hook || 'edit-tags.php' == $hook ){

				wp_enqueue_media();

				wp_enqueue_style( 'custom_admin_css'	, get_template_directory_uri() . '/dahz-framework/admin/assets/css/dahz-admin.css', false, '1.0' );

				wp_enqueue_style( 'dahz-framework-metabox-css', get_template_directory_uri().'/dahz-framework/admin/metabox/css/dahz-framework-metabox.css' );

				wp_enqueue_script( 'dahz-framework-metabox-js', get_template_directory_uri() . '/dahz-framework/admin/metabox/js/dahz-framework-metabox.js', array( 'jquery', 'underscore' ), null, true );

				wp_enqueue_style( 'wp-color-picker' );

				wp_enqueue_script( 'wp-color-picker' );

				wp_localize_script( 'dahz-framework-metabox-js', 'dfMetaboxLocalize',
					array(
						'title'      => esc_html__( 'Upload Image', 'kitring' ),
						'button'     => esc_html__( 'Use this image', 'kitring' ),
						'imageNone'  => DAHZ_FRAMEWORK_URI . 'admin/assets/img/none.png',
						'imgTagging' => plugin_dir_url('') . 'dahz-sobari-shortcode/assets/images/tagging.png',
					)
				);

				wp_enqueue_script( 'dahz-framework-metabox-js' );

			}

		}

	}

	return new Dahz_Framework_Metabox_Extend();

}

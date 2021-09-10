<?php

if( !class_exists('DahzExtender_Content_Blocks') ) {
	
    Class DahzExtender_Content_Blocks {
		
		public $custom_css = '';
		
		public $shortcodes = array(
			'contents'	=> array(),
			'styles'	=> '',
			'scripts'	=> '',
			'tags'		=> array()
		);
		
		
		
		public $post_custom_css = '';
		
		public $shortcodes_custom_css = '';

        function __construct(){

			add_action( 'init', array( $this, 'dahz_framework_init_post_type' ), 10 );

			add_action( 'add_meta_boxes', array( $this, 'dahz_framework_init_content_block_metabox' ) );
			
			add_filter( 'manage_edit-content-block_columns', array( $this, 'dahz_framework_content_block_columns' ) );
			
			add_action( 'manage_content-block_posts_custom_column', array( $this, 'dahz_framework_manage_content_block_columns' ), 10, 2 );
			
			add_filter( 'manage_edit-content-block_sortable_columns', array( $this, 'dahz_framework_manage_content_block_sortable_columns' ) );
			
			add_action( 'init', array( $this, 'dahz_framework_create_content_block_taxonomies' ), 0 );
			
			add_filter( 'dahz_framework_site_wrapper_class', array( $this, 'dahz_framework_filter_callback' ), 20 );
			
			add_action( 'save_post', array( $this, 'dahz_framework_save_post_callback' ), 10, 2 );
			
			add_action( 'dahz_framework_register_taxonomy_metabox', array( $this, 'dahz_content_block_register_taxonomy_metabox' ) );
			
			add_action( 'dahz_framework_taxonomy_metabox_content_block_categories', array( $this,'dahz_content_block_add_field_taxonomy_metabox' ) );
						
			add_shortcode( 'dahz-block', array( $this, 'dahz_framework_render_content_block_shortcode' ) );
			
			add_action( 'wp_print_footer_scripts', array( $this,'dahz_framework_bind_styles_scripts_footer' ), 9999999 );
			
        }
				
		public function dahz_framework_bind_styles_scripts_footer(){

			if( !empty( $this->custom_css ) ){
				
				echo sprintf(
					'
					<style type="text/css" data-type="dahz-custom-css">
						%1$s
					</style>
					',
					$this->custom_css
				);
				
			}

		}
		
		public function dahz_framework_render_content_block_shortcode( $atts ){
			
			if( !isset( $atts['id'] ) ) return;
			
			$the_slug = $atts['id'];
			
			$content_block = get_posts(
				array(
					'post_name__in' => array( $the_slug ),
					'post_type' 	=> 'content-block',
					'post_status' 	=> 'publish',
					'numberposts'	=> 1
				)
			);
			if( empty( $content_block[0] ) ) return '';
			
			$this->custom_css = $this->dahz_framework_content_block_front_css( $content_block[0]->ID );
				
			$content = preg_replace( '/<\/?p\>/', "\n", $content_block[0]->post_content );
				
			return do_shortcode( shortcode_unautop( $content ) );
							
		}
		
		public function dahz_framework_content_block_front_css( $id ) {
			
			$custom_css = '';
			
			$custom_css .= $this->dahz_framework_page_custom_css( $id );
			
			$custom_css .= $this->dahz_framework_shortcode_custom_css( $id );
			
			return $custom_css;
			
		}
		
		public function dahz_framework_page_custom_css( $id ) {
			
			return get_post_meta( $id, '_wpb_post_custom_css', true );
							
		}
		
		public function dahz_framework_shortcode_custom_css( $id ) {
			
			$custom_css = '';
			
			$custom_css .= get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
			
			$custom_css .= get_post_meta( $id, 'dahz_shortcode_css', true );
			
			return $custom_css;

		}
				
		public function dahz_content_block_add_field_taxonomy_metabox( $metabox ){
			
			$metabox->dahz_framework_metabox_add_field(
				array(
					'id'			=> 'page_footer_type',
					'type'			=> 'radio_image',
					'title'			=> __( 'Footer Type', 'kitring' ),
					'description'	=> __('Please select your desired footer type', 'kitring'),
					'options'		=> array(
										'inherit'		=> get_template_directory_uri() . '/assets/images/metabox/footer.png',
										'footer-preset'	=> get_template_directory_uri() . '/assets/images/metabox/footer.png',
										'content-block'	=> get_template_directory_uri() . '/assets/images/metabox/footer.png',
										'disable'		=> get_template_directory_uri() . '/assets/images/metabox/footer.png',
									)
				)
			);

			$metabox->dahz_framework_metabox_add_field(
				array(
					'id'			=> 'footer_preset_source',
					'type'			=> 'radio_image',
					'title'			=> __( 'Select Source', 'kitring' ),
					'description'	=> __('Select your preset header source', 'kitring'),
					'options'		=> array(
						'default'	=> get_template_directory_uri() . '/assets/images/metabox/footer.png',
						'saved'		=> get_template_directory_uri() . '/assets/images/metabox/footer.png',
					),
					'dependencies'	=> array(
						array(
							'setting'	=> 'page_footer_type',
							'operator'	=> '==',
							'value'		=> 'footer-preset',
						),
					)
				)
			);

			$metabox->dahz_framework_metabox_add_field(
				array(
					'id'			=> 'footer_preset_default',
					'type'			=> 'select',
					'title'			=> __( 'Footer Preset', 'kitring' ),
					'description'	=> __('Select your footer Preset, it based from footer builder you have been created before', 'kitring'),
					'options'		=> dahz_framework_get_builder_presets_option('footer', true),
					'dependencies'	=> array(
						array(
							'setting'	=> 'footer_preset_source',
							'operator'	=> '==',
							'value'		=> 'default',
						),
						array(
							'setting'	=> 'page_footer_type',
							'operator'	=> '==',
							'value'		=> 'footer-preset',
						)
					)
				)
			);

			$metabox->dahz_framework_metabox_add_field(
				array(
					'id'			=> 'footer_preset_saved',
					'type'			=> 'select',
					'title'			=> __( 'Footer Preset', 'kitring' ),
					'description'	=> __('Select your footer Preset, it based from footer builder you have been created before', 'kitring'),
					'options'		=> dahz_framework_get_builder_presets_option('footer'),
					'dependencies'	=> array(
						array(
							'setting'	=> 'footer_preset_source',
							'operator'	=> '==',
							'value'		=> 'saved',
						),
						array(
							'setting'	=> 'page_footer_type',
							'operator'	=> '==',
							'value'		=> 'footer-preset',
						),
					)
				)
			);

			$metabox->dahz_framework_metabox_add_field(
				array(
					'id'			=> 'page_content_block',
					'type'			=> 'select',
					'title'			=> __( 'Content Block', 'kitring' ),
					'description'	=> __('Specify the Content Block', 'kitring'),
					'options'		=> dahz_framework_get_content_block(),
					'dependencies'	=> array(
										array(
											'setting'	=> 'page_footer_type',
											'operator'	=> '==',
											'value'		=> 'content-block',
										),
									)
				)
			);

			$metabox->dahz_framework_metabox_add_field(
				array(
					'id'			=> 'before_footer',
					'type'			=> 'select',
					'title'			=> __( 'Before Footer', 'kitring' ),
					'description'	=> __('Display a custom area before footer area. You can use custom content block to display globally', 'kitring'),
					'options'		=> dahz_framework_get_content_block(),
				)
			);

			$metabox->dahz_framework_metabox_add_field(
				array(
					'id'			=> 'after_footer',
					'type'			=> 'select',
					'title'			=> __( 'After Footer', 'kitring' ),
					'description'	=> __('Display a custom area after footer area. You can use custom content block to display globally', 'kitring'),
					'options'		=> dahz_framework_get_content_block(),
				)
			);


		}
		
		public function dahz_content_block_register_taxonomy_metabox(){
			
			dahz_framework_register_taxonomy_metabox( 'content_block_categories' );

		}
		
		function dahz_framework_save_post_callback( $post_id, $post = false ){
													
			if ( $post && $post->post_type != 'content-block' ) return;
					
			$post_name = $post->post_name;
			
			$transient_key = "dahz_framework_content_blocks_{$post_name}";
			
			delete_transient( $transient_key );
			
		}

        function dahz_framework_init_post_type(){

            $this->dahz_framework_init_content_block();
            
        }

        function dahz_framework_init_content_block(){

			$labels = array(
				'name' 					=> _x('Content Block', 'post type general name', 'kitring'),
				'singular_name' 		=> _x('Content Block Item', 'post type singular name', 'kitring'),
				'add_new' 				=> _x('Add New', 'Content Block item', 'kitring'),
				'add_new_item'			=> __('Add New Content Block Item', 'kitring'),
				'edit_item' 			=> __('Edit Content Block Item', 'kitring'),
				'new_item' 				=> __('New Content Block Item', 'kitring'),
				'view_item' 			=> __('View Content Block Item', 'kitring'),
				'search_items' 			=> __('Search Content Block Items', 'kitring'),
				'not_found' 			=> __('Nothing found', 'kitring'),
				'not_found_in_trash' 	=> __('Nothing found in Trash', 'kitring'),
				'parent_item_colon' 	=> ''
			);

            $args = array(
				'labels' 		=> $labels,
				'public' 		=> true,
				'has_archive' 	=> true,
				'supports' 		=> array( 'title', 'editor', 'comments' ),
				'menu_position'	=> 4,
			);

			register_post_type( 'content-block', $args );

        }

		function dahz_framework_create_content_block_taxonomies() {
			$labels = array(
				'name'              => _x( 'Categories', 'taxonomy general name', 'kitring' ),
				'singular_name'     => _x( 'Category', 'taxonomy singular name', 'kitring' ),
				'search_items'      => __( 'Search Categories', 'kitring' ),
				'all_items'         => __( 'All Categories', 'kitring' ),
				'parent_item'       => __( 'Parent Category', 'kitring' ),
				'parent_item_colon' => __( 'Parent Category:', 'kitring' ),
				'edit_item'         => __( 'Edit Category', 'kitring' ),
				'update_item'       => __( 'Update Category', 'kitring' ),
				'add_new_item'      => __( 'Add New Category', 'kitring' ),
				'new_item_name'     => __( 'New Category Name', 'kitring' ),
				'menu_name'         => __( 'Categories', 'kitring' ),
			);

			$args = array(
				'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'categories' ),
			);

			register_taxonomy( 'content_block_categories', array( 'content-block' ), $args );
		}

		function dahz_framework_content_block_columns( $columns ) {

			$columns = array(
				'cb' 		=> '<input type="checkbox" />',
				'title' 	=> __( 'Post', 'kitring' ),
				'shortcode' => __( 'Shortcode', 'kitring' ),
				'date'		=> __( 'Date', 'kitring')
			);

			return $columns;
		}

		function dahz_framework_manage_content_block_columns( $column, $post_id ) {

			global $post;

			switch( $column ){

				case 'shortcode' :

					?>
					<p>
						<input class="widefat" type="text" name="dahz-metabox-shortcode" id="dahz-metabox-shortcode" value='[dahz-block id="<?php echo esc_attr( $post->post_name ); ?>"]' size="30" disabled />
					</p>
					<?php

			}

		}

		function dahz_framework_init_content_block_metabox(){
			
			add_meta_box( 
				'de-metabox',
				esc_html__( 'Shortcode', 'kitring' ),
				array($this, 'dahz_framework_content_block_metabox'),
				'content-block',
				'side',
				'high'
			);

		}
		
		function dahz_framework_content_block_metabox(){

			global $post;

			$values = get_post_custom( $post->ID );
			$text = isset( $values['dahz-metabox-shortcode'][0] ) ? $values['dahz-metabox-shortcode'][0] : '';
			wp_nonce_field( 'dahz_framework_content_block_nonce', 'dahz_framework_metabox_nonce' );
			
			?>
			<p>
				<input class="widefat" type="text" name="dahz-metabox-shortcode" id="dahz-metabox-shortcode" value='[dahz-block id="<?php echo esc_attr( $post->post_name ); ?>"]' size="30" disabled/>
			</p>
			<?php

		}

		function dahz_framework_manage_content_block_sortable_columns( $columns ) {

			$columns['shortcode'] = 'shortcode';

			return $columns;

		}

		function dahz_framework_filter_callback( $class ){

			if( is_singular( 'content-block' ) ){
				$class = 'fullwidth';
			}

			return $class;

		}


    }

	new DahzExtender_Content_Blocks;

}
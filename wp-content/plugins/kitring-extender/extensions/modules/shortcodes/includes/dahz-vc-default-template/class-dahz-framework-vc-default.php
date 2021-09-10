<?php
if( !class_exists( 'Dahz_Framework_VC_Default' ) ){
	
	Class Dahz_Framework_VC_Default{
		
		public $defaults = array();
		
		public $thumbnail_path = '';
		
		function __construct(){
			
			$this->thumbnail_path = DAHZEXTENDER_SHORTCODE_URI. 'dahz-vc-default-template/images/';
			
			$this->defaults = require_once( DAHZEXTENDER_SHORTCODE_PATH . 'dahz-vc-default-template/data-dahz-framework-vc-default-templates.php' );
			
			add_action( 'vc_load_default_templates_action', array( $this, 'dahz_framework_default_vc_templates' ) ); // Hook in
			
			add_filter( 'vc_templates_render_template', array( $this, 'dahz_framework_vc_templates_render_template' ), 20, 2 );
			
			add_filter( 'vc_get_all_templates', array( $this, 'dahz_framework_vc_get_all_templates' ), 1000 );
			
			add_filter( 'vc_templates_render_category', array( $this, 'dahz_framework_vc_templates_render_category' ), 1000 );
			
		}
		
		public function dahz_framework_default_vc_templates() {
			
			foreach( $this->defaults['templates'] as $default ){
				
				vc_add_default_templates( $default );
				
			}
			
		}
		
		public function dahz_framework_vc_templates_render_template( $template_name, $template_data ){
			
			if ( 'default_templates' === $template_data['type'] ) {
				
				ob_start();
				
				$custom_class = explode( " ", $template_data['custom_class'] );
				
				$categories = array();
				
				foreach( $custom_class as $category ){
					
					if( isset( $this->defaults['categories'][$category] ) )
						$categories[] = $this->defaults['categories'][$category];
					
				}
				
				$category = implode( ', ', $categories );
				
				$thumbnail = $this->thumbnail_path . $template_data['image'];
				
				$template_id = esc_attr( $template_data['unique_id'] );
				
				$template_id_hash = md5( $template_id ); // needed for jquery target for TTA
				
				$template_name = esc_html( $template_data['name'] );
				
				$preview_template_title = esc_attr__( 'Preview template', 'sobari' );
				
				$add_template_title = esc_attr__( 'Add template', 'sobari' );
				
				echo <<<HTML
				<div class="img-wrap">
					<img src="$thumbnail" alt="$template_name" width="300" height="200">
				</div>
				<div class="display_cat">$category</div>
				<button class="vc_ui-list-bar-item-trigger" type="button" title="$add_template_title" data-template-handler="" data-vc-ui-element="template-title">$template_name</button>
				
HTML;

				return ob_get_clean();
				
			} else {
				return $template_name;
			}
			
		}
		
		public function dahz_framework_vc_get_all_templates( $data ){
			
			foreach( $data as $id => $template ){
				
				if( $template['category'] == 'default_templates' ){
					
					$data[$id]['category_name'] = esc_html__( 'Dahz Default Templates', 'sobari' );
					
					$data[$id]['category_weight'] = 0;
					
				}
				if( $template['category'] == 'shared_templates' ){
					unset( $data[$id] );
				}
				
			}
			return $data;
			
		}
		
		public function dahz_framework_vc_templates_render_category( $category ){
			
			if ( 'default_templates' === $category['category'] ) {
				
				$categories = '';
				
				foreach( $this->defaults['categories'] as $id => $category_title ){
					
					$categories .= '
						<li class="" data-sort="' . $id . '">
							' . $category_title . '
							<span class="count"></span>
						</li>
					';
					
				}
				
				$category['output'] = '
				<div id="de-vc-default-template">
					<div class="de-vc-default-template-category">
						<ul>
							<li class="" data-sort="all">
								All
								<span class="count"></span>
							</li>
							' . $categories . '
						</ul>
					</div>' . 
					$category['output'] . 
				'</div>' . $this->dahz_framework_vc_default_templates_script();
				
			}
			return $category;
			
		}
		
		public function dahz_framework_vc_default_templates_script(){
			
			return <<<script
			<script>
				(function($){
					$(document).ready(function(){
						var dataSort = 'all',
							sort = $('.de-vc-default-template-category ul'),
							sortLink = $('.de-vc-default-template-category ul li:not([data-sort="all"])'),
							sortAll = $('.de-vc-default-template-category ul li[data-sort="all"]');
						sortLink.each(function(){
							dataSort = $(this).attr('data-sort');
							$('span',$(this)).html( $('.vc_templates-template-type-default_templates.' + dataSort ).length );
						});
						$('span',sortAll).html( $('.vc_templates-template-type-default_templates').length );
						
						sortLink.click(function(){
							$( 'li.active', sort ).removeClass('active');
							$(this).addClass('active');
							dataSort = $(this).attr('data-sort');
							$( '.vc_templates-template-type-default_templates:not(.' + dataSort + ')' ).hide();
							$( '.vc_templates-template-type-default_templates.' + dataSort ).show();
						});
						sortAll.click(function(){
							$( 'li.active', sort ).removeClass('active');
							$(this).addClass('active');
							$('.vc_templates-template-type-default_templates').show();
						});
						sortAll.click();
					})
				})(jQuery);
			</script>
script;
			
		}
		
	}
	
	new Dahz_Framework_VC_Default();
	
}
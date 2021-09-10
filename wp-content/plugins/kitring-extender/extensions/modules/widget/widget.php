<?php

if ( !class_exists( 'DahzExtender_Widget' ) ) {

	Class DahzExtender_Widget {
		
		public $path = '';

		function __construct() {

			add_action( 'widgets_init', array( $this, 'dahz_load_widget' ) );

			add_action( 'dahzextender_module_widget_init', array( $this, 'dahz_framework_widget_init' ) );

		}

		public function dahz_framework_widget_init( $path ) {
			
			$this->path = $path;
			
		}

		function dahz_load_widget() {

			if( class_exists( 'DahzExtender_Content_Blocks' ) ){
				include( $this->path . '/class-dahz-framework-content-block-widget.php' );
				register_widget( 'Content_Block_Widget' );
			}
			
			include( $this->path . '/class-dahz-framework-about-me-widget.php' );

			include( $this->path . '/class-dahz-framework-recent-post-widget.php' );

			include( $this->path . '/class-dahz-framework-category-widget.php' );

			include( $this->path . '/class-dahz-framework-address-widget.php' );

			include( $this->path . '/class-dahz-framework-opening-hours-widget.php' );
			
			register_widget( 'Dahz_framework_About_Me_Widget' );

			register_widget( 'Dahz_Framework_Post_Category_Widget' );

			register_widget( 'Dahz_Framework_Address_Widget' );

			register_widget( 'Dahz_Framework_Recent_Post_Widget' );

			if( class_exists( 'WC_Widget' ) ){
				
				include( $this->path . '/class-dahz-framework-widget-product-category.php' );
				include( $this->path . '/class-dahz-framework-widget-recent-reviews.php' );
				
				register_widget( 'Dahz_Framework_Widget_Recent_Reviews' );
				register_widget( 'Dahz_Framework_Widget_Product_Category' );
				
			}

			register_widget( 'Dahz_Framework_Opening_Hours_Widget' );

			if( class_exists( 'DahzExtender_Portfolios' ) ){
				include( $this->path . '/class-dahz-framework-portfolio-widget.php' );
				register_widget( 'Portfolio_Widget' );
			}


		}

	}

	new DahzExtender_Widget();

}

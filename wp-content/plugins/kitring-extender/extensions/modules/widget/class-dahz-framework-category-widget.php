<?php
class Dahz_Framework_Post_Category_Widget extends WP_Widget {

	function __construct() {

	   parent::__construct(
		   'dahz_post_categories_widget',
		   __( 'Dahz Post Categories', 'kitring' ),
		   array(
			   'description' => esc_html__( 'A list of Category customized by Dahz' , 'kitring' )
		   )
	   );
   }

   /**
	* Outputs the content of the widget
	*
	* @param array $args
	* @param array $instance
	* @return void
	*/
   public function widget( $args, $instance ) {
	   
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		// before and after widget arguments are defined by themes
		if ( ! empty( $title ) ){
			$title = $args['before_title'] . $title . $args['after_title'];
		}
		
		$layout = $instance[ 'select_cat_style' ];
		
		$select_cat	= $instance[ 'select_cat' ];
		
		$cat_args = array(
			'taxonomy'   => 'category', # empty string(''), false, 0 don't work, and return empty array
			'hide_empty' => false, # can be 1, '1' too
			'fields'     => 'all',
		);
		
		if( !empty( $select_cat ) ){
			
			$cat_args['include'] = $select_cat;
			
		}
		
		$categories = get_categories( $cat_args );
		
		$post_categories_html = '';

		if( !empty( $categories ) && is_array( $categories ) ){
			
			foreach ( $categories as $cats ) {

				$cat_name	 = $cats->name;

				$cat_id		 = $cats->term_id;

				$url_cat	 = get_category_link( $cat_id, 'category' );

				$img_id = dahz_framework_get_term_meta( $cats->taxonomy, $cats->term_id, 'image_upload', '' );

				$url_img = wp_get_attachment_image_url( $img_id, 'medium' );

				$post_categories_html .= sprintf(
					'
					<a href="%s">
						<div class="de-widget__category" %s>
							<div class="de-widget__category-title de-widget__category-title--layout-%s">
								<span>%s</span>
							</div>
						</div>
					</a>
					', 
					esc_url( $url_cat ), 
					( $url_img ) ? 'style="background: url( ' . esc_url( $url_img ) . ' ) no-repeat; background-size: cover;"' : '', 
					esc_attr( $layout ), 
					esc_html( $cat_name ) 
				);
				
			}
			
		}
				
		echo sprintf(
			'
			%1$s
			<div class="dahz-widget__wrapper dahz-widget__wrapper--%2$s">
				%3$s
				%4$s
			</div>
			%5$s
			',
			$args['before_widget'],
			$this->id_base,
			$title,
			$post_categories_html,
			$args['after_widget']
		);
   }

   /**
	* Outputs the options form on admin
	*
	* @param array $instance The widget options
	* @return void
	*/
   public function form( $instance ) {
	  
		$title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';

		$select_style = ! empty( $instance[ 'select_cat_style' ] ) ? $instance[ 'select_cat_style' ] : '1';

		$select_category = ! empty( $instance[ 'select_cat' ] ) ? $instance[ 'select_cat' ] : '';
		
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) );?>">
				<?php esc_html_e( 'Title :' , 'kitring' );?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) );?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) );?>" type="text" value="<?php echo esc_attr( $title );?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'select_cat_style' ) );?>">
				<?php esc_html_e( 'Style :' , 'kitring'  );?>
			</label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'select_cat_style' ) );?>" name="<?php echo esc_attr( $this->get_field_name( 'select_cat_style' ) );?>">
				<option value="1" <?php selected( '1', $select_style );?>><?php esc_html_e( 'Style 1', 'kitring' );?></option>
				<option value="2" <?php selected( '2', $select_style );?>><?php esc_html_e( 'Style 2', 'kitring' );?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'select_cat' ) );?>"><?php esc_html_e( 'Category ( Type term id separated by comma for multiple select eg: 0,1,2 ) :' , 'kitring' );?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'select_cat' ) );?>" name="<?php echo esc_attr( $this->get_field_name( 'select_cat' ) );?>" type="text" value="<?php echo esc_attr( $select_category );?>" />
		</p>
		<?php   
   }

   /**
	* Processing widget options on save
	*
	* @param array $new_instance The new options
	* @param array $old_instance The previous options
	* @return $instance
	*/
   public function update( $new_instance, $old_instance ) {
	   $instance 						= array();
	   $instance[ 'title' ]				= ( ! empty( $new_instance[ 'title' ] ) ) ? strip_tags( $new_instance[ 'title' ] ) : '';
	   $instance[ 'select_cat_style' ]	= ( ! empty( $new_instance[ 'select_cat_style' ] ) ) ? strip_tags( $new_instance[ 'select_cat_style' ] ) : '';
	   $instance[ 'select_cat' ]		= ( ! empty( $new_instance[ 'select_cat' ] ) ) ? strip_tags( $new_instance[ 'select_cat' ] ) : '';
	   return $instance;
   }
}

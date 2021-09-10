<?php
class Content_Block_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID widget
			'content_block_widget',

			// Widget name in UI
			esc_html__('Content Block Widget', 'kitring' ),

			// Widget description
			array(
				'description' => esc_html__( 'Content Block Widget', 'kitring' ),
			)
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo apply_filters( 'dahz_framework_widget_content_block_before_widget', $args['before_widget'] );
		if ( ! empty( $title ) ){
			$title = $args['before_title'] . $title . $args['after_title'];
			echo apply_filters( 'dahz_framework_widget_content_block_title', $title );
		}
		// This is where you run the code and display the output

		$the_slug = $instance['value'];

		echo do_shortcode( "[dahz-block id='{$the_slug}']" );

		echo apply_filters( 'dahz_framework_widget_content_block_after_widget', $args['after_widget'] );
	}

	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = esc_html__( 'New title', 'kitring' );
		}
		if ( isset( $instance[ 'value' ] ) ) {
			$value = $instance[ 'value' ];
		}
		else {
			$value = '';
		}

		// Widget admin form
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'value' ) ); ?>"><?php esc_html_e( 'Content Block:', 'kitring' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'value' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'value' ) ); ?>">
				<?php foreach( dahz_framework_get_content_block() as $slug => $content_block ){
					echo '<option value="'. esc_attr( $slug ).'" ' . selected( $value, $slug, false ) . '>'. esc_html( $content_block ).'</option>';
				}
				?>
			</select>
		</p>
		<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['value'] = ( ! empty( $new_instance['value'] ) ) ? strip_tags( $new_instance['value'] ) : '';

		return $instance;
	}
}

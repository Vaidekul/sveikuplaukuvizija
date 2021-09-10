<?php

class Dahz_Framework_Address_Widget extends WP_Widget {

	function __construct() {

		parent::__construct(
			// Base ID widget
			'dahz_address_widget',
			// Widget name in UI
			esc_html__( 'Dahz Address', 'kitring' ),
			// Widget description
			array(
				'description' => esc_html__( 'Display an address widget.', 'kitring' ),
			)
		);

	}

	// Creating widget front-end
	public function widget( $args, $instance ) {

		extract( $instance );

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		// before and after widget arguments are defined by themes
		if ( ! empty( $title ) ) {
			$title = $args['before_title'] . $title . $args['after_title'];
		}
		// This is where you run the code and display the output

		$address_name	 = ! empty( $instance['address_name'] ) ? $instance['address_name'] : '';
		$address		 = ! empty( $instance['address'] ) ? $instance['address'] : '';
		$profile_picture = ! empty( $instance['profile_picture'] ) ? wp_get_attachment_image( $instance['profile_picture'], 'large', '', array( 'class' => 'de-ratio-content' ) ) : '';
		$map_link		 = ! empty( $instance['map_link'] ) ? $instance['map_link'] : '#';
		$map_text		 = ! empty( $instance['map_text'] ) ? '<a href="' . esc_url( $instance['map_link'] ) . '" class="uk-margin-small-right uk-inline" >' . $instance['map_text'] .  '</a>' : '';
		$email			 = ! empty( $instance['email'] ) ? '<a href="mailto:' . esc_url( $instance['email'] ) . '" >' . esc_html( $instance['email'] ) .  '</a>' : '';
		$phone_1		 = ! empty( $instance['phone_1'] ) ? $instance['phone_1'] : '';
		$phone_2		 = ! empty( $instance['phone_2'] ) ? $instance['phone_2'] : '';
		$text_color		 = ! empty( $instance['text_color'] ) ? $instance['text_color'] : '';
		$bg_color		 = ! empty( $instance['bg_color'] ) ? $instance['bg_color'] : '';

		echo sprintf(
			'
			%9$s
			<div class="dahz-widget__wrapper dahz-widget__wrapper--%11$s">
				%1$s
				<div class="de-widget__address" style="background-color: %12$s;color: %13$s;">
					%2$s
					<div class="uk-padding">
						%3$s
						%4$s
						%5$s
						%6$s
						%7$s
						%8$s
					</div>
				</div>
			</div>
			%10$s
			',
			$title, # 1
			$profile_picture, # 2
			!empty( $address_name ) ? sprintf( '<h5>%s</h5>', esc_html( $address_name ) ) : '', # 3
			!empty( $address ) ? sprintf( '<p>%s</p>', esc_html( $address ) ) : '', # 4
			!empty( $email ) ? sprintf( '<p class="uk-margin-remove"><span data-uk-icon="mail"></span> %s</p>', $email ) : '', # 5
			!empty( $phone_1 ) ? sprintf( '<p class="uk-margin-remove"><span data-uk-icon="receiver"></span> %s</p>', esc_html( $phone_1 ) ) : '', # 6
			!empty( $phone_2 ) ? sprintf( '<p class="uk-margin-remove"><span data-uk-icon="phone"></span> %s</p>', esc_html( $phone_2 ) ) : '', # 7
			!empty( $map_text ) ? sprintf( '<p>%s</p>', $map_text ) : '', # 8
			$args['before_widget'], # 9
			$args['after_widget'], # 10
			$this->id_base, # 11
			esc_attr( $bg_color ), # 12
			esc_attr( $text_color ) # 13
		);

	}

	// Widget Backend
	public function form( $instance ) {

		extract($instance);

		$profile_picture_image_src = !empty( $profile_picture ) ? wp_get_attachment_image_src( $profile_picture, 'medium' ) : '';

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $title ) ? $title : '' ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'address_name' ) ); ?>"><?php esc_html_e( 'Address Name:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address_name' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $address_name ) ? $address_name : '' ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_html_e( 'Address:', 'kitring' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" type="text"><?php echo esc_attr( !empty( $address ) ? $address : '' ); ?></textarea>
		</p>
		<div class="dahz-widget-image-uploader">
			<input class="widefat dahz-widget-image-uploader--value" type="hidden" name="<?php echo( $this->get_field_name( 'profile_picture' ) ); ?>" id="<?php echo( $this->get_field_id( 'profile_picture' ) ); ?>" value="<?php echo esc_attr( !empty( $profile_picture ) ? $profile_picture : '' ); ?>">
			<div class="dahz-widget-image-uploader--image">
				<?php
					if ( !empty( $profile_picture_image_src ) && is_array( $profile_picture_image_src ) ) {
						echo sprintf( '<img src="%1$s" width="%2$s" height="%3$s" alt="%4$s">',
							$profile_picture_image_src[0],
							$profile_picture_image_src[1],
							$profile_picture_image_src[2],
							__( 'Profile Picture', 'kitring' )
						);
					}
				 ?>
				<div class="dahz-widget-image-uploader--placeholder"><?php _e( 'No Images Selected', 'kitring' ); ?></div>
			</div>
			<button class="dahz-widget-image-uploader--upload button"><?php _e( 'Select Image', 'kitring' ); ?></button>
			<button class="dahz-widget-image-uploader--remove button"><?php _e( 'Remove Image', 'kitring' ); ?></button>
		</div>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'map_link' ) ); ?>"><?php esc_html_e( 'Map Link:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'map_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'map_link' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $map_link ) ? $map_link : '' ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'map_text' ) ); ?>"><?php esc_html_e( 'Map Text:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'map_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'map_text' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $map_text ) ? $map_text : '' ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_html_e( 'Email:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $email ) ? $email : '' ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'phone_1' ) ); ?>"><?php esc_html_e( 'Phone 1:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone_1' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $phone_1 ) ? $phone_1 : '' ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'phone_2' ) ); ?>"><?php esc_html_e( 'Phone 2:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone_2' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $phone_2 ) ? $phone_2 : '' ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'text_color' ) ); ?>"><?php esc_html_e( 'Text Color:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text_color' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $text_color ) ? $text_color : '' ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'bg_color' ) ); ?>"><?php esc_html_e( 'Background Color:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bg_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'bg_color' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $bg_color ) ? $bg_color : '' ); ?>" />
		</p>
		<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['address_name'] = ( ! empty( $new_instance['address_name'] ) ) ? strip_tags( $new_instance['address_name'] ) : '';

		$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';

		$instance['profile_picture'] = ( ! empty( $new_instance['profile_picture'] ) ) ? strip_tags( $new_instance['profile_picture'] ) : '';

		$instance['map_link'] = ( ! empty( $new_instance['map_link'] ) ) ? strip_tags( $new_instance['map_link'] ) : '';

		$instance['map_text'] = ( ! empty( $new_instance['map_text'] ) ) ? strip_tags( $new_instance['map_text'] ) : '';

		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';

		$instance['phone_1'] = ( ! empty( $new_instance['phone_1'] ) ) ? strip_tags( $new_instance['phone_1'] ) : '';

		$instance['phone_2'] = ( ! empty( $new_instance['phone_2'] ) ) ? strip_tags( $new_instance['phone_2'] ) : '';

		$instance['text_color'] = ( ! empty( $new_instance['text_color'] ) ) ? strip_tags( $new_instance['text_color'] ) : '';

		$instance['bg_color'] = ( ! empty( $new_instance['bg_color'] ) ) ? strip_tags( $new_instance['bg_color'] ) : '';

		return $instance;
	}
}

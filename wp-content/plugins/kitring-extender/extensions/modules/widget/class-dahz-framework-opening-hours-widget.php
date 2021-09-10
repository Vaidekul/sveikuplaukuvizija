<?php

class Dahz_Framework_Opening_Hours_Widget extends WP_Widget {

	static $days = array();

	function __construct() {

		self::$days = array(
			array(
				'title'	=> __( 'Monday', 'kitring' ),
				'id'	=> 'monday'
			),
			array(
				'title'	=> __( 'Tuesday', 'kitring' ),
				'id'	=> 'tuesday'
			),
			array(
				'title'	=> __( 'Wednesday', 'kitring' ),
				'id'	=> 'wednesday'
			),
			array(
				'title'	=> __( 'Thursday', 'kitring' ),
				'id'	=> 'thursday'
			),
			array(
				'title'	=> __( 'Friday', 'kitring' ),
				'id'	=> 'friday'
			),
			array(
				'title'	=> __( 'Saturday', 'kitring' ),
				'id'	=> 'saturday'
			),
			array(
				'title'	=> __( 'Sunday', 'kitring' ),
				'id'	=> 'sunday'
			)
		);

		parent::__construct(
			// Base ID widget
			'dahz_opening_hours_widget',

			// Widget name in UI
			esc_html__( 'Dahz Opening Hours', 'kitring' ),

			// Widget description
			array(
				'description' => esc_html__( 'Display an opening hours widget.', 'kitring' ),
			)
		);

	}

	// Creating widget front-end
	public function widget( $args, $instance ) {

		extract( $instance );

		$title = apply_filters( 'widget_title', $instance['title'] );

		$main_accent_color = dahz_framework_get_option(
			"color_general_main_accent_color_regular",
			array(
				'regular'	=> '#333333',
				'hover'		=> '#999999'
			)
		);

		$active_color = $main_accent_color['regular'];

		// before and after widget arguments are defined by themes
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		// before and after widget arguments are defined by themes
		if ( ! empty( $title ) ) {
			$title = $args['before_title'] . $title . $args['after_title'];
		}
		// This is where you run the code and display the output

		$days_html = '';

		foreach ( self::$days as $index => $day ) {

			$days_html .= sprintf(
				'
				<div class="uk-grid-small uk-grid" %1$s data-uk-grid>
					<div class="uk-width-expand" data-uk-leader>
						<p class="uk-inline uk-margin-remove">%2$s</p>
					</div>
					<div>%3$s</div>
				</div>
				',
				strtolower( date("l") ) == $day[ 'id' ] ? 'style="' . esc_attr( 'color:' . $active_color ) .  '"' : '',
				esc_html( $day[ 'title' ] ),
				$instance[ $day['id'] . '_checkbox' ] == 1 ? esc_html( $instance[ $day['id'] . '_from' ] ) . esc_html( $instance['hours_separator'] ) . esc_html( $instance[ $day['id'] . '_to' ] ) : esc_html( $instance[ 'closed_text' ] )
			);

		}
		echo sprintf(
			'
			%1$s
			<div class="dahz-widget__wrapper dahz-widget__wrapper--%2$s">
				%3$s
				<div class="de-widget__opening-hours">
					%4$s
					<div class="uk-grid-small uk-grid" data-uk-grid>
						<div class="uk-width-expand">%5$s</div>
					</div>
				</div>
			</div>
			%6$s
			',
			$args['before_widget'],
			$this->id_base,
			$title,
			$days_html,
			esc_html( $instance['below_timetable_text'] ),
			$args['after_widget']
		);

	}

	// Widget Backend
	public function form( $instance ) {

		extract($instance);

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $title ) ? $title : '' ); ?>" />
		</p>
		<?php foreach ( self::$days as $index => $day ) : ?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( $day['id'] ) ); ?>"><?php echo esc_html( $day['title'] ); ?></label>
			</p>
			<p>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $day['id'] . '_checkbox' ) ); ?>" name="<?php echo( $this->get_field_name( $day['id'] . '_checkbox' ) ); ?>" type="checkbox" <?php !empty( $instance[ $day['id'] . '_checkbox' ] ) ? checked( $instance[ $day['id'] . '_checkbox' ], 1 ) : ''; ?> />
				<label for="<?php echo esc_attr( $this->get_field_id( $day['id'] . '_checkbox' ) ); ?>"><?php esc_html_e( 'Opened', 'kitring' ); ?></label>
			</p>
			<p>
				<input id="<?php echo esc_attr( $this->get_field_id( $day['id'] . '_from' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $day['id'] . '_from' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $instance[ $day['id'] . '_from' ] ) ? $instance[ $day['id'] . '_from' ] : '' ); ?>" />
				<label style="vertical-align: text-bottom;margin: 0 10px;"  for="<?php echo esc_attr( $this->get_field_id( $day['id'] . '_to' ) ); ?>"><?php esc_html_e( 'To :', 'kitring' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( $day['id'] . '_to' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $day['id'] . '_to' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $instance[ $day['id'] . '_to' ] ) ? $instance[ $day['id'] . '_to' ] : '' ); ?>" />
			</p>
		<?php endforeach;?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'hours_separator' ) ); ?>"><?php esc_html_e( 'Separator between hours:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'hours_separator' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hours_separator' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $hours_separator ) ? $hours_separator : '' ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'closed_text' ) ); ?>"><?php esc_html_e( 'Text used for closed day:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'closed_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'closed_text' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $closed_text ) ? $closed_text : '' ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'below_timetable_text' ) ); ?>"><?php esc_html_e( 'Text below timetable:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'below_timetable_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'below_timetable_text' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $below_timetable_text ) ? $below_timetable_text : '' ); ?>" />
		</p>
		<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		foreach( self::$days as $index => $day ) {

			$instance[ $day['id'] . '_checkbox' ] = $new_instance[ $day['id'] . '_checkbox' ] ? 1 : 0;

			$instance[ $day['id'] . '_from' ] = ( ! empty( $new_instance[ $day['id'] . '_from' ] ) ) ? strip_tags( $new_instance[ $day['id'] . '_from' ] ) : '';

			$instance[ $day['id'] . '_to' ] = ( ! empty( $new_instance[ $day['id'] . '_to' ] ) ) ? strip_tags( $new_instance[ $day['id'] . '_to' ] ) : '';

		}

		$instance['hours_separator'] = ( ! empty( $new_instance['hours_separator'] ) ) ? strip_tags( $new_instance['hours_separator'] ) : '';

		$instance['closed_text'] = ( ! empty( $new_instance['closed_text'] ) ) ? strip_tags( $new_instance['closed_text'] ) : '';

		$instance['below_timetable_text'] = ( ! empty( $new_instance['below_timetable_text'] ) ) ? strip_tags( $new_instance['below_timetable_text'] ) : '';

		return $instance;
	}
}

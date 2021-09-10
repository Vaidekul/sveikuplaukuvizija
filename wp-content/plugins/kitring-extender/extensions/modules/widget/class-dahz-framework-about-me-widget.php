<?php

class Dahz_framework_About_Me_Widget extends WP_Widget {

	static $socials = array();

	function __construct() {
		self::$socials = apply_filters(
			'dahz_framework_socials_about_me_widget',
			array(
				'facebook_link'	=> array(
					'title'		=> __( 'Facebook', 'kitring' ),
					'icon'		=> 'facebook'
				),
				'twitter_link'	=> array(
					'title'		=> __( 'Twitter', 'kitring' ),
					'icon'		=> 'twitter'
				),
				'pinterest_link'=> array(
					'title'		=> __( 'Pinterest', 'kitring' ),
					'icon'		=> 'pinterest'
				),
				'google_plus_link'=> array(
					'title'		=> __( 'Google+', 'kitring' ),
					'icon'		=> 'google-plus'
				),
				'tumblr_link'	=> array(
					'title'		=> __( 'Tumblr', 'kitring' ),
					'icon'		=> 'tumblr'
				),
				'instagram_link'=> array(
					'title'		=> __( 'Instagram', 'kitring' ),
					'icon'		=> 'instagram'
				),
				'youtube_link'	=> array(
					'title'		=> __( 'Youtube', 'kitring' ),
					'icon'		=> 'youtube'
				),
				'dribble_link'	=> array(
					'title'		=> __( 'Dribbble', 'kitring' ),
					'icon'		=> 'dribbble'
				),
				'email_link'	=> array(
					'title'		=> __( 'Mail', 'kitring' ),
					'icon'		=> 'df_mail-open'
				),
				'snapchat_link'	=> array(
					'title'		=> __( 'Snapchat', 'kitring' ),
					'icon'		=> 'df_snapchat'
				),
				'linkedin_link'	=> array(
					'title'		=> __( 'LinkedIn', 'kitring' ),
					'icon'		=> 'linkedin'
				),
			)
		);

		parent::__construct(
			// Base ID widget
			'dahz_about_me_widget',
			// Widget name in UI
			esc_html__( 'Dahz About Me', 'kitring' ),
			// Widget description
			array(
				'description' => esc_html__( 'Display an about me widget.', 'kitring' ),
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

		$author_name	 = ! empty( $instance['author_name'] ) ? $instance['author_name'] : '';
		$author_bio		 = ! empty( $instance['author_bio'] ) ? $instance['author_bio'] : '';
		$profile_picture = ! empty( $instance['profile_picture'] ) ? wp_get_attachment_image( $instance['profile_picture'], 'medium', '', array( 'class' => 'de-ratio-content' ) ) : '';
		$profile_link	 = ! empty( $instance['profile_link'] ) ? $instance['profile_link'] : '#';
		$link_text		 = ! empty( $instance['link_text'] ) ? '<a href="'. esc_url( $profile_link ) .'" title="'. $instance['link_text'] .'">'. esc_html( $author_name ) .'</a>' : esc_html( $author_name );

		$about_me_socials_html = '';

		if ( !empty( self::$socials ) && is_array( self::$socials ) ) {

			foreach( self::$socials as $id => $social ) {

				if ( empty( ${$id} ) ) { continue; }

				$about_me_socials_html .= sprintf(
					'
					<li class="uk-margin-small-bottom"><a href="%1$s" class="uk-icon-link" data-uk-icon="%2$s" title="%3$s %4$s"></a></li>
					',
					esc_url( ${$id} ),
					esc_attr( $social['icon'] ),
					esc_attr__( 'Follow Me On', 'kitring' ),
					esc_attr( $social['title'] )
				);

			}

		}

		echo sprintf(
			'
			%6$s
			<div class="dahz-widget__wrapper dahz-widget__wrapper--%8$s">
				%1$s
				<div class="de-widget__about-me">
					<div class="de-ratio de-ratio-4-3">
						%2$s
					</div>
					<div class="uk-padding uk-text-center">
						%3$s
						%4$s
						<hr class="uk-divider-small">
						<ul class="uk-iconnav uk-flex-center">
							%5$s
						</ul>
					</div>
				</div>
			</div>
			%7$s
			',
			$title, # 1
			$profile_picture, # 2
			!empty( $link_text ) ? sprintf( '<h6>%s</h6>', $link_text ) : '', # 3
			!empty( $author_bio ) ? sprintf( '<p>%s</p>', esc_html( $author_bio ) ) : '', # 4
			$about_me_socials_html, # 5
			$args['before_widget'], # 6
			$args['after_widget'], # 7
			$this->id_base # 8
		);

	}

	// Widget Backend
	public function form( $instance ) {

		extract( $instance );

		$profile_picture_image_src = !empty( $profile_picture ) ? wp_get_attachment_image_src( $profile_picture, 'medium' ) : '';

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $title ) ? $title : '' ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'author_name' ) ); ?>"><?php esc_html_e( 'Author Name:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'author_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author_name' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $author_name ) ? $author_name : '' ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'author_bio' ) ); ?>"><?php esc_html_e( 'Author Bio:', 'kitring' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'author_bio' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author_bio' ) ); ?>" type="text"><?php echo esc_attr( !empty( $author_bio ) ? $author_bio : '' ); ?></textarea>
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'profile_link' ) ); ?>"><?php esc_html_e( 'Profile Link:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'profile_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'profile_link' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $profile_link ) ? $profile_link : '' ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>"><?php esc_html_e( 'Link Text:', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link_text' ) ); ?>" type="text" value="<?php echo esc_attr( !empty( $link_text ) ? $link_text : '' ); ?>" />
		</p>
		<?php
		if ( !empty( self::$socials ) && is_array( self::$socials ) ) :
			foreach( self::$socials as $id => $social ):
		?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( $id ) ); ?>"><?php echo esc_html( $social['title'] ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $id ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $id ) ); ?>" type="text" value="<?php echo esc_attr( !empty( ${$id} ) ? ${$id} : '' ); ?>" />
			</p>
		<?php
			endforeach;
		endif;

	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['author_name'] = ( ! empty( $new_instance['author_name'] ) ) ? strip_tags( $new_instance['author_name'] ) : '';

		$instance['author_bio'] = ( ! empty( $new_instance['author_bio'] ) ) ? strip_tags( $new_instance['author_bio'] ) : '';

		$instance['profile_picture'] = ( ! empty( $new_instance['profile_picture'] ) ) ? strip_tags( $new_instance['profile_picture'] ) : '';

		$instance['profile_link'] = ( ! empty( $new_instance['profile_link'] ) ) ? strip_tags( $new_instance['profile_link'] ) : '';

		$instance['link_text'] = ( ! empty( $new_instance['link_text'] ) ) ? strip_tags( $new_instance['link_text'] ) : '';

		if ( !empty( self::$socials ) && is_array( self::$socials ) ) {

			foreach( self::$socials as $id => $social ) {

				$instance[$id] = ( ! empty( $new_instance[$id] ) ) ? strip_tags( $new_instance[$id] ) : '';

			}

		}

		return $instance;
	}
}

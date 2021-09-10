<?php

class Dahz_Framework_Recent_Post_Widget extends WP_Widget {

	function __construct() {

		parent::__construct(
			'dahz_recent_post_widget',
			__( 'Dahz Recent Posts', 'kitring' ),
			array(
				'description' => esc_html__( 'Widget for display Recent Posts.' , 'kitring' )
			)
		);
	}

	/**
	 * widget
	 * for displaying widget front end
	 * @param $args, $instance
	 * @return void
	 */
	public function widget( $args, $instance ) {

		global $post;

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		// before and after widget arguments are defined by themes
		if ( ! empty( $title ) ) {
			$title = $args['before_title'] . $title . $args['after_title'];
		}

		$limit_post_review = $instance['limit_post_review'];

		$args_query = array(
			'posts_per_page'		=> (int)$limit_post_review,
			'ignore_sticky_posts'	=> 1,
		);

		if ( is_singular( 'post' ) ) {

			$args_query['post__not_in'] = array( get_the_ID() );

		}

		$recent_posts_html = '';

		$recent_posts = get_posts( $args_query );

		if ( $recent_posts ) {

			foreach( $recent_posts as $post ) {

				$media = '';

				setup_postdata( $post );

				$id = get_the_ID();

				if ( has_post_thumbnail( $id ) ) {

					$media = get_the_post_thumbnail(
						$id,
						'thumbnail'
					);

				}

				$recent_posts_html .= sprintf(
					'
					<div class="de-widget__recent-posts">
						<div class="de-widget__recent-posts-image">
							%1$s
						</div>
						<div class="de-widget__recent-posts-description">
							<h6 class="uk-margin-small-bottom"><a href="%4$s" title="%2$s">%2$s</a></h6>
							<div class="de-widget__recent-posts-meta">
								%3$s
							</div>
						</div>
					</div>
					',
					$media,
					get_the_title(),
					dahz_framework_get_post_meta(),
					get_the_permalink()
				);

			}

		}

		wp_reset_postdata();

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
			$recent_posts_html,
			$args['after_widget']
		);
	}

	/**
	 * form
	 * for widget in admin page
	 * @param $instance
	 * @return void
	 */
	public function form( $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Recent Posts', 'kitring' );

		$limit_post_review = !empty( $instance['limit_post_review'] ) ? (int)$instance['limit_post_review'] : 5;

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name ( 'title' ) ); ?>"><?php esc_html_e( 'Title: ', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name ( 'limit_post_review' ) ); ?>"><?php esc_html_e( 'Number Posts to Show: ', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limit_post_review' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limit_post_review' ) ); ?>" type="text" value="<?php echo esc_attr( $limit_post_review ); ?>" />
		</p>
		<?php
	}

	/**
	 * update
	 * sanitize widget form values as they are saved
	 * @param $new_instance, $old_instance
	 * @return $instance
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['limit_post_review'] = ( !empty( $new_instance['limit_post_review'] ) ) ? $new_instance['limit_post_review'] : '5';

		return $instance;

	}
}
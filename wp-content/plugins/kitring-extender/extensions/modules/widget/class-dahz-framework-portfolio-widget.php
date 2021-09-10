<?php
class Portfolio_Widget extends WP_Widget {

	function __construct() {

		$widget_details = array(
			'description' => esc_html__( 'Widget for display Portfolio' , 'kitring' )
		);

		parent::__construct(
			'dahz_portfolio_widget',
			'Widget Portfolio',
			$widget_details
		);

	}

	/**
	 * widget
	 * for displaying widget front end
	 * @param $args, $instance
	 * @return void
	 */
	public function widget( $args, $instance ) {

		extract( $args );

		global $post;

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		// before and after widget arguments are defined by themes
		if ( ! empty( $title ) ){
			$title = $args['before_title'] . $title . $args['after_title'];
		}

		$limit_post_review = !empty( $instance['limit_post_review'] ) ? (int)$instance['limit_post_review'] : 5;

		$order_by = $instance['portfolio_order'];

		$sort_by = $instance['portfolio_sort'];

		$categories = !empty( $instance['categories'] ) && is_array( $instance['categories'] ) ? $instance['categories'] : array();

		$args_query = array(
			'posts_per_page'		=> (int)$limit_post_review,
			'ignore_sticky_posts'	=> 1,
			'post_type'				=> 'portfolio',
			'orderby'           	=> $order_by,
			'order'             	=> $sort_by
		);

		if( is_singular( 'portfolio' ) ){

			$args_query['post__not_in'] = array( get_the_ID() );

		}

		if( !empty( $categories ) ){

			$args_query['tax_query'] = array(
		        array (
		            'taxonomy' => 'portfolio_categories',
		            'field' => 'term_id',
		            'terms' => $categories,
		        )
		    );

		}

		$recent_posts_html = '';

		$recent_posts = get_posts( $args_query );

		if ( $recent_posts ){

			foreach( $recent_posts as $post ) {

				$media = false;

				setup_postdata( $post );

				$id = get_the_ID();

				if ( has_post_thumbnail( $id ) ) {

					$media = get_the_post_thumbnail_url(
						$id,
						'thumbnail'
					);

				}

				$recent_posts_html .= sprintf(
					'
					<a href="%s">
					   <div class="de-widget__portfolio" %s>
						   <div class="de-widget__portfolio-title de-widget__category-title">
							   <h3>%s</h3>
						   </div>
					   </div>
				   </a>
					',
					get_the_permalink(),
					( $media ) ? 'style="background: url(' . esc_url( $media ) . ') no-repeat; background-size: cover;"' : '',
					get_the_title()

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
	public function form( $instance ){

		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Portfolio', 'kitring' );

		$portfolio_order = ! empty( $instance[ 'portfolio_order' ] ) ? $instance[ 'portfolio_order' ] : esc_html__( 'id', 'kitring' );

		$portfolio_sort	= ! empty( $instance[ 'portfolio_sort' ] ) ? $instance[ 'portfolio_sort' ] : esc_html__( 'uncategorized', 'kitring' );

		$limit_post_review = !empty( $instance['limit_post_review'] ) ? (int)$instance['limit_post_review'] : 5;

		$categories = !empty( $instance['categories'] ) && is_array( $instance['categories'] ) ? $instance['categories'] : array();

		$get_all_categories = get_terms(
			'portfolio_categories',
			array(
				'hide_empty' => false
			)
		);
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name ('title') ); ?>"><?php esc_html_e( 'Title: ', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name ('limit_post_review') ); ?>"><?php esc_html_e( 'Number Posts to Show: ', 'kitring' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limit_post_review' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limit_post_review' ) ); ?>" type="text" value="<?php echo esc_attr( $limit_post_review ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'portfolio_order' ) );?>"><?php esc_html_e( 'Order :' , 'kitring'  )?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'portfolio_order' ) );?>" name="<?php echo esc_attr( $this->get_field_name( 'portfolio_order' ) );?>">
				<option value="id" <?php selected( 'id', $portfolio_order );?>>
					<?php esc_html_e( 'Post ID', 'kitring' );?>
				</option>
				<option value="title" <?php selected( 'title', $portfolio_order );?>>
					<?php esc_html_e( 'Title', 'kitring' );?>
				</option>
				<option value="date" <?php selected( 'date', $portfolio_order );?>>
					<?php esc_html_e( 'Date', 'kitring' );?>
				</option>
				<option value="last_modified" <?php selected( 'last_modified', $portfolio_order );?>>
					<?php esc_html_e( 'Last Modified', 'kitring' );?>
				</option>
				<option value="random" <?php selected( 'random', $portfolio_order );?>>
					<?php esc_html_e( 'Random', 'kitring' );?>
				</option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'portfolio_sort' ) );?>"><?php esc_html_e( 'Sort :' , 'kitring'  );?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'portfolio_sort' ) );?>" name="<?php echo esc_attr( $this->get_field_name( 'portfolio_sort' ) );?>">
				<option value="asc" <?php selected( 'asc', $portfolio_sort );?>>
					<?php esc_html_e( 'Ascending' , 'kitring'  );?>
				</option>
				<option value="desc" <?php selected( 'desc', $portfolio_sort );?>>
					<?php esc_html_e( 'Descending' , 'kitring'  );?>
				</option>
			</select>
		</p>
		<label><?php esc_html_e( 'Category', 'kitring' ); ?></label>
		<?php
		if( !is_wp_error( $get_all_categories ) ){
			foreach ( $get_all_categories as $key => $value ) {
				?>
				<p>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $value->slug) ); ?>" name="<?php echo( $this->get_field_name( 'categories' ) ); ?>[]" type="checkbox" value="<?php echo esc_attr( $value->term_id );?>" <?php checked( true, in_array( $value->term_id, $categories ) );?>/>
					<label for="<?php echo esc_attr( $this->get_field_id( $value->slug ) ); ?>"><?php echo esc_attr( $value->name ); ?></label>
				</p>
				<?php
			}
		}

	}

	/**
	 * update
	 * sanitize widget form values as they are saved
	 * @param $new_instance, $old_instance
	 * @return $instance
	 */
	public function update( $new_instance, $old_instance ){

		$instance = $old_instance;

		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['limit_post_review'] = ( !empty( $new_instance['limit_post_review'] ) ) ? $new_instance['limit_post_review'] : '5';

		$instance[ 'portfolio_order' ]	= ( ! empty( $new_instance[ 'portfolio_order' ] ) ) ? strip_tags( $new_instance[ 'portfolio_order' ] ) : '';

		$instance[ 'portfolio_sort' ]	= ( ! empty( $new_instance[ 'portfolio_sort' ] ) ) ? strip_tags( $new_instance[ 'portfolio_sort' ] ) : '';

		$instance[ 'categories' ]	= ( ! empty( $new_instance[ 'categories' ] ) ) ? $new_instance[ 'categories' ] : array();

		return $instance;
	}
}

<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Recent Reviews Widget.
 *
 * @author   DAHZ - KW
 * @category Widgets
 * @package  Dahz_Modules/Widgets
 * @version  1.0.0
 * @extends  WC_Widget
 */

if( class_exists( 'WC_Widget' ) ){

	class Dahz_Framework_Widget_Recent_Reviews extends WC_Widget {

		/**
		 * Constructor.
		 */
		public function __construct() {

			$this->widget_cssclass    = 'woocommerce widget_recent_reviews';
			$this->widget_description = esc_html__( 'Display a list of recent reviews from your store.', 'kitring' );
			$this->widget_id          = 'woocommerce_recent_reviews';
			$this->widget_name        = esc_html__( 'Recent Product Reviews (Customized by Dahz)', 'kitring' );
			$this->settings           = array(
				'title'  => array(
					'type'  => 'text',
					'std'   => esc_html__( 'Recent reviews', 'kitring' ),
					'label' => esc_html__( 'Title', 'kitring' ),
				),
				'number' => array(
					'type'  => 'number',
					'step'  => 1,
					'min'   => 1,
					'max'   => '',
					'std'   => 10,
					'label' => esc_html__( 'Number of reviews to show', 'kitring' ),
				),
			);

			parent::__construct();
		}

		/**
		 * Output widget.
		 *
		 * @see WP_Widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		 public function widget( $args, $instance ) {
			global $comments, $comment;

			if ( $this->get_cached_widget( $args ) ) {
				return;
			}

			ob_start();

			$number   = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];
			$comments = get_comments( array( 'number' => $number, 'status' => 'approve', 'post_status' => 'publish', 'post_type' => 'product', 'parent' => 0 ) );

			if ( $comments ) {
				$this->widget_start( $args, $instance );

				echo '<ul class="product_list_widget">';

				foreach ( (array) $comments as $comment ) {

					$_product = wc_get_product( $comment->comment_post_ID );

					$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );

					$rating_html = wc_get_rating_html( $rating );

					echo sprintf(
						'
						<li>
							<div class="de-widget-recent-review__media">
								%1$s
							</div>
							<div class="de-widget-recent-review__detail">
								<h6 class="de-widget-recent-review__title"><a href="%2$s">%3$s</a></h6>
								<div class="de-widget-recent-review__rating">
									%4$s
								</div>

								<p class="de-widget-recent-review__reviewer">%5$s</p>
							</div>
						</li>
						',
						$_product->get_image(),
						esc_url( get_comment_link( $comment->comment_ID ) ),
						wp_kses_post( $_product->get_name() ),
						$rating_html,
						sprintf( esc_html__( 'by %s', 'kitring' ), get_comment_author() )
					);

				}

				echo '</ul>';

				$this->widget_end( $args );
			}

			$content = ob_get_clean();

			echo( $content );

			$this->cache_widget( $args, $content );
		}
	}

}

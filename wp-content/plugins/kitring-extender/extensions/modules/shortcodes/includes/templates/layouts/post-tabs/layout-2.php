<?php
global $post;

foreach( $query as $post ){
	$wrapper_attributes = array(
		'class' => array(
			"uk-text-{$post_alignment}",
			$box_shadow,
			$hover_box_shadow,
			'de-sc-post-tabs__item-container',
			'uk-position-relative',
			'uk-overflow-hidden',
			'uk-width-1-1',
		),
		'style' => array()
	);

	// if( !empty( $box_shadow ) || !empty( $hover_box_shadow ) ) $wrapper_attributes['style'][] = 'transform:scale(0.9);';
	if( !empty( $bg_color ) ) $wrapper_attributes['style'][] = "background:{$bg_color};";
	setup_postdata( $post );
	$list_category = get_the_category( get_the_ID() );
	?>
	<li <?php post_class( 'de-sc-post-tabs__item' );?>>
		<div <?php
			dahz_shortcode_set_attributes(
				$wrapper_attributes,
				'post_slider_items'
			);?>>
				<a class="de-ratio de-ratio-<?php echo esc_attr( $media_ratio );?>" href="<?php echo esc_url( get_permalink() );?>">
					<?php if( empty( $is_disable_feature_image ) &&  has_post_thumbnail( get_the_ID() ) ) : ?>
						<?php echo get_the_post_thumbnail( get_the_ID(), 'large' , array( 'class' => 'de-ratio-content' ) ); ?>
					<?php endif;?>
				</a>
			<div class="de-sc-post-tabs__content uk-margin-large-top uk-padding uk-position-bottom-left uk-padding">
				<?php
				// if( empty( $is_hide_category ) ){

					// $categories_html = '';

					// foreach( $list_category as $category ) {

						// $categories_html .= sprintf(
							// '
							// <a href="%1$s"%3$s>
								// %2$s
							// </a>
							// ',
							// esc_url( get_category_link( $category->term_id ) ),
							// esc_html( $category->name ),
							// !empty( $category_color ) ? ' style="color:'. $category_color .';"' : ''
						// );

					// }
					// echo sprintf(
						// '
						// <div class="entry-category%2$s">
							// %1$s
						// </div>
						// ',
						// $categories_html,
						// !empty( $is_category_uppercase ) ? ' uk-text-uppercase' : ''
					// );
				// }
				echo sprintf(
					'<%1$s class="%4$s"><a href="%5$s"%3$s>%2$s</%1$s></a>',
					$title_element_tag,
					get_the_title(),
					!empty( $title_color ) ? ' style="color:' . $title_color . ';"' : '',
					!empty( $is_title_uppercase ) ? 'uk-text-uppercase' : '',
					esc_url( get_permalink() )
				);
				?>
				<?php if( empty( $is_hide_author ) || empty( $is_hide_date ) ):?>
				<div class="entry-meta<?php echo !empty( $is_meta_uppercase ) ? esc_attr( " uk-text-uppercase" ) : '';?>">
					<?php
					if( empty( $is_hide_author ) ){

						echo sprintf(
							'
							<a href="%1$s" class="entry-meta__author"%4$s>%2$s</a>
							%3$s
							',
							esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
							get_the_author(),
							empty( $is_hide_date ) ? '<span class="de-divider"> | </span>' : '',
							!empty( $post_meta_color ) ? ' style="color:'. $post_meta_color .';"' : ''
						);

					}
					if( empty( $is_hide_date ) ){

						echo sprintf(
							'
							<a href="%1$s" rel="bookmark" class="entry-meta__time"><i class="oi-time" %3$s></i> %2$s</a>
							',
							esc_url( get_day_link( get_the_date('Y'), get_the_date('m'), get_the_date('d') ) ),
							sprintf(
								'<time class="entry-date published updated" datetime="%1$s"%3$s>
									%2$s
								</time>',
								esc_attr( get_the_date( 'c' ) ),
								get_the_date(),
								!empty( $post_meta_color ) ? ' style="color:'. $post_meta_color .';"' : ''
							),
							!empty( $post_meta_color ) ? ' style="color:'. $post_meta_color .';"' : ''
						);

					}
					?>
				</div>
				<?php endif;?>
				<?php if( empty( $is_hide_excerpt ) ):?>
				<p class="entry-excerpt"<?php echo !empty( $excerpt_color ) ? " style='color:{$excerpt_color};'" : '';?>>
					<?php
					$excerpt = get_the_excerpt();

					$excerpt = !empty( $excerpt ) ? $excerpt : strip_shortcodes( get_the_content() );

					echo wp_trim_words( $excerpt, $excerpt_length, ' ... ');
					?>
				</p>
				<?php endif;?>
				<?php if( empty( $is_hide_share ) ):?>
					<?php echo dahz_framework_upscale_get_social_share( $share_color );?>
				<?php endif;?>
			</div>
		</div>
	</li>
	<?php
}

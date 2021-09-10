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
			'uk-widht-1-1',
		),
		'style' => array()
	);
	# Button Text
    if ( empty( $button_text ) )
		$button_text = 'Read More';

	// if( !empty( $box_shadow ) || !empty( $hover_box_shadow ) ) $wrapper_attributes['style'][] = 'transform:scale(0.9);';
	if( !empty( $bg_color ) ) $wrapper_attributes['style'][] = "background:{$bg_color};";
	setup_postdata( $post );
	$list_category = get_the_category( get_the_ID() );
	?>
	<li class="de-sc-post-tabs__item <?php foreach ( $list_category as $key => $value ) { echo esc_attr( $value->category_nicename ) . ' '; } ?>">
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
			<div class="de-sc-post-tabs__content uk-padding uk-position-center-left uk-padding-large uk-overflow-hidden	">
				<span class="de-sc-divider-ornament de-sc-divider-ornament--unhovered"></span>
				<div class="de-sc-post-tabs__meta uk-margin entry-meta<?php echo !empty( $is_meta_uppercase ) ? esc_attr( " uk-text-uppercase" ) : '';?>">

					<?php
					if( empty( $is_hide_author ) ){

						$args_ava = array(
							'size' => 38,
							'height' => '',
							'width' => '',
							'default' =>'',
							'force_default' => '',
							'rating' => '',
							'scheme' => '',
							'class' => 'uk-border-circle'
						);
						echo get_avatar( get_the_ID(), 38, '', '', $args_ava );
						echo '<span class="by_separator uk-margin-small-left">' . esc_html__( ' By ', 'sobari_sc' ) . '&nbsp</span>';
						echo sprintf(
							'
							<a href="%1$s" class="entry-meta__author"%3$s>%2$s&nbsp</a>
							',
							esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
							get_the_author(),
							!empty( $post_meta_color ) ? ' style="color:'. $post_meta_color .';"' : ''
						);
						if( empty( $is_hide_meta_category ) ){

							$categories_html = '';

							foreach( $list_category as $category ) {

								$categories_html .= sprintf(
									'
									<a href="%1$s"%3$s>
										%2$s
									</a>
									',
									esc_url( get_category_link( $category->term_id ) ),
									esc_html( $category->name ),
									!empty( $category_color ) ? ' style="color:'. $category_color .';"' : ''
								);

							}
							echo '<span class="by_separator">' . esc_html__( ' in ', 'sobari_sc' ) . '&nbsp</span>';
							echo sprintf(
								'
								<div class="entry-category%2$s">
									%1$s
								</div>
								',
								$categories_html,
								!empty( $is_category_uppercase ) ? ' uk-text-uppercase' : ''
							);
						}
					}

					?>
				</div>
				<?php
				echo sprintf(
					'<%1$s class="%4$s"><a href="%5$s"%3$s>%2$s</%1$s></a>',
					$title_element_tag,
					get_the_title(),
					!empty( $title_color ) ? ' style="color:' . $title_color . ';"' : '',
					!empty( $is_title_uppercase ) ? 'uk-text-uppercase' : '',
					esc_url( get_permalink() )
				);
				?>
				<span class="de-sc-divider-ornament de-sc-divider-ornament--hovered"></span>
				<?php if( empty( $is_hide_author ) || empty( $is_hide_date ) ):?>

				<?php endif;?>
				<?php if( empty( $is_hide_excerpt ) ):?>
				<p class="entry-excerpt"<?php echo !empty( $excerpt_color ) ? " style='color:{$excerpt_color};'" : '';?>>
					<?php
					$excerpt = get_the_excerpt();

					$excerpt = !empty( $excerpt ) ? $excerpt : strip_shortcodes( get_the_content() );

					echo wp_trim_words( $excerpt, $excerpt_length, ' ... ');
					?>
				</p>
				<?php
				endif;
					if (!$is_hide_button) :
				?>
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="de-sc-post-tabs__button">
					<?php echo esc_html( $button_text, 'sobari_sc' ) ?> <span data-uk-icon="icon: arrow-right"></span>
				</a>
			<?php
				endif;?>
			</div>
		</div>
	</li>
	<?php
}

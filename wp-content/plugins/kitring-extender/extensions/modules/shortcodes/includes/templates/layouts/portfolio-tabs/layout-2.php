<?php
global $post;

foreach( $post_query as $post ){
	$wrapper_attributes = array(
		'class' => array(
			"uk-text-center",
			$box_shadow,
			$hover_box_shadow,
			'de-sc-portfolio-tabs__item-container',
			'uk-position-relative',
			'uk-transition-toggle'

		),
		'style' => array()
	);
	$args = array('type' => 'portfolio', 'taxonomy' => 'portfolio_categories');

	// if( !empty( $box_shadow ) || !empty( $hover_box_shadow ) ) $wrapper_attributes['style'][] = 'transform:scale(0.9);';

	if( !empty( $bg_color ) ) $wrapper_attributes['style'][] = "background:{$bg_color};";

	setup_postdata( $post );

	$list_category = get_the_terms( get_the_ID(), 'portfolio_categories' );

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
			!empty( $text_color ) ? ' style="color:'. $text_color .';"' : ''
		);

	}
	?>
	<li class="de-sc-portfolio-tabs__item <?php foreach ($list_category as $key => $value) { echo esc_attr( $value->slug ) . ' '; } ?>">
		<div <?php
			dahz_shortcode_set_attributes(
				$wrapper_attributes,
				'portfolio_tabs_items'
			);?>>
			<?php if ( has_post_thumbnail( get_the_ID() ) ) : ?>
				<a class="de-ratio de-ratio-<?php echo esc_attr( $media_ratio );?>" href="<?php echo esc_url( get_permalink() );?>">
					<?php echo get_the_post_thumbnail( get_the_ID(), 'large' , array( 'class' => 'de-ratio-content' ) ); ?>
				</a>
			<?php endif;?>
			<div class="de-sc-portfolio-tabs__content uk-transition-scale-down uk-padding uk-position-cover uk-flex uk-flex-center uk-flex-column uk-flex-middle uk-padding-large">
				<?php
				echo sprintf(
					'<%1$s class="%4$s"><a href="%5$s"%3$s>%2$s</%1$s></a>',
					$title_element_tag,
					get_the_title(),
					!empty( $text_color ) ? ' style="color:' . $text_color . ';"' : '',
					!empty( $is_title_uppercase ) ? 'uk-text-uppercase' : '',
					esc_url( get_permalink() )
				);
				?>

				<div class="de-sc-portfolio-tabs__meta uk-margin entry-meta<?php echo !empty( $is_meta_uppercase ) ? esc_attr( " uk-text-uppercase" ) : '';?>">

					<?php
					if( empty( $is_hide_meta_category ) ){

						$list_category = get_the_terms( get_the_ID(), 'portfolio_categories' );

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
								!empty( $text_color ) ? ' style="color:'. $text_color .';"' : ''
							);

						}
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

					?>
				</div>

			</div>
		</div>
	</li>
	<?php
}

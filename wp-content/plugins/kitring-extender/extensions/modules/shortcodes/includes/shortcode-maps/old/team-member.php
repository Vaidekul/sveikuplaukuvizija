<?php
/**
*
*/
if( !class_exists( 'Sobari_Team_Member_Shortcode' ) ){

	class Sobari_Team_Member_Shortcode extends Dahz_Framework_Shortcode_Template {

		function __construct() {

			$param = array(
				'name'				=> esc_attr__( 'Team Member', 'sobari_sc' ),
				'base'				=> 'team_member',
				'description'		=> esc_attr__( 'Display team member profile', 'sobari_sc' ),
				'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/Team-Member.svg",
				'params'			=> array()
			);
			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Team Member Style', 'sobari_sc' ),
				'param_name'	=> 'style',
				'value'			=> array(
					'Simple'						=> 'simple',
					'Outline'						=> 'outline',
					'Background'					=> 'background',
					'Centered Text on Hover'		=> 'hover_centered_text',
					'Left-side Text on Hover'		=> 'hover_left_side_text',
					'Social Media Icon on Hover'	=> 'hover_social_media_icon',
					'Bottom Text on Hover'			=> 'hover_bottom_text',
					'Slide in Text on Hover'		=> 'hover_slide_in_text',
					'Slide up Text on Hover'		=> 'hover_slide_up_text',
				),
				'description'	=> esc_attr__( 'Team Member Style', 'sobari_sc' ),
			);

			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Text Color', 'sobari_sc' ),
				'param_name'	=> 'text_color',
				'description'	=> esc_attr__( 'Text Color', 'sobari_sc' ),
				'value'			=> array(
					'Light'		=> 'light',
					'Dark'		=> 'dark'
				),
				'dependency'	=> array(
					'element'	=> 'style',
					'value'		=> array(
						'background',
						'hover_centered_text',
						'hover_left_side_text',
						'hover_social_media_icon',
						'hover_bottom_text',
						'hover_slide_in_text',
						'hover_slide_up_text',
					)
				)
			);

			$param['params'][] = array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Color Overlay', 'sobari_sc' ),
				'param_name'	=> 'overlay_color',
				'description'	=> esc_attr__( 'Color Overlay', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'style',
					'value'		=> array(
						'hover_centered_text',
						'hover_left_side_text',
						'hover_social_media_icon',
						'hover_bottom_text',
						'hover_slide_in_text',
						'hover_slide_up_text',
					)
				)
			);

			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Alignment', 'sobari_sc' ),
				'param_name'	=> 'alignment',
				'value'			=> self::$helper['field_options']['alignment'],
				'description'	=> esc_attr__( 'Alignment', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'style',
					'value'		=> array( 'simple', 'hover_bottom_text' )
				)
			);
			$param['params'][] = array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Border Color', 'sobari_sc' ),
				'param_name'	=> 'border_color',
				'description'	=> esc_attr__( 'Border Color', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'style',
					'value'		=> 'outline'
				)
			);
			$param['params'][] = array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Background Color', 'sobari_sc' ),
				'param_name'	=> 'background_color',
				'description'	=> esc_attr__( 'Background Color', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'style',
					'value'		=> 'background'
				)
			);

			$param['params'][] = array(
				'type'			=> 'checkbox',
				'heading'		=> esc_attr__( 'Enable Gradient', 'sobari_sc' ),
				'param_name'	=> 'enable_gradient',
				'description'	=> esc_attr__( 'Enable Gradient', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'style',
					'value'		=> array(
						'hover_centered_text',
						'hover_left_side_text',
						'hover_social_media_icon',
						'hover_bottom_text',
						'hover_slide_in_text',
						'hover_slide_up_text',
					)
				)
			);

			$param['params'][] = array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_attr__( 'Color Overlay 2', 'sobari_sc' ),
				'param_name'	=> 'overlay_color_2',
				'description'	=> esc_attr__( 'Color Overlay 2', 'sobari_sc' ),
				'dependency'	=> array(
					'element'	=> 'enable_gradient',
					'value'		=> 'true',
				)
			);

			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Gradient Direction', 'js_composer' ),
				'param_name'	=> 'gradient_direction',
				'description'	=> esc_attr__( 'Gradient Direction', 'js_composer' ),
				'value'			=> array(
					'Left to Right' 			=> 'left_to_right',
					'Left Top to Right Bottom'	=> 'left_top_to_right_bottom',
					'Left Bottom to Right Top'	=> 'left_bottom_to_right_top',
					'Top To Bottom'				=> 'top_to_bottom'
				),
				'dependency'	=> array(
					'element'	=> 'enable_gradient',
					'value'		=> 'true',
				)
			);

			$param['params'][] = array(
				'type'			=> 'dropdown',
				'heading'		=> esc_attr__( 'Color Strength', 'js_composer' ),
				'param_name'	=> 'color_strength',
				'description'	=> esc_attr__( 'Color Strength', 'js_composer' ),
				'value'			=> Dahz_Framework_Shortcode_Template::$helper['field_options']['strength'],
			);


			$param['params'][] = array(
				'type'			=> 'attach_image',
				'heading'		=> esc_attr__( 'Member Picture', 'sobari_sc' ),
				'param_name'	=> 'member_picture',
				'description'	=> esc_attr__( 'Member Picture', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Member Name', 'sobari_sc' ),
				'param_name'	=> 'member_name',
				'description'	=> esc_attr__( 'Member Name', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Member Job Position', 'sobari_sc' ),
				'param_name'	=> 'member_job_position',
				'description'	=> esc_attr__( 'Member Job Position', 'sobari_sc' ),
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'About Member', 'sobari_sc' ),
				'param_name'	=> 'member_about',
				'description'	=> esc_attr__( 'About Member', 'sobari_sc' ),
			);

			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Facebook Link', 'sobari_sc' ),
				'param_name'	=> 'facebook_link',
				'description'	=> esc_attr__( 'Facebook Link', 'sobari_sc' ),
				'group'			=> __( 'Social Links', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Twitter Link', 'sobari_sc' ),
				'param_name'	=> 'twitter_link',
				'description'	=> esc_attr__( 'Twitter Link', 'sobari_sc' ),
				'group'			=> __( 'Social Links', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Snapchat Link', 'sobari_sc' ),
				'param_name'	=> 'snapchat_link',
				'description'	=> esc_attr__( 'Snapchat Link', 'sobari_sc' ),
				'group'			=> __( 'Social Links', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Pinteres Link', 'sobari_sc' ),
				'param_name'	=> 'pinteres_link',
				'description'	=> esc_attr__( 'Pinteres Link', 'sobari_sc' ),
				'group'			=> __( 'Social Links', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Linkedin Link', 'sobari_sc' ),
				'param_name'	=> 'linkedin_link',
				'description'	=> esc_attr__( 'Linkedin Link', 'sobari_sc' ),
				'group'			=> __( 'Social Links', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Google+ Link', 'sobari_sc' ),
				'param_name'	=> 'google_plus_link',
				'description'	=> esc_attr__( 'Google+ Link', 'sobari_sc' ),
				'group'			=> __( 'Social Links', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Youtube Link', 'sobari_sc' ),
				'param_name'	=> 'youtube_link',
				'description'	=> esc_attr__( 'Youtube Link', 'sobari_sc' ),
				'group'			=> __( 'Social Links', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Instagram Link', 'sobari_sc' ),
				'param_name'	=> 'instagram_link',
				'description'	=> esc_attr__( 'Instagram Link', 'sobari_sc' ),
				'group'			=> __( 'Social Links', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Dribble Link', 'sobari_sc' ),
				'param_name'	=> 'dribble_link',
				'description'	=> esc_attr__( 'Dribble Link', 'sobari_sc' ),
				'group'			=> __( 'Social Links', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Tumblr Link', 'sobari_sc' ),
				'param_name'	=> 'tumblr_link',
				'description'	=> esc_attr__( 'Tumblr Link', 'sobari_sc' ),
				'group'			=> __( 'Social Links', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'Email Address', 'sobari_sc' ),
				'param_name'	=> 'email_address',
				'description'	=> esc_attr__( 'Email Address', 'sobari_sc' ),
				'group'			=> __( 'Social Links', 'sobari_sc' )
			);
			$param['params'][] = array(
				'type'			=> 'textfield',
				'heading'		=> esc_attr__( 'URL Profiling', 'sobari_sc' ),
				'param_name'	=> 'url_profiling',
				'description'	=> esc_attr__( 'URL Profiling', 'sobari_sc' ),
				'group'			=> __( 'Social Links', 'sobari_sc' )
			);

			// add_filter( 'dahz_shortcode_build_css_team_member', array( $this, 'team_member_css' ), 10, 4 );

			parent::dahz_framework_shortcode_maps( $param );

		}
		public function team_member_css( $vc_style, $attr_array, $key ) {

			$uniqid 	= $key;

			extract( $attr_array );

			$gradient_direction = !empty( $gradient_direction ) ? $gradient_direction : '0deg';

			$color_strength     = !empty( $color_strength ) ? $color_strength : '';

			$text_color         = !empty( $text_color ) ? $text_color : '' ;

			switch ( $gradient_direction ) {
				case 'left_to_right':
				$gradient_direction = '90deg';
				break;
				case 'left_top_to_right_bottom':
				$gradient_direction = '135deg';
				break;
				case 'left_bottom_to_right_top':
				$gradient_direction = '45deg';
				break;
				case 'top_to_bottom':
				$gradient_direction = 'to bottom';
				break;
			}

			switch ( $color_strength ) {
				case 'light':
				$color_strength = 'opacity:0.25;';
				break;
				case 'medium':
				$color_strength = 'opacity: 0.5;';
				break;
				case 'heavy':
				$color_strength = 'opacity: 0.75;';
				break;
				case 'solid':
				$color_strength = 'opacity: 1;';
				break;
			}

			// Text Color (get from header transparent style)
			$text_color = $text_color === 'light' ? dahz_framework_get_option( 'header_transparent_light_color', '#ffffff' ) : dahz_framework_get_option( 'header_transparent_dark_color', '#000000' );

			$vc_style .= sprintf('
				#%1$s.de-sc-team-member.de-sc-team-member--outline .de-sc-team-member__content {
					border-color: %2$s;
				}

				#%1$s.de-sc-team-member.de-sc-team-member--background * {
					color: %3$s;
					background: %4$s;
				}

				#%1$s.de-sc-team-member.de-sc-team-member--hover_centered_text:hover .de-sc-team-member__image:before,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_left_side_text:hover .de-sc-team-member__image:before,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_social_media_icon .de-sc-team-member__image:hover:before,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_bottom_text:hover .de-sc-team-member__image:before,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_slide_in_text:hover .de-sc-team-member__image__content__overlay,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_slide_up_text:hover .de-sc-team-member__image__content__overlay {
					background: %5$s;
					%6$s
				}

				#%1$s.de-sc-team-member.de-sc-team-member--hover_centered_text .de-sc-team-member__content,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_centered_text .de-sc-team-member__content h4,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_centered_text .de-sc-team-member__content a:link,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_centered_text .de-sc-team-member__content a:visited,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_centered_text .de-sc-team-member__content p,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_left_side_text .de-sc-team-member__content,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_left_side_text .de-sc-team-member__content h4,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_left_side_text .de-sc-team-member__content p,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_left_side_text .de-sc-team-member__content a:link,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_left_side_text .de-sc-team-member__content a:visited,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_social_media_icon .de-sc-team-member__socials,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_social_media_icon .de-sc-team-member__socials h4,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_social_media_icon .de-sc-team-member__socials a:link,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_social_media_icon .de-sc-team-member__socials a:visited,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_bottom_text .de-sc-team-member__content,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_bottom_text .de-sc-team-member__content h4,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_bottom_text .de-sc-team-member__content p,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_bottom_text .de-sc-team-member__content a:link,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_bottom_text .de-sc-team-member__content a:visited,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_slide_in_text:hover .de-sc-team-member__image__content p,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_slide_in_text:hover .de-sc-team-member__image__content h4,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_slide_up_text .de-sc-team-member__image__content,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_slide_up_text .de-sc-team-member__image__content h4,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_slide_up_text .de-sc-team-member__image__content p,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_slide_up_text .de-sc-team-member__image__content a:link,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_slide_up_text .de-sc-team-member__image__content a:visited {
					color: %3$s;
				}

				#%1$s.de-sc-team-member.de-sc-team-member--hover_centered_text.de-sc-team-member--with-gradient:hover .de-sc-team-member__image:before,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_left_side_text.de-sc-team-member--with-gradient:hover .de-sc-team-member__image:before,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_social_media_icon.de-sc-team-member--with-gradient .de-sc-team-member__image:hover:before,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_bottom_text.de-sc-team-member--with-gradient:hover .de-sc-team-member__image:before,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_slide_in_text.de-sc-team-member--with-gradient:hover .de-sc-team-member__image__content__overlay,
				#%1$s.de-sc-team-member.de-sc-team-member--hover_slide_up_text.de-sc-team-member--with-gradient:hover .de-sc-team-member__image__content__overlay {
					background: -moz-linear-gradient(%7$s, %5$s 0%%, %8$s 100%%);
					background: -webkit-gradient(%7$s, left bottom, color-stop(0%%, %5$s ), color-stop(100%%, %8$s ));
					background: -webkit-linear-gradient(%7$s, %5$s 0%%, %8$s 100%%);
					background: -o-linear-gradient(%7$s, %5$s 0%%, %8$s 100%%);
					background: -ms-linear-gradient(%7$s, %5$s 0%%, %8$s 100%%);
					background: linear-gradient(%7$s, %5$s 0%%, %8$s 100%%);
					%6$s
				}
				',
				$uniqid,
				!empty( $border_color ) ? esc_html( $border_color ) : 'rgba(255,255,255,0)',
				!empty( $text_color ) ? esc_html( $text_color ) : 'inherit',
				!empty( $background_color ) ? esc_html( $background_color ) : 'rgba(255,255,255,0)',
				!empty( $overlay_color ) ? esc_html( $overlay_color ) : 'rgba(255,255,255,0)',
				!empty( $color_strength ) ? esc_html( $color_strength ) : 'opacity:0.25;',
				!empty( $gradient_direction ) ? esc_html( $gradient_direction ) : '90deg',
				!empty( $overlay_color_2 ) ? esc_html( $overlay_color_2 ) : 'rgba(255,255,255,0)'
			);

			return $vc_style;

		}

	}

	new Sobari_Team_Member_Shortcode();

}

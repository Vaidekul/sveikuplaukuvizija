<?php

if ( !class_exists( 'Dahz_Framework_Social_Account_Customizer' ) ) {

	Class Dahz_Framework_Social_Account_Customizer extends Dahz_Framework_Customizer_Extend {

		public function dahz_framework_set_customizer() {
			$dv_field = array();

			# CORE
			$dv_field[] = array(
				'type'			=> 'repeater',
				'settings'		=> 'social_media',
				'label'			=> '',
				'description'	=> esc_html__( 'Drag and drop to reorder the social account list, you can add and remove your social', 'df_textdomain' ),
				'default'		=> '',
				'priority'		=> 12,
				'row_label'		=> array(
					'type'		=> 'field',
					'value'		=> esc_attr__( 'Your Custom Value', 'df_textdomain' ),
					'field'		=> 'socmed_type',
				),
				'fields'		=> array(
					'socmed_type'	=> array(
						'type'			=> 'select',
						'label'			=> esc_attr__( 'Your Social Media', 'df_textdomain' ),
						'description'	=> esc_attr__( 'Choose one your social media', 'df_textdomain' ),
						'default'		=> 'facebook',
						'choices'		=> array(
							'facebook'		=> esc_attr__( 'Facebook', 'df_textdomain' ),
							'twitter'		=> esc_attr__( 'Twitter', 'df_textdomain' ),
							'pinterest'		=> esc_attr__( 'Pinterest', 'df_textdomain' ),
							'google-plus'	=> esc_attr__( 'Google +', 'df_textdomain' ),
							'rss'			=> esc_attr__( 'Rss', 'df_textdomain' ),
							'tumblr'		=> esc_attr__( 'Tumblr', 'df_textdomain' ),
							'instagram'		=> esc_attr__( 'Instagram', 'df_textdomain' ),
							'youtube'		=> esc_attr__( 'Youtube', 'df_textdomain' ),
							'vimeo'			=> esc_attr__( 'Vimeo', 'df_textdomain' ),
							'behance'		=> esc_attr__( 'Behance', 'df_textdomain' ),
							'dribbble'		=> esc_attr__( 'Dribbble', 'df_textdomain' ),
							'flickr'		=> esc_attr__( 'Flickr', 'df_textdomain' ),
							'github'		=> esc_attr__( 'Github', 'df_textdomain' ),
							'skype'			=> esc_attr__( 'Skype', 'df_textdomain' ),
							'weibo'			=> esc_attr__( 'Weibo', 'df_textdomain' ),
							'foursquare'	=> esc_attr__( 'Foursquare', 'df_textdomain' ),
							'soundcloud'	=> esc_attr__( 'Soundcloud', 'df_textdomain' ),
							'spotify'		=> esc_attr__( 'Spotify', 'df_textdomain' ),
							'vk'			=> esc_attr__( 'VK', 'df_textdomain' ),
							'mail'			=> esc_attr__( 'Mail', 'df_textdomain' ),
							'snapchat'		=> esc_attr__( 'Snapchat', 'df_textdomain' ),
							'whatsapp'		=> esc_attr__( 'Whatsapp', 'df_textdomain' ),
							'blackberry'	=> esc_attr__( 'Blackberry', 'df_textdomain' ),
							'line'			=> esc_attr__( 'Line', 'df_textdomain' ),
							'tripadvisor'	=> esc_attr__( 'Tripadvisor', 'df_textdomain' ),
							'500px'			=> esc_attr__( '5oopx', 'df_textdomain' ),
							'linkedin'		=> esc_attr__( 'LinkedIn', 'df_textdomain' ),
							'facebook-msgr'	=> esc_attr__( 'Facebook Messenger', 'df_textdomain' ),
						),
					),
					'socmed_url'	=> array(
						'type'			=> 'text',
						'label'			=> esc_attr__( 'Social Media URL', 'df_textdomain' ),
						'description'	=> esc_attr__( 'Put your Social Media URL', 'df_textdomain' ),
						'default'		=> '',
					),
				)
			);

			return $dv_field;
		}

	}

}
<?php

if ( !class_exists( 'Dahz_Framework_Social_Account' ) ) {

	Class Dahz_Framework_Social_Account {

		static $socials = array();

		public function __construct() {

			add_action( 'dahzextender_module_social-account_init', array( $this, 'dahz_framework_social_account_init' ) );

			add_filter( 'dahz_framework_customize_header_builder_items', array( $this, 'dahz_framework_social_lists' ) );

			add_filter( 'dahz_framework_header_mobile_elements', array( $this, 'dahz_framework_social_lists' ) );

			add_filter( 'dahz_framework_customize_footer_builder_items', array( $this, 'dahz_framework_footer_social_lists' ) );

			add_filter( 'dahz_framework_default_styles', array( $this, 'dahz_framework_social_icon_size' ) );

			add_shortcode( 'social_account', array( $this, 'dahz_framework_social_shortcode' ) );

			include(  DAHZEXTENDER_MODULES_ABSPATH . 'social-account/social-icon-widget.php' );

			add_action( 'widgets_init', array( $this, 'dahzextender_social_icon_widget' ) );

		}

		public function dahz_framework_social_icon_size( $styles ) {

			$desktop_header_icon_ratio = dahz_framework_get_option( 'header_social_icon_desktop_icon_size', '1' );

			$mobile_header_icon_ratio = dahz_framework_get_option( 'header_social_icon_mobile_icon_size', '1' );

			$desktop_footer_icon_ratio = dahz_framework_get_option( 'footer_social_icon_desktop_icon_size', '1' );

			$mobile_footer_icon_ratio = dahz_framework_get_option( 'footer_social_icon_mobile_icon_size', '1' );

			$styles .= sprintf(
				'
				#masthead .de-social-accounts a.de-social-accounts__icon--fill, #masthead .de-social-accounts a.de-social-accounts__icon--outline{
					border-radius:%5$spx;
				}

				#masthead .de-social-accounts a *{
					color:%3$s;
				}

				#masthead .de-social-accounts a:hover *{
					color:%4$s;
				}

				#masthead .de-social-accounts a.de-social-accounts__icon--fill{
					background-color:%11$s;
				}
				#masthead .de-social-accounts a.de-social-accounts__icon--fill:hover{
					background-color:%12$s;
				}
				.de-footer .de-social-accounts a.de-social-accounts__icon--fill{
					background-color:%13$s;
				}
				.de-footer .de-social-accounts a.de-social-accounts__icon--fill:hover{
					background-color:%14$s;
				}

				.de-footer .de-social-accounts a.de-social-accounts__icon--fill, .de-footer .de-social-accounts a.de-social-accounts__icon--outline{
					border-radius:%9$spx;
				}
				.de-footer .de-social-accounts a *{
					color:%7$s;
				}
				.de-footer .de-social-accounts a:hover *{
					color:%8$s;
				}
				#masthead .de-header__wrapper .de-social-accounts a.de-social-accounts__icon--outline,
				#masthead .de-header__wrapper .de-social-accounts a.de-social-accounts__icon--fill{
					width:calc(40px * %15$s);
					height:calc(40px * %15$s);
				}

				#masthead .de-header-mobile__wrapper .de-social-accounts a.de-social-accounts__icon--outline,
				#masthead .de-header-mobile__wrapper .de-social-accounts a.de-social-accounts__icon--fill{
					width:calc(40px * %16$s);
					height:calc(40px * %16$s);
				}

				.de-footer .de-social-accounts a.de-social-accounts__icon--outline,
				.de-footer .de-social-accounts a.de-social-accounts__icon--fill{
					width:calc(40px * %17$s);
					height:calc(40px * %17$s);
				}

				@media( max-width:959px ){
					.de-footer .de-social-accounts a.de-social-accounts__icon--outline,
					.de-footer .de-social-accounts a.de-social-accounts__icon--fill{
						width:calc(40px * %18$s);
						height:calc(40px * %18$s);
					}
				}
				',
				'',
				'',
				dahz_framework_get_option( 'header_social_icon_color', 'inherit' ),
				dahz_framework_get_option( 'header_social_icon_hover_color', 'inherit' ),
				dahz_framework_get_option( 'header_social_icon_border_radius', 0 ),
				'',
				dahz_framework_get_option( 'footer_social_icon_color', 'inherit' ),
				dahz_framework_get_option( 'footer_social_icon_hover_color', 'inherit' ),
				dahz_framework_get_option( 'footer_social_icon_border_radius', 0 ),
				'',
				dahz_framework_get_option( 'header_social_icon_background_color', 'inherit' ),
				dahz_framework_get_option( 'header_social_icon_background_hover_color', 'inherit' ),
				dahz_framework_get_option( 'footer_social_icon_background_color', 'inherit' ),
				dahz_framework_get_option( 'footer_social_icon_background_hover_color', 'inherit' ),
				(float)$desktop_header_icon_ratio,
				(float)$mobile_header_icon_ratio,
				(float)$desktop_footer_icon_ratio,
				(float)$mobile_footer_icon_ratio
			);
			return $styles;

		}

		public function dahz_framework_social_account_init( $path ) {

			if ( is_customize_preview() ) dahz_framework_include( $path . '/social-account-customizer.php' );

			if ( is_customize_preview() ) dahz_framework_include( $path . '/social-icon-customizer.php' );

			self::$socials		= array(
				'facebook'		=> array(
					'title'		=> __( 'Facebook', 'df_textdomain' ),
					'icon'		=> 'facebook'
				),
				'twitter'		=> array(
					'title'		=> __( 'Twitter', 'df_textdomain' ),
					'icon'		=> 'twitter'
				),
				'pinterest'		=> array(
					'title'		=> __( 'Pinterest', 'df_textdomain' ),
					'icon'		=> 'pinterest'
				),
				'google-plus'	=> array(
					'title'		=> __( 'Google+', 'df_textdomain' ),
					'icon'		=> 'google-plus'
				),
				'rss'			=> array(
					'title'		=> __( 'Rss', 'df_textdomain' ),
					'icon'		=> 'df_rss'
				),
				'tumblr'		=> array(
					'title'		=> __( 'Tumblr', 'df_textdomain' ),
					'icon'		=> 'tumblr'
				),
				'instagram'		=> array(
					'title'		=> __( 'Instagram', 'df_textdomain' ),
					'icon'		=> 'instagram'
				),
				'youtube'		=> array(
					'title'		=> __( 'Youtube', 'df_textdomain' ),
					'icon'		=> 'youtube'
				),
				'vimeo'			=> array(
					'title'		=> __( 'Vimeo', 'df_textdomain' ),
					'icon'		=> 'vimeo'
				),
				'behance'		=> array(
					'title'		=> __( 'Behance', 'df_textdomain' ),
					'icon'		=> 'behance'
				),
				'dribbble'		=> array(
					'title'		=> __( 'Dribbble', 'df_textdomain' ),
					'icon'		=> 'dribbble'
				),
				'flickr'		=> array(
					'title'		=> __( 'Flickr', 'df_textdomain' ),
					'icon'		=> 'flickr'
				),
				'github'			=> array(
					'title'		=> __( 'Github', 'df_textdomain' ),
					'icon'		=> 'github'
				),
				'skype'			=> array(
					'title'		=> __( 'Skype', 'df_textdomain' ),
					'icon'		=> 'df_skype'
				),
				'weibo'			=> array(
					'title'		=> __( 'Weibo', 'df_textdomain' ),
					'icon'		=> 'df_weibo'
				),
				'foursquare'	=> array(
					'title'		=> __( 'Foursquare', 'df_textdomain' ),
					'icon'		=> 'foursquare'
				),
				'soundcloud'	=> array(
					'title'		=> __( 'Soundcloud', 'df_textdomain' ),
					'icon'		=> 'soundcloud'
				),
				'spotify'		=> array(
					'title'		=> __( 'Spotify', 'df_textdomain' ),
					'icon'		=> 'df_spotify'
				),
				'vk'			=> array(
					'title'		=> __( 'VK', 'df_textdomain' ),
					'icon'		=> 'df_vk'
				),
				'mail'			=> array(
					'title'		=> __( 'Mail', 'df_textdomain' ),
					'icon'		=> 'df_mail-open'
				),
				'snapchat'		=> array(
					'title'		=> __( 'Snapchat', 'df_textdomain' ),
					'icon'		=> 'df_snapchat'
				),
				'whatsapp'		=> array(
					'title'		=> __( 'Whatsapp', 'df_textdomain' ),
					'icon'		=> 'whatsapp'
				),
				'blackberry'	=> array(
					'title'		=> __( 'Blackberry', 'df_textdomain' ),
					'icon'		=> 'df_blackberry'
				),
				'line'	=> array(
					'title'		=> __( 'Line', 'df_textdomain' ),
					'icon'		=> 'df_line'
				),
				'tripadvisor'	=> array(
					'title'		=> __( 'Tripadvisor', 'df_textdomain' ),
					'icon'		=> 'tripadvisor'
				),
				'500px'			=> array(
					'title'		=> __( '500px', 'df_textdomain' ),
					'icon'		=> '500px'
				),
				'linkedin'			=> array(
					'title'		=> __( 'LinkedIn', 'df_textdomain' ),
					'icon'		=> 'linkedin'
				),
				'facebook-msgr'			=> array(
					'title'		=> __( 'Facebook Messenger', 'df_textdomain' ),
					'icon'		=> 'df_facebook-messanger'
				),
			);

			dahz_framework_register_customizer(
				'Dahz_Framework_Social_Account_Customizer',
				array(
					'id'	=> 'social_account',
					'title'	=> array( 'title' => esc_html__( 'Social Account', 'df_textdomain' ), 'priority' => 1 ) ,
					'panel'	=> ''
				),
				array()
			);

			dahz_framework_register_customizer(
				'Dahz_Framework_Social_Icon_Customizer',
				array(
					'id'	=> 'header_social_icon',
					'title'	=> array( 'title' => esc_html__( 'Social Icon', 'df_textdomain' ), 'priority' => 11 ),
					'panel'	=> 'header'
				),
				array()
			);

			dahz_framework_register_customizer(
				'Dahz_Framework_Social_Icon_Customizer',
				array(
					'id'	=> 'footer_social_icon',
					'title'	=> array( 'title' => esc_html__( 'Social Icon', 'df_textdomain' ), 'priority' => 11 ),
					'panel'	=> 'footer'
				),
				array()
			);

		}

		# For Header
		public function dahz_framework_social_lists( $items ){

			$items['social_account'] = array(
				'title'				=> esc_html__( 'Social Icon', 'df_textdomain' ),
				'description'		=> esc_html__( 'Display social media account', 'df_textdomain' ),
				'render_callback'	=> array( $this, 'dahz_framework_social_element' ),
				'section_callback'	=> 'social_account',
				'is_repeatable'		=> false
			);

			return $items;

		}

		# For Footer
		public function dahz_framework_footer_social_lists( $items ){

			$items['footer_social_account'] = array(
				'title'				=> esc_html__( 'Social Icon', 'df_textdomain' ),
				'description'		=> esc_html__( 'Display social media account', 'df_textdomain' ),
				'render_callback'	=> array( $this, 'dahz_framework_social_element' ),
				'section_callback'	=> 'social_account',
				'is_repeatable'		=> false
			);

			return $items;

		}


		public static function dahz_framework_social_element( $builder_type, $atts = array() ){

			$social_account = dahz_framework_get_option( 'social_account_social_media', array() );

			$social_display = dahz_framework_get_option( 'footer_element_social_media_display', 'horizontal' );

			$social_account_decode = is_string( $social_account ) && !is_array( json_decode( $social_account, true ) ) ? urldecode( $social_account ) : false;

			$social_account_decode = !is_array( $social_account ) && $social_account_decode ? json_decode( $social_account_decode, true ) : array();

			$social_account = is_array( $social_account ) ? $social_account : $social_account_decode;

			$class = $social_display === 'vertical' && $builder_type === 'footer' ? 'de-social-accounts--vertical' : 'de-social-accounts--horizontal';

			$social_style = '';
			
			$output = '';

			# Social style on header
			if ( $builder_type === 'header' ) {
				$social_style = dahz_framework_get_option( 'header_social_icon_style', 'default' );
			}

			# Social style on footer
			if ( $builder_type === 'footer' ) {
				$social_style = dahz_framework_get_option( 'footer_social_icon_style', 'default' );
			}

			$icon_ratio = $builder_type !== 'footer' ? $builder_type == 'mobile_elements' ? dahz_framework_get_option( 'header_social_icon_mobile_icon_size', '1' ) : dahz_framework_get_option( 'header_social_icon_desktop_icon_size', '1' ) : dahz_framework_get_option( 'footer_social_icon_desktop_icon_size', '1' );

			if ( is_array( $social_account ) && !empty( $social_account ) ) {
				
				$output = sprintf( '<div class="site-branding uk-flex uk-flex-wrap de-social-accounts %s">', esc_attr( $class ) );
				
				foreach ( $social_account as $key => $value ) {

					$output .= sprintf(
						'
						<a aria-label="%9$s" href="%1$s" class="de-social-accounts__icon de-social-accounts__icon--%3$s" title="%4$s %2$s">
							<i data-uk-icon="icon:%5$s;ratio:%6$s;"%7$s></i>
							%8$s
						</a>
						',
						esc_url( $value['socmed_url'] ), # 1
						esc_attr( isset( self::$socials[$value['socmed_type']]['title'] ) ? self::$socials[$value['socmed_type']]['title'] : '' ), # 2
						esc_attr( $social_style ), # 3
						esc_attr__( 'Follow Us on', 'df_textdomain' ),
						esc_attr( isset( self::$socials[$value['socmed_type']]['icon'] ) ? self::$socials[$value['socmed_type']]['icon'] : '' ),
						(float)$icon_ratio,
						$builder_type == 'footer' ? ' class="uk-visible@m"' : '',
						$builder_type == 'footer'
							? sprintf(
								'
								<i class="uk-hidden@m" data-uk-icon="icon:%1$s;ratio:%2$s;"></i>
								',
								esc_attr( isset( self::$socials[$value['socmed_type']]['icon'] ) ? self::$socials[$value['socmed_type']]['icon'] : '' ),
								dahz_framework_get_option( 'footer_social_icon_mobile_icon_size', '1' )
							)
							:
							'',
						esc_attr( isset( self::$socials[$value['socmed_type']]['title'] ) ? self::$socials[$value['socmed_type']]['title'] : '' )
					);

				}
				
				$output .= '</div>';

			}

			echo( $output );

		}

		public static function dahz_framework_social_shortcode( $atts ){

			$builder_type = 'header';

			$social_account = dahz_framework_get_option( 'social_account_social_media', array() );

			$social_display = dahz_framework_get_option( 'footer_element_social_media_display', 'horizontal' );

			$social_account_decode = is_string( $social_account ) && !is_array( json_decode( $social_account, true ) ) ? urldecode( $social_account ) : false;

			$social_account_decode = !is_array( $social_account ) && $social_account_decode ? json_decode( $social_account_decode, true ) : array();

			$social_account = is_array( $social_account ) ? $social_account : $social_account_decode;

			$class = $social_display === 'vertical' && $builder_type === 'footer' ? 'de-social-accounts--vertical' : 'de-social-accounts--horizontal';

			$social_style = '';

			# Social style on header
			if ( $builder_type === 'header' ) {
				$social_style = dahz_framework_get_option( 'header_social_icon_style', 'default' );
			}

			# Social style on footer
			if ( $builder_type === 'footer' ) {
				$social_style = dahz_framework_get_option( 'footer_social_icon_style', 'default' );
			}

			$output = sprintf( '<div class="site-branding uk-flex uk-flex-wrap de-social-accounts %s">', esc_attr( $class ) );

			$icon_ratio = $builder_type !== 'footer' ? $builder_type == 'mobile_elements' ? dahz_framework_get_option( 'header_social_icon_mobile_icon_size', '1' ) : dahz_framework_get_option( 'header_social_icon_desktop_icon_size', '1' ) : dahz_framework_get_option( 'footer_social_icon_desktop_icon_size', '1' );

			if ( is_array($social_account) ) {

				foreach ( $social_account as $key => $value ) {

					$output .= sprintf(
						'
						<a aria-label="%9$s" href="%1$s" class="de-social-accounts__icon de-social-accounts__icon--%3$s" title="%4$s %2$s">
							<i data-uk-icon="icon:%5$s;ratio:%6$s;"%7$s></i>
							%8$s
						</a>
						',
						esc_url( $value['socmed_url'] ), # 1
						esc_attr( isset( self::$socials[$value['socmed_type']]['title'] ) ? self::$socials[$value['socmed_type']]['title'] : '' ), # 2
						esc_attr( $social_style ), # 3
						esc_attr__( 'Follow Us on', 'df_textdomain' ),
						esc_attr( isset( self::$socials[$value['socmed_type']]['icon'] ) ? self::$socials[$value['socmed_type']]['icon'] : '' ),
						(float)$icon_ratio,
						$builder_type == 'footer' ? ' class="uk-visible@m"' : '',
						$builder_type == 'footer'
							? sprintf(
								'
								<i class="uk-hidden@m" data-uk-icon="icon:%1$s;ratio:%2$s;"></i>
								',
								esc_attr( isset( self::$socials[$value['socmed_type']]['icon'] ) ? self::$socials[$value['socmed_type']]['icon'] : '' ),
								dahz_framework_get_option( 'footer_social_icon_mobile_icon_size', '1' )
							)
							:
							'',
						esc_attr( isset( self::$socials[$value['socmed_type']]['title'] ) ? self::$socials[$value['socmed_type']]['title'] : '' )
					);

				}

			}

			$output .= '</div>';

			return $output;
		}

		public function dahzextender_social_icon_widget(){

			register_widget( 'DahzExtender_Widget_Social_Icon' );

		}

	}

	new Dahz_Framework_Social_Account();

}
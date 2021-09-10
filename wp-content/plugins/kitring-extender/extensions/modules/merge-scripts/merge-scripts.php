<?php
/**
 * DahzExtender Merge Scripts
 *
 * @package  DahzExtender
 * @since    1.0.0
 */

if( !class_exists( 'Dahz_Framework_Merge_Scripts' ) ){

	Class Dahz_Framework_Merge_Scripts{

		private $core_directory = '';

		private $host = '';

		private $root = '';

		private $merge_directory = '';

		private $merge_uri = '';

		private $scriptcount = 0;

		public function __construct(){

			$this->core_directory = parse_url( get_site_url(), PHP_URL_PATH );
			
			$this->host = $this->dahz_framework_get_http_post();
				
			$this->root = $_SERVER["DOCUMENT_ROOT"];

			if( empty( $this->root ) || empty( $this->host ) ){
				return;
			}

			$this->merge_directory = get_template_directory() . '/assets/merged/';
			
			if ( !file_exists( $this->merge_directory ) ) {
				wp_mkdir_p( $this->merge_directory );
			} 

			$this->merge_uri = get_template_directory_uri() . '/assets/merged/';

			add_action( 'wp_print_scripts', array($this,'dahz_framework_bind_scripts'), PHP_INT_MAX );

			add_action( 'wp_print_styles', array($this,'dahz_framework_bind_styles'), PHP_INT_MAX );

			add_action( 'wp_print_footer_scripts', array( $this,'dahz_framework_bind_styles_scripts_footer' ), 9.999999 );

		}
		
		public function dahz_framework_get_http_post(){
			
			$host = $_SERVER['HTTP_HOST'];
			//php < 5.4.7 returns null if host without scheme entered
			if(mb_substr($host, 0, 4) !== 'http'){
				
				$host = 'http'.(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 's' : '').'://' . $host;
			
			}
			
			return parse_url( $host, PHP_URL_HOST );
			
		}

		public function dahz_framework_bind_scripts(){

			global $wp_scripts;

			$this->dahz_framework_get_scripts( $wp_scripts, 'js' );

		}

		public function dahz_framework_bind_styles_scripts_footer(){

			global $wp_scripts, $wp_styles;

			$this->dahz_framework_get_scripts( $wp_scripts, 'js', true );

			$this->dahz_framework_get_scripts( $wp_styles, 'css', true );

		}

		public function dahz_framework_bind_styles(){

			global $wp_styles;

			$this->dahz_framework_get_scripts( $wp_styles, 'css' );

		}

		private function host_match( $url ){

			if( empty($url) ) {
				return false;
			}

			$url = $this->ensure_scheme($url);

			$url_host = parse_url( $url, PHP_URL_HOST );

			if( !$url_host || $url_host == $this->host ) {
				return true;
			} else {
				return false;
			}
		}

		private function ensure_scheme($url){

			return preg_replace("/(http(s)?:\/\/|\/\/)(.*)/i", "http$2://$3", $url);

		}

		private function fix_wp_subfolder($file_path){

			if(!is_main_site() && defined('SUBDOMAIN_INSTALL') && !SUBDOMAIN_INSTALL) { //is a subfolder site
				$details = get_blog_details();
				$file_path = preg_replace('|^'.$details->path.'|', '/', $file_path);
			}

			if($this->core_directory != '' && substr($file_path, 0, strlen($this->core_directory) + 1) != $this->core_directory . '/') {
				$file_path = $this->core_directory . $file_path;
			}

			return $file_path;
		}

		private function dahz_framework_get_script_handles( &$scripts_clone, $extension, $is_in_footer = false){

			switch($extension)
			{
				case 'js':
					$is_check_media = false;
					break;

				case 'css':
					$is_check_media = true;
					break;

				default:
					return array();
			}

			$handles = array();

			$current_handle = -1;

			foreach( $scripts_clone->to_do as $handle ) {

				if( apply_filters( 'style_loader_src', $scripts_clone->registered[$handle]->src, $handle ) !== false ) {
					if( !$is_in_footer )
					{
						$is_footer = isset( $scripts_clone->registered[$handle]->extra['group'] );

						if( $is_footer )
						{
							//ignore this script, so go on to the next one
							continue;
						}
					}

					$script_path = parse_url( $this->ensure_scheme($scripts_clone->registered[$handle]->src), PHP_URL_PATH );

					$script_path = $this->fix_wp_subfolder( $script_path );

					$type = pathinfo( $script_path, PATHINFO_EXTENSION );

					if( $type == $extension &&
						$this->host_match( $scripts_clone->registered[$handle]->src ) &&
						!isset( $scripts_clone->registered[$handle]->extra["conditional"] ) )
					{

						$mediaMatches = true;

						if( $is_check_media )
						{
							$media = isset($scripts_clone->registered[$handle]->args) ? $scripts_clone->registered[$handle]->args : 'all';
							$mediaMatches = $current_handle != -1 && isset($handles[$current_handle]['media']) && $handles[$current_handle]['media'] == $media;
						}

						if( $current_handle == -1 || isset($handles[$current_handle]['handle']) || !$mediaMatches ) {

							if($is_check_media){

								array_push(
									$handles,
									array(
										'modified'	=> 0,
										'handles'	=> array(),
										'media'		=> $media
									)
								);

							} else {

								array_push( $handles, array( 'modified' => 0, 'handles' => array() ) );

							}

							$current_handle++;
						}

						$modified = 0;

						if( is_file( $this->root . $script_path ) ) {

							$modified = filemtime( $this->root . $script_path );

						}

						array_push( $handles[$current_handle]['handles'], $handle );

						if( $modified > $handles[$current_handle]['modified'] ) {

							$handles[$current_handle]['modified'] = $modified;

						}

					} else { //external script or not able to be processed

						array_push( $handles, array( 'handle' => $handle ) );

						$current_handle++;

					}
				}

			}

			return $handles;
		}

		public function dahz_framework_get_scripts(&$scripts, $extension, $is_in_footer = false){

			if( !$scripts ) return;

			$break = "\r\n";

			if($extension == 'js') {
				$break = "\r\n;";
			}

			$scripts_clone = clone $scripts;

			$scripts_clone->all_deps( $scripts_clone->queue );

			$script_handles = $this->dahz_framework_get_script_handles( $scripts_clone, $extension, $is_in_footer );

			$done = $scripts_clone->done;

			foreach( $script_handles as $key => $script_handle ){

				if( !isset( $script_handle['handle'] ) ) {

					$output_scripts = '';

					$data_scripts = '';

					$done = array_merge( $done, $script_handle['handles'] );

					$hash = md5( get_home_url() . implode( ',', $script_handle['handles'] ) );

					$file_path = $this->merge_directory . $hash . '-' . $script_handle['modified'] . '.' . $extension;

					$file_uri = $this->merge_uri . $hash . '-' . $script_handle['modified'] . '.' . $extension;

					if( !file_exists( $file_path ) ) {

						if ( ! function_exists( 'wp_handle_upload' ) ) {
							dahz_framework_include( ABSPATH . 'wp-admin/includes/file.php' );
						}

						// Setup global vars.
						global $wp_filesystem;

						if( !dahz_framework_filesystem_init() ){
							return false;
						}

						foreach( $script_handle['handles'] as $handle ){

							$script_path = parse_url( $this->ensure_scheme($scripts_clone->registered[$handle]->src), PHP_URL_PATH );

							$script_path = $this->fix_wp_subfolder( $script_path );

							$tmp_scripts = '';

							$raw = $wp_filesystem->get_contents( $this->root . $script_path );

							if( $extension == 'js' && isset( $scripts_clone->registered[$handle]->extra['before'] ) && count( $scripts_clone->registered[$handle]->extra['before'] ) > 0) {

								$tmp_scripts .= implode( $break, $scripts_clone->registered[$handle]->extra['before'] ) . $break;

							}

							//Remove the BOM
							$tmp_scripts .= preg_replace( "/^\xEF\xBB\xBF/", '', $raw ) . $break;

							if( isset( $scripts_clone->registered[$handle]->extra['after'] ) && count( $scripts_clone->registered[$handle]->extra['after'] ) > 0) {
								if( $extension !== 'css' ){
									$tmp_scripts .= implode( $break, $scripts_clone->registered[$handle]->extra['after'] ) . $break;
								}
							}

							if( $extension == 'css' ) {
								//convert relative paths to absolute & ignore data: or absolute paths (starts with /)
								$tmp_scripts = preg_replace( "/url\(\s*['\"]?(?!data:)(?!http)(?![\/'\"])(.+?)['\"]?\s*\)/i", "url(" . dirname( $script_path ) . "/$1)", $tmp_scripts );
							}

							$output_scripts .= $tmp_scripts;

						}
						array_map( 'unlink', glob( $this->merge_directory . $hash . '-*.' . $extension ) );

						$wp_filesystem->put_contents(

							$file_path ,

							$output_scripts,

							FS_CHMOD_FILE // predefined mode settings for WP files

						);

					}

					if( $extension == 'js' ) {

						$localize = '';

						foreach( $script_handle['handles'] as $handle ) {

							if( isset( $scripts_clone->registered[$handle]->extra['data'] ) ) {

								$localize .= $scripts_clone->registered[$handle]->extra['data'];

							}

						}

						wp_register_script( 'js-'.$this->scriptcount, $file_uri, array(), null, $is_in_footer );

						//set any existing data that was added with wp_localize_script
						if( $localize != '' ) {

							$scripts->registered['js-'.$this->scriptcount]->extra['data'] = $localize;

						}

						wp_enqueue_script( 'js-'.$this->scriptcount );


					} else {

						wp_register_style( 'css-' . $this->scriptcount, $file_uri, false, null, $script_handle['media'] );

						$inline_style = '';

						foreach( $script_handle['handles'] as $handle ) {

							if( isset( $scripts_clone->registered[$handle]->extra['after'] ) && !empty( $scripts_clone->registered[$handle]->extra['after'] ) ) {

								foreach( $scripts_clone->registered[$handle]->extra['after'] as $inlines ){
									$scripts->registered['css-'.$this->scriptcount]->extra['after'][] = $inlines;
								}

							}

						}

						wp_enqueue_style( 'css-' . $this->scriptcount );

					}

					$this->scriptcount++;

				} else { //external

					if( $extension == 'js' ) {

						wp_dequeue_script( $script_handle['handle'] ); //need to do this so the order of scripts is retained

						wp_enqueue_script( $script_handle['handle'] );

					} else {

						wp_dequeue_style( $script_handle['handle'] ); //need to do this so the order of scripts is retained

						wp_enqueue_style( $script_handle['handle'] );

					}

				}

			}

			$scripts->done = $done;

		}

	}

}

function dahzextender_merge_scripts() {

	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return;
	}

	if ( ( dahz_framework_get_option( 'merge_scripts_is_merge_scripts', false ) && !is_admin() ) || ( is_customize_preview() && dahz_framework_get_option( 'merge_scripts_is_merge_scripts', false ) ) ) {

		new Dahz_Framework_Merge_Scripts();

	}

}

add_action( 'init', 'dahzextender_merge_scripts', 10 );
<?php
if ( !defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists('DPF_Core') ) {

	/**
	 * 
	 */
	class DPF_Core {
		
		/**
		 * All DPF_Core instances
		 *
		 * @var array
		 */
		private static $instances = array();

		/**
		* The current blog id
		* @var string
		*/
		private $blogId;

		/**
		 * The current option namespace.
		 * Options will be prefixed with this in the database
		 *
		 * @var string
		 */
		public $optionNamespace;

		/**
		 * All main containers (admin pages, meta boxes, customizer section)
		 *
		 * @var array of DPF_Admin_Page
		 */
		private $mainContainers = array();

		/**
		 * All Google Font options used. This is for enqueuing Google Fonts for the frontend
		 * TODO Move this to the DPF_Core OptionSelectGooglefont class and let it enqueue from there
		 *
		 * @var array DPF_Core OptionSelectGooglefont
		 */
		private $googleFontsOptions = array();

		/**
		 * We store option ids which should not be created here
		 *
		 * @var array
		 *
		 * @see removeOption()
		 */
		private $optionsToRemove = array();

		/**
		 * Holds the values of all admin (page & tab) options. We need this since
		 *
		 * @var array of DPF_Core Option
		 */
		private $adminOptions;

		/**
		 * The CSS class instance used
		 *
		 * @var DPF_Core CSS
		 */
		public $cssInstance;

		/**
		 * We store the options (with IDs) here, used for ensuring our serialized option
		 * value doesn't get cluttered with unused options
		 *
		 * @var array
		 */
		public $optionsUsed = array();

		/**
		 * The current list of settings
		 *
		 * @var array@
		 */
		public $settings = array();

		/**
		 * Default settings
		 *
		 * @var array
		 */
		private $defaultSettings = array(
			'css' => 'generate', 	// If 'generate', DPF will try and generate a cacheable
			                        // CSS file (or inline if it can't).
				 					// If 'inline', CSS will be printed out in the head tag,
									// If false, CSS will not be generated nor printed.
		);

		public static function getInstance( $optionNamespace ) {

			// clean namespace
			$optionNamespace = str_replace( ' ', '-', trim( strtolower( $optionNamespace ) ) );

			foreach ( self::$instances as $instance ) {
				if ( $instance->optionNamespace == $optionNamespace ) {
					return $instance;
				}
			}

			$newInstance = new DPF_Core( $optionNamespace );
			self::$instances[] = $newInstance;
			return $newInstance;

		}

		public static function getAllInstances() {
			return self::$instances;
		}

		/**
		 * Creates a new DPF_Core object
		 *
		 * @since 1.0.0
		 *
		 * @param string $optionNamespace The namespace to get options from.
		 */
		function __construct( $optionNamespace ) {

		    // Set current blog
		    $this->blogId = get_current_blog_id();

			// Clean namespace.
			$optionNamespace = str_replace( ' ', '-', trim( strtolower( $optionNamespace ) ) );

			$this->optionNamespace = $optionNamespace;
			$this->settings = $this->defaultSettings;

			do_action( 'dpf_init', $this );
			do_action( 'dpf_init_' . $this->optionNamespace, $this );

			// $this->cssInstance = new DPF_CSS( $this );

			add_action( 'admin_enqueue_scripts', array( $this, 'loadAdminScripts' ) );
			add_action( 'dpf_create_option_' . $this->optionNamespace, array( $this, 'rememberAllOptions' ) );
			add_filter( 'dpf_create_option_continue_' . $this->optionNamespace, array( $this, 'removeChildThemeOptions' ), 10, 2 );

			// Create a save option filter for customizer options.
			// add_filter( 'pre_update_option', array( $this, 'addCustomizerSaveFilter' ), 10, 3 );

		}

		/**
		 * Action hook on dpf_create_option to remember all the options, used to ensure that our
		 * serialized option does not get cluttered with unused options
		 *
		 * @param DPF_Options $option The option that was just created.
		 * @since 1.0.0
		 * @return void
		 */
		public function rememberAllOptions( $option ) {
			if ( ! empty( $option->settings['id'] ) ) {

				if ( is_admin() && isset( $this->optionsUsed[ $option->settings['id'] ] ) ) {
					self::displayFrameworkError(
						sprintf( __( 'All option IDs per namespace must be unique. The id %s has been used multiple times.', 'dpf_textdomain' ),
							'<code>' . $option->settings['id'] . '</code>'
						)
					);
				}

				$this->optionsUsed[ $option->settings['id'] ] = $option;
			}
		}

		/**
		 * Loads all the admin scripts used by Dahz Panel Framework
		 *
		 * @since 1.0.0
		 * @param string $hook The slug of admin page that called the enqueue.
		 * @return void
		 */
		public function loadAdminScripts( $hook ){
			// Get all options panel IDs.
			$panel_ids = array();
			if ( ! empty( $this->mainContainers['admin-page'] ) ) {
				foreach ( $this->mainContainers['admin-page'] as $admin_panel ) {
					$panel_ids[] = $admin_panel->panelID;
				}
			}

		}

		protected function getInternalAdminOptions() {

    		// Reload options if blog has been switched
			if ( empty( $this->adminOptions ) || get_current_blog_id() !== $this->blogId ) {
				$this->adminOptions = array();
			}

			if ( ! empty( $this->adminOptions ) ) {
				return $this->adminOptions;
			}

			// Check if we have options saved already.
			$currentOptions = get_option( $this->optionNamespace . '_options' );

			// First time run, this action hook can be used to trigger something.
			if ( false === $currentOptions ) {
				do_action( 'dpf_init_no_options_' . $this->optionNamespace );
			}

			// Put all the available options in our global variable for future checking.
			if ( ! empty( $currentOptions ) && ! count( $this->adminOptions ) ) {
				$this->adminOptions = unserialize( $currentOptions );
			}

			if ( empty( $this->adminOptions ) ) {
				$this->adminOptions = array();
			}

			return $this->adminOptions;

		}

		/**
		 * Gets the admin page option that's loaded into the instance, used by the option class
		 *
		 * @param mixed  $defaultValue The default value to return if the option isn't available yet.
		 * @param string $optionName The ID of the option (not namespaced).
		 * @since 1.0.0
		 * @return mixed The option value
		 * @see DPF_Options->getValue()
		 */
		public function getInternalAdminPageOption( $optionName, $defaultValue = false ) {

			// Run this first to ensure that adminOptions carries all our admin page options.
			$this->getInternalAdminOptions();

			if ( array_key_exists( $optionName, $this->adminOptions ) ) {
				return $this->adminOptions[ $optionName ];
			} else {
				return $defaultValue;
			}
		}

		/**
		 * Sets the admin page option that's loaded into the instance, used by the option class.
		 * Doesn't perform a save, only sets the value in the class variable.
		 *
		 *
		 *
		 *
		 * @since 1.0.0
		 * @param string $optionName The ID of the option (not namespaced).
		 * @param mixed  $value The value to set.
		 * @return bool Always returns true
		 * @see DPF_Options->setValue()
		 */
		public function setInternalAdminPageOption( $optionName, $value ) {

			// Run this first to ensure that adminOptions carries all our admin page options.
			$this->getInternalAdminOptions();

			$this->adminOptions[ $optionName ] = $value;
			return true;
		}

		/**
		 * Saves all the admin (not meta & customizer) options which are currently loaded into this instance
		 *
		 * @since 1.0
		 * @return array All admin options currently in the instance
		 */
		public function saveInternalAdminPageOptions() {

			// Run this first to ensure that adminOptions carries all our admin page options.
			$this->getInternalAdminOptions();

			update_option( $this->optionNamespace . '_options', serialize( $this->adminOptions ) );
			do_action( 'dpf_save_options_' . $this->optionNamespace );
			return $this->adminOptions;
		}

		/**
		 * Create a admin page
		 *
		 * @author Dahz
		 * @since 1.0.0
		 * @param array $settings The arguments for creating the admin page.
		 * @return DPF_Admin_Page The created admin page
		 */
		public function createAdminPanel( $settings ) {
			return $this->createAdminPage( $settings );
		}

		/**
		 * Create a sample content only.
	 	 * Use createSampleContent() with 'type' => 'sample-panel' or createSamplePanel() instead.
		 *
		 * @since 1.0.0
	 	 * @param array $settings The arguments for creating the sample conent page.
		 * @return DPF_Admin_Page The created sample coennt page.
		 */
		public function createSampleContentPage( $settings ) {
			$settings['type'] = 'sample-panel';
			return $this->createContainer( $settings );
		}

		/**
		 * Create a admin page
		 *
		 * @since 1.0.0
		 * @param array $settings The arguments for creating the admin page.
		 * @return DPF_Admin_Page The created admin page
		 */
		public function createAdminPage( $settings ) {
			$settings['type'] = 'admin-page';
			$container = $this->createContainer( $settings );
			do_action( 'dpf_admin_panel_created_' . $this->optionNamespace, $container );
			return $container;
		}

		/**
		 * Creates a container (e.g. admin page section) depending
		 * on the `type` parameter given in $settings
		 *
		 * @since 1.0.0
		 * @param array $settings The arguments for creating the container.
		 * @return DPF_Admin_Page The created container
		 */
		public function createContainer( $settings ) {
			if ( empty( $settings['type'] ) ) {
				self::displayFrameworkError( sprintf( __( '%s needs a %s parameter.', 'dpf_textdomain' ), '<code>' . __FUNCTION__ . '</code>', '<code>type</code>' ) );
				return;
			}

			$type = strtolower( $settings['type'] );
			$class = 'DPF_' . str_replace( ' ', '', str_replace( '-', '_', ucwords( $settings['type'], '-' ) ) );
			$action = str_replace( '-', '_', $type );
			$container = false;

			if ( ! class_exists( $class ) ) {
				self::displayFrameworkError( sprintf( __( 'Container of type %s, does not exist.', 'dpf_textdomain' ), '<code>' . $settings['type'] . '</code>' ) );
				return;
			}

			// Create the container object.
			$container = new $class( $settings, $this );
			if ( empty( $this->mainContainers[ $type ] ) ) {
				$this->mainContainers[ $type ] = array();
			}

			$this->mainContainers[ $type ][] = $container;

			do_action( 'dpf_' . $action . '_created_' . $this->optionNamespace, $container );

			return $container;
		}

		/**
		 * A function available ONLY to CHILD themes to stop the creation of options
		 * created by the PARENT theme.
		 *
		 * @since 1.0.0
		 * @access public
		 * @param string $optionName The id of the option to remove / stop from being created.
		 * @return void
		 */
		public function removeOption( $optionName ) {
			$this->optionsToRemove[] = $optionName;
		}

		/**
		 * Hook to the dpf_create_option_continue filter, to check whether or not to continue
		 * adding an option (if the option id was used in $dpf->removeOption).
		 *
		 * @since 1.0.0
		 * @access public
		 * @param boolean $continueCreating If true, the option will be created.
		 * @param array   $optionSettings The settings for the option to be created.
		 * @return boolean If true, continue with creating the option. False to stop it..
		 */
		public function removeChildThemeOptions( $continueCreating, $optionSettings ) {
			if ( ! count( $this->optionsToRemove ) ) {
				return $continueCreating;
			}
			if ( empty( $optionSettings['id'] ) ) {
				return $continueCreating;
			}
			if ( in_array( $optionSettings['id'], $this->optionsToRemove ) ) {
				return false;
			}
			return $continueCreating;
		}

		/**
		 * Get an option
		 *
		 * @since 1.0.0
		 * @param string $optionName The name of the option.
		 * @param int    $postID The post ID if this is a meta option.
		 * @return mixed The option value
		 */
		public function getOption( $optionName, $postID = null ) {
			$value = false;

			// Get the option value.
			if ( array_key_exists( $optionName, $this->optionsUsed ) ) {
				$option = $this->optionsUsed[ $optionName ];
				$value = $option->getValue( $postID );
			}

			return apply_filters( 'dpf_get_option_' . $this->optionNamespace, $value, $optionName, $postID );
		}

		/**
		 * Gets a set of options. Pass an associative array containing the option names as keys and
		 * the values you want to be retained if the option names are not implemented.
		 *
		 * @since 1.0.0
		 * @param array $optionArray An associative array containing option names as keys.
		 * @param int   $postID The post ID if this is a meta option.
		 * @return array An array containing the values saved.
		 * @see $this->getOption()
		 */
		public function getOptions( $optionArray, $postID = null ) {
			foreach ( $optionArray as $optionName => $originalValue ) {
				if ( array_key_exists( $optionName, $this->optionsUsed ) ) {
					$optionArray[ $optionName ] = $this->getOption( $optionName, $postID );
				}
			}
			return apply_filters( 'dpf_get_options_' . $this->optionNamespace, $optionArray, $postID );
		}

		/**
		 * Sets an option
		 *
		 * @since 1.0.0
		 * @param string $optionName The name of the option to save.
		 * @param mixed  $value The value of the option.
		 * @param int $postID The ID of the parent post if this is a meta box option.
		 * @return boolean Always returns true
		 */
		public function setOption( $optionName, $value, $postID = null ) {

			// Get the option value.
			if ( array_key_exists( $optionName, $this->optionsUsed ) ) {
				$option = $this->optionsUsed[ $optionName ];
				$option->setValue( $value, $postID );
			}

			do_action( 'dpf_set_option_' . $this->optionNamespace, $optionName, $value, $postID );

			return true;
		}

		/**
		 * Deletes ALL the options for the namespace. Even deletes all meta found in all posts.
		 * Mainly used for unit tests
		 *
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function deleteAllOptions() {

			// Delete all admin options.
			delete_option( $this->optionNamespace . '_options' );
			$this->adminOptions = array();

			// Delete all meta options.
			global $wpdb;
			$allPosts = $wpdb->get_results( 'SELECT ID FROM ' . $wpdb->posts, ARRAY_A );
			if ( ! empty( $allPosts ) ) {
				foreach ( $allPosts as $row ) {
					$allMeta = get_post_meta( $row['ID'] );

					// Only remove meta data that the framework created.
					foreach ( $allMeta as $metaName => $dummy ) {
						if ( stripos( $metaName, $this->optionNamespace . '_' ) === 0 ) {
							delete_post_meta( $row['ID'], $metaName );
						}
					}
				}
			}

			// Delete all theme mods.
			$allThemeMods = get_theme_mods();
			if ( ! empty( $allThemeMods ) && is_array( $allThemeMods ) ) {
				foreach ( $allThemeMods as $optionName => $dummy ) {

					// Only remove theme mods that the framework created.
					if ( stripos( $optionName, $this->optionNamespace . '_' ) === 0 ) {
						remove_theme_mod( $optionName );
					}
				}
			}
		}

		/**
		 * Generates style rules which can use options as their values
		 *
		 * @since 1.0.0
		 * @param string $CSSString The styles to render.
		 * @return void
		 */
		public function createCSS( $CSSString ) {
			$this->cssInstance->addCSS( $CSSString );
		}

		/**
		 * Displays an error notice
		 *
		 * @since 1.0.0
		 * @param string $message The error message to display.
		 * @param array|object $errorObject The object to dump inside the error message.
		 * @return void
		 */
		public static function displayFrameworkError( $message, $errorObject = null ) {
			// Clean up the debug object for display. e.g. If this is a setting, we can have lots of blank values.
			if ( is_array( $errorObject ) ) {
				foreach ( $errorObject as $key => $val ) {
					if ( '' === $val ) {
						unset( $errorObject[ $key ] );
					}
				}
			}

			// Display an error message.
			?>
			<div style='margin: 20px; text-align: center;'><strong><?php echo DPF_NAME ?> Error:</strong>
				<?php echo $message ?>
				<?php
				if ( ! empty( $errorObject ) ) :
					?>
					<pre><code style="display: inline-block; padding: 10px"><?php echo print_r( $errorObject, true ) ?></code></pre>
					<?php
				endif;
				?>
			</div>
			<?php
		}

		/**
		 * Acts the same way as plugins_url( 'script', __FILE__ ) but returns then correct url
		 * when called from inside a theme.
		 *
		 * @since 1.0.0
		 * @param string $script the script to get the url to, relative to $file.
		 * @param string $file the current file, should be __FILE__.
		 * @return string the url to $script
		 */
		public static function getURL( $script, $file ) {
			$parentTheme = trailingslashit( get_template_directory() );
			$childTheme = trailingslashit( get_stylesheet_directory() );
			$plugin = trailingslashit( dirname( $file ) );

			// Windows sometimes mixes up forward and back slashes, ensure forward slash for correct URL output.
			$parentTheme = str_replace( '\\', '/', $parentTheme );
			$childTheme = str_replace( '\\', '/', $childTheme );
			$file = str_replace( '\\', '/', $file );

			$url = '';

			// Framework is in a parent theme.
			if ( stripos( $file, $parentTheme ) !== false ) {
				$dir = trailingslashit( dirname( str_replace( $parentTheme, '', $file ) ) );
				if ( './' == $dir ) {
					$dir = '';
				}
				$url = trailingslashit( get_template_directory_uri() ) . $dir . $script;

			} else if ( stripos( $file, $childTheme ) !== false ) {
				// Framework is in a child theme.
				$dir = trailingslashit( dirname( str_replace( $childTheme, '', $file ) ) );
				if ( './' == $dir ) {
					$dir = '';
				}
				$url = trailingslashit( get_stylesheet_directory_uri() ) . $dir . $script;

			} else {
				// Framework is a or in a plugin.
				$url = plugins_url( $script, $file );
			}

			// Replace /foo/../ with '/'.
			$url = preg_replace( '/\/(?!\.\.)[^\/]+\/\.\.\//', '/', $url );

			return $url;
		}

		/**
		 * Sets a value in the $setting class variable
		 *
		 * @since 1.0.0
		 * @param string $setting The name of the setting.
		 * @param string $value The value to set.
		 * @return void
		 */
		public function set( $setting, $value ) {

			$oldValue = $this->settings[ $setting ];

			$this->settings[ $setting ] = $value;

			do_action( 'dpf_setting_' . $setting . '_changed_' . $this->optionNamespace, $value, $oldValue );
		}

		/**
		 * Gets the CSS generated
		 *
		 * @since 1.0.0
		 * @return string The generated CSS
		 */
		public function generateCSS() {
			return $this->cssInstance->generateCSS();
		}

	}

}
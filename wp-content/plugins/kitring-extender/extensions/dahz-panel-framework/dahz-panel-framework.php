<?php

/**
 * Plugin Name: Dahz Panel Framework
 * Description: 
 * Plugin URI: http://daffyhazan.com/
 * Author: Dahz
 * Author URI: http://daffyhazan.com/
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: dpf_textdomain
 * Domain Path: domain/path
 */

/*
    Copyright (C) 2018  Daffyhazan.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if ( !defined('ABSPATH') ) {
	exit;
}

if ( !class_exists( 'DAHZ_Panel_Framework' ) ) {

	/**
	 * Class DAHZ_Panel_Framework
	 * 
	 * 
	 * @since 1.0.0
	 * @author Dahz | Rama
	 * @package Dahz Panel Framework
	 */
	class DAHZ_Panel_Framework {
		
		function __construct() {

			$this->dpf_define_constant();

			$this->dpf_require_file();

			$this->dpf_load_text_domain();

			add_action( 'after_setup_theme', array( $this, 'dpf' ), 1 );
			

		}


		public function dpf() {

			add_action( 'init', array( $this, 'dpf_on_action_trigger' ), 1 );

		}

		/**
		 * Define an identifier for Dahz Panel Framework
		 * 
		 * @since 1.0.0
		 * @author Dahz
		 * @package Dahz Panel Framework
		 */
		public function dpf_define_constant() {

			defined('DPF_PATH') or define( 'DPF_PATH', trailingslashit( dirname( __FILE__ ) ) );

			defined('DPF_PLUGIN_BASENAME') or define( 'DPF_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

			defined( 'DPF_NAME' ) or define( 'DPF_NAME', 'Dahz Panel Framework' );

		}

		public function dpf_require_file() {

			require_once( DPF_PATH . 'core/dpf-class-admin-notification.php' );
			require_once( DPF_PATH . 'core/dpf-class-admin-page.php' );
			require_once( DPF_PATH . 'core/dpf-class-admin-tab.php' );
			require_once( DPF_PATH . 'core/dpf-options.php' );
			require_once( DPF_PATH . 'core/dpf-class-option-enable.php' );
			require_once( DPF_PATH . 'core/dpf-class-option-save.php' );
			require_once( DPF_PATH . 'core/dpf-class-option-select.php' );
			require_once( DPF_PATH . 'core/dpf-class-option-select-pages.php' );
			require_once( DPF_PATH . 'core/dpf-class-option-text.php' );
			require_once( DPF_PATH . 'core/dpf-class-option-textarea.php' );
			require_once( DPF_PATH . 'core/dpf-core.php' );
			require_once( DPF_PATH . 'core/dpf-utils-functions.php' );

		}

		public function dpf_load_text_domain() {

			load_plugin_textdomain( 'dpf_textdomain', false, basename( dirname( __FILE__ ) ) . '/languages/' );

		}

		/**
		 * Action for creating theme options
		 * 
		 * @since 1.0.0
		 * @package Dahz Panel Framework
		 */
		public function dpf_on_action_trigger()	{

			/**
			 * Hook All Option Created Here
			 * 
			 */
			do_action( 'dpf_options' );

			/**
			 * Execute all action immediately after options are created
			 * 
			 */
			do_action( 'dpf_done' );

		}


	}

	new DAHZ_Panel_Framework();

}

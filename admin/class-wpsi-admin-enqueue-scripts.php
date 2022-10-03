<?php
/**
 * A class file
 *
 * @package WordPress Slideshow
 */

if ( ! class_exists( 'WPSI_Admin_Enqueue_Scripts' ) ) {

	/**
	 * Class WPSI_Admin_Enqueue_Scripts
	 *
	 * @package WordPress Slideshow
	 */
	class WPSI_Admin_Enqueue_Scripts {

		/**
		 * Construct Funtions hooking the function with admin_enqueue_scripts action.
		 */
		public function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles_and_scripts' ) );
		}

		/**
		 *  Admin side scripts and styles.
		 */
		public function enqueue_styles_and_scripts() {

			// Styles.
			wp_enqueue_style( 'wpsi-admin', WPSI_CSS_URL . '/admin-style.css', false, '1.0.0' );

			// Scripts.
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'wpsi-admin', WPSI_JS_URL . '/admin-scripts.js', array( 'jquery' ), '1.0.0', false );
		}

	}

	new WPSI_Admin_Enqueue_Scripts();
}

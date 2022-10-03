<?php
/**
 * A class file
 *
 * @package WordPress Slideshow
 */

if ( ! class_exists( 'WPSI_WP_Enqueue_Scripts' ) ) {

	/**
	 * Class WPSI_WP_Enqueue_Scripts
	 *
	 * @package WordPress Slideshow
	 */
	class WPSI_WP_Enqueue_Scripts {

		/**
		 * Construct Funtions hooking the function with admin_enqueue_scripts action.
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles_and_scripts' ) );
		}

		/**
		 *  Admin side scripts and styles.
		 */
		public function enqueue_styles_and_scripts() {

			// Styles.
			wp_enqueue_style( 'slick', WPSI_LIB_URL . '/slick/slick.css', false, '1.8.1' );
		    wp_enqueue_style( 'slick-theme', WPSI_LIB_URL . '/slick/slick-theme.css', false, '1.8.1' );
			wp_enqueue_style( 'wpsi-style', WPSI_CSS_URL . '/style.css', false, '1.0.0' );

			// Scripts.
			wp_enqueue_script('jquery');
		    wp_enqueue_script( 'slick', WPSI_LIB_URL . '/slick/slick.min.js', array('jquery'), '1.8.1', true );
			wp_enqueue_script( 'wpsi-js', WPSI_JS_URL . '/scripts.js', array( 'jquery' ), '1.0.0', false );

		}

	}

	new WPSI_WP_Enqueue_Scripts();
}

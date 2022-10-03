<?php
/**
 * Class File
 *
 * @package WordPress Slideshow
 */

if ( ! class_exists( 'WPSI_Shortcodes' ) ) {

	/**
	 * Class WPSI_Shortcodes
	 *
	 * @package WordPress Slideshow
	 */
	class WPSI_Shortcodes {

		/**
		 * Construct function to add shortcodes.
		 */
		public function __construct() {
			add_shortcode( 'wpsi_slideshow', array( $this, 'slideshow_shortcode' ) );
		}

		/**
		 * Slideshow shortcode callback.
		 */
		public function slideshow_shortcode() {
			// Loading HTML of shortcode from file.
			ob_start();
			include 'partials/slideshow-shortcode-content.php';
			return ob_get_clean();
		}

	}

	new WPSI_Shortcodes();
}

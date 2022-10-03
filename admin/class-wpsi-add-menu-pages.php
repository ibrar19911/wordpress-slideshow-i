<?php
/**
 * A class file
 *
 * @package WordPress Slideshow
 */

if ( ! class_exists( 'WPSI_Add_Menu_Pages' ) ) {

	/**
	 * Class WPSI_Add_Menu_Pages
	 *
	 * @package WordPress Slideshow
	 */
	class WPSI_Add_Menu_Pages {

		/**
		 * Construct Funtions hooking the function with admin_menu action.
		 */
		public function __construct() {
			add_action( 'admin_menu', array( $this, 'register_menu_pages' ), 99 );
		}

		/**
		 * Function to register the page options.
		 */
		public function register_menu_pages() {

			add_menu_page(
				__( 'WPSI Slideshow' ),
				'WPSI Slideshow',
				'manage_options',
				'wpsi/slideshow.php',
				array( $this, 'slideshow_options_callback' ),
				'dashicons-images-alt',
				25
			);

			add_action( 'admin_init', array( $this, 'slideshow_settings' ) );
		}

		/**
		 * Callback function to load the options page.
		 */
		public function slideshow_options_callback() {
			// Page marckup is store the following php file in partials dir.
			require_once 'partials/slideshow-options-page.php';
		}

		/**
		 * Register options page settings and settings section
		 *
		 * @see https://codex.wordpress.org/Settings_API
		 */
		public function slideshow_settings() {
			register_setting( 'wpsi-slideshow', 'wpsi_images_ids' );
			add_settings_section( 'wpsi_slideshow_options', '', '', 'wpsi-slideshow' );
			add_settings_field( 'wpsi_images_ids', 'Select The images', array( $this, 'images_ids_field' ), 'wpsi-slideshow', 'wpsi_slideshow_options' );
		}

		/**
		 * Register options page field to section
		 *
		 * @see https://codex.wordpress.org/Settings_API
		 */
		public function images_ids_field() {
			$img_ids = esc_attr( get_option( 'wpsi_images_ids' ) );
			echo '<input type="text" name="wpsi_images_ids" id="wpsi_images_ids" value="' . esc_attr( $img_ids ) . '">';
		}

	}

	new WPSI_Add_Menu_Pages();
}

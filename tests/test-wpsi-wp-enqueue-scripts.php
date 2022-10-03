<?php
/**
 * Unit test Class
 *
 * @package WordPress Slideshow
 */

/**
 * WPSI_WP_Enqueue_Scripts test case.
 */
class Test_WPSI_WP_Enqueue_Scripts extends WP_UnitTestCase {

	/**
	 * Constructor function test.
	 */
	public function test_constructor() {

		$wp_enqueue = new WPSI_WP_Enqueue_Scripts();

		// Check if function is hooked correctly with wp_enqueue_scripts of not.
		$register_menu_pages_hooked = has_action( 'wp_enqueue_scripts', array( $wp_enqueue, 'enqueue_styles_and_scripts' ) );

		$result = ( 10 === $register_menu_pages_hooked ) ? true : false;

		// Assertion.
		$this->assertTrue( $result );
	}

	/**
	 * Enqueuing function test.
	 */
	public function test_enqueue_styles_and_scripts() {

		$wp_enqueue = new WPSI_WP_Enqueue_Scripts();

		// Run function to enqueue styles and scripts.
		$wp_enqueue->enqueue_styles_and_scripts();

		// $retult = ( wp_style_is( 'wpsi-admin' ) && wp_script_is( 'jquery-ui-sortable' ) && wp_script_is( 'wpsi-admin' ) ) ? true : false;

		$slick = wp_style_is( 'slick' );
		$slick_theme = wp_style_is( 'slick-theme' );
		$wpsi_style = wp_style_is( 'wpsi-style' );

		$jquery = wp_script_is( 'jquery' );
		$slick = wp_script_is( 'slick' );
		$wpsi_js = wp_script_is( 'wpsi-js' );

		$retult = ( $slick && $slick_theme && $wpsi_style && $jquery && $slick && $wpsi_js ) ? true : false;

		// Assertion.
		$this->assertTrue( $retult );
	}

}

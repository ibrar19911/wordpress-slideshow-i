<?php
/**
 * Unit test Class
 *
 * @package WordPress Slideshow
 */

/**
 * WPSI_Shortcodes test case.
 */
class Test_WPSI_Shortcodes extends WP_UnitTestCase {

	/**
	 * Slideshow shortcode test.
	 */
	public function test_slideshow_shortcode() {

		global $shortcode_tags;

		$shortcodes = new WPSI_Shortcodes();

		// Assertion to check is shortcode is added.
		$this->assertArrayHasKey( 'wpsi_slideshow', $shortcode_tags );
	}

}

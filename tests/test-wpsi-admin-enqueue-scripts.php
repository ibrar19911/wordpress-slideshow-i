<?php
/**
 * Unit test Class
 *
 * @package WordPress Slideshow
 */

/**
 * WPSI_Admin_Enqueue_Scripts test case.
 */
class Test_WPSI_Admin_Enqueue_Scripts extends WP_UnitTestCase {

	/**
	 * SetUp function.
	 */
	public function setUp(): void {

		parent::setUp();

		// Creating a dummy admin user.
		$admin = $this->factory->user->create_and_get(
			array(
				'user_login' => 'jdoe',
				'user_pass'  => null,
				'role'       => 'administrator',
			)
		);

		// Setting current user as dummy admin user.
		wp_set_current_user( $admin->ID );
	}

	/**
	 * Constructor function test.
	 */
	public function test_constructor() {

		$admin_enqueue = new WPSI_Admin_Enqueue_Scripts();

		// Check if register_menu_pages is hooked correctly.
		$register_menu_pages_hooked = has_action( 'admin_enqueue_scripts', array( $admin_enqueue, 'enqueue_styles_and_scripts' ) );

		$result = ( 10 === $register_menu_pages_hooked ) ? true : false;

		// Assertion.
		$this->assertTrue( $result );
	}

	/**
	 * Enqueuing function test.
	 */
	public function test_enqueue_styles_and_scripts() {

		$admin_enqueue = new WPSI_Admin_Enqueue_Scripts();

		// Run function to enqueue styles and scripts.
		$admin_enqueue->enqueue_styles_and_scripts();

		$retult = ( wp_style_is( 'wpsi-admin' ) && wp_script_is( 'jquery-ui-sortable' ) && wp_script_is( 'wpsi-admin' ) ) ? true : false;

		// Assertion.
		$this->assertTrue( $retult );
	}

}

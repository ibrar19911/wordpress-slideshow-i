<?php
/**
 * Unit test Class
 *
 * @package WordPress Slideshow
 */

/**
 * WPSI_Add_Menu_Pages test case.
 */
class Test_WPSI_Add_Menu_Pages extends WP_UnitTestCase {

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

		$add_menus = new WPSI_Add_Menu_Pages();

		// Check if register_menu_pages is hooked correctly.
		$register_menu_pages_hooked = has_action( 'admin_menu', array( $add_menus, 'register_menu_pages' ) );

		$result = ( 99 === $register_menu_pages_hooked ) ? true : false;

		// Assertion.
		$this->assertTrue( $result );
	}

	/**
	 * Check of admin pages are registered correctly.
	 */
	public function test_register_menu_pages() {

		$add_menus = new WPSI_Add_Menu_Pages();

		// Run function to register the menu page.
		$add_menus->register_menu_pages();

		// Checking if the page with URL exists.
		$admin_menu_page_url = menu_page_url( 'wpsi/slideshow.php', false );

		$retult = $admin_menu_page_url ? true : false;

		// Assertion.
		$this->assertTrue( $retult );
	}

	/**
	 * Check of admin pages HTML is fethed correctly.
	 */
	public function test_slideshow_options_callback() {

		$add_menus = new WPSI_Add_Menu_Pages();

		// Storing field HTML in output buffering.
		ob_start();
		$add_menus->slideshow_options_callback();
		$output = ob_get_clean();

		// Assertion.
		$this->assertStringContainsString( 'upload_image_button', $output );
	}

	/**
	 * Check if slideshow_settings registering settings correctly.
	 */
	public function test_slideshow_settings() {

		global $wp_registered_settings;

		$add_menus = new WPSI_Add_Menu_Pages();

		// Running function to register the settings.
		$add_menus->slideshow_settings();

		// Assertion.
		$this->assertArrayHasKey( 'wpsi_images_ids', $wp_registered_settings );
	}

	/**
	 * Check if images_ids_field rendering field correctly.
	 */
	public function test_images_ids_field() {

		$add_menus = new WPSI_Add_Menu_Pages();

		// Storing field HTML in output buffering.
		ob_start();
		$add_menus->images_ids_field();
		$output = ob_get_clean();

		// Assertion.
		$this->assertStringContainsString( 'input', $output );
	}




}

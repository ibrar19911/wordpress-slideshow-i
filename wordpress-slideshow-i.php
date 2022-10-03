<?php
/**
 * Plugin Name: WordPress Slideshow
 * Plugin URI: https://www.example.com
 * Description: This is an assignment plugin with which we can assign multiple authors to one post.
 * Version: 1.0.0
 * Author: Muhammad Ibrar
 * Author URI: https://profiles.wordpress.org/ibrar1991/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wordpress-slideshow
 * Domain Path: /languages
 *
 * @package WordPress Slideshow
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Important Constants
define( 'WPSI_CSS_URL', plugins_url( 'wordpress-slideshow-i' ) . '/css/' );
define( 'WPSI_JS_URL', plugins_url( 'wordpress-slideshow-i' ) . '/js/' );

// Inlude files.
include_once 'admin/class-wpsi-add-menu-pages.php';
include_once 'admin/class-wpsi-admin-enqueue-scripts.php';

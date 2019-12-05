
<?php
/**
 * Plugin Name: Elementor Contact Form
 * Description: Elementor Contact Form is a elementor addon for Elementor page builder plugin for WordPress.
 * Plugin URI: 	https://themepuller.com
 * Author: 		Themepuller
 * Author URI: 	https://themepuller.com/
 * Version: 	1.0.0
 * License:     GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: elementor-contact-form
 * Domain Path: /languages
*/


define( 'THEMEPULLER_ADDON_DIR_PATH', plugin_dir_path( __FILE__ ) );
define('THEMEPULLER_ADDON_ROOT_URL',plugin_dir_url(__FILE__));

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly
define( 'ELEMENTOR_CONTACT_FORM_VERSION', '1.0.0' );
define( 'ELEMENTOR_CONTACT_FORM_ROOT', __FILE__ );
define( 'ELEMENTOR_CONTACT_FORM_URL', plugins_url( '/', ELEMENTOR_CONTACT_FORM_ROOT ) );
define( 'ELEMENTOR_CONTACT_FORM_PATH', plugin_dir_path( ELEMENTOR_CONTACT_FORM_ROOT ) );
define( 'ELEMENTOR_CONTACT_FORM_PLUGIN_BASE', plugin_basename( ELEMENTOR_CONTACT_FORM_ROOT ) );

// Required File
require_once ( ELEMENTOR_CONTACT_FORM_PATH.'init.php' );
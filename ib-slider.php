<?php
/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Vipul
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       IB Slider
 * Description:       The Plugin helps to create a slider and use it with a shortcode.
 * Version:           1.0.0
 * Author:            Vipul
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Exit if Accessed Directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Summary ib_slider_front_scripts function
 *
 * Description This is a function that will load stylesheet and JS files to the front end.
 *
 * @since 1.0.0
 * @link URL
 */

	/**
	* Summary These require include the scripts and settings page files to the plugin.
	*/
	require_once plugin_dir_path( __FILE__ ) . '/inc/ib-slider-scripts.php';
	require_once plugin_dir_path( __FILE__ ) . '/inc/ib-slider-settings-page.php';
	require_once plugin_dir_path( __FILE__ ) . '/inc/slider-shortcode.php';


// register_activation_hook( __FILE__, 'plugin_activation' );

// register_deactivation_hook();

// register_uninstall_hook();

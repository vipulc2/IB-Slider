<?php
/**
 * Summary IB-Slider Scripts
 *
 * Description The file contains all the enqueue front-end and back-end scripts for the Plugin.
 *
 * @link URL
 *
 * @package WordPress
 * @subpackage Plugin
 * @since 1.0.0
 */

/**
 * Summary add_action wp_enqueue_scripts
 *
 * Description The enqueue for front end stylesheet and JS files.
 *
 * @since 1.0.0
 */

add_action( 'wp_enqueue_scripts', 'ib_slider_front_scripts' );

/**
 * Summary ib_slider_front_scripts function
 *
 * Description This is a function that will load stylesheet and JS files to the front end.
 *
 * @since 1.0.0
 * @link URL
 */
function ib_slider_front_scripts() {
	// Register and enqueue the styles.
	wp_register_style( 'slidesjs_example', plugins_url() . '/IB-Slider/lib/example.css', array(), '1.0' );
	wp_enqueue_style( 'slidesjs_example' );

	wp_register_style( 'slidesjs_fonts', plugins_url() . '/IB-Slider/lib/font-awesome.min.css', array(), '1.0' );
	wp_enqueue_style( 'slidesjs_fonts' );

	// Register and enqueue the scripts.
	wp_enqueue_script( 'jquery' );

	wp_register_script( 'slidesjs_core', plugins_url() . '/IB-Slider/lib/jquery.slides.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'slidesjs_core' );

	wp_register_script( 'slidesjs_init', plugins_url() . '/IB-Slider/lib/slidesjs.initialize.js', array(), '1.0', true );
	wp_enqueue_script( 'slidesjs_init' );
}

/**
 * Summary add_action admin_enqueue_scripts
 *
 * Description The enqueue for back end stylesheet and JS files.
 *
 * @since 1.0.0
 */

add_action( 'admin_enqueue_scripts', 'ib_slider_back_scripts' );

/**
 * Summary ib_slider_front_scripts function
 *
 * Description This is a function that will load stylesheet and JS files to the front end.
 *
 * @since 1.0.0
 * @link URL
 * @param string $hook Returns the page's location and helps to restricts all scripts to run on the set settings page only.
 */
function ib_slider_back_scripts( $hook ) {
	if ( 'toplevel_page_IB-Slider/inc/ib-slider-settings-page' !== $hook ) {
		return;
	}

	// Register and enqueue of admin side JQuery Sortable file.
	wp_register_script( 'js_sortable_1', 'https://code.jquery.com/jquery-1.12.4.js', array(), '1.0', true );
	wp_register_script( 'js_sortable_2', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array(), '1.0', true );
	wp_enqueue_script( 'js_sortable_1' );
	wp_enqueue_script( 'js_sortable_2' );

	// Register and enqueue of admin side JQuery Sortable Stylesheet.
	wp_register_style( 'js_sortable_style', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), '1.0' );
	wp_enqueue_style( 'js_sortable_style' );

	// Register and enqueue of admin side JS file.
	wp_register_script( 'admin_js', plugins_url() . '/IB-Slider/admin/admin-js.js', array(), '1.0', true );
	wp_enqueue_script( 'admin_js' );

	// Register and enqueue of admin side STYLESHEET file.
	wp_register_style( 'admin_style', plugins_url() . '/IB-Slider/admin/admin-style.css', array(), '1.0' );
	wp_enqueue_style( 'admin_style' );

}

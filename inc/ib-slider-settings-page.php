<?php
/**
 * Summary IB-Slider Settings Page
 *
 * Description The file contains all the functions for the plugin settings page.
 *
 * @link URL
 *
 * @package WordPress
 * @subpackage Plugin
 * @since 1.0.0
 */

/**
 * Summary add_action for admin_menu.
 *
 * Description This is used to add add_action and hook admin_menu to add an admin settings page.
 *
 * @since 1.0.0
 *
 * @param type  $var Description.
 * @param array $args {
 *     Short description about this hash.
 *
 *     @type type $var Description.
 *     @type type $var Description.
 * }
 * @param type  $var Description.
 */

add_action( 'admin_menu', 'build_admin_menu' );

/**
 * Summary Function for add_menu_page and add_action for admin_init.
 *
 * Description The function creates a settings page with add_menu_page and an add_action for admin_init to register the images url.
 *
 * @since 1.0.0
 *
 * @see Function/method/class relied on
 * @link URL
 * @global type $varname Description.
 * @global type $varname Description.
 */
function build_admin_menu() {
	add_menu_page( 'Build Slider Settings Page', 'IB-Slider', 'administrator', __FILE__, 'settings_page_function', 'dashicons-format-image' );

	add_action( 'admin_init', 'register_img_url' );

}

/**
 * Summary Function to register the image url.
 *
 * Description The function registers image url for adding to options table.
 *
 * @since 1.0.0
 *
 * @see Function/method/class relied on
 * @link URL
 * @global type $varname Description.
 * @global type $varname Description.
 */
function register_img_url() {
	register_setting( 'img_url', 'img_url_list' );
}

/**
 * Summary Function to build the settings page.
 *
 * Description The function builds the settings page of the plugin.
 *
 * @since 1.0.0
 *
 * @see Function/method/class relied on
 * @link URL
 * @global type $varname Description.
 * @global type $varname Description.
 */
function settings_page_function() {
	wp_enqueue_media();?>

<div class="wrap">
<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	<form action="options.php" method="post">

	<input id="btnImage" type="button" value="<?php echo esc_html( 'Upload image' ); ?>" >

	<ul class="ul-unique" id="sortable">

	<?php
	// Populating the Images by checking url in options table.
	$url_string = get_option( 'img_url_list' );

	$url_array = ( explode( ',', $url_string ) );

	foreach ( $url_array as $each_url ) {

		if ( '' !== $each_url ) {

			$li_img .= '<li class="ui-state-default unique"><img src="' . $each_url . '" /><a class="delete-item">Remove</a></li>';

		}
	}

	echo $li_img;

	?>

	</ul>

	<?php
	settings_fields( 'img_url' );
	do_settings_sections( 'img_url' );
	?>

	<input id="hidden-img" type="hidden" name="img_url_list">


	<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Slider">

	</form>

<div class="shortcode-msg"> Please use ib_slider shortcode for adding slider.</div>

</div>
	<?php

}

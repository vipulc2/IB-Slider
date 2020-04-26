<?php
/**
 * Summary Shortcode for Slider
 *
 * Description The file contains shortcode to display image slider.
 *
 * @link URL
 *
 * @package WordPress
 * @subpackage Plugin
 * @since 1.0.0
 */

/**
 * Summary add_shortcode for slider
 *
 * Description This is used to add a shortcode for the image slider.
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

add_shortcode( 'ib_slider', 'slider_shortcode_function' );

/**
 * Summary Function for shortcode.
 *
 * Description Function for shortcode for image slider.
 *
 * @since 1.0.0
 *
 * @see Function/method/class relied on
 * @link URL
 * @global type $varname Description.
 * @global type $varname Description.
 * @return string Description Returning the html code for building a slider on front-end.
 */
function slider_shortcode_function() {

	$plugins_url = plugins_url();

	$url_string = get_option( 'img_url_list' );

	$url_array = ( explode( ',', $url_string ) );

	$html = '
    <div class="container">
    <div id="slides">
    ';

	foreach ( $url_array as $each_url ) {

		if ( '' !== $each_url ) {

			$html .= '<img src=' . $each_url . ' />';

		}
	}

	$html .= '
    </div>
    </div>
    ';

return $html;

}

<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://techscorpio.xyz
 * @since      1.0.0
 *
 * @package    Techscorpio_Mobile
 * @subpackage Techscorpio_Mobile/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Techscorpio_Mobile
 * @subpackage Techscorpio_Mobile/includes
 * @author     TechScorpio <wordpress@techscorpio.xyz>
 */
class Techscorpio_Mobile_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'techscorpio-mobile',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

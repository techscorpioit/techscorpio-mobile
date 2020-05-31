<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://techscorpio.xyz
 * @since      1.0.0
 *
 * @package    Techscorpio_Mobile
 * @subpackage Techscorpio_Mobile/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Techscorpio_Mobile
 * @subpackage Techscorpio_Mobile/admin
 * @author     TechScorpio <wordpress@techscorpio.xyz>
 */
class Techscorpio_Mobile_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Techscorpio_Mobile_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Techscorpio_Mobile_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/techscorpio-mobile-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'style', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css');

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0 
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Techscorpio_Mobile_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Techscorpio_Mobile_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/techscorpio-mobile-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'script', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js');

	}

	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'TechScorpio Mobile Settings', 'techscorpio-mobile' ),
			__( 'TechScorpio Mobile', 'techscorpio-mobile' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);
	
	}

	public function display_options_page() {
		include_once 'partials/techscorpio-mobile-admin-display.php';
	}

}

<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.getadministrate.com/
 * @since      1.0.0
 *
 * @package    Admwswp
 * @subpackage Admwswp/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Admwswp
 * @subpackage Admwswp/admin
 * @author     Jad Khater <jck@adminstrate.co>
 */
class Admwswp_Admin {

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
	 * Admin Init
	 *
	 * @since    1.0.0
	 */
	public function acfInit() {
		if (function_exists('acf_add_options_page')):
		    acf_add_options_page(array(
		        'page_title' => 'Weblink2 - settings',
		        'menu_title' => 'Weblink2 - settings',
		        'menu_slug' => 'weblink_settings',
		        'capability' => 'edit_posts',
		        'redirect' => false,
		        'icon_url' => 'dashicons-admin-settings',
		    ));
		endif;
	}

	public function weblinkWidget($attr) {

		$type = $attr['widget_type'];
		switch ($type) {
			case 'Basket':
			case 'Cart':
			case 'SearchBar':
			case 'CategoryDropdown':
				return "[weblink-widget widget_type='$type']";
				break;

			default:
				$args = array();
				foreach ($attr as $key => $value) {
					if ($value) {
						$args[] = "$key='$value'";
					}
				}

				$shortcodeAttributes = implode(' ', $args);
				return "[weblink-widget $shortcodeAttributes]";
				break;
		}


	}

	public function webLinkBlockInit() {
	    if (!function_exists('register_block_type')) {
	        return;
	    }

	    wp_register_script(
	      $this->plugin_name . 'editor-blocks',
	      plugin_dir_url(__FILE__) . 'js/editor-blocks.js',
	      array(
	      	'wp-blocks',
	      	'wp-editor',
	      	'wp-i18n',
	      	'wp-element',
	      	'wp-components'
	      )
	    );

	    register_block_type(
	        'admwswp/weblink',
	        array(
	            'editor_script' => $this->plugin_name . 'editor-blocks',
	            'render_callback' => array($this , 'weblinkWidget'),
	            'attributes' => array(
	            	'widget_type' => array(
	            		'type' => 'string',
	            		'default' => 'Catalogue'
	            	),
	            	'catalogue_type' => array(
	            		'type' => 'string',
	            		'default' => 'All'
	            	),
	            	'category' => array(
	            		'type' => 'string',
	            		'default' => ''
	            	),
	            	'path' => array(
	            		'type' => 'string',
	            		'default' => ''
	            	),
	            	'course' => array(
	            		'type' => 'string',
	            		'default' => ''
	            	),
	            	'location' => array(
	            		'type' => 'string',
	            		'default' => ''
	            	),
	            	'to_date' => array(
	            		'type' => 'date',
	            		'default' => ''
	            	),
	            	'from_date' => array(
	            		'type' => 'date',
	            		'default' => ''
	            	),
	            	'date_filter' => array(
	            		'type' => 'bool',
	            		'default' => true
	            	),
	            	'location_filter' => array(
	            		'type' => 'bool',
	            		'default' => true
	            	),
	            	'course_filter' => array(
	            		'type' => 'bool',
	            		'default' => false
	            	),
	            	'category_filter' => array(
	            		'type' => 'bool',
	            		'default' => false
	            	),
	            	'event_list_order_field' => array(
	            		'type' => 'string',
	            		'default' => ''
	            	),
	            	'event_list_order_direction' => array(
	            		'type' => 'string',
	            		'default' => ''
	            	),
	            	'title_column' => array(
	            		'type' => 'bool',
	            		'default' => false
	            	),
	            	'location_column' => array(
	            		'type' => 'bool',
	            		'default' => true
	            	),
	            	'venue_column' => array(
	            		'type' => 'bool',
	            		'default' => false
	            	),
	            	'start_date_column' => array(
	            		'type' => 'bool',
	            		'default' => true
	            	),
	            	'duration_column' => array(
	            		'type' => 'bool',
	            		'default' => true
	            	),
	            	'time_column' => array(
	            		'type' => 'bool',
	            		'default' => true
	            	),
	            	'places_remaining_column' => array(
	            		'type' => 'bool',
	            		'default' => true
	            	),
	            	'price_column' => array(
	            		'type' => 'bool',
	            		'default' => true
	            	),
	            	'add_to_cart_column' => array(
	            		'type' => 'bool',
	            		'default' => true
	            	),
	            	'classroom_start_date_column' => array(
	            		'type' => 'bool',
	            		'default' => false
	            	),
	            	'classroom_duration_column' => array(
	            		'type' => 'bool',
	            		'default' => false
	            	),
	            	'classroom_time_column' => array(
	            		'type' => 'bool',
	            		'default' => false
	            	),
	            	'lms_start_date_column' => array(
	            		'type' => 'bool',
	            		'default' => false
	            	),
	            	'lms_duration_column' => array(
	            		'type' => 'bool',
	            		'default' => false
	            	),
	            	'lms_time_column' => array(
	            		'type' => 'bool',
	            		'default' => false
	            	),
	            )
	        )
	    );
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
		 * defined in Admwswp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Admwswp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/admwswp-admin.css', array(), $this->version, 'all' );

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
		 * defined in Admwswp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Admwswp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/admwswp-admin.js', array( 'jquery' ), $this->version, false );

	}
}

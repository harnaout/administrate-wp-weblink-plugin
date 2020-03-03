<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.getadministrate.com/
 * @since      1.0.0
 *
 * @package    Admwswp
 * @subpackage Admwswp/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Admwswp
 * @subpackage Admwswp/public
 * @author     Jad Khater <jck@adminstrate.co>
 */
class Admwswp_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public static function weblinkWidget($attr) {

		if (is_admin()) {
			return;
		}

	    extract(
	        shortcode_atts(
	            array(
	                'widget_type' => '',
	                'category' => '',
	                'path' => '',
	                'course' => '',
	                'location' => '',
	                'to_date' => '',
	                'from_date' => '',
	                'catalogue_type' => 'All',
	                'date_filter' => false,
	                'location_filter' => false,
	                'course_filter' => false,
	                'category_filter' => false,
	                'event_list_order_field' => '',
	                'event_list_order_direction' => '',
	                'title_column' => false,
	                'location_column' => false,
	                'venue_column' => false,
	                'start_date_column' => false,
	                'duration_column' => false,
	                'time_column' => false,
	                'places_remaining_column' => false,
	                'price_column' => false,
	                'add_to_cart_column' => false,
	                'classroom_start_date_column' => false,
	                'classroom_duration_column' => false,
	                'classroom_time_column' => false,
	                'lms_start_date_column' => false,
	                'lms_duration_column' => false,
	                'lms_time_column' => false,
	            ),
	        $attr)
	    );

	    $webLinkArgs = array();

	    switch ($widget_type) {
	        case 'PathDetails':
	            if ($path) {
	                $webLinkArgs['id'] = $path;
	            }
	            break;
	        case 'CourseDetails':
	        case 'Catalogue':
	        case 'Category':
	        case 'EventList':
	            if ($course) {
	                $webLinkArgs['code'] = $course;
	            }
	            if ($category) {
	                $webLinkArgs['categoryId'] = $category;
	            }
	            if (!$catalogue_type) {
	                $webLinkArgs['catalogueType'] = get_field('catalogueType', 'options');
	            } else {
	            	if ('All' === $catalogue_type) {
	            		$catalogue_type = null;
	            	}
	                $webLinkArgs['catalogueType'] = $catalogue_type;
	            }

	            if ($from_date) {
	                $webLinkArgs['fromDate'] = $from_date;
	            }

	            if ($to_date) {
	                $webLinkArgs['toDate'] = $to_date;
	            }

	            if (!$date_filter) {
	                $webLinkArgs['showDateFilter'] = get_field('showDateFilter', 'options');
	            } else {
	                $date_filter = ($date_filter === 'true') ? true : false;
	                $webLinkArgs['showDateFilter'] = $date_filter;
	            }

	            if (!$location_filter) {
	                $webLinkArgs['showLocationFilter'] = get_field('showLocationFilter', 'options');
	            } else {
	                $location_filter = ($location_filter === 'true') ? true : false;
	                $webLinkArgs['showLocationFilter'] = $location_filter;
	            }

	            if (!$course_filter) {
	                $webLinkArgs['showCourseFilter'] = get_field('showCourseFilter', 'options');
	            } else {
	                $course_filter = ($course_filter === 'true') ? true : false;
	                $webLinkArgs['showCourseFilter'] = $course_filter;
	            }

	            if (!$category_filter) {
	                $webLinkArgs['showCategoryFilter'] = get_field('showCategoryFilter', 'options');
	            } else {
	                $category_filter = ($category_filter === 'true') ? true : false;
	                $webLinkArgs['showCategoryFilter'] = $category_filter;
	            }

	            if (!$event_list_order_field) {
	                $eventListOrder = get_field('eventListOrder', 'options');
	                if ($eventListOrder['field']) {
	                    $webLinkArgs['eventListOrder'] = $eventListOrder;
	                }
	            } else {
	                $webLinkArgs['eventListOrder']['field'] = $event_list_order_field;
	                $webLinkArgs['eventListOrder']['direction'] = $event_list_order_direction;
	            }

	            if (!$title_column) {
	                $webLinkArgs['showTitleColumn'] = get_field('showTitleColumn', 'options');
	            } else {
	                $title_column = ($title_column === 'true') ? true : false;
	                $webLinkArgs['showTitleColumn'] = $title_column;
	            }

	            if (!$location_column) {
	                $webLinkArgs['showLocationColumn'] = get_field('showLocationColumn', 'options');
	            } else {
	                $location_column = ($location_column === 'true') ? true : false;
	                $webLinkArgs['showLocationColumn'] = $location_column;
	            }

	            if (!$venue_column) {
	                $webLinkArgs['showVenueColumn'] = get_field('showVenueColumn', 'options');
	            } else {
	                $venue_column = ($venue_column === 'true') ? true : false;
	                $webLinkArgs['showVenueColumn'] = $venue_column;
	            }

	            if (!$start_date_column) {
	                $webLinkArgs['showStartDateColumn'] = get_field('showStartDateColumn', 'options');
	            } else {
	                $start_date_column = ($start_date_column === 'true') ? true : false;
	                $webLinkArgs['showStartDateColumn'] = $start_date_column;
	            }

	            if (!$duration_column) {
	                $webLinkArgs['showDurationColumn'] = get_field('showDurationColumn', 'options');
	            } else {
	                $duration_column = ($duration_column === 'true') ? true : false;
	                $webLinkArgs['showDurationColumn'] = $duration_column;
	            }

	            if (!$time_column) {
	                $webLinkArgs['showTimeColumn'] = get_field('showTimeColumn', 'options');
	            } else {
	                $time_column = ($time_column === 'true') ? true : false;
	                $webLinkArgs['showTimeColumn'] = $time_column;
	            }

	            if (!$places_remaining_column) {
	                $webLinkArgs['showPlacesRemainingColumn'] = get_field('showPlacesRemainingColumn', 'options');
	            } else {
	                $places_remaining_column = ($places_remaining_column === 'true') ? true : false;
	                $webLinkArgs['showPlacesRemainingColumn'] = $places_remaining_column;
	            }

	            if (!$price_column) {
	                $webLinkArgs['showPriceColumn'] = get_field('showPriceColumn', 'options');
	            } else {
	                $price_column = ($price_column === 'true') ? true : false;
	                $webLinkArgs['showPriceColumn'] = $price_column;
	            }

	            if (!$add_to_cart_column) {
	                $webLinkArgs['showAddToCartColumn'] = get_field('showAddToCartColumn', 'options');
	            } else {
	                $add_to_cart_column = ($add_to_cart_column === 'true') ? true : false;
	                $webLinkArgs['showAddToCartColumn'] = $add_to_cart_column;
	            }

	            if (!$classroom_start_date_column) {
	                $webLinkArgs['showClassroomStartDateColumn'] = get_field('showClassroomStartDateColumn', 'options');
	            } else {
	                $classroom_start_date_column = ($classroom_start_date_column === 'true') ? true : false;
	                $webLinkArgs['showClassroomStartDateColumn'] = $classroom_start_date_column;
	            }

	            if (!$classroom_duration_column) {
	                $webLinkArgs['showClassroomDurationColumn'] = get_field('showClassroomDurationColumn', 'options');
	            } else {
	                $classroom_duration_column = ($classroom_duration_column === 'true') ? true : false;
	                $webLinkArgs['showClassroomDurationColumn'] = $classroom_duration_column;
	            }

	            if (!$classroom_time_column) {
	                $webLinkArgs['showClassroomTimeColumn'] = get_field('showClassroomTimeColumn', 'options');
	            } else {
	                $classroom_time_column = ($classroom_time_column === 'true') ? true : false;
	                $webLinkArgs['showClassroomTimeColumn'] = $classroom_time_column;
	            }

	            if (!$lms_start_date_column) {
	                $webLinkArgs['showLmsStartDateColumn'] = get_field('showLmsStartDateColumn', 'options');
	            } else {
	                $lms_start_date_column = ($lms_start_date_column === 'true') ? true : false;
	                $webLinkArgs['showLmsStartDateColumn'] = $lms_start_date_column;
	            }

	            if (!$lms_duration_column) {
	                $webLinkArgs['showLmsDurationColumn'] = get_field('showLmsDurationColumn', 'options');
	            } else {
	                $lms_duration_column = ($lms_duration_column === 'true') ? true : false;
	                $webLinkArgs['showLmsDurationColumn'] = $lms_duration_column;
	            }

	            if (!$lms_time_column) {
	                $webLinkArgs['showLmsTimeColumn'] = get_field('showLmsTimeColumn', 'options');
	            } else {
	                $lms_time_column = ($lms_time_column === 'true') ? true : false;
	                $webLinkArgs['showLmsTimeColumn'] = $lms_time_column;
	            }
	            break;
	        default:

	            break;
	    }

	    $widgetId = "weblink-" . $widget_type . "-" . time();
	    $html = "<div id='weblink-widget-container' class='weblink-$widget_type-container'>";
	    $html .= "<div id='$widgetId' class='weblink-$widget_type'>";
	    $html .= "<div class='fa-3x text-center'>";
	    $html .= "<i class='fas fa-circle-notch fa-spin'></i>";
	    $html .= "</div>";
	    $html .= "</div>";
	    $html .= "</div>";

	    $html .= "<script type='text/javascript'>";
	    $html .= "jQuery(function($) {";
	    $html .= "var webLink = new window.WebLink(webLinkConfig);";
	    $html .= 'webLink.mount(
	        document.getElementById(
	        "' . $widgetId . '"),
	        "'. $widget_type . '"';
	    if ($webLinkArgs) {
	        $webLinkArgsJson = json_encode($webLinkArgs);
	        $html .= "," . $webLinkArgsJson;
	    }
	    $html .= ');';

	    $html .= "});";
	    $html .= "</script>";

	    return $html;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/admwswp-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		$portalAddress = get_field('portalAddress', 'options');
		$hashRouting = get_field('hashRouting', 'options');
		$timezone = get_field('timezone', 'options');

		$webLinkConfig = array(
		  'portalAddress' => $portalAddress,
		  'hashRouting' => $hashRouting,
		  'timezone' => $timezone,
		);

		wp_enqueue_script(
		    $this->plugin_name . 'weblink-js',
		    'https://' . $portalAddress . '/static/js/weblink.bundle.min.js',
		    array('jquery'),
		    $this->version,
		    true
		);

		wp_enqueue_script(
			$this->plugin_name . '-public-js',
			plugin_dir_url( __FILE__ ) . 'js/admwswp-public.js',
			array( 'jquery' ),
			$this->version,
			false
		);

		wp_add_inline_script(
			$this->plugin_name . 'weblink-js',
			'var webLinkConfig = ' . json_encode($webLinkConfig) . ";"
		);

	}

}

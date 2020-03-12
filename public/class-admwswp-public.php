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
class Admwswp_Public
{

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
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public static function weblinkWidget($attr)
    {

        if (is_admin()) {
            return;
        }

        extract(
            shortcode_atts(
                array(
                    'type' => '',
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
                    'event_title' => false,
                    'event_location' => false,
                    'event_venue' => false,
                    'event_start_date' => false,
                    'event_duration' => false,
                    'event_time' => false,
                    'event_places_remaining' => false,
                    'event_price' => false,
                    'event_addtocart' => false,
                    'classroom_start_date' => false,
                    'classroom_duration' => false,
                    'classroom_time' => false,
                    'lms_start_date' => false,
                    'lms_duration' => false,
                    'lms_time' => false,
                ),
                $attr
            )
        );

        $webLinkArgs = array();

        switch ($type) {
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

                if (!$event_title) {
                    $webLinkArgs['showTitleColumn'] = get_field('showTitleColumn', 'options');
                } else {
                    $event_title = ($event_title === 'true') ? true : false;
                    $webLinkArgs['showTitleColumn'] = $event_title;
                }

                if (!$event_location) {
                    $webLinkArgs['showLocationColumn'] = get_field('showLocationColumn', 'options');
                } else {
                    $event_location = ($event_location === 'true') ? true : false;
                    $webLinkArgs['showLocationColumn'] = $event_location;
                }

                if (!$event_venue) {
                    $webLinkArgs['showVenueColumn'] = get_field('showVenueColumn', 'options');
                } else {
                    $event_venue = ($event_venue === 'true') ? true : false;
                    $webLinkArgs['showVenueColumn'] = $event_venue;
                }

                if (!$event_start_date) {
                    $webLinkArgs['showStartDateColumn'] = get_field('showStartDateColumn', 'options');
                } else {
                    $event_start_date = ($event_start_date === 'true') ? true : false;
                    $webLinkArgs['showStartDateColumn'] = $event_start_date;
                }

                if (!$event_duration) {
                    $webLinkArgs['showDurationColumn'] = get_field('showDurationColumn', 'options');
                } else {
                    $event_duration = ($event_duration === 'true') ? true : false;
                    $webLinkArgs['showDurationColumn'] = $event_duration;
                }

                if (!$event_time) {
                    $webLinkArgs['showTimeColumn'] = get_field('showTimeColumn', 'options');
                } else {
                    $event_time = ($event_time === 'true') ? true : false;
                    $webLinkArgs['showTimeColumn'] = $event_time;
                }

                if (!$event_places_remaining) {
                    $webLinkArgs['showPlacesRemainingColumn'] = get_field('showPlacesRemainingColumn', 'options');
                } else {
                    $event_places_remaining = ($event_places_remaining === 'true') ? true : false;
                    $webLinkArgs['showPlacesRemainingColumn'] = $event_places_remaining;
                }

                if (!$event_price) {
                    $webLinkArgs['showPriceColumn'] = get_field('showPriceColumn', 'options');
                } else {
                    $event_price = ($event_price === 'true') ? true : false;
                    $webLinkArgs['showPriceColumn'] = $event_price;
                }

                if (!$event_addtocart) {
                    $webLinkArgs['showAddToCartColumn'] = get_field('showAddToCartColumn', 'options');
                } else {
                    $event_addtocart = ($event_addtocart === 'true') ? true : false;
                    $webLinkArgs['showAddToCartColumn'] = $event_addtocart;
                }

                if (!$classroom_start_date) {
                    $webLinkArgs['showClassroomStartDateColumn'] = get_field('showClassroomStartDateColumn', 'options');
                } else {
                    $classroom_start_date = ($classroom_start_date === 'true') ? true : false;
                    $webLinkArgs['showClassroomStartDateColumn'] = $classroom_start_date;
                }

                if (!$classroom_duration) {
                    $webLinkArgs['showClassroomDurationColumn'] = get_field('showClassroomDurationColumn', 'options');
                } else {
                    $classroom_duration = ($classroom_duration === 'true') ? true : false;
                    $webLinkArgs['showClassroomDurationColumn'] = $classroom_duration;
                }

                if (!$classroom_time) {
                    $webLinkArgs['showClassroomTimeColumn'] = get_field('showClassroomTimeColumn', 'options');
                } else {
                    $classroom_time = ($classroom_time === 'true') ? true : false;
                    $webLinkArgs['showClassroomTimeColumn'] = $classroom_time;
                }

                if (!$lms_start_date) {
                    $webLinkArgs['showLmsStartDateColumn'] = get_field('showLmsStartDateColumn', 'options');
                } else {
                    $lms_start_date = ($lms_start_date === 'true') ? true : false;
                    $webLinkArgs['showLmsStartDateColumn'] = $lms_start_date;
                }

                if (!$lms_duration) {
                    $webLinkArgs['showLmsDurationColumn'] = get_field('showLmsDurationColumn', 'options');
                } else {
                    $lms_duration = ($lms_duration === 'true') ? true : false;
                    $webLinkArgs['showLmsDurationColumn'] = $lms_duration;
                }

                if (!$lms_time) {
                    $webLinkArgs['showLmsTimeColumn'] = get_field('showLmsTimeColumn', 'options');
                } else {
                    $lms_time = ($lms_time === 'true') ? true : false;
                    $webLinkArgs['showLmsTimeColumn'] = $lms_time;
                }
                break;
            default:
                break;
        }

        $widgetId = "weblink-" . $type . "-" . time();
        $html = "<div id='weblink-widget-container' class='weblink-$type-container'>";
        $html .= "<div id='$widgetId' class='weblink-$type'>";
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
	        "'. $type . '"';
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
    public function enqueue_styles()
    {

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

        // wp_enqueue_style(
        //     $this->plugin_name . '-public-css',
        //     plugin_dir_url(__FILE__) . 'css/admwswp-public.css',
        //     array(),
        //     $this->version,
        //     'all'
        // );

        $portalAddress = get_field('portalAddress', 'options');

        wp_enqueue_style(
            $this->plugin_name . '-weblink-css',
            'https://' . $portalAddress . '/static/css/main.css',
            array(),
            $this->version
        );
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

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
            $this->plugin_name . '-weblink-js',
            'https://' . $portalAddress . '/static/js/weblink.bundle.min.js',
            array('jquery'),
            $this->version,
            true
        );

        // wp_enqueue_script(
        //     $this->plugin_name . '-public-js',
        //     plugin_dir_url(__FILE__) . 'js/admwswp-public.js',
        //     array( 'jquery' ),
        //     $this->version,
        //     false
        // );

        wp_add_inline_script(
            $this->plugin_name . '-weblink-js',
            'var webLinkConfig = ' . json_encode($webLinkConfig) . ";"
        );
    }
}

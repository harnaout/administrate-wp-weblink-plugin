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
                    'type' => 'Catalogue',
                    'category_id' => '',
                    'path_id' => '',
                    'course_code' => '',
                    'location_name' => '',
                    'to_date' => '',
                    'from_date' => '',
                    'catalogue_type' => 'All',
                    'pager_type' => 'loadMore',
                    'date_filter' => false,
                    'location_filter' => false,
                    'course_filter' => false,
                    'category_filter' => false,
                    'event_list_order_field' => 'title',
                    'event_list_order_direction' => 'asc',
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
                    'pager_type' => 'loadMore',
                ),
                $attr
            )
        );

        $webLinkArgs = array();

        switch ($type) {
            case 'PathDetails':
                if ($path_id) {
                    $webLinkArgs['id'] = $path_id;
                }
                break;
            case 'CourseDetails':
            case 'Catalogue':
            case 'Category':
            case 'EventList':
                if ($course_code) {
                    $webLinkArgs['code'] = $course_code;
                }

                if ($location_name) {
                    $webLinkArgs['location'] = $location_name;
                }

                if ($category_id) {
                    $webLinkArgs['categoryId'] = $category_id;
                }

                if ('All' !== $catalogue_type) {
                    $webLinkArgs['catalogueType'] = $catalogue_type;
                }

                if ('All' !== $pager_type) {
                    $webLinkArgs['pagerType'] = $pager_type;
                }

                if ($from_date) {
                    $webLinkArgs['fromDate'] = $from_date;
                }

                if ($to_date) {
                    $webLinkArgs['toDate'] = $to_date;
                }

                $webLinkArgs['showDateFilter'] = ($date_filter === 'true') || ($date_filter) ? true : false;
                $webLinkArgs['showLocationFilter'] = ($location_filter === 'true') || ($location_filter) ? true : false;
                $webLinkArgs['showCourseFilter'] = ($course_filter === 'true') || ($course_filter) ? true : false;
                $webLinkArgs['showCategoryFilter'] = ($category_filter === 'true') || ($category_filter) ? true : false;

                $webLinkArgs['eventListOrder']['field'] = $event_list_order_field;
                $webLinkArgs['eventListOrder']['direction'] = $event_list_order_direction;

                $webLinkArgs['showTitleColumn'] = ($event_title === 'true') || ($event_title) ? true : false;
                $webLinkArgs['showLocationColumn'] = ($event_location === 'true') || ($event_location) ? true : false;
                $webLinkArgs['showVenueColumn'] = ($event_venue === 'true') || ($event_venue) ? true : false;
                $webLinkArgs['showStartDateColumn'] = ($event_start_date === 'true') || ($event_start_date) ? true : false;
                $webLinkArgs['showDurationColumn'] = ($event_duration === 'true') || ($event_duration) ? true : false;
                $webLinkArgs['showTimeColumn'] = ($event_time === 'true') || ($event_time) ? true : false;
                $webLinkArgs['showPlacesRemainingColumn'] = ($event_places_remaining === 'true') || ($event_places_remaining) ? true : false;
                $webLinkArgs['showPriceColumn'] = ($event_price === 'true') || ($event_price) ? true : false;
                $webLinkArgs['showAddToCartColumn'] = ($event_addtocart === 'true') || ($event_addtocart) ? true : false;
                $webLinkArgs['showClassroomStartDateColumn'] = ($classroom_start_date === 'true') || ($classroom_start_date) ? true : false;
                $webLinkArgs['showClassroomDurationColumn'] = ($classroom_duration === 'true') || ($classroom_duration) ? true : false;
                $webLinkArgs['showClassroomTimeColumn'] = ($classroom_time === 'true') || ($classroom_time) ? true : false;
                $webLinkArgs['showLmsStartDateColumn'] = ($lms_start_date === 'true') || ($lms_start_date) ? true : false;
                $webLinkArgs['showLmsDurationColumn'] = ($lms_duration === 'true') || ($lms_duration) ? true : false;
                $webLinkArgs['showLmsTimeColumn'] =($lms_time === 'true') || ($lms_time) ? true : false;
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

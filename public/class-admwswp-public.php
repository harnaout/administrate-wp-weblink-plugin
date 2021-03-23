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
                    'show_basket_popover' => false,
                    'cart_url' => '',
                    'screen_size' => 'desktop',
                    'pager_type' => 'loadMore',
                ),
                $attr
            )
        );

        $webLinkArgs = array();

        switch ($type) {
            case 'Basket':
                $webLinkArgs['showBasketPopover'] = filter_var($show_basket_popover, FILTER_VALIDATE_BOOLEAN);
                if ($cart_url) {
                    $webLinkArgs['cartUrl'] = $cart_url;
                }
                break;
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

                $webLinkArgs['showDateFilter'] = filter_var($date_filter, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['showLocationFilter'] = filter_var($location_filter, FILTER_VALIDATE_BOOLEAN);

                $webLinkArgs['showCourseFilter'] = filter_var($course_filter, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['showCategoryFilter'] = filter_var($category_filter, FILTER_VALIDATE_BOOLEAN);

                $webLinkArgs['eventListOrder']['field'] = $event_list_order_field;
                $webLinkArgs['eventListOrder']['direction'] = $event_list_order_direction;

                $webLinkArgs['showTitleColumn'] = filter_var($event_title, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['showLocationColumn'] = filter_var($event_location, FILTER_VALIDATE_BOOLEAN);

                $webLinkArgs['showVenueColumn'] = filter_var($event_venue, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['showStartDateColumn'] = filter_var($event_start_date, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['showDurationColumn'] = filter_var($event_duration, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['showTimeColumn'] = filter_var($event_time, FILTER_VALIDATE_BOOLEAN);

                $webLinkArgs['showPlacesRemainingColumn'] = filter_var($event_places_remaining, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['showPriceColumn'] = filter_var($event_price, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['showAddToCartColumn'] = filter_var($event_addtocart, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['showClassroomStartDateColumn'] = filter_var($classroom_start_date, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['showClassroomDurationColumn'] = filter_var($classroom_duration, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['showClassroomTimeColumn'] = filter_var($classroom_time, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['showLmsStartDateColumn'] = filter_var($lms_start_date, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['showLmsDurationColumn'] = filter_var($lms_duration, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['showLmsTimeColumn'] = filter_var($lms_time, FILTER_VALIDATE_BOOLEAN);
                $webLinkArgs['pagerType'] = $pager_type;
                break;
            default:
                break;
        }

        $widgetId = "weblink_" . $type . "_" . time() . "_" . $screen_size;
        $html = "<div id='weblink-widget-container' class='weblink-$type-container'>";
        $html .= "<div id='$widgetId' class='weblink-$type'>";
        $html .= "<div class='fa-3x text-center'>";
        $html .= "<i class='fas fa-circle-notch fa-spin'></i>";
        $html .= "</div>";
        $html .= "</div>";
        $html .= "</div>";

        $html .= "<script type='text/javascript'>";
        $html .= "jQuery(function($) {";
        $html .= 'weblink.mount(
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

        //Bootstrap - you can remove this CSS if you already have Bootstrap in your theme
        //wp_dequeue_style('admwswp-bootstrap-css'); and
        //wp_deregister_style('admwswp-bootstrap-css');
        //inside the 'wp_enqueue_scripts' action hook.
        wp_enqueue_style(
            $this->plugin_name . '-bootstrap',
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css',
            array(),
            $this->version,
            'all'
        );

        // wp_enqueue_style(
        //     $this->plugin_name . '-public',
        //     plugin_dir_url(__FILE__) . 'css/admwswp-public.css',
        //     array(),
        //     $this->version,
        //     'all'
        // );

        $portalAddress = get_field('portalAddress', 'options');

        $webLinkCss = 'https://' . $portalAddress . '/static/css/main.css';
        $webLinkCss = apply_filters('admwswp_weblink_css', $webLinkCss);

        wp_enqueue_style(
            $this->plugin_name . '-weblink',
            $webLinkCss,
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

        $webLinkConfig = apply_filters('admwswp_weblink_config', $webLinkConfig);

        $webLinkJs = 'https://' . $portalAddress . '/static/js/weblink.bundle.min.js';
        $webLinkJs = apply_filters('admwswp_weblink_js', $webLinkJs);

        wp_enqueue_script(
            $this->plugin_name . '-weblink',
            $webLinkJs,
            array('jquery'),
            $this->version,
            true
        );

        // wp_enqueue_script(
        //     $this->plugin_name . '-public',
        //     plugin_dir_url(__FILE__) . 'js/admwswp-public.js',
        //     array( 'jquery' ),
        //     $this->version,
        //     false
        // );

        wp_add_inline_script(
            $this->plugin_name . '-weblink',
            'var webLinkConfig = ' . json_encode($webLinkConfig) . '; var weblink = new window.WebLink(webLinkConfig);'
        );
    }
}

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
class Admwswp_Admin
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
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Admin Init
     *
     * @since    1.0.0
     */
    public function webLinkSettingsInit()
    {
        if (function_exists('acf_add_options_page')) :
            acf_add_options_page(array(
                'page_title' => 'Admininstrate Shortcodes',
                'menu_title' => 'Admininstrate Shortcodes',
                'menu_slug' => 'adminstrate_shortcodes',
                'capability' => 'edit_posts',
                'redirect' => false,
                'icon_url' => 'dashicons-admin-settings',
            ));
        endif;
    }

    public function weblinkWidget($attr)
    {

        $type = $attr['type'];
        switch ($type) {
            case 'Basket':
            case 'Cart':
            case 'SearchBar':
            case 'CategoryDropdown':
                return "[administrate-widget type='$type']";
                break;

            default:
                switch ($type) {
                    case 'Catalogue':
                        unset($attr['course']);
                        unset($attr['path']);
                        unset($attr['location']);
                        unset($attr['to_date']);
                        unset($attr['from_date']);
                        break;
                    case 'CourseDetails':
                        unset($attr['catalogue_type']);
                        unset($attr['path']);
                        unset($attr['location']);
                        unset($attr['to_date']);
                        unset($attr['from_date']);
                        break;
                    case 'PathDetails':
                        unset($attr['catalogue_type']);
                        unset($attr['course']);
                        unset($attr['location']);
                        unset($attr['to_date']);
                        unset($attr['from_date']);
                        break;
                    case 'EventList':
                        unset($attr['catalogue_type']);
                        unset($attr['course']);
                        unset($attr['path']);
                        break;
                    case 'Category':
                        unset($attr['catalogue_type']);
                        unset($attr['course']);
                        unset($attr['path']);
                        unset($attr['location']);
                        unset($attr['to_date']);
                        unset($attr['from_date']);
                        break;
                }

                $args = array();
                foreach ($attr as $key => $value) {
                    if ($value) {
                        $args[] = "$key='$value'";
                    }
                }

                $shortcodeAttributes = implode(' ', $args);
                return "[administrate-widget $shortcodeAttributes]";
                break;
        }
    }

    public function webLinkBlockInit()
    {
        if (!function_exists('register_block_type') || !function_exists('get_field')) {
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
            ),
            ADMWSWP_VERSION
        );

        register_block_type(
            'admwswp/weblink',
            array(
                'editor_script' => $this->plugin_name . 'editor-blocks',
                'render_callback' => array($this , 'weblinkWidget'),
                'attributes' => array(
                    'type' => array(
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
                        'default' => get_field('showDateFilter', 'options')
                    ),
                    'location_filter' => array(
                        'type' => 'bool',
                        'default' => get_field('showLocationFilter', 'options')
                    ),
                    'course_filter' => array(
                        'type' => 'bool',
                        'default' => get_field('showCourseFilter', 'options')
                    ),
                    'category_filter' => array(
                        'type' => 'bool',
                        'default' => get_field('showCategoryFilter', 'options')
                    ),
                    'event_list_order_field' => array(
                        'type' => 'string',
                        'default' => ''
                    ),
                    'event_list_order_direction' => array(
                        'type' => 'string',
                        'default' => ''
                    ),
                    'event_title' => array(
                        'type' => 'bool',
                        'default' => get_field('showTitleColumn', 'options')
                    ),
                    'event_location' => array(
                        'type' => 'bool',
                        'default' => get_field('showLocationColumn', 'options')
                    ),
                    'event_venue' => array(
                        'type' => 'bool',
                        'default' => get_field('showVenueColumn', 'options')
                    ),
                    'event_start_date' => array(
                        'type' => 'bool',
                        'default' => get_field('showStartDateColumn', 'options')
                    ),
                    'event_duration' => array(
                        'type' => 'bool',
                        'default' => get_field(' showDurationColumn', 'options')
                    ),
                    'event_time' => array(
                        'type' => 'bool',
                        'default' => get_field('showTimeColumn', 'options')
                    ),
                    'event_places_remaining' => array(
                        'type' => 'bool',
                        'default' => get_field('showPlacesRemainingColumn', 'options')
                    ),
                    'event_price' => array(
                        'type' => 'bool',
                        'default' => get_field('showPriceColumn', 'options')
                    ),
                    'event_addtocart' => array(
                        'type' => 'bool',
                        'default' => get_field('showAddToCartColumn', 'options')
                    ),
                    'classroom_start_date' => array(
                        'type' => 'bool',
                        'default' => get_field('showClassroomStartDateColumn', 'options')
                    ),
                    'classroom_duration' => array(
                        'type' => 'bool',
                        'default' => get_field('showClassroomDurationColumn', 'options')
                    ),
                    'classroom_time' => array(
                        'type' => 'bool',
                        'default' => get_field('showClassroomTimeColumn', 'options')
                    ),
                    'lms_start_date' => array(
                        'type' => 'bool',
                        'default' => get_field('showLmsStartDateColumn', 'options')
                    ),
                    'lms_duration' => array(
                        'type' => 'bool',
                        'default' => get_field('showLmsDurationColumn', 'options')
                    ),
                    'lms_time' => array(
                        'type' => 'bool',
                        'default' => get_field('showLmsTimeColumn', 'options')
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
        //  $this->plugin_name,
        //  plugin_dir_url( __FILE__ ) . 'css/admwswp-admin.css',
        //  array(),
        //  $this->version,
        //  'all'
        // );
    }

    /**
     * Register the JavaScript for the admin area.
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

        // wp_enqueue_script(
        //     $this->plugin_name,
        //     plugin_dir_url(__FILE__) . 'js/admwswp-admin.js',
        //     array( 'jquery' ),
        //     $this->version,
        //     false
        // );
    }
}

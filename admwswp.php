<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.getadministrate.com/
 * @since             1.0.0
 * @package           Admwswp
 *
 * @wordpress-plugin
 * Plugin Name:       Administrate Weblink2 Shortcodes
 * Plugin URI:        https://www.getadministrate.com/
 * Description:       Administrate Wordpress Plugin to facilitate the usage of weblink 2 widgets. The plugin exposes weblink functionality into WordPress short-codes, also it creates a Gutenberg block to customize / inject short-codes in the posts content.
 * Version:           1.6.1
 * Author:            Administrate
 * Author URI:        https://www.getadministrate.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       admwswp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

if (! defined('ADMWSWP_WEBLINK_ENV')) {
    define('ADMWSWP_WEBLINK_ENV', 'prod'); // prod or staging
}

define('ADMWSWP_VERSION', '1.6.1');
define('ADMWSWP_TEXTDOMAIN', 'admwswp');
define('ADMWSWP_PLUGIN_NAME', 'administrate-wp-weblink-plugin/admwswp.php');
// List of plugins separated by comas.
define('DEPENDECY_PLUGINS', 'advanced-custom-fields-pro/acf.php,acf-timezone-picker/acf-timezone_picker.php');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-admwswp-activator.php
 */
function activate_admwswp()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-admwswp-activator.php';
    Admwswp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-admwswp-deactivator.php
 */
function deactivate_admwswp()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-admwswp-deactivator.php';
    Admwswp_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_admwswp');
register_deactivation_hook(__FILE__, 'deactivate_admwswp');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-admwswp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_admwswp()
{

    $plugin = new Admwswp();
    $plugin->run();
}
run_admwswp();

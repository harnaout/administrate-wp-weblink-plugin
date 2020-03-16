<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.getadministrate.com/
 * @since      1.0.0
 *
 * @package    Admwswp
 * @subpackage Admwswp/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Admwswp
 * @subpackage Admwswp/includes
 * @author     Jad Khater <jck@adminstrate.co>
 */
class Admwswp_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        $dependcyPlugins = explode(",", DEPENDECY_PLUGINS);
        foreach ($dependcyPlugins as $key => $plugin) {
            if (!is_plugin_active($plugin)) {
                add_action('admin_notices', array('Admwswp_Activator', 'dependentPluginsNotice'));
                deactivate_plugins(ADMWSWP_PLUGIN_NAME);
                break;
            }
        }
    }

    /**
     * Method to check for dependent plugins.
     */
    public static function pluginHasDependentPlugins()
    {
        if (is_admin() && current_user_can('activate_plugins')) {
            $dependcyPlugins = explode(",", DEPENDECY_PLUGINS);
            foreach ($dependcyPlugins as $key => $plugin) {
                if (!is_plugin_active($plugin)) {
                    add_action('admin_notices', array('Admwswp_Activator', 'dependentPluginsNotice'));
                    deactivate_plugins(ADMWSWP_PLUGIN_NAME);
                    break;
                }
            }
        }
    }

    /**
     * Method to display notice and deactivate if dependent plugins where deactivated or removed.
     */
    public static function dependentPluginsNotice()
    {
        ?>
          <div class="error">
            <p>
            <?php
            echo __("<h4>Administrate Weblink2 Shortcodes was deactivated</h4>This plugin depends on both ACF-PRO and ACF-Timezone to work properly.", ADMWSWP_TEXTDOMAIN);
            ?>
            </p>
          </div>
        <?php
    }
}

# Administrate Weblink2 Shortcodes Plugin

Requires at least: 5.0.0

Tested up to: 5.3.2

Stable tag: 1.0.0

License: GPLv2 or later

License URI: http://www.gnu.org/licenses/gpl-2.0.html


## Description

Administrate Wordpress Plugin to facilitate the usage of weblink 2 widgets.
The plugin exposes weblink 2 functionality into WordPress short-codes, also it creates a Gutenberg block to customize / inject short-codes in the posts content.

## Installation

The plugin is not released on wordpress.org yet, so if you need to use it please contact Administrate by sending us en email at support@getadministrate.com and we will send you the files needed to install the plugin.

or

Clone the plugin to your project [Administrate Weblink2 Shortcodes Plugin](https://github.com/Administrate/administrate-wp-weblink-plugin)

**Note:** you can add it to the main WordPress project as a git sub-module.

Steps:

1. Upload the zip files "admwswp.zip" to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Head over the settings page: `/wp-admin/admin.php?page=adminstrate_shortcodes`
4. On the General Config tab use the Weblink portal domain. `[YOUR_APP_NAME].administrateweblink.com` or it could be a Vanity Domain that Administrate Team has setup for you.
5. Set the Time zone to the one you operate in and you should be good to go after hitting the save button.
6. The remaining configuration tabs will affect the default attributes offered by the Gutenberg block short-code builder as default params.

![Settings page](/assets/images/settings-page.png)

## Dependencies
The plugin depends on the following plugins:
* [ACF PRO](https://www.advancedcustomfields.com/pro/) this plugin is used to generate the settings page.
* [ACF Timezone Field](https://github.com/DocWatson/acf-timezone-picker) this plugin is used to set a timezone filed used in the settings page.

***Note**: There might be an effort in the future to remove the above dependencies.

## Gutenberg block
The plugin generates a custom Gutenberg block that can be used form the UI to generate and inject the different Weblink embedded widgets using the following short-code variations based on selected widget type `[administrate-widget]`
The custom Gutenberg block is somehow similar to the [Weblink Builder App](https://weblink-builder.getadministrate.com/) but it injects a WordPress short-code in the Post/Page content and this short-code gets converted to an Embedded Weblink Widget by the plugin added all the necessary libraries and field mapping.

![Gutenberg block select](/assets/images/gutenburg-block-select.png)

![Gutenberg block ui](/assets/images/gutenburg-block-ui.png)

## Shortcodes

#### `[administrate-widget]`

This short-code handles all Weblink widget types based on the provided `type` some of the attributes will not be used.

##### Cart
* `type` = "Cart"
* `hide_edit_button` defaults to `false` _if set to `true` will hide the edit cart button._

##### Basket
* `type` = "Basket"
* `cart_url` defaults to ''  _Set this to the URL of the page showing the Cart widget._
* `show_basket_popover` defaults to `false` _if set to `true` the Basket widget will display a mini cart popover._

##### PathDetails
* `type` = "PathDetails"
* `path_id` _this to be set to the Learning Path TMS ID._

##### TrainingRequest
* `type` = "TrainingRequest"
* `interest_id` _this to be set to the Course/Learning Path TMS ID._

##### PathObjectives
* `type` = "PathObjectives"
* `path_id` _this to be set to the Learning Path TMS ID._
* `show_cart_buttons` defaults to `true` _if set to `false` hide the car buttons and enables the `onObjectiveSelection` for further customization._
* `show_remaining_places_filter` defaults to `false` _if set to `true` show the remaining places filter._
* `minimum_places_remaining` defaults to `null`
* `locations` defaults to '' _Set this to the TMS location ID you need to filter the results by location._
* `location_filter` defaults to `false` _if set to `true` show the locations filter._

##### CourseDetails | Catalogue | Category | EventList
* `type` = "CourseDetails|Catalogue|Category|EventList"
* `category_id` defaults to '' _set this to the TMS category ID to filter results._
* `course_code` defaults to '' _set this to the TMS Course ID to filter results._
* `location_name` defaults to '' _set this to the TMS Location Name to filter results._
* `locations` defaults to '' _Set this to the TMS location ID(s) separated by comma `,` you need to filter the results by a set of locations._
* `to_date` defaults to '' _Set this to end date needed to filter on `Y-m-d\TH:i:s.u\Z`_
* `from_date` defaults to '' _Set this to start date needed to filter on `Y-m-d\TH:i:s.u\Z`_
* `catalogue_type` defaults to `All` _this field is used to set the Courses type to show allowed values: `course|path`_
* `date_filter` defaults to `false` _if set to `true` show the date filter._
* `course_filter` defaults to `false` _if set to `true` show the courses filter._
* `category_filter` defaults to `false` _if set to `true` show the category filter._
* `event_list_order` defaults to '' _this field is used to contact multiple sorting like: `locationName-asc,start-asc` if set it will override `event_list_order_field`_
* `event_list_order_field` defaults to `title` _field system name to sort on allowed values: `title|locationName|start|classroomStart|lmsStart`_
* `event_list_order_direction` defaults to `asc` _sorting direction allowed values: `asc|desc`_
* `event_title` defaults to `false` _if set to `true` show the title column._
* `event_location` defaults to `false` _if set to `true` show the location name column._
* `event_venue` defaults to `false` _if set to `true` show the venue name column._
* `event_start_date` defaults to `false` _if set to `true` show the start date column._
* `event_duration` defaults to `false` _if set to `true` show the duration column._
* `event_time` defaults to `false` _if set to `true` show the time column._
* `event_places_remaining`defaults to `false` _if set to `true` show the places remaining column._
* `event_price` defaults to `false` _if set to `true` show the price column._
* `event_addtocart` defaults to `true` _if set to `false` hide the add to cart button column._
* `classroom_start_date` defaults to `false` _if set to `true` show the local column._
* `classroom_duration` defaults to `false` _if set to `true` show the local column._
* `classroom_time` defaults to `false` _if set to `true` show the local column._
* `lms_start_date` defaults to `false` _if set to `true` show the local column._
* `lms_duration` defaults to `false` _if set to `true` show the local column._
* `lms_time` defaults to `false` _if set to `true` show the local column._
* `pager_type` defaults to `loadMore` _this field is used to set the pager type allowed values: `loadMore|Full`_
* `show_time_zone` defaults to `true` _if set to `false` hide the timeZone._
* `show_locale` defaults to `false` _if set to `true` show the local column._
* `more_filter` defaults to `false` _if set to `true` activate the additional filters `from_time_of_day|to_time_of_day|days_of_week`._
* `from_time_of_day` defaults to `null` _Set this to start time of day needed to filter on `H:i`_
* `to_time_of_day` defaults to `null` _Set this to end time of day needed to filter on `H:i`_
* `days_of_week` defaults to `null` _Set this if you needed to filter on the days of week separated by comma `,` for a lost of days allowed values: `Mon|Tue|Wed|Thu|Fri|Sat|Sun`_

###### Applicable to all Above `types`
* `id` defaults to '' _if left empty the plugin will auto generate a widget ID._ **Example**: `weblink_PathObjectives_1655300627_desktop`
* `screen_size` defaults to `desktop` _this is used to apply a suffix to the auto generated ID_

#### `[admwswp-addToCart]`
  * `path_id` The TMS LP ID to add to the cart
  * `course_id` The TMS COURSE ID to add to the cart
  * `class` defaults to "btn btn-lg btn-primary"

 This Short-code Adds a button on the page to trigger adding a Course or LP to Weblink cart / Basket (This short-code will be deprecated in the future and replaced by  Weblink embedded widget `[administrate-widget type='addToCart' course_id='COURSE_ID']`)

#### `[admwswp-eventRequest]`
  * `button_text` The TMS LP ID to add to the cart    
  * `tms_id` The TMS COURSE ID to add to the cart
  * `wrapper_id` defaults to "btn btn-lg btn-primary"
  * `popup_title` defaults to "btn btn-lg btn-primary"
  * `popup_class` defaults to "btn btn-lg btn-primary"
  * `class` defaults to "btn btn-lg btn-primary"

  This Short-code Adds a button on the page to trigger a popup with a event Request Weblink widget.

# Developers Section

## Custom Filters

### Assets Management
#### `admwswp_weblink_css`
* **Defined:** `$webLinkCss = apply_filters('admwswp_weblink_css', $webLinkCss);`
* **Usage:** `add_filter('admwswp_weblink_css', '[THEME_CUSTOM_METHOD]', 10, 1);`
* **instructions**: This filter is available in case we need to override the default weblink CSS file URL to me loaded on the frontend.

#### `admwswp_weblink_js`
* **Defined:** `$webLinkJs = apply_filters('admwswp_weblink_js', $webLinkJs);`
* **Usage:** `add_filter('admwswp_weblink_js', '[THEME_CUSTOM_METHOD]', 10, 1);`
* **instructions**: This filter is available in case we need to override the default weblink JS file URL to me loaded on the frontend.

#### `admwswp_weblink_js_ver`
* **Defined:** `$webLinkJsVersion = apply_filters('admwswp_weblink_js_ver', $version);`
* **Usage:** `add_filter('admwswp_weblink_js_ver', '[THEME_CUSTOM_METHOD]', 10, 1);`
* **instructions**: This filter is available in case we need to override the default weblink JS version string, this could be used to inherit the active theme version and act as browser cache buster after deploying and updating the theme version.

### Configuration Params
#### `admwswp_weblink_args`
* **Defined:** `$weblinkMountArgs = apply_filters('admwswp_weblink_args', $weblinkMountArgs);`
* **Usage:** `add_filter('admwswp_weblink_args', '[THEME_CUSTOM_METHOD]', 10, 1);`
* **instructions**: This filter is available in case we need to add a hook to apply some changes to the Weblink mount args before generating the JS mount method and injecting it into the webpage to trigger the rendering of a particular weblink widget.

#### `admwswp_weblink_config`
* **Defined:** `$webLinkConfig = apply_filters('admwswp_weblink_config', $webLinkConfig);`
* **Usage:** `add_filter('admwswp_weblink_config', '[THEME_CUSTOM_METHOD]', 10, 1);`
* **instructions**: This filter is available to enable the developers to override some default configuration params used to initialize the Weblink on the website.
* **Params:** 
 * `cartUrl` defaults to `''` _can be used to pass custom Cart page URL_
 * `timezone` defaults to the time zone set on the plugin config page _can be used to override the timezone value_
 * `locale` defaults to `''` _if left blank weblink will resolve the browser locale else it can be used to override the locale value and force a specific language to webslink widgets loaded on the web page_
 * `localeStrings` defaults to `[]` empty array _this can be used to pass on some localization overrides for specific language code keys to value mapping strings. this param will take a multidimensional array as follow `array('nl' => array("addToCart"=>"Add to Cart"), 'fr' => array("addToCart"=>"Ajouter au panier"))`_
 * `hooks` defaults to `array('onCheckoutNavigation' => '',)` it exposes a custom hook to enable the dev to do some extra logic or action once the user triggers the checkout button on the cart widget. Some use cases are to alter the checkout URL adding params to it, check if a user is logged in to wordpress or any 3rd party SSO before going to checkout.

## Settings Defined Variables
The plugin has some global settings defined in the main plugin file `admwswp.php` those can be overridden in `wp-config.php` if needed
```
// This defined constant is used to override weblink config 
// to using Administrate `staging` portals to authorize and execute graphQl queries 
if (! defined('ADMWSWP_WEBLINK_ENV')) {
    define('ADMWSWP_WEBLINK_ENV', 'prod'); // prod or staging
}
```

## Tech
This plugin skeleton and file structure is generated using the [WordPress plugin boilerplate generator](https://wppb.me/).

## Changelog

###### 1.6.1
* Add timeout before triggering add to cart weblink popup.

###### 1.6.0
* Add the ability to disable all e-commerce aspect on the site and only serve course with event request form. (Disable Cart, Basket, Checkout, adding to cart etc...)
* Add event Request Popup Short-code
* Add show language flag to Gutenberg block builder
* Add showTimezone attribute to event listing short-code builder
* Add Location and ShowLocationFilter to PathObjectives

###### 1.5.0
* Add time interval before loading weblink widgets until main JS loads and `weblink` is made available for consumption.
* Add cartUrl custom param to weblink config mapping.
* Fix Typo in Widget type dropdown.
* Add pager to weblink widget wrapper plugin.
* Add Sanitization for filter params.
* Add ability to setup weblink to connect to staging or prod.
* Add ability to hide edit button on cart widget.

###### 1.4.0
* Add support for multiple location IDs on eventList short-code.
* Ability to override the checkout button action with custom hooks `onCheckoutNavigation`.

###### 1.3.0
* Update field mapping for path.
* Change Attribute names.

###### 1.2.0
* Add cart_url and screen_size attributes to compact cart short-code.
* Add GiftVoucherBalance Short-code.
* Add course ID mapping for Events list.

###### 1.1.0
* Wrap widget setup inside panel and make catalogue type a select list.
* Fix field mapping in short-code.
* Fix plugin name in defined constants.
* Add check on plugin activation for ACF-pro and ACF-timezone.
* Add weblink missing styles main.css.

###### 1.0.0
* Setting page to enter weblink credentials and default parameters.
* Short-code builder as Gutenberg block.

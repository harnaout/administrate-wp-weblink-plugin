<?php
if (function_exists('acf_add_local_field_group')) :
    acf_add_local_field_group(array(
    'key' => 'group_5e552914d92cc',
    'title' => 'Admin Short-codes Options',
    'fields' => array(
    array(
      'key' => 'field_5e5536716bf2a',
      'label' => 'General Config.',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_5e55293c215bc',
      'label' => 'Portal',
      'name' => 'portalAddress',
      'type' => 'text',
      'instructions' => '',
      'required' => 1,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5e5530d2590af',
      'label' => 'Timezone',
      'name' => 'timezone',
      'type' => 'timezone_picker',
      'instructions' => '',
      'required' => 1,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_time_zone' => '',
    ),
    array(
      'key' => 'field_5e55363461f31',
      'label' => 'Hash Routing',
      'name' => 'hashRouting',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
			'key' => 'field_620bca3b26269',
			'label' => 'Add To Cart',
			'name' => 'showAddToCart',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
    array(
      'key' => 'field_60e321777f0c3',
      'label' => 'Cart',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'top',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_60e3201646680',
      'label' => 'Cart Hide Edit Button',
      'name' => 'cartHideEditButton',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e55369acb447',
      'label' => 'Catalogue (widget)',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_5e553755593c0',
      'label' => 'Type',
      'name' => 'catalogueType',
      'type' => 'radio',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'choices' => array(
        'course' => 'Courses',
        'path' => 'Paths',
      ),
      'allow_null' => 1,
      'other_choice' => 1,
      'save_other_choice' => 1,
      'default_value' => '',
      'layout' => 'horizontal',
      'return_format' => 'value',
    ),
    array(
      'key' => 'field_5e56724ed10de',
      'label' => 'Events List Filters',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_5e5537ae18e8b',
      'label' => 'Show Date Selector',
      'name' => 'showDateFilter',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e5537ca18e8c',
      'label' => 'Show Location Selector',
      'name' => 'showLocationFilter',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e5675cfca053',
      'label' => 'Show Course Selector',
      'name' => 'showCourseFilter',
      'type' => 'true_false',
      'instructions' => 'Used for EventList Widget',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e5675fbca054',
      'label' => 'Show Category Selector',
      'name' => 'showCategoryFilter',
      'type' => 'true_false',
      'instructions' => 'Used for EventList Widget',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_60e3204346681',
      'label' => 'Show Time Zone',
      'name' => 'showTimezone',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e567d5abf5cb',
      'label' => 'Events List Default Order',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_5e5537e818e8d',
      'label' => 'Event List Order',
      'name' => 'eventListOrder',
      'type' => 'group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'layout' => 'table',
      'sub_fields' => array(
        array(
          'key' => 'field_5e55383318e8e',
          'label' => 'Field',
          'name' => 'field',
          'type' => 'select',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'choices' => array(
            'title' => 'Title',
            'locationName' => 'Location Name',
            'start' => 'Start',
            'classroomStart' => 'Class Room Start',
            'lmsStart' => 'LMS Start',
          ),
          'default_value' => false,
          'allow_null' => 1,
          'multiple' => 0,
          'ui' => 1,
          'ajax' => 0,
          'return_format' => 'value',
          'placeholder' => '',
        ),
        array(
          'key' => 'field_5e5539915081d',
          'label' => 'Direction',
          'name' => 'direction',
          'type' => 'radio',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'choices' => array(
            'asc' => 'Asc',
            'desc' => 'Desc',
          ),
          'allow_null' => 1,
          'other_choice' => 0,
          'default_value' => '',
          'layout' => 'horizontal',
          'return_format' => 'value',
          'save_other_choice' => 0,
        ),
      ),
    ),
    array(
      'key' => 'field_5e567d11ede84',
      'label' => 'Events List Columns',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_5e553b0cffc1f',
      'label' => 'Event Title',
      'name' => 'showTitleColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e553b38ffc20',
      'label' => 'Location',
      'name' => 'showLocationColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e553b861ca9d',
      'label' => 'Venue',
      'name' => 'showVenueColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e553bb81ca9e',
      'label' => 'Start Date',
      'name' => 'showStartDateColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e553c497d7bb',
      'label' => 'Duration',
      'name' => 'showDurationColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e553c657d7bc',
      'label' => 'Time',
      'name' => 'showTimeColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e553c727d7bd',
      'label' => 'Places Remaining',
      'name' => 'showPlacesRemainingColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e553ccb7d7be',
      'label' => 'Price',
      'name' => 'showPriceColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e553d08a8d12',
      'label' => 'Add To Cart',
      'name' => 'showAddToCartColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e553d1ca8d13',
      'label' => 'Classroom Start Date',
      'name' => 'showClassroomStartDateColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e553d28a8d14',
      'label' => 'Classroom Duration',
      'name' => 'showClassroomDurationColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e553d42a8d15',
      'label' => 'Classroom Time',
      'name' => 'showClassroomTimeColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e553d59a8d16',
      'label' => 'LMS Start Date',
      'name' => 'showLmsStartDateColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e553d73a8d17',
      'label' => 'LMS Duration',
      'name' => 'showLmsDurationColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e553d9ba8d18',
      'label' => 'LMS Time',
      'name' => 'showLmsTimeColumn',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    array(
      'key' => 'field_5e579fb921fda',
      'label' => 'Usage',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_5e579fd121fdb',
      'label' => 'Shortcodes',
      'name' => '',
      'type' => 'message',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '[administrate-widget type="Basket"]
[administrate-widget type="Cart"]

[administrate-widget type="Category"]
[administrate-widget type="CategoryDropdown"]

[administrate-widget type="SearchBar"]
[administrate-widget type="Catalogue" category_id="ID"]

[administrate-widget type="CourseDetails" course_code="CODE"]
[administrate-widget type="PathDetails" path_id="ID"]
[administrate-widget type="PathObjectives" path_id="ID"]

[administrate-widget type="TrainingRequest" interest_id="ID"]

[administrate-widget type="EventList"]
[administrate-widget type="EventList" category_id="ID"]
[administrate-widget type="EventList" course_code="CODE"]
[administrate-widget type="EventList" location_name="NAME"]
[administrate-widget type="EventList" locations="COMMA SEPERATED LOCATION IDs"]
[administrate-widget type="EventList" event_list_order="COMMA SEPERATED [FIELDNAME]-[DIRECTION]"] // start-asc,location-asc
[administrate-widget type="EventList" date_filter="false" location_filter="false" course_filter="false" category_filter="false"]

[administrate-widget type=\'Catalogue\' catalogue_type=\'course\' date_filter=\'true\' location_filter=\'true\' course_filter=\'true\' category_filter=\'true\' event_title=\'true\' event_location=\'true\' event_venue=\'true\' event_start_date=\'true\' event_duration=\'true\' event_time=\'true\' event_places_remaining=\'true\' event_price=\'true\' event_addtocart=\'true\' classroom_start_date=\'true\' classroom_duration=\'true\' classroom_time=\'true\' lms_start_date=\'true\' lms_duration=\'true\' lms_time=\'true\']

[admwswp-addToCart path_id="Path ID" class=""]
[admwswp-addToCart course_id="Course ID" class=""]

# Gift Voucher Shortcodes
[administrate-widget type="GiftVoucherBalance"]',
      'new_lines' => 'wpautop',
      'esc_html' => 0,
    ),
    ),
    'location' => array(
    array(
      array(
        'param' => 'options_page',
        'operator' => '==',
        'value' => 'adminstrate_shortcodes',
      ),
    ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    ));
endif;

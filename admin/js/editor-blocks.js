const {registerBlockType} = wp.blocks; //Blocks API
const {createElement} = wp.element; //React.createElement
const {__} = wp.i18n; //translation functions
const {InspectorControls} = wp.editor; //Block inspector wrapper
const {
	TextControl,
	SelectControl,
	ServerSideRender,
	CheckboxControl,
	RadioControl,
	ToggleControl,
	Panel,
	PanelBody,
	PanelRow
} = wp.components; //WordPress form inputs and server-side renderer

registerBlockType(
	'admwswp/weblink',
	{
  	title: __('Weblink2 Widget'),
  	description: __('Display Weblink2 Widgets'),
  	icon: 'welcome-widgets-menus',
  	category: __('widgets'),
  	edit(props){

  			const attributes =  props.attributes;
  			const setAttributes =  props.setAttributes;

  			jQuery('.wp-block[data-type="admwswp/weblink"]').on('focus', function(){
  				var type = jQuery('.admwswp-widget-type select').val();
  				updateSections(type);
  			});

				function updateSections(value) {
		  			var catalogueType = jQuery('.admwswp-catalogue-type');
						var category = jQuery('.admwswp-catalogue-category');
						var path = jQuery('.admwswp-path');
						var course = jQuery('.admwswp-course');
						var location = jQuery('.admwswp-location');
						var date = jQuery('.admwswp-date_range');
						var sorting = jQuery('.admwswp-sorting');
						var filters = jQuery('.admwswp-filters');
						var columns = jQuery('.admwswp-columns');

						catalogueType.addClass('hidden');
						category.addClass('hidden');
						path.addClass('hidden');
						course.addClass('hidden');
						location.addClass('hidden');
						date.addClass('hidden');
						sorting.addClass('hidden');
						filters.addClass('hidden');
						columns.addClass('hidden');

						if ('Catalogue' === value) {
							catalogueType.removeClass('hidden');
							category.removeClass('hidden');
							sorting.removeClass('hidden');
							filters.removeClass('hidden');
							columns.removeClass('hidden');
						}

						if ('CourseDetails' === value) {
							course.removeClass('hidden');
							sorting.removeClass('hidden');
							filters.removeClass('hidden');
							columns.removeClass('hidden');
						}

						if ('PathDetails' === value) {
							path.removeClass('hidden');
						}

						if ('EventList' === value) {
							course.removeClass('hidden');
							location.removeClass('hidden');
							category.removeClass('hidden');
							date.removeClass('hidden');
							sorting.removeClass('hidden');
							filters.removeClass('hidden');
							columns.removeClass('hidden');
						}

						if ('Category' === value) {
							sorting.removeClass('hidden');
							filters.removeClass('hidden');
							columns.removeClass('hidden');
						}
				}

  			//Display block preview and UI
				var editBlock = createElement(
					'div',
					{},
					[
						createElement(
							ServerSideRender,
							{
								block: 'admwswp/weblink',
								attributes: attributes
							}
						),
						//Block inspector
						createElement(
							InspectorControls,
							{},
							[
								createElement(
									PanelBody,
									{
										title: "Widget Main Setup",
										initialOpen: true,
										className: 'admwswp-widget-info',
										icon: 'admin-generic'
									},
									[
										createElement(
											SelectControl,
											{
												className: 'admwswp-widget-type',
												label: __('Widget Type'),
												onChange: (value) => {
													setAttributes({type: value});

													updateSections(value);

												},
												value: attributes.type,
												selected: attributes.type,
												options: [
													{value: 'Catalogue', label: 'Catalogue'},
													{value: 'CourseDetails', label: 'Course Details'},
													{value: 'PathDetails', label: 'Path Details'},
													{value: 'Basket', label: 'Basket'},
													{value: 'EventList', label: 'Even tList'},
													{value: 'Category', label: 'Category'},
													{value: 'Cart', label: 'Cart'},
													{value: 'SearchBar', label: 'Search Bar'},
													{value: 'CategoryDropdown', label: 'Category Dropdown'},
												],
											}
										),
										createElement(
											SelectControl,
											{
												className: 'admwswp-catalogue-type',
												label: __('Select Catalogue Type'),
												onChange: (value) => {
													setAttributes({catalogue_type: value});
												},
												value: attributes.catalogue_type,
												selected: attributes.catalogue_type,
												options: [
													{value: 'All', label: 'All'},
													{value: 'course', label: 'Courses'},
													{value: 'path', label: 'Paths'},
												],
											}
										),
										createElement(
											TextControl,
											{
												className: 'admwswp-course hidden',
												value: attributes.course_code,
												label: __('Course Code'),
												onChange: (value) => {
													setAttributes({course_code: value});
												},
												type: 'text',
											}
										),
										createElement(
											TextControl,
											{
												className: 'admwswp-location hidden',
												value: attributes.location_name,
												label: __('Location Name'),
												onChange: (value) => {
													setAttributes({location_name: value});
												},
												type: 'text',
											}
										),
										createElement(
											TextControl,
											{
												className: 'admwswp-catalogue-category',
												value: attributes.category_id,
												label: __('Category ID'),
												onChange: (value) => {
													setAttributes({category_id: value});
												},
												type: 'text',
											}
										),
										createElement(
											TextControl,
											{
												className: 'admwswp-path hidden',
												value: attributes.path_id,
												label: __('Path'),
												onChange: (value) => {
													setAttributes({path_id: value});
												},
												type: 'text',
											}
										),
									]
								),
								createElement(
									PanelBody,
									{
										title: "Set Date Range",
										initialOpen: false,
										className: 'admwswp-date_range',
										icon: 'clock'
									},
									[
										createElement(
											TextControl,
											{
												className: 'admwswp-from_date',
												value: attributes.from_date,
												label: __('From Date'),
												onChange: (value) => {
													setAttributes({from_date: value});
												},
												type: 'date',
											}
										),
										createElement(
											TextControl,
											{
												className: 'admwswp-to_date',
												value: attributes.to_date,
												label: __('To Date'),
												onChange: (value) => {
													setAttributes({to_date: value});
												},
												type: 'date',
											}
										),
									]
								),
								createElement(
									PanelBody,
									{
										title: "Events List Filters",
										initialOpen: false,
										className: 'admwswp-filters',
										icon: 'filter'
									},
									[
										createElement(
											ToggleControl,
											{
												className: 'admwswp-date_filter',
												label: __('Date'),
												checked: attributes.date_filter,
												onChange: (value) => {
													setAttributes({date_filter: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-location_filter',
												label: __('Location'),
												checked: attributes.location_filter,
												onChange: (value) => {
													setAttributes({location_filter: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-course_filter',
												label: __('Courses'),
												checked: attributes.course_filter,
												onChange: (value) => {
													setAttributes({course_filter: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-category_filter',
												label: __('Categories'),
												checked: attributes.category_filter,
												onChange: (value) => {
													setAttributes({category_filter: value});
												},
												type: 'bool',
											}
										)
									]
								),
								createElement(
									PanelBody,
									{
										title: "Events List Sorting",
										initialOpen: false,
										className: 'admwswp-sorting',
										icon: 'sort'
									},
									[
										createElement(
											SelectControl,
											{
												className: 'admwswp-sort-field',
												label: __('Event List Order Field'),
												onChange: (value) => {
													setAttributes({event_list_order_field: value});
												},
												value: attributes.event_list_order_field,
												selected: attributes.event_list_order_field,
												options: [
													{value: 'title', label: 'Title'},
													{value: 'locationName', label: 'Location Name'},
													{value: 'start', label: 'Start'},
													{value: 'classroomStart', label: 'Classroom Start'},
													{value: 'lmsStart', label: 'LMS Start'},
												],
											}
										),
										createElement(
											RadioControl,
											{
												className: 'admwswp-sort-direction',
												help: __('Event List Order Direction'),
												onChange: (value) => {
													setAttributes({event_list_order_direction: value});
												},
												value: attributes.event_list_order_direction,
												selected: attributes.event_list_order_direction,
												options: [
													{value: 'asc', label: 'ASC'},
													{value: 'desc', label: 'DESC'},
												],
											}
										),
									]
								),
								createElement(
									PanelBody,
									{
										title: "Events List Columns",
										initialOpen: false,
										className: 'admwswp-columns',
										icon: 'columns'
									},
									[
										createElement(
											ToggleControl,
											{
												className: 'admwswp-event_title',
												label: __('Event Title'),
												checked: attributes.event_title,
												onChange: (value) => {
													setAttributes({event_title: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-event_location',
												label: __('Location'),
												checked: attributes.event_location,
												onChange: (value) => {
													setAttributes({event_location: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-event_venue',
												label: __('Venue'),
												checked: attributes.event_venue,
												onChange: (value) => {
													setAttributes({event_venue: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-event_start_date',
												label: __('Start Date'),
												checked: attributes.event_start_date,
												onChange: (value) => {
													setAttributes({event_start_date: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-event_duration',
												label: __('Duration'),
												checked: attributes.event_duration,
												onChange: (value) => {
													setAttributes({event_duration: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-event_time',
												label: __('Time'),
												checked: attributes.event_time,
												onChange: (value) => {
													setAttributes({event_time: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-event_places_remaining',
												label: __('Remaining Places'),
												checked: attributes.event_places_remaining,
												onChange: (value) => {
													setAttributes({event_places_remaining: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-event_price',
												label: __('Price'),
												checked: attributes.event_price,
												onChange: (value) => {
													setAttributes({event_price: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-event_addtocart',
												label: __('Add To Cart'),
												checked: attributes.event_addtocart,
												onChange: (value) => {
													setAttributes({event_addtocart: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-classroom_start_date',
												label: __('Classroom Start Date'),
												checked: attributes.classroom_start_date,
												onChange: (value) => {
													setAttributes({classroom_start_date: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-classroom_duration',
												label: __('Classroom Duration'),
												checked: attributes.classroom_duration,
												onChange: (value) => {
													setAttributes({classroom_duration: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-classroom_time',
												label: __('Classroom Time'),
												checked: attributes.classroom_time,
												onChange: (value) => {
													setAttributes({classroom_time: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-lms_start_date',
												label: __('LMS Start Date'),
												checked: attributes.lms_start_date,
												onChange: (value) => {
													setAttributes({lms_start_date: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-lms_duration',
												label: __('LMS Duration'),
												checked: attributes.lms_duration,
												onChange: (value) => {
													setAttributes({lms_duration: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-lms_time',
												label: __('LMS Time'),
												checked: attributes.lms_time,
												onChange: (value) => {
													setAttributes({lms_time: value});
												},
												type: 'bool',
											}
										)

									]
								),

						]
					)
				] );

				return editBlock;

  	},
  	save: function(props) {
  		return null;
  	}
	}
);

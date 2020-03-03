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
const {withState} = wp.compose;

registerBlockType(
	'admwswp/weblink',
	{
  	title: __('Weblink2 Widget'),
  	description: __('Display Weblink2 Widgets'),
  	icon: 'welcome-widgets-menus',
  	category: __('widgets'),
  	// attributes: {
  	// 	widget_type: {
  	// 	  default: '',
  	// 	},
  	// 	catalogue_type: {
  	// 	  default: '',
  	// 	},
  	// 	category: {
  	// 	  default: '',
  	// 	}
  	// },
  	edit(props){

  			const attributes =  props.attributes;
  			const setAttributes =  props.setAttributes;

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
									SelectControl,
									{
										className: 'admwswp-widget-type',
										label: __('Widget Type'),
										onChange: (value) => {
											setAttributes({widget_type: value});
										},
										value: attributes.widget_type,
										selected: attributes.catalogue_type,
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
									RadioControl,
									{
										className: 'admwswp-catalogue-type',
										help: __('Select Catalogue Type'),
										onChange: (value) => {
											setAttributes({catalogue_type: value});
										},
										value: attributes.catalogue_type,
										selected: attributes.catalogue_type,
										options: [
											{value: 'All', label: 'All'},
											{value: 'Courses', label: 'Courses'},
											{value: 'Paths', label: 'Paths'},
										],
									}
								),
								createElement(
									TextControl,
									{
										className: 'admwswp-catalogue-category',
										value: attributes.category,
										label: __('Category ID'),
										onChange: (value) => {
											setAttributes({category: value});
										},
										type: 'text',
									}
								),
								createElement(
									TextControl,
									{
										className: 'admwswp-path',
										value: attributes.path,
										label: __('Path'),
										onChange: (value) => {
											setAttributes({path: value});
										},
										type: 'text',
									}
								),
								createElement(
									TextControl,
									{
										className: 'admwswp-course',
										value: attributes.course,
										label: __('Course'),
										onChange: (value) => {
											setAttributes({course: value});
										},
										type: 'text',
									}
								),
								createElement(
									TextControl,
									{
										className: 'admwswp-location',
										value: attributes.location,
										label: __('Location'),
										onChange: (value) => {
											setAttributes({location: value});
										},
										type: 'text',
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
								// 'event_list_order_field' => '',
								// 'event_list_order_direction' => '',
								createElement(
									PanelBody,
									{
										title: "Sorting",
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
													{value: 'classroomStart ', label: 'Classroom Start'},
													{value: 'lmsStart ', label: 'LMS Start'},
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
										title: "Filters",
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
										title: "Columns",
										initialOpen: false,
										className: 'admwswp-columns',
										icon: 'columns'
									},
									[
										createElement(
											ToggleControl,
											{
												className: 'admwswp-title_column',
												label: __('Event Title'),
												checked: attributes.title_column,
												onChange: (value) => {
													setAttributes({title_column: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-location_column',
												label: __('Location'),
												checked: attributes.location_column,
												onChange: (value) => {
													setAttributes({location_column: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-venue_column',
												label: __('Venue'),
												checked: attributes.venue_column,
												onChange: (value) => {
													setAttributes({venue_column: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-start_date_column',
												label: __('Start Date'),
												checked: attributes.start_date_column,
												onChange: (value) => {
													setAttributes({start_date_column: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-duration_column',
												label: __('Duration'),
												checked: attributes.duration_column,
												onChange: (value) => {
													setAttributes({duration_column: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-time_column',
												label: __('Time'),
												checked: attributes.time_column,
												onChange: (value) => {
													setAttributes({time_column: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-places_remaining_column',
												label: __('Remaining Places'),
												checked: attributes.places_remaining_column,
												onChange: (value) => {
													setAttributes({places_remaining_column: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-price_column',
												label: __('Price'),
												checked: attributes.price_column,
												onChange: (value) => {
													setAttributes({price_column: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-add_to_cart_column',
												label: __('Add To Cart'),
												checked: attributes.add_to_cart_column,
												onChange: (value) => {
													setAttributes({add_to_cart_column: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-classroom_start_date_column',
												label: __('Classroom Start Date'),
												checked: attributes.classroom_start_date_column,
												onChange: (value) => {
													setAttributes({classroom_start_date_column: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-classroom_duration_column',
												label: __('Classroom Duration'),
												checked: attributes.classroom_duration_column,
												onChange: (value) => {
													setAttributes({classroom_duration_column: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-classroom_time_column',
												label: __('Classroom Time'),
												checked: attributes.classroom_time_column,
												onChange: (value) => {
													setAttributes({classroom_time_column: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-lms_start_date_column',
												label: __('LMS Start Date'),
												checked: attributes.lms_start_date_column,
												onChange: (value) => {
													setAttributes({lms_start_date_column: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-lms_duration_column',
												label: __('LMS Duration'),
												checked: attributes.lms_duration_column,
												onChange: (value) => {
													setAttributes({lms_duration_column: value});
												},
												type: 'bool',
											}
										),
										createElement(
											ToggleControl,
											{
												className: 'admwswp-lms_time_column',
												label: __('LMS Time'),
												checked: attributes.lms_time_column,
												onChange: (value) => {
													setAttributes({lms_time_column: value});
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

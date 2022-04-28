jQuery(function($) {

	var waitWeblinkClass = 'admwswp-waitWeblink';

	function isActiveWeblink() {
		return !!weblink;
	}

	function removeWaitWeblinkClass() {
		$('.' + waitWeblinkClass, 'body').removeClass(waitWeblinkClass);
	}

	function checkIfweblinkIsLoaded() {
		var weblinkInterval = setInterval(function() {
			if (isActiveWeblink()) {
				removeWaitWeblinkClass();
				clearInterval(weblinkInterval);
			}
		}, 200);
	}

	$(document).ajaxComplete(function(event,request, settings){
		if($('.' + waitWeblinkClass).length > 0) {
			if (isActiveWeblink()) {
			 	removeWaitWeblinkClass();
			} else {
				checkIfweblinkIsLoaded();
			}
		}
	});

	function addToCart (element) {

		if (element.hasClass(waitWeblinkClass) || !weblink) {
			return;
		}

		var timeout = 3000;
		var loadingClass = 'admwswp-loading';

		if (element.hasClass(loadingClass)) {
			return;
		}

    element.addClass(loadingClass);

		var pathId = element.data('path_id');
		if (pathId) {
			weblink.stores.STORE_PATH_PICKER.setPathId(pathId);
			setTimeout(()=>{
				weblink.stores.STORE_DETAILS.openAddPathToCart();
				element.removeClass(loadingClass);
			}, timeout);
		}
		var courseId = element.data('course_id');
		if (courseId) {
			weblink.stores.STORE_EVENT_PICKER.setCourseId(courseId);
			setTimeout(()=>{
				weblink.stores.STORE_DETAILS.openAddToCart();
				element.removeClass(loadingClass);
			}, timeout);
		}

	}

	function eventRequestPopup (element) {

		if (element.hasClass(waitWeblinkClass) || !weblink) {
			return;
		}

		var tms_id = element.data('tms_id');
		var wrapper_id = element.data('wrapper_id');
		var popup_title = element.data('popup_title');
		var popup_class = element.data('popup_class');
		if (tms_id && wrapper_id) {
			$("#" + wrapper_id).dialog(
				{
					modal: true,
					title: popup_title,
					dialogClass: popup_class,
					closeOnEscape: true,
					height: 'auto',
					minHeight: 500,
					width: 400,
					resizable: false,
					draggable: false,
					open: function(event, ui) {
						$(event.target).dialog('widget')
						.css({ position: 'fixed' })
						.position({ my: 'center', at: 'center', of: window });
						weblink.mount(document.getElementById(wrapper_id),"TrainingRequest",{"interestId":tms_id});
					},
				}
			);
		}
	}

	$(document).ready(function () {

		if($('.' + waitWeblinkClass).length > 0) {
			checkIfweblinkIsLoaded();
		}

		$('body').on(
			'click',
			'.admwswp-addToCart',
			function(){
				addToCart($(this));
			}
		);

		$('body').on(
			'click',
			'.admwswp-eventRequest',
			function(){
				eventRequestPopup($(this));
			}
		);

	});

});

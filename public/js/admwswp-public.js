jQuery(function($) {
	$(document).ready(function () {
		$('.admwswp-addToCart', 'body').on('click', function(){
			if (weblink !== undefined) {
				var pathId = $(this).data('path_id');
				if (pathId) {
					weblink.stores.STORE_PATH_PICKER.setPathId(pathId);
					weblink.stores.STORE_DETAILS.openAddPathToCart();
				}
				var courseId = $(this).data('course_id');
				if (courseId) {
					weblink.stores.STORE_EVENT_PICKER.setCourseId(courseId);
					weblink.stores.STORE_DETAILS.openAddToCart();
				}
			}
		});
	});
});

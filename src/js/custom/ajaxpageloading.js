(function($) {
	'use strict'
	var popped = ('state' in window.history && window.history.state !== null),
		initialURL = location.href;
	var mobileCategorySelect = $('#mobile-category-selector');
	var content = $('#products-grid-container').parent();

	var ajaxLoadPage = function(url) {
		console.log('Loading ' + url + ' fragment');
		content.load(url + ' #products-grid-container');
	}

	mobileCategorySelect.on('change', function() {
		var href = this.value;
		ajaxLoadPage(href);
		history.pushState({
			page: href
		}, null, href);
	});

	$(window).bind('popstate', function() {
		var initialPop = !popped && location.href == initialURL;

		popped = true;
		if (initialPop) {
			return;
		}
		ajaxLoadPage(location.href);
		var urlParams = new URLSearchParams(location.search);
		var products_cat = urlParams.get('products_cat');
		mobileCategorySelect.find('option[value*="products_cat=' + products_cat + '"]').prop("selected", "selected");
	});
})(jQuery);
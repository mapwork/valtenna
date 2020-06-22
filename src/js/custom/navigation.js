/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function() {
	var triggerMenu = document.getElementById('trigger-menu'),
		closeMenu = document.getElementById('close-navigation'),
		docEl = document.documentElement;
	triggerMenu.addEventListener('click', function() {
		if (!docEl.classList.contains('menu-open')) {
			docEl.classList.add('menu-open');
		}
	});
	closeMenu.addEventListener('click', function() {
		if (docEl.classList.contains('menu-open')) {
			docEl.classList.remove('menu-open');
		}
	});
}());
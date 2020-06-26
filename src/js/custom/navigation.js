/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
const $body = document.querySelector('body');
var scrollPosition = 0;

function disableScroll() {
	scrollPosition = window.pageYOffset;
	$body.style.overflow = 'hidden';
	$body.style.position = 'fixed';
	$body.style.top = `-${scrollPosition}px`;
	$body.style.width = '100%';
}

function enableScroll() {
	$body.style.removeProperty('overflow');
	$body.style.removeProperty('position');
	$body.style.removeProperty('top');
	$body.style.removeProperty('width');
	window.scrollTo(0, scrollPosition);
}

(function() {
	var triggerMenu = document.getElementById('trigger-menu'),
		closeMenu = document.getElementById('close-navigation'),
		docEl = document.documentElement;
	triggerMenu.addEventListener('click', function() {
		if (!docEl.classList.contains('menu-open')) {
			docEl.classList.add('menu-open');
			disableScroll();
		}
	});
	closeMenu.addEventListener('click', function() {
		if (docEl.classList.contains('menu-open')) {
			docEl.classList.remove('menu-open');
			enableScroll();
		}
	});
}());

(function($) {
	'use strict';
	$('#site-navigation > .wrapper').on(endtransition, function(evt) {
		if (evt.originalEvent.propertyName.includes('transform') && !$('html').hasClass('menu-open')) {
			$('#nav .submenu-wrapper').hide();
		}
	});
	$('#nav li.menu-item-has-children > a[href="#"]').on('click', function(event) {
		event.preventDefault();
		$(this).next('.submenu-wrapper').slideToggle('800');
	});
})(jQuery);
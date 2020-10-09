(function() {
	'use strict';
	var controller = new ScrollMagic.Controller();
	var is_front_page = document.body.classList.contains('home');
	if (is_front_page) {
		var gsap_1 = document.getElementById('gsap-item-1');
		var anm_gsap_1 = gsap.fromTo(gsap_1, 1, {
			'top': '100%',
			'transform': 'rotate(0deg)',
			'-webkit-transform': 'rotate(0deg)',
			'-moz-transform': 'rotate(0deg)',
			'ease': 'none'
		}, {
			'top': '-100%',
			'transform': 'rotate(-45deg)',
			'-webkit-transform': 'rotate(-45deg)',
			'-moz-transform': 'rotate(-45deg)',
			'ease': 'none'
		});
		new ScrollMagic.Scene({
				triggerHook: 'onEnter',
				ease: Linear.easeNone,
				duration: '400%'
			})
			.setTween(anm_gsap_1)
			.addTo(controller);

		//entrate
		var toanimate = document.querySelectorAll('.toanimate');
		if (toanimate.length) {
			toanimate.forEach((item, i) => {
				new ScrollMagic.Scene({
						triggerElement: item,
						triggerHook: 'onEnter'
					})
					.setClassToggle(item, 'is-animated')
					.reverse(false)
					.addTo(controller);
			});

		}
	}
	//header
	// const siteHeader = document.querySelector('header#header');
	// if (siteHeader) {
	// 	new ScrollMagic.Scene({
	// 			triggerHook: 'onEnter',
	// 			offset: 300
	// 		})
	// 		.setClassToggle(document.documentElement, 'header-background')
	// 		.addTo(controller);
	// }
})();
(function() {
	'use strict';
	var is_front_page = document.body.classList.contains('home');
	if (is_front_page) {
		var controller = new ScrollMagic.Controller();
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
			.addIndicators({
				name: 'gsap_1'
			})
			.addTo(controller);
	}
})();
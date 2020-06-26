var endtransition, endanimation;
(function($) {
	var transitions = {
		'WebkitTransition': 'webkitTransitionEnd',
		'MozTransition': 'transitionend',
		'OTransition': 'oTransitionEnd',
		'msTransition': 'MSTransitionEnd',
		'transition': 'transitionend'
	};
	var animations = {
		'WebkitAnimation': 'webkitAnimationEnd',
		'MozAnimation': 'animationend',
		'OAnimation': 'oAnimationEnd',
		'msAnimation': 'MSAnimationEnd',
		'animation': 'animationend'
	};
	endtransition = transitions[Modernizr.prefixed('transition')];
	endanimation = animations[Modernizr.prefixed('animation')];
})(jQuery);
document.addEventListener('lazybeforeunveil', function(e) {
	var bg = e.target.getAttribute('data-background-image');
	if (bg) {
		e.target.style.cssText = 'background-image:url(' + bg + ')';
	}
});

if (typeof('objectFitImages') == 'function') {
	objectFitImages('img.fitimage', {
		watchMQ: true
	});
}

jQuery(document).ready(function($) {
	var categoryCarousel = $('.products-cat-carousel > .wrapper');
	if (categoryCarousel.length) {
		categoryCarousel.slick({
			mobileFirst: true,
			arrows: false,
			dots: true,
			slidesToShow: 1,
			rows: 0,
			speed: 1000,
			customPaging: function() {
				return '<span></span>';
			},
			responsive: [{
					breakpoint: 767.98,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 991.98,
					settings: {
						slidesToShow: 3
					}
				},
				{
					breakpoint: 1199.98,
					settings: {
						slidesToShow: 4
					}
				}
			]
		});
	}

	var claimSlideshow = $('#claim-slideshow');
	if (claimSlideshow.length) {
		claimSlideshow.slick({
			mobileFirst: true,
			arrows: true,
			dots: false,
			slidesToShow: 1,
			rows: 0,
			fade: true,
			speed: 1000,
			prevArrow: '<button class="prev"><span></span></button>',
			nextArrow: '<button class="next"><span></span></button>'
		});
	}

	var specialProjectsSlideshow = $('#special-projects-slideshow');
	if (specialProjectsSlideshow.length) {
		specialProjectsSlideshow.slick({
			mobileFirst: true,
			arrows: true,
			dots: false,
			slidesToShow: 1,
			rows: 0,
			prevArrow: '<button class="prev"><span></span></button>',
			nextArrow: '<button class="next"><span></span></button>',
			lazyLoad: 'progressive',
			responsive: [{
				breakpoint: 991.98,
				settings: {
					variableWidth: true
				}
			}]
		});
	}

	var newsPreview = $('#latest-news');
	if (newsPreview.length) {
		newsPreview.slick({
			mobileFirst: true,
			arrows: false,
			dots: true,
			slidesToShow: 1,
			rows: 0,
			speed: 1000,
			lazyLoad: 'progressive',
			customPaging: function() {
				return '<span></span>';
			},
			responsive: [{
					breakpoint: 767.98,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 991.98,
					settings: {
						slidesToShow: 3
					}
				},
				{
					breakpoint: 1199.98,
					settings: {
						slidesToShow: 4
					}
				}
			]
		});
	}
});
var instagramWall = document.getElementById('instagram-wall');
if (instagramWall) {
	var opts = {
		tag: 'packaging',
		user_id: false,
		count: '15'
	}
	var feed = new instagramFeed('#instagram-wall', opts);
	feed.init();
}
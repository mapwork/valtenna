document.addEventListener('lazybeforeunveil', function(e) {
	var bg = e.target.getAttribute('data-background-image');
	if (bg) {
		e.target.style.backgroundImage = 'url(' + bg + ')';
	}
});
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
});
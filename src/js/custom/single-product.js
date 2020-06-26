jQuery(document).ready(function($) {
	var similarProduct = $('#similar-products');
	if (similarProduct.length) {
		similarProduct.find('.slideshow').slick({
			mobileFirst: true,
			arrows: true,
			dots: false,
			slidesToShow: 1,
			rows: 0,
			lazyLoad: 'progressive',
			speed: 1000,
			prevArrow: '<button class="prev"><span></span></button>',
			nextArrow: '<button class="next"><span></span></button>',
			responsive: [{
				breakpoint: 767.98,
				settings: {
					slidesToShow: 3
				}
			}]
		});
	}
});
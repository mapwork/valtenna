"use strict";

document.addEventListener('lazybeforeunveil', function (e) {
  var bg = e.target.getAttribute('data-background-image');

  if (bg) {
    e.target.style.backgroundImage = 'url(' + bg + ')';
  }
});
jQuery(document).ready(function ($) {
  var categoryCarousel = $('.products-cat-carousel > .wrapper');

  if (categoryCarousel.length) {
    categoryCarousel.slick({
      mobileFirst: true,
      arrows: false,
      dots: true,
      slidesToShow: 1,
      rows: 0,
      speed: 1000,
      customPaging: function customPaging() {
        return '<span></span>';
      },
      responsive: [{
        breakpoint: 767.98,
        settings: {
          slidesToShow: 2
        }
      }, {
        breakpoint: 991.98,
        settings: {
          slidesToShow: 3
        }
      }, {
        breakpoint: 1199.98,
        settings: {
          slidesToShow: 4
        }
      }]
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
"use strict";

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
  var triggerMenu = document.getElementById('trigger-menu'),
      closeMenu = document.getElementById('close-navigation'),
      docEl = document.documentElement;
  triggerMenu.addEventListener('click', function () {
    if (!docEl.classList.contains('menu-open')) {
      docEl.classList.add('menu-open');
    }
  });
  closeMenu.addEventListener('click', function () {
    if (docEl.classList.contains('menu-open')) {
      docEl.classList.remove('menu-open');
    }
  });
})();
"use strict";

(function ($) {
  'use strict';

  var nlMail = $('input#subscribe-email'),
      userId = $('input#nl_user_id'),
      nlForm = $('form#subscribe-form');
  nlMail.on('keyup change', function () {
    if ('' == this.value || undefined == this.value || null == this.value) {
      userId.val('');
    } else {
      userId.val(md5(this.value));
    }
  });
  nlForm.validate({
    rules: {
      email: {
        required: true,
        email: true
      }
    }
  });
})(jQuery);
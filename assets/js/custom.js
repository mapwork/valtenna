"use strict";

(function ($) {
  'use strict';

  var popped = 'state' in window.history && window.history.state !== null,
      initialURL = location.href;
  var mobileCategorySelect = $('#mobile-category-selector');
  var content = $('#products-grid-container').parent();

  var ajaxLoadPage = function ajaxLoadPage(url) {
    console.log('Loading ' + url + ' fragment');
    content.load(url + ' #products-grid-container');
  };

  mobileCategorySelect.on('change', function () {
    var href = this.value;
    ajaxLoadPage(href);
    history.pushState({
      page: href
    }, null, href);
  });
  $(window).bind('popstate', function () {
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
"use strict";

(function () {
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
    }).setTween(anm_gsap_1).addTo(controller); //entrate

    var toanimate = document.querySelectorAll('.toanimate');

    if (toanimate.length) {
      toanimate.forEach(function (item, i) {
        new ScrollMagic.Scene({
          triggerElement: item,
          triggerHook: 'onEnter'
        }).setClassToggle(item, 'is-animated').reverse(false).addTo(controller);
      });
    } //header


    var siteHeader = document.querySelector('header#header');
    new ScrollMagic.Scene({
      triggerHook: 'onEnter',
      offset: 300
    }).setClassToggle(document.documentElement, 'header-background').addTo(controller);
  }
})();
"use strict";

var endtransition, endanimation;

(function ($) {
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

if (typeof 'objectFitImages' == 'function') {
  var someImages = document.querySelectorAll('img.fitimage, .fitimage img');
  objectFitImages(someImages, {
    watchMQ: true
  });
}

jQuery(document).ready(function ($) {
  var categoryCarousel = $('.products-cat-carousel > .wrapper');

  if (categoryCarousel.length) {
    categoryCarousel.slick({
      mobileFirst: true,
      infinite: false,
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

  var autoSlick = $(document).find('[data-slick]');

  if (autoSlick.length) {
    autoSlick.slick();
  }

  $(window).load(function () {
    var products_tax_archive = $('body[class*="tax-"]');

    if (products_tax_archive.length) {
      var queryString = window.location.search;
      var urlParams = new URLSearchParams(queryString);

      if (urlParams.has('filter_products_cat')) {
        var filterNav = $('#filters-by-categories');
        var pos = filterNav.offset().top - $('#header').height();
        $('html,body').animate({
          'scrollTop': pos + 'px'
        }, 1000);
      }
    }
  });
});
var instagramWall = document.getElementById('instagram-wall');

if (instagramWall) {
  var feed = new instagramFeed('#instagram-wall', instagramWall.dataset);
  feed.init();
}
"use strict";

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
var $body = document.querySelector('body');
var scrollPosition = 0;

function disableScroll() {
  scrollPosition = window.pageYOffset;
  $body.style.overflow = 'hidden';
  $body.style.position = 'fixed';
  $body.style.top = "-".concat(scrollPosition, "px");
  $body.style.width = '100%';
}

function enableScroll() {
  $body.style.removeProperty('overflow');
  $body.style.removeProperty('position');
  $body.style.removeProperty('top');
  $body.style.removeProperty('width');
  window.scrollTo(0, scrollPosition);
}

(function () {
  var triggerMenu = document.getElementById('trigger-menu'),
      closeMenu = document.getElementById('close-navigation'),
      docEl = document.documentElement;
  triggerMenu.addEventListener('click', function () {
    if (!docEl.classList.contains('menu-open')) {
      docEl.classList.add('menu-open');
      disableScroll();
    }
  });
  closeMenu.addEventListener('click', function () {
    if (docEl.classList.contains('menu-open')) {
      docEl.classList.remove('menu-open');
      enableScroll();
    }
  });
})();

(function ($) {
  'use strict';

  $('#site-navigation > .wrapper').on(endtransition, function (evt) {
    if (evt.originalEvent.propertyName.includes('transform') && !$('html').hasClass('menu-open')) {
      $('#nav .submenu-wrapper').hide();
    }
  });
  $('#nav li.menu-item-has-children > a[href="#"]').on('click', function (event) {
    event.preventDefault();
    $(this).next('.submenu-wrapper').slideToggle('800');
  });
})(jQuery);
"use strict";

jQuery(document).ready(function ($) {
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
"use strict";

var _wp$i18n = wp.i18n,
    __ = _wp$i18n.__,
    _x = _wp$i18n._x,
    _n = _wp$i18n._n,
    _nx = _wp$i18n._nx;

(function ($) {
  'use strict';

  var nlMail = $('input#subscribe-email'),
      userId = $('input#nl_user_id'),
      nlForm = $('form#subscribe-form'),
      ppChecker = nlForm.find('#subscribe_policy'),
      subscribeSubmit = $('button#subscribe-submit');
  ppChecker.on('change', function () {
    if (this.checked) {
      subscribeSubmit.prop('disabled', false);
    } else {
      subscribeSubmit.prop('disabled', true);
    }
  });
  nlMail.on('keyup change', function () {
    if ('' == this.value || undefined == this.value || null == this.value) {
      userId.val('');
    } else {
      userId.val(md5(this.value));
    }
  });

  var alertHtml = function alertHtml(type, title, message) {
    type = typeof type !== 'undefined' ? type : 'info';
    title = typeof title !== 'undefined' ? title : false;
    var html = '<div class="valtenna-alert ' + type + '">';
    html += title ? '<h3>' + title + '</h3>' : '';
    html += '<div class="message">' + message + '</div>';
    html += '</div>';
    return html;
  };

  nlForm.validate({
    rules: {
      email: {
        required: true,
        email: true
      }
    },
    messages: {
      email: {
        required: __('Questo campo è obbligatorio', 'valtenna'),
        email: __('Inserisci un indirizzo e-mail valido', 'valtenna')
      }
    },
    submitHandler: function submitHandler(form) {
      nlMail.prop('readonly', true);
      form.classList.add('submitting');
      var formdata = $(form).serialize();

      _iub.cons_instructions.push(["submit", {
        writeOnLocalStorage: false,
        // default: false
        form: {
          selector: form
        },
        consent: {
          legal_notices: [{
            identifier: 'privacy_policy'
          }]
        }
      }, {
        success: function success(success_response) {
          $.post(valtenna.ajaxurl, formdata, function (response) {
            nlMail.prop('readonly', false);
            form.classList.remove('submitting');
            var result = response.result;

            if (true === result) {
              $.fancybox.open(alertHtml('success', __('Perfetto!', 'valtenna'), __('La tua iscrizione è stata effettuata con successo.', 'valtenna')));
            } else {
              var errorcode = response.code,
                  errorTitle = __('Errore!', 'valtenna'),
                  errorMessage;

              switch (errorcode) {
                case 'mailchimp_error':
                  errorMessage = __('Siamo spiacenti, ma qualcosa è andato storto durante il tentativo di iscrizione.<br/><br/>Dettaglio errore:<br/> %errordetail%', 'valtenna');
                  errorMessage = errorMessage.replace('%errordetail%', response.data);
                  break;

                case 'email_exists':
                  errorMessage = __('Questo indirizzo e-mail sembra già essere presente nel nostro database.', 'valtenna');
                  break;

                default:
                  errorMessage = __('Si è verificato un problema tecnico. Riprova più tardi. Grazie.', 'valtenna');
                  break;
              }

              $.fancybox.open(alertHtml('error', errorTitle, errorMessage));
            }
          });
        },
        error: function error(error_response) {
          nlMail.prop('readonly', false);
          form.classList.remove('submitting');
          $.fancybox.open(alertHtml('error', __('Errore!', 'valtenna'), __('Non ho potuto registrare il tuo consenso al trattamento dei dati personali e, quindi, registrare la tua iscrizione alla newsletter. Riprova più tardi. Grazie.', 'valtenna')));
        }
      }]);
    }
  });
})(jQuery);
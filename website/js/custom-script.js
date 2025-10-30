jQuery(document).ready(function () {

  /* Fixed Header */
  jQuery(window).on("scroll", function () {
    var scroll = jQuery(this).scrollTop();
    if (scroll >= 2) {
      jQuery(".main_header").addClass("fixed-header");
    } else {
      jQuery(".main_header").removeClass("fixed-header");
    }
  });

  /* Header Search */
  jQuery('.search-btn').on('click', function (e) {
    e.preventDefault();
    jQuery(this).toggleClass('active');
    jQuery('header').toggleClass('head-active');
    jQuery('.search_form').slideToggle(300);
  });
	
	jQuery('.clear-btn').click(function(){
    jQuery('.search-field').val('');
  });


  /* Notification Banner */
  var $banner = jQuery('.notification-bar');
  var $closeBtn = jQuery('.notification-close');

  if ($banner.length && $closeBtn.length) {
    $closeBtn.on('click', function () {
      $banner.fadeOut(500);
    });
  }

  /* Dynamic Top value for maincontent */
  var basePad = parseInt(jQuery('#mainContent').css('padding-top')) || 0,
    baseTop = parseInt(jQuery('.main_header .header_right.mobile_menu').css('top')) || 0;

  function setOffsets() {
    var h = jQuery('.notification-bar:visible').outerHeight() || 0;
    jQuery('#mainContent').css('padding-top', basePad + h);
    jQuery('.main_header .header_right.mobile_menu').css('top', baseTop + h);
  }

  jQuery(window).on('load resize', setOffsets);
  jQuery(document).on('click', '.notification-bar .notification-close', function () {
    jQuery('.notification-bar').slideUp(300, setOffsets);
  });

  if (jQuery('.notification-bar').length)
    new ResizeObserver(setOffsets).observe(jQuery('.notification-bar')[0]);


  /* Menu */
  if (jQuery(window).width() <= 1023) {
    jQuery(".toggle_button").on("click", function (e) {
      e.preventDefault();
      jQuery(this).toggleClass("active");
      jQuery(".mobile_menu, .main_header").toggleClass("navOpen menu-open");
      jQuery("html").toggleClass("no-scroll");
    });

    jQuery("ul.main_menu li.menu-item-has-children > a").on("click", function (e) {
      e.preventDefault();
      const $a = jQuery(this),
        $li = $a.parent(),
        $sub = $a.next("ul.sub-menu");
      $li.siblings()
        .removeClass("sib")
        .find("> a").removeClass("active").next("ul.sub-menu").slideUp(300);
      $a.toggleClass("active");
      $sub.slideToggle();
      if ($a.hasClass("active")) {
        $li.siblings().not(".menu-item-has-children:has(> a.active)").addClass("sib");
        $li.removeClass("sib");
      } else {
        $li.siblings().removeClass("sib");
      }
    });
  }


  /* Footer */
  if (jQuery(window).width() <= 767) {
    jQuery(".menu-list > li.menu-item-has-children > a").on("click", function (e) {
      e.preventDefault();
      let $link = jQuery(this),
        $submenu = $link.next(".sub-menu");
      jQuery(".menu-list > li.menu-item-has-children > a").not($link).removeClass("active")
        .next(".sub-menu").slideUp(300);
      $link.toggleClass("active");
      $submenu.stop(true, true).slideToggle(300);
    });
  }


  /* Accorrdion */
  jQuery(".accordion-item .accordion-heading").on("click", function (e) {
    e.preventDefault();
    if (jQuery(this).closest(".accordion-item").hasClass("active")) {
      jQuery(".accordion-item").removeClass("active");
    } else {
      jQuery(".accordion-item").removeClass("active");
      jQuery(this).closest(".accordion-item").addClass("active");
    }
    var jQuerycontent = jQuery(this).next();
    jQuerycontent.slideToggle(600);
    jQuery(".accordion-item .content").not(jQuerycontent).slideUp("600");
  });


  /* Form */
  jQuery(".frm_forms .frm_form_fields input, .frm_forms .frm_form_fields textarea").on('focus', function () {
    jQuery(this).siblings(".frm_form_field").addClass("input-has-value");
    jQuery(this).parent(".frm_form_field ").removeClass("frm_blank_field");

    jQuery(this).siblings(".frm_error").hide();
  }).on('blur', function () {
    if (!jQuery(this).val()) {
      jQuery(this).siblings(".frm_form_field").removeClass("input-has-value");
      jQuery(this).siblings(".frm_error").show();
      jQuery(this).parent(".frm_form_field ").addClass("frm_blank_field");

    } else {
      jQuery(this).siblings(".frm_form_field").addClass("input-has-value");
      jQuery(this).parent(".frm_form_field ").removeClass("frm_blank_field");

      jQuery(this).siblings(".frm_error").hide();
    }
  });


  // Get OS
  var os = ['iphone', 'ipad', 'windows', 'mac', 'linux'];
  var match = navigator.appVersion
    .toLowerCase()
    .match(new RegExp(os.join("|")));
  if (match) {
    jQuery("body").addClass(match[0]);
  }

  

  /* News Filter Toggle */
  if (jQuery(window).width() <= 767) {
    jQuery(document).on('click', '.heading_mobile_menu', function (e) {
      //e.preventDefault();
      jQuery(this).toggleClass('active');
      jQuery('.news-search').toggleClass('inactive', jQuery(this).hasClass('active'));
      jQuery('.news-filter-inner ul').slideToggle();
    }).on('click', '.news-filter-inner ul li a', function (e) {
      //e.preventDefault();
      jQuery('.heading_mobile_menu').contents().filter(function () {
        return this.nodeType === 3;
      }).first().replaceWith(jQuery(this).text());
      jQuery('.heading_mobile_menu').removeClass('active');
      jQuery('.news-search').toggleClass('inactive');
      jQuery('.news-filter-inner ul').slideUp();
    });
  }



 

});

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
  jQuery(window).on('scroll', function () {
    if (jQuery('.main_header').hasClass('fixed-header')) {
      jQuery('.topbar').removeClass('on');
    } else {
      jQuery('.topbar').addClass('on');
    }
  });


  /* Menu */

  if (jQuery(window).width() <= 809) {
    jQuery(".toggle_button").on("click", function (event) {
      event.preventDefault();
      jQuery(this).toggleClass("active");
      jQuery(".mobile_menu").toggleClass("navOpen");
      jQuery(".main_header").toggleClass("menu-open");
      jQuery("html").toggleClass("no-scroll");
    });
    jQuery("ul.main_menu > li.menu-item-has-children > a").on(
      "click",
      function (event) {
        event.preventDefault();
        jQuery("ul.main_menu > li.menu-item-has-children > a")
          .not(jQuery(this))
          .removeClass("active");
        jQuery(this).toggleClass("active");
        jQuery(this).parent().siblings().find("ul.sub-menu").slideUp();
        jQuery(this).next("ul.sub-menu").slideToggle();
        jQuery(this).parent().siblings().toggleClass("sib");
      }
    );
    jQuery("ul.main_menu ul > li.menu-item-has-children > a").on(
      "click",
      function (event) {
        event.preventDefault();
        jQuery("ul.main_menu ul > li.menu-item-has-children > a")
          .not(jQuery(this))
          .removeClass("active");
        jQuery(this).toggleClass("active");
        jQuery(this).parent().siblings().find("ul.sub-menu").slideUp();
        jQuery(this)
          .siblings("ul.main_menu ul > li > ul.sub-menu")
          .slideToggle();
      }
    );
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
    jQuerycontent.slideToggle(300);
    jQuery(".accordion-item .content").not(jQuerycontent).slideUp("slow");
  });

  /* Product Banner */
  if (jQuery(window).width() >= 768) {
    jQuery(".pb-slider-wrap").each(function () {
      const $wrap = jQuery(this);
      $wrap
        .find(".pb-thumb:first")
        .addClass("active")
        .find(".pb-thumb-nav")
        .addClass("open");
      $wrap.find(".pb-slide:first").addClass("active");
      $wrap.find(".pb-thumb-nav").on("click", function (e) {
        e.preventDefault();
        const $nav = jQuery(this);
        const data = $nav.data("name");

        $nav
          .parent()
          .addClass("active")
          .siblings()
          .removeClass("active")
          .find(".pb-thumb-nav")
          .removeClass("open");
        $nav.addClass("open");
        $wrap
          .find(".pb-slide")
          .hide()
          .filter(`[data-image="${data}"]`)
          .fadeIn(800);
      });
    });
  }
  if (jQuery(window).width() <= 767) {
    jQuery(".pb-slider-nav .pb-bg").css("background", "");
    jQuery(".pb-slider-nav .pb-thumb-nav").css("color", "");

    jQuery(".pb-slider-for").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: ".pb-slider-nav",
    });
    jQuery(".pb-slider-nav").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      asNavFor: ".pb-slider-for",
      dots: false,
      arrows: true,
      variableWidth: true,
      centerMode: true,
      appendArrows: ".custom-arrows",
      prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-left"></i></span></div>',
      nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></div>',
      focusOnSelect: true,
    });
  }


  /* Product Features */
  if (jQuery(window).width() >= 768) {
    jQuery(".pf-slider-wrap").each(function () {
      const $wrap = jQuery(this);

      const $firstThumb = $wrap.find(".pf-thumb:first");
      const firstBg = $firstThumb.attr("data-bg");
      const $firstnav = $firstThumb.find(".pf-thumb-nav");
      const firstTextColor = $firstnav.attr("data-color");

      $firstThumb.css("background", firstBg);
      $firstThumb.find(".pf-bg").css("background", firstBg);
      $firstnav.css("color", firstTextColor);

      $firstThumb.addClass("active");
      $firstnav.addClass("open");
      $wrap.find(".pf-slide[data-image='1']").addClass("active");

      $wrap.find(".pf-thumb-nav").on("click", function (e) {
        e.preventDefault();
        const $nav = jQuery(this);
        const data = $nav.data("name");
        const textColor = $nav.data("color");

        const $currentThumb = $nav.closest(".pf-thumb");
        const $allThumbs = $wrap.find(".pf-thumb");
        const $allThumbNavs = $wrap.find(".pf-thumb-nav");
        const $allThumbBgs = $wrap.find(".pf-bg");

        // Reset all
        $allThumbs.removeClass("active").css("background", "#FFFFFF");
        $allThumbNavs.removeClass("open").css("color", "rgba(0,71,57,1)");
        $allThumbBgs.css("background", "rgb(255 255 255 / 50%)");

        // Activate current
        $currentThumb.addClass("active");
        $nav.addClass("open").css("color", textColor);

        const newBg = $currentThumb.attr("data-bg");
        $currentThumb.css("background", newBg);
        $currentThumb.find(".pf-bg").css("background", newBg);

        // Show slide
        $wrap
          .find(".pf-slide")
          .hide()
          .filter(`[data-image="${data}"]`)
          .fadeIn(800);
      });
    });
  }
  if (jQuery(window).width() <= 767) {
    jQuery(".pf-slider-nav .pf-thumb").css("background", "");
    jQuery(".pf-slider-nav .pf-bg").css("background", "");
    jQuery(".pf-slider-nav .pf-thumb-nav").css("color", "");

    jQuery(".pf-slider-for").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: ".pf-slider-nav",
    });
    jQuery(".pf-slider-nav").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      asNavFor: ".pf-slider-for",
      dots: false,
      arrows: true,
      variableWidth: true,
      centerMode: true,
      appendArrows: ".custom-arrows",
      prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-left"></i></span></div>',
      nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></div>',
      focusOnSelect: true,
    });
  }

  /* CTA Form */
  jQuery('.frm_form_field input, .frm_form_field textarea').on('input focus', function () {
    var inputLength = jQuery(this).val().length;
    if (inputLength > 0) {
      jQuery(this).addClass('input-has-value');
    } else {
      jQuery(this).removeClass('input-has-value');
    }
  });


  jQuery(".frm_forms .frm_form_fields input, .frm_forms .frm_form_fields textarea").on('focus', function () {
    jQuery(this).siblings(".frm_form_field").addClass("input-has-value");
    jQuery(this).parent(".frm_form_field").removeClass("frm_blank_field");

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




});

jQuery(function () {
  if (jQuery(window).width() <= 767) {
    jQuery('.filterlist').each(function () {
      let $li = jQuery(this).children('li'),
        $btn = $li.filter('.toggle-list'),
        $hidden = $li.slice(8, -1).hide();

      $btn.show().click(() => {
        $hidden.stop().fadeToggle(500);
        $btn.find('a').text($hidden.is(':visible') ? 'Show less' : 'Show more');
      });
    });
  }
});


/* Industry Detail Sticky */
jQuery(function () {
  const $links = jQuery('.scroll-nav-links li a');
  const $sections = $links.map((_, el) => jQuery(jQuery(el).attr('href')));
  let isScrolling = false, timer;

  $links.first().addClass('active');

  $links.on('click', function (e) {
    e.preventDefault();
    const $this = jQuery(this);
    const headerH = jQuery('.main_header').outerHeight() || 0;
    const targetTop = jQuery($this.attr('href')).offset().top - headerH + 10;

    isScrolling = true;
    jQuery('html, body').stop().animate({ scrollTop: targetTop }, 500, () => {
      setTimeout(() => isScrolling = false, 100);
    });

    $links.removeClass('active');
    $this.addClass('active');
  });

  jQuery(window).on('scroll', () => {
    if (isScrolling) return;

    clearTimeout(timer);
    timer = setTimeout(() => {
      const scrollTop = jQuery(window).scrollTop();
      const headerH = jQuery('.main_header').outerHeight() || 0;

      $sections.each((i, sec) => {
        const $sec = jQuery(sec);
        const top = $sec.offset().top - headerH - 15;
        const bottom = top + $sec.outerHeight();

        if (scrollTop >= top && scrollTop < bottom) {
          $links.removeClass('active').eq(i).addClass('active');
          return false;
        }
      });
    }, 50);
  });
});

jQuery(function () {
  jQuery('.feedback-btn').on('click', function () {
    jQuery('.feedback-btn').removeClass('selected');
    jQuery(this).addClass('selected');

    const chosen = $(this).data('value');
    console.log('Chosen:', chosen);
  });
});

jQuery(document).ready(function () {
  jQuery('.kn-links-nav li a').on('click', function (e) {
    e.preventDefault();

    var target = jQuery(jQuery(this).attr('href'));
    if (target.length) {
      var headerHeight = jQuery('.main_header').outerHeight(true);
      var scrollTo = target.offset().top - headerHeight;

      jQuery('html, body').animate({
        scrollTop: scrollTo
      }, 600);
    }
  });

  if (jQuery(window).width() <= 767) {
    jQuery(document).on('click', '.heading_mobile_menu', function (e) {
      e.preventDefault();
      jQuery(this).toggleClass('active');
      jQuery('ul.kn-links-nav').slideToggle();
    });

    jQuery(document).on('click', '.kn-links-nav li a', function (e) {
      e.preventDefault();
      jQuery('.heading_mobile_menu').html(jQuery(this).html()).removeClass('active');
      jQuery('ul.kn-links-nav').slideUp();

      var href = jQuery(this).attr('href');
      if (href && href !== '#') window.location.href = href;
    });
  }

  /* Bottom Popup Slide*/
$(window).on('load', function () {
  if (window.location.href.indexOf("snap-tracker-knowledge-centre") > -1) {
    if ($('.overlay_main_sec').length > 0) {
      jQuery('body').addClass('pull_bottom');
      jQuery("html").addClass("no-scroll");
      jQuery('.overlay_main_sec').addClass('active');
      console.log("Showing popup");
    } else {
      // Clean up any stuck scroll block
      jQuery('body').removeClass('pull_bottom');
      jQuery('html').removeClass('no-scroll');
      console.log("Popup skipped (cookie exists)");
    }
  }
});


  jQuery('.pop_close').on('click', function (e) {
    e.preventDefault();
    window.location.href = 'https://kisp.com/';
  });

  jQuery("#requestFormhandler").on('click', function (e) {
    e.preventDefault();
    jQuery('.frm_forms.login-form').hide();
    jQuery('.request-form').show();
  });

    jQuery("#loginFormhandler").on('click', function (e) {
    e.preventDefault();
    jQuery('.request-form').hide();
     jQuery('.frm_forms.login-form').show();
  });
  
  // If login_error is present, remove it after showing the message once
  if (window.location.href.indexOf("login_error=1") > -1) {
    const url = new URL(window.location.href);
    url.searchParams.delete("login_error");

    // Use replaceState so it doesn't reload
    window.history.replaceState({}, document.title, url.pathname + url.search);
  }

if ($('.request-form .frm_error').length > 0) {
  $('.login-form').hide();
  $('.request-form').show();
  $("#frm_error_field_z7nvv").addClass("show_error");
}
if ($('.request-form .frm_message').length > 0) {
   $('.login-form').hide();
  $('.request-form').show();
   $(".frm_message").addClass("show_message");
}
});

jQuery(document).ready(function () {
  var banner = jQuery('#notificationBanner'),
    main = jQuery('#mainContent'),
    originalPadding = parseInt(main.css('padding-top')) || 0;

  function adjustPadding() {
    var h = banner.is(':visible') ? banner.outerHeight() : 0;
    var padding = jQuery('body').hasClass('home') ? h : originalPadding + h;
    main.css('padding-top', padding);
    if (jQuery(window).width() <= 809) {
      jQuery('.topbar').css('top', h);
      jQuery('.header_right.mobile_menu').css('top', h + 56);
    }
  }

  banner.on('click', '.notification-close', function () {
    banner.fadeOut(400);
    main.animate({ 'padding-top': originalPadding }, 400);
    if (jQuery(window).width() <= 809) {
      jQuery('.topbar, .header_right.mobile_menu').animate({ top: 0 }, 400);
    }
  });

  adjustPadding();
  jQuery(window).on('resize', adjustPadding);
});





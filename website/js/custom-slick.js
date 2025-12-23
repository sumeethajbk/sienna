jQuery(document).ready(function () {

  /* Our Stories Slider */
  function SitesSlider() {
    var $el = jQuery('.stories-slider-row'),
      w = jQuery(window).width(),
      count = $el.children().length;
    if ($el.hasClass('slick-initialized')) $el.slick('unslick');
    if (w > 767 && count > 2) {
      $el.removeClass('few-story').slick({
        slidesToShow: 2,
        arrows: true,
        variableWidth: true,
        infinite: false,
        speed: 1000,
        draggable: true,
        swipeToSlide: true,
        touchThreshold: 100,
        prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-solid fa-chevron-left"></i></span></div>',
        nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-solid fa-chevron-right"></i></span></div>',
      });
    } else if (w <= 767) {
      $el.removeClass('few-story').slick({
        slidesToShow: 1,
        arrows: true,
        dots: true,
        variableWidth: true,
        infinite: false,
        speed: 1000,
        draggable: true,
        swipeToSlide: true,
        touchThreshold: 100,
        prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-solid fa-chevron-left"></i></span></div>',
        nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-solid fa-chevron-right"></i></span></div>',
      });
    } else {
      $el.addClass('few-story');
    }
  }
  SitesSlider();
  jQuery(window).on('resize', SitesSlider);


  /* About Slider */

  jQuery('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: false,
    dots: false,
    speed: 1000,
    arrows: false,
    vertical: true,
    verticalSwiping: true,
    swipeToSlide: true,
    focusOnSelect: true,
    asNavFor: '.slider-for',
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        vertical: false,
        verticalSwiping: false,
        variableWidth: true,
      }
    }]
  });
  jQuery('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    speed: 1000,
    fade: true,
    focusOnSelect: true,
    infinite: false,
    asNavFor: '.slider-nav',
    prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-left"></i></span></div>',
    nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></div>',
  });
  /* End of About Slider */
    
    
     /* Room Slider */
  jQuery('.room-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: false,
    dots: false,
    speed: 1000,
    arrows: false,
    vertical: true,
    verticalSwiping: true,
    swipeToSlide: true,
    focusOnSelect: true,
    asNavFor: '.room-for',
  });
  jQuery('.room-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    speed: 1000,
    fade: true,
    focusOnSelect: true,
    infinite: false,
    asNavFor: '.room-nav',
    prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-left"></i></span></div>',
    nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></div>',
      responsive: [{
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          adaptiveHeight: true,
          arrows: true,
          dots: true
        }
      }
    ]
  });
  /* End of room Slider */

  /* Testimonial Slider */  
  var slider = jQuery('.testimonial-swrap');

  if (slider.children().length > 1) {
    slider.slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      speed: 1000,
      dots: false,
      adaptiveHeight: true,
      infinite: false,
      draggable: true,
      swipeToSlide: true,
      touchThreshold: 100,
      prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-solid fa-chevron-left"></i></span></div>',
      nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-solid fa-chevron-right"></i></span></div>',
      responsive: [
        {
          breakpoint: 768,
          settings: {
            dots: true
          }
        }
      ]
    });
  }

  /* Photo Gallery */
  jQuery('.photo-swrap').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    speed: 1000,
    dots: false,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    touchThreshold: 100,
    prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-solid fa-chevron-left"></i></span></div>',
    nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-solid fa-chevron-right"></i></span></div>',
    centerMode: true,
    centerPadding: '0',
    responsive: [{
        breakpoint: 1023,
        settings: {
        }
      },
        {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          adaptiveHeight: true,
          arrows: true,
          dots: true,
          centerMode: false,
          fade:true,
        }
      }
    ]
  });

  jQuery('.resources-slider-row').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: true,
    speed: 1000,
    dots: false,
    variableWidth: true,
    infinite: false,
    draggable: true,
    swipeToSlide: true,
    touchThreshold: 100,
    prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-solid fa-chevron-left"></i></span></div>',
    nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-solid fa-chevron-right"></i></span></div>',
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          adaptiveHeight: true,
        }
      },
      {
        breakpoint: 1023,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          adaptiveHeight: true,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          adaptiveHeight: true,
          arrows: true,
          dots: true
        }
      }
    ]

  });

  jQuery('.team-carousel-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    speed: 1000,
    dots: false,
    variableWidth: true,
    infinite: false,
    draggable: true,
    swipeToSlide: true,
    touchThreshold: 100,
    prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-solid fa-chevron-left"></i></span></div>',
    nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-solid fa-chevron-right"></i></span></div>',
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: true,
          adaptiveHeight: true,
        }
      },
      {
        breakpoint: 1023,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: true,
          adaptiveHeight: true,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          adaptiveHeight: true,
          arrows: true,
          dots: true
        }
      }
    ]

  });


});

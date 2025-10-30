jQuery(document).ready(function () {

  /* Sites and Facilities Slider */
  function SitesSlider() {
    var $el = jQuery('.sites-facilities-inner'),
      w = jQuery(window).width(),
      count = $el.children().length;
    if ($el.hasClass('slick-initialized')) $el.slick('unslick');
    if (w > 767 && count > 3) {
      $el.removeClass('few-sites').slick({
        slidesToShow: 1,
        arrows: true,
        variableWidth: true,
        infinite: false,
        speed: 1000,

        draggable: true,
        swipeToSlide: true,
        touchThreshold: 100,
        prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-light fa-chevron-left"></i></span></div>',
        nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-light fa-chevron-right"></i></span></div>',
      });
    } else if (w <= 767) {
      $el.removeClass('few-sites').slick({
        slidesToShow: 1,
        arrows: true,
        variableWidth: true,
        infinite: false,
        speed: 1000,
        draggable: true,
        swipeToSlide: true,
        touchThreshold: 100,
        prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-light fa-chevron-left"></i></span></div>',
        nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-light fa-chevron-right"></i></span></div>',
      });
    } else {
      $el.addClass('few-sites');
    }
  }
  SitesSlider();
  jQuery(window).on('resize', SitesSlider);


  /* Featured News */
  var $slider = jQuery('.featured-news-wrap');
  var slickInitialized = false;

  function initSlider() {
    if (jQuery(window).width() < 768) {
      jQuery(".featured-news-top-rt-inner, .featured-news-top-rt, .featured-news-top-lt, .featured-news-ftr").each(function () {
        jQuery(this).children().unwrap();
      });

      if (!slickInitialized) {
        $slider.slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: false,
          speed: 1000,
          dots: true,
          arrows: false,
          variableWidth: true,
          draggable: true,
          swipeToSlide: true,
          touchThreshold: 100,
          autoplay: false,
          autoplaySpeed: 0,
          cssEase: 'linear',
          prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-light fa-chevron-left"></i></span></div>',
          nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-light fa-chevron-right"></i></span></div>',
        });
        slickInitialized = true;
      }
    } else {
      if (slickInitialized) {
        $slider.slick('unslick');
        slickInitialized = false;
      }
    }
  }

  initSlider();
  jQuery(window).on("resize", function () {
    initSlider();
  });


  jQuery('.case-studies-lists').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    speed: 1000,
    dots: false,
    variableWidth: true,
    infinite: false,
    prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-light fa-chevron-left"></i></span></div>',
    nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-light fa-chevron-right"></i></span></div>',
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          variableWidth: false,
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
          variableWidth: false,
        }
      }
    ]

  });


  jQuery('.awards-lists').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false,
    speed: 1000,
    dots: false,
    autoplay: true,
    variableWidth: true,
    draggable: true,
    infinite: true,
    prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-light fa-chevron-left"></i></span></div>',
    nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-light fa-chevron-right"></i></span></div>',
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          adaptiveHeight: false,
          arrows: false,
          variableWidth: false,
          infinite: true,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          adaptiveHeight: false,
          arrows: false,
          variableWidth: false,
          infinite: true,
        }
      }
    ]

  });




});

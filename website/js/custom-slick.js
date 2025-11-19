jQuery(document).ready(function () {

  

  /* Our Stories Slider */
  function SitesSlider() {
    var $el = jQuery('.stories-slider-row'),
      w = jQuery(window).width(),
      count = $el.children().length;
    if ($el.hasClass('slick-initialized')) $el.slick('unslick');
    if (w > 767 && count > 2) {
      $el.removeClass('few-story').slick({
        slidesToShow: 1,
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


  jQuery('.resources-slider-row').slick({
    slidesToShow: 1,
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
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
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

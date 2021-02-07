// import bedImg2 from '../../../images/bed-2.png';
// import metrajeImg2 from '../../../images/metraje-2.png';

function initInsideSlider() {
  var rev = $('.rev_slider');
  rev.on('init', function(event, slick) {
    var cur = $(slick.$slides[slick.currentSlide]);
    var next = cur.next();
    var prev = cur.prev();
    prev.addClass('slick-sprev');
    next.addClass('slick-snext');
    cur.removeClass('slick-snext').removeClass('slick-sprev');
    slick.$prev = prev;
    slick.$next = next;
  }).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
    var cur = $(slick.$slides[nextSlide]);
    slick.$prev.removeClass('slick-sprev');
    slick.$next.removeClass('slick-snext');
    var next = cur.next();
    var prev = cur.prev();
    prev.prev();
    prev.next();
    prev.addClass('slick-sprev');
    next.addClass('slick-snext');
    slick.$prev = prev;
    slick.$next = next;
    cur.removeClass('slick-next').removeClass('slick-sprev');
  }).on('setPosition', function (event, slick) {
    slick.$slides.css('height', slick.$slideTrack.height() + 'px');
  });

  rev.slick({
    speed: 1000,
    arrows: true,
    dots: false,
    focusOnSelect: true,
    infinite: true,
    centerMode: true,
    slidesPerRow: 1,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerPadding: '0',
    swipe: true,
    customPaging: function() {
        return '';
    },
  });
}

function initOutsideSlider() {
  var rev2 = $('.rev_slider2');
  rev2.on('init', function(event, slick) {
    var cur = $(slick.$slides[slick.currentSlide]);
    var next = cur.next();
    var prev = cur.prev();
    prev.addClass('slick-sprev');
    next.addClass('slick-snext');
    cur.removeClass('slick-snext').removeClass('slick-sprev');
    slick.$prev = prev;
    slick.$next = next;
  }).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
    var cur = $(slick.$slides[nextSlide]);
    slick.$prev.removeClass('slick-sprev');
    slick.$next.removeClass('slick-snext');
    var next = cur.next();
    var prev = cur.prev();
    prev.prev();
    prev.next();
    prev.addClass('slick-sprev');
    next.addClass('slick-snext');
    slick.$prev = prev;
    slick.$next = next;
    cur.removeClass('slick-next').removeClass('slick-sprev');
  }).on('setPosition', function (event, slick) {
    slick.$slides.css('height', slick.$slideTrack.height() + 'px');
  });

  rev2.slick({
    speed: 1000,
    arrows: true,
    dots: false,
    focusOnSelect: true,
    infinite: true,
    centerMode: true,
    slidesPerRow: 1,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerPadding: '0',
    swipe: true,
    customPaging: function() {
        return '';
    },
    /*infinite: false,*/
  });
}

export default {
    initGallery() {
      initInsideSlider();
      initOutsideSlider();

      $('#pills-inside-tab').click(function(){
        $('.rev_slider').slick('refresh');
      });
      $('#pills-outside-tab').click(function(){
        $('.rev_slider').slick('refresh');
      });
    },
    initModels() {
        var carousel = $('.toratto-section-model-carousel');
        carousel.slick({
            centerMode: true,
            centerPadding: '0px',
            slidesPerRow: 1,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            infinite: true,
            swipe: true,
        });
    },
}

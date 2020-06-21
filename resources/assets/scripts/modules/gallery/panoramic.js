/* eslint-disable no-unused-vars */
import { Viewer } from 'photo-sphere-viewer';

function psInit(id) {
  const selector = '#panoramic-viewer-'+id;
  const dviewer = document.querySelector(selector);
  if (dviewer !== null) {
    let photoUrl = dviewer.getAttribute('data-photo');
    let caption = dviewer.getAttribute('data-caption');
    if(photoUrl.length > 0) {
      new Viewer({
        container: dviewer,
        panorama: photoUrl,
        defaultZoomLvl: 0,
        navbar: [
          'autorotate',
          'zoom',
          'fullscreen',
        ],
        caption,
        mousewheel: false,
      });
    }
  }
}

function initSlickSliders() {
  $('.ps-slider-single').on('init', function(event, slick) {
    var currrentNavSlideElem = '.ps-slider-nav .slick-slide[data-slick-index="' + slick.currentSlide + '"]';
    $('.ps-slider-nav .slick-slide.is-active').removeClass('is-active');
    $(currrentNavSlideElem).addClass('is-active');
  });

  $('.ps-slider-single').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: false,
    adaptiveHeight: true,
    infinite: false,
    useTransform: true,
    speed: 400,
    swipe: false,
    cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
 });

 $('.ps-slider-nav')
   .on('init', function (event, slick) {
     $('.slider-nav .slick-slide.slick-current').addClass('is-active');
   })
   .slick({
     slidesToShow: 4,
     slidesToScroll: 4,
     dots: false,
     focusOnSelect: false,
     infinite: false,
     responsive: [{
       breakpoint: 1024,
       settings: {
         slidesToShow: 4,
         slidesToScroll: 4,
       },
     }, {
       breakpoint: 640,
       settings: {
         slidesToShow: 4,
         slidesToScroll: 4,
       },
     }, {
       breakpoint: 420,
       settings: {
         slidesToShow: 3,
         slidesToScroll: 3,
       },
     }],
   });

  $('.ps-slider-single').on('afterChange', function (event, slick, currentSlide) {
    $('.ps-slider-nav').slick('slickGoTo', currentSlide);
    var currrentNavSlideElem = '.ps-slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
    $('.ps-slider-nav .slick-slide.is-active').removeClass('is-active');
    $(currrentNavSlideElem).addClass('is-active');
  });

  $('.ps-slider-nav').on('click', '.slick-slide', function (event) {
    event.preventDefault();
    var goToSingleSlide = $(this).data('slick-index');

    $('.ps-slider-single').slick('slickGoTo', goToSingleSlide);
  });
}

export default {
  initPanoramic() {
    $('[id^=panoramic-viewer-]').each(function(index){
      psInit(index);
    });
    initSlickSliders();
  },
}

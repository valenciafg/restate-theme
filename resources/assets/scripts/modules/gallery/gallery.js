import bedImg2 from '../../../images/bed-2.png';
import metrajeImg2 from '../../../images/metraje-2.png';

export default {
    initGallery() {
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
            /*infinite: false,*/
        });

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
    },
    initModels() {
        var carousel = $('.toratto-section-model-carousel');
        var selectBuilding = $('select[name="toratto-quotation-form-model"]');
        carousel.slick({
            centerMode: true,
            centerPadding: '0px',
            slidesPerRow: 1,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            infinite: true,
            swipe: true,
        });

        carousel.on('afterChange', function(event, slick, currentSlide) {
            var elSlide = $(slick.$slides[currentSlide]);
            var name = elSlide.data('name');
            var room_number = elSlide.data('room_number');
            var total_area = elSlide.data('total_area');
            // var starting_price_usd = elSlide.data('starting_price_usd');

            // $('.toratto-quotation-form-name').html(name);
            // $('input[name="toratto-quotation-form-name"').val(name);
            $('select[name="toratto-quotation-form-model"]').val(name);
            $('.toratto-model-info-name').html(name);
            var info = $('.toratto-model-info');
            var info_content = '';
            if (room_number) {
                info_content += `
                <li class="nav-item">
                  <img src="${bedImg2}" style="width:50px; height:50px;">
                  ${room_number} Dormitorios
                </li>`;
            }
            if (total_area) {
                info_content += `
                <li class="nav-item">
                  <img src="${metrajeImg2}" style="width:50px; height:50px;">
                  Desde ${total_area} m&sup2;
                </li>`;
            }
            /*
            if (starting_price_usd) {
                info_content += `
                <li class="nav-item">
                  Desde ${starting_price_usd} USD
                </li>`;
            }
            */
            info.html(info_content);
        });

        selectBuilding.change(function() {
          let value = $(this).val();
          if (value.length > 0) {
            $('.toratto-section-model-carousel').slick('slickGoTo', value);
            var currrentNavSlideElem = '.toratto-section-model-carousel .slick-slide[data-slick-index="' + value + '"]';
            $('.toratto-section-model-carousel .slick-slide.is-active').removeClass('is-active');
            $(currrentNavSlideElem).addClass('is-active');
          }
        });
    },
}

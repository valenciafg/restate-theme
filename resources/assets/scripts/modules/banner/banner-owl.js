import 'jquery';
import 'owl.carousel';

export default {
    initOwl() {
        $('.toratto-section-home-banner.owl-carousel').on('initialized.owl.carousel', () => {
            setTimeout(() => {
                $('.owl-item.active .owl-slide-animated').addClass('is-transitioned');
                $('section').show();
            }, 200);
        });

        const owlCarousel = jQuery('.toratto-section-home-banner.owl-carousel').owlCarousel({
            items:1,
            loop:true,
            //  margin:10,
            //autoplay:true,
            //autoplayTimeout:5000,
            //autoplayHoverPause:true,
            nav: true,
            navText: [
                '<svg width="50" height="50" viewBox="0 0 24 24"><path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"/></svg>',
                '<svg width="50" height="50" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg>',
            ],
        });

        $(owlCarousel).on('changed.owl.carousel', e => {
            $('.owl-slide-animated').removeClass('is-transitioned');
            const currentOwlItem = $('.owl-item').eq(e.item.index);
            currentOwlItem.find('.owl-slide-animated').addClass('is-transitioned');
            //  const $target = currentOwlItem.find('.owl-slide-text');
        });
    },
}

import 'jquery';

export default {
    initBannerVegas() {
        var banner = $('.toratto-project-slider');
        var info = $('.toratto-project-slider-info');
        var overlay = info.data('overlay');
        var slides = info.data('images');
        banner.vegas({
            overlay,
            slides,
            transition: 'zoomOut',
        });
    },
};
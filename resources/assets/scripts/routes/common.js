import bannerOwl from '../modules/banner/banner-owl';
import panoramic from '../modules/gallery/panoramic';
import popup  from '../modules/common/popup';

export default {
  init() {
    // JavaScript to be fired on all pages
    bannerOwl.initOwl();
    panoramic.initPanoramic();
    popup.closePopup();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

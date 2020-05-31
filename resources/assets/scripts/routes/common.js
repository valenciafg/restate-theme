import navbar from '../modules/common/navbar';
import bannerOwl from '../modules/banner/banner-owl';
import panoramic from '../modules/gallery/panoramic';
import popup  from '../modules/common/popup';
import whatsapp from '../modules/common/whatsapp';

export default {
  init() {
    // JavaScript to be fired on all pages
    navbar.addScrolled();
    bannerOwl.initOwl();
    panoramic.initPanoramic();
    popup.closePopup();
    whatsapp.initWhatsapp();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

import navbar from '../modules/common/navbar';
import bannerOwl from '../modules/banner/banner-owl';
import panoramic from '../modules/gallery/panoramic';
import popup  from '../modules/common/popup';
import whatsapp from '../modules/common/whatsapp';
import liveChat from '../modules/common/livechat';
// import projectCarousel from '../modules/project/carousel';
import bannerVegas from '../modules/project/bannerVegas';
import gallery from '../modules/gallery/gallery';

export default {
  init() {
    // JavaScript to be fired on all pages
    navbar.addScrolled();
    bannerOwl.initOwl();
    panoramic.initPanoramic();
    popup.closePopup();
    whatsapp.initWhatsapp();
    //  projectCarousel.initProjectCarousel();
    bannerVegas.initBannerVegas();
    gallery.initGallery();
    gallery.initModels();
    liveChat.addLiveChatEvents();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

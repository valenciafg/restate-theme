//  import bannerVegas from '../modules/banner/banner-vegas';
import bannerOwl from '../modules/banner/banner-owl';

export default {
  init() {
    // JavaScript to be fired on all pages
    //  console.log('bannerVegas');
    //  bannerVegas.initVegas();
    console.log('bannerOwl');
    bannerOwl.initOwl();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

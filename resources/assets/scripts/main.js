// import external dependencies
import 'jquery';
import 'owl.carousel/dist/owl.carousel';
import 'vegas/dist/vegas';
import 'slick-carousel/slick/slick.min';
import 'three/build/three';
import 'uevent';
import 'photo-sphere-viewer/dist/photo-sphere-viewer';
import '@fancyapps/fancybox/dist/jquery.fancybox';
import 'ionicons';
import 'floating-whatsapp/floating-wpp';
//  import 'photoswipe/dist/photoswipe';
//  import 'photoswipe/dist/photoswipe-ui-default';
//  import '@fancyapps/fancybox';
// import then needed Font Awesome functionality
import { library, dom } from '@fortawesome/fontawesome-svg-core';
// import the Facebook and Twitter icons
import * as brands from '@fortawesome/free-brands-svg-icons';


// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import singleResProject from './routes/singleResProject';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  singleResProject,
});

library.add(...brands);
// tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();
// Load Events
jQuery(document).ready(() => routes.loadEvents());

import call from '../modules/common/clickToCall';

export default {
  init() {
    // JavaScript to be fired on the home page
    call.initCall();
    call.initHanup();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

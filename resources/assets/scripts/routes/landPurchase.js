import ajax from '../modules/form/ajax';

export default {
  init() {
    // JavaScript to be fired on the home page
    ajax.initAjaxLandPurchaseForm();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

import ajax from '../modules/form/ajax';
import model from '../modules/form/model';

export default {
  init() {
    // JavaScript to be fired on the home page
    ajax.initAjaxQuotationForm();
    model.initModelList();
    model.initModelLink();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

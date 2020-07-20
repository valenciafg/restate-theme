import ajax from '../modules/form/ajax';
import model from '../modules/form/model';
import call from '../modules/common/clickToCall';

export default {
  init() {
    // JavaScript to be fired on the home page
    ajax.initAjaxQuotationForm();
    model.initModelList();
    model.initModelLink();
    call.initCall();
    call.initHanup();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

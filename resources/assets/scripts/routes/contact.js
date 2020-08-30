import ajax from '../modules/form/ajax';
import project from '../modules/form/project';

export default {
  init() {
    // JavaScript to be fired on the home page
    ajax.initAjaxContactForm();
    project.initProjectList();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

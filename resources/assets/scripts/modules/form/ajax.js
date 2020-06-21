/* eslint-disable no-unused-vars */
/* eslint-disable no-undef */
export default {
  initAjaxQuotationForm () {
    $('#toratto-modal-form').submit(function(e) {
      e.preventDefault();

      var isChecked = $('input[name="toratto-quotation-form-terms-check"]:checked').length > 0;
      if (isChecked) {
        const sitekey = $('#btn-toratto-submit-form').data('sitekey');
        grecaptcha.ready(function() {
          grecaptcha.execute(sitekey, {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
              $.ajax({
                data: {
                  action: 'toratto_quotation_form',
                  category: 3,
                  },
                method : 'POST',
                url : sage_vars.ajaxurl,
                success: function(result){
                  console.log('result', result);
                },
            });
          });
        });
      } else {
        alert('Debe aceptar los terminos y condiciones');
      }
    });
  },
}

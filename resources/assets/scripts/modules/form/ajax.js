/* eslint-disable no-unused-vars */
/* eslint-disable no-undef */
export default {
  initAjaxQuotationForm () {
    $('#toratto-modal-form').submit(function(e) {
      e.preventDefault();
      var isChecked = $('input[name="toratto-quotation-form-terms-check"]:checked').length > 0;
      if (isChecked) {
        const sitekey = $('#btn-toratto-submit-form').data('sitekey');
        var form = $(this);
        grecaptcha.ready(function() {
          grecaptcha.execute(sitekey, {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
              $.ajax({
                data: {
                  action: 'toratto_quotation_form',
                  form: form.serialize(),
                },
                method : 'POST',
                url : sage_vars.ajaxurl,
                success: function(result){
                  console.log(result);
                  if (result.status === 'error') {
                    alert('La cotización no pudo ser enviada.');
                  } else {
                    alert('Cotización enviada, en breve será contactado por nuestros asesores.')
                  }

                },
                error : function(jqXHR, status, error) {
                  console.log('Ha ocurrido un problema', status, error);
                },
            });
          });
        });
      } else {
        alert('Debe aceptar los terminos y condiciones');
      }
    });
  },
  initAjaxContactForm () {
    $('#toratto-contact-form').submit(function(e) {
      e.preventDefault();
      var isChecked = $('input[name="terms-check"]:checked').length > 0;
      if (isChecked) {
        // const sitekey = $('#btn-toratto-submit-form').data('sitekey');
        var form = $(this);
        $.ajax({
          data: {
            action: 'toratto_contact_form',
            form: form.serialize(),
          },
          method : 'POST',
          url : sage_vars.ajaxurl,
          success: function(result){
            console.log(result);
            if (result.status === 'error') {
              alert('La solicitud no pudo ser enviada.');
            } else {
              alert('Solicitud enviada, en breve será contactado por nuestros asesores.')
            }
          },
          error : function(jqXHR, status, error) {
            console.log('Ha ocurrido un problema', status, error);
          },
      });
        /*grecaptcha.ready(function() {
          grecaptcha.execute(sitekey, {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
              $.ajax({
                data: {
                  action: 'toratto_quotation_form',
                  form: form.serialize(),
                },
                method : 'POST',
                url : sage_vars.ajaxurl,
                success: function(result){
                  console.log(result);
                  if (result.status === 'error') {
                    alert('La cotización no pudo ser enviada.');
                  } else {
                    alert('Cotización enviada, en breve será contactado por nuestros asesores.')
                  }

                },
                error : function(jqXHR, status, error) {
                  console.log('Ha ocurrido un problema', status, error);
                },
            });
          });
        });
        */
      } else {
        alert('Debe aceptar los terminos y condiciones');
      }
    });
  },
  initAjaxLandPurchaseForm () {
    $('#toratto-land-purchase-form').submit(function(e) {
      e.preventDefault();
      var isChecked = $('input[name="terms-check"]:checked').length > 0;
      if (isChecked) {
        // const sitekey = $('#btn-toratto-submit-form').data('sitekey');
        var form = $(this);
        $.ajax({
          data: {
            action: 'toratto_land_purchase_form',
            form: form.serialize(),
          },
          method : 'POST',
          url : sage_vars.ajaxurl,
          success: function(result){
            console.log(result);
            if (result.status === 'error') {
              alert('La solicitud no pudo ser enviada.');
            } else {
              alert('Solicitud enviada, en breve será contactado por nuestros asesores.')
            }
          },
          error : function(jqXHR, status, error) {
            console.log('Ha ocurrido un problema', status, error);
          },
        });
      } else {
        alert('Debe aceptar los terminos y condiciones');
      }
    });
  },
}

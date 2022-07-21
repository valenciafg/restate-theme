/* eslint-disable no-unused-vars */
/* eslint-disable no-undef */
import Dropzone from 'dropzone/dist/dropzone';
Dropzone.autoDiscover = false;

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
                beforeSend: function() {
                  $('#btn-toratto-submit-form').attr('disabled', true);
                  $('#btn-toratto-submit-form').html('Cargando');
                },
                success: function(result){
                  console.log(result);
                  $('#btn-toratto-submit-form').removeAttr('disabled');
                  $('#btn-toratto-submit-form').html('Enviar');
                  if (result.status === 'error') {
                    alert('La cotización no pudo ser enviada.');
                  } else {
                    $('#fullname').val('');
                    $('#phone').val('');
                    $('#email').val('');
                    $('#message').val('');
                    alert('Cotización enviada, en breve será contactado por nuestros asesores.');
                  }

                },
                error : function(jqXHR, status, error) {
                  $('#btn-toratto-submit-form').removeAttr('disabled');
                  $('#btn-toratto-submit-form').html('Enviar');
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
          beforeSend: function() {
            $('#btn-toratto-submit-contact-form').attr('disabled', true);
            $('#btn-toratto-submit-contact-form').html('Cargando');
          },
          success: function(result){
            console.log(result);
            $('#btn-toratto-submit-contact-form').removeAttr('disabled');
            $('#btn-toratto-submit-contact-form').html('Enviar');
            if (result.status === 'error') {
              alert('La solicitud no pudo ser enviada.');
            } else {
              alert('Solicitud enviada, en breve será contactado por nuestros asesores.')
            }
          },
          error : function(jqXHR, status, error) {
            $('#btn-toratto-submit-contact-form').removeAttr('disabled');
            $('#btn-toratto-submit-contact-form').html('Enviar');
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
    $('#media-uploader').dropzone({
      url: sage_vars.upload,
      uploadMultiple: false,
      maxFiles: 1,
      acceptedFiles: 'image/*',
      success: function (file, response) {
        file.previewElement.classList.add('dz-success');
        file['attachment_id'] = response; // push the id for future reference
        var ids = response;
        jQuery('#media-ids').val(ids);
      },
      error: function (file, response) {
        file.previewElement.classList.add('dz-error');
      },
      // update the following section is for removing image from library
      addRemoveLinks: true,
      removedfile: function(file) {
        var attachment_id = file.attachment_id;
        jQuery.ajax({
            type: 'POST',
            url: sage_vars.delete,
            data: {
              media_id : attachment_id,
            },
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
      },
    });
    //
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
  initAjaxComplaintsBookFrom () {
    $('#toratto-complaints-book-form').submit(function(e) {
      e.preventDefault();

      var isChecked = $('input[name="terms-check"]:checked').length > 0;
      if (isChecked) {
        const inputs = [
          'project',
          'consumer-name',
          'consumer-lastname',
          'consumer-phone',
          'consumer-email',
          'consumer-address',
          'consumer-doc-type',
          'consumer-document',
          'consumer-tutor-fullname',
          'consumer-tutor-document',
          'land-type',
          'land-description',
          'claim-type',
          'claim-description',
          'claim-detail',
          'claim-order',
        ]
        var form = $(this);
        $.ajax({
          data: {
            action: 'toratto_complaints_book_from',
            form: form.serialize(),
          },
          method : 'POST',
          url : sage_vars.ajaxurl,
          beforeSend: function() {
            $('#btn-toratto-submit-book-form').attr('disabled', true);
            $('#btn-toratto-submit-book-form').html('Cargando');
          },
          success: function(result){
            console.log(result);
            $('#btn-toratto-submit-book-form').removeAttr('disabled');
            $('#btn-toratto-submit-book-form').html('Enviar');
            if (result.status === 'error') {
              alert('La solicitud no pudo ser enviada.');
            } else {
              alert('Solicitud enviada, en breve será contactado por nuestros asesores.')
            }
          },
          error : function(jqXHR, status, error) {
            $('#btn-toratto-submit-book-form').removeAttr('disabled');
            $('#btn-toratto-submit-book-form').html('Enviar');
            console.log('Ha ocurrido un problema', status, error);
          },
      });
      } else {
        alert('Debe aceptar los terminos y condiciones');
      }
    })
  },
}

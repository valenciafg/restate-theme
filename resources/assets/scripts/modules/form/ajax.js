/* eslint-disable no-unused-vars */
/* eslint-disable no-undef */
import Dropzone from 'dropzone/dist/dropzone';

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
    /*
    Dropzone.options.torattoLandPurchaseform = {
      uploadMultiple: true,
      maxFiles: 5,
      acceptedFiles: 'image/*',
      init:function(){
        var self = this;
        // config
        self.options.addRemoveLinks = true;
        self.options.dictRemoveFile = 'Delete';
        //New file added
        self.on('addedfile', function (file) {
          console.log('new file added ', file);
        });
        // Send file starts
        self.on('sending', function (file) {
          console.log('upload started', file);
          $('.meter').show();
        });

        // File upload Progress
        self.on('totaluploadprogress', function (progress) {
          console.log('progress ', progress);
          $('.roller').width(progress + '%');
        });

        self.on('queuecomplete', function (progress) {
          $('.meter').delay(999).slideUp(999);
        });

        // On removing file
        self.on('removedfile', function (file) {
          console.log(file);
        });
      },
    };
    *///url : sage_vars.ajaxurl,
    /*
    $('#dZUpload').dropzone({
      url: '/',
      acceptedFiles: 'image/*',
      addRemoveLinks: true,
      success: function (file, response) {
          var imgName = response;
          file.previewElement.classList.add('dz-success');
          console.log('Successfully uploaded :' + imgName);
      },
      error: function (file, response) {
          file.previewElement.classList.add('dz-error');
      },
    });
    */
    Dropzone.autoDiscover = false;
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
}

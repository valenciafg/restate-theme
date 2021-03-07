import 'jquery';

export default {
    closePopup() {
        $('.pop-up .close').click(function(){
            $('.pop-up').removeClass('open');
        });
    },
    openPopup() {
      $('#main-popup').fancybox({
        closeBtn:'<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',
        // Clicked on the content
        clickContent: function() {
          var href = $('#main-popup-url').attr('href');
          if (href){
            console.log('href', href);
            window.location.href = href;
          }
          return false;
        },
      }).trigger('click');
    },
}

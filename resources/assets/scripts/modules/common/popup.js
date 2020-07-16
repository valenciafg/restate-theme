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
      }).trigger('click');
    },
}

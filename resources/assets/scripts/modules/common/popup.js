import 'jquery';

export default {
    closePopup() {
        $('.pop-up .close').click(function(){
            $('.pop-up').removeClass('open');
        });
    },
}
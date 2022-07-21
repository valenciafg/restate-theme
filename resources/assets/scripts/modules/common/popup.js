import 'jquery';

export default {
    closePopup() {
        $('.pop-up .close').click(function(){
            $('.pop-up').removeClass('open');
        });
    },
    openPopup() {
      const data = $('#main-popup-data');
      const img = data.data('img');
      if (img) {
        console.log('img', img)
        $.fancybox.open([
          {
            src: img,
            opts: {
              buttons: [
                'close',
              ],
              protect: true,
              animationEffect: false,
              clickContent: false,
            },
          },
        ]);
        $('.fancybox-content').on('click', function() {
          const url = data.data('url');
          if (url && url !== '#'){
            console.log('href', url);
            window.location.href = `${url}?campaing=true`;
          }
        })
      }
    },
}

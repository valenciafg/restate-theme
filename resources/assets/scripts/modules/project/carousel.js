import 'jquery';
import 'owl.carousel';

export default {
  initProjectCarousel() {
    let owl = $('.toratto-section-model-carousel');
    owl.owlCarousel({
        margin:10,
        loop:true,
        dots: true,
        nav: true,
        items: 1,
    });
    owl.on('changed.owl.carousel', e => {
        const currentOwlItem = $('.owl-item').eq(e.item.index);
        const item = currentOwlItem.find('.item');
        const name = item.data('name');
        $('.toratto-quotation-form-name').html(name);
        $('input[name="toratto-quotation-form-name"]').val(name);
    });
  },
}

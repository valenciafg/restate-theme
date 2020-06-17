import 'jquery';

export default {
    addScrolled() {
        //single-post
        let nav = $('.navbar.navbar-toratto.navbar-fixed-top');
        let logoPrimary = $('.toratto-logo-primary');
        let logoSecundary = $('.toratto-logo-secundary');
        //  Verifica que la pagina no sea un post del blog
        if ($('.single-post').length > 0
          || $('.page-template-legal').length > 0
          || $('.page-template-blog').length > 0
          || $('.page-template-projects').length > 0
          || $('.page-template-us').length > 0
          || $('.page-template-contact').length > 0
        ) {
            nav.addClass('scrolled');
            logoPrimary.hide();
            logoSecundary.show();
        } else {
            var scrollTop = 0;
            $(window).scroll(function () {
                scrollTop = $(window).scrollTop();

                if (scrollTop >= 100) {
                    nav.addClass('scrolled');
                    logoPrimary.hide();
                    logoSecundary.show();
                } else if (scrollTop < 100) {
                    nav.removeClass('scrolled');
                    logoPrimary.show();
                    logoSecundary.hide();
                }
            });
        }
    },
}

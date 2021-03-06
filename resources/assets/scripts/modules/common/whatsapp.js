import 'jquery';

export default {
    initWhatsapp() {
        const ws = $('.toratto-whatsapp-button');
        const phone = ws.data('phone');
        const popupMessage = ws.data('popup-message');
        const message = ws.data('message');
        ws.floatingWhatsApp({
            phone,
            position: 'right',
            popupMessage,
            message,
            showPopup: false,
            autoOpenTimeout: 8000,
            size: '65px',
            zIndex: 10,
        });
    },
}

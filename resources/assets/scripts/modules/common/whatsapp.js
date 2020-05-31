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
            showPopup: true,
            autoOpenTimeout: 8000,
            size: '50px',            
            zIndex: 10,
        });
    },
}
import 'jquery';

export default {
    addLiveChatEvents() {
        console.log('addLiveChatEvents');
        var asd = $('.o_thread_window');
        console.log('asd', asd);
        var closeChat = $('.o_thread_window_close');
        console.log('close_chat', closeChat);
        var x = document.getElementsByClassName('o_thread_window_close');
        console.log('x', x);
        /*
        closeChat.click(function() {
            console.log('***********');
            $('.openerp.o_livechat_button.d-print-none').show();
        });
        */
    },
};
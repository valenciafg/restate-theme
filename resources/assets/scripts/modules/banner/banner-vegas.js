import 'jquery';
import 'vegas/dist/vegas';

export default {
    initVegas() {
        var vegas_src = jQuery('.vegas-images');
        if (vegas_src.length > 0) {
            var slides = vegas_src.attr('data-img');
            var data = slides.split(',');
            var array_src = [];
            var row = {};
            for (var i = 0; i < data.length; i++) {
                row.src = data[i];
                array_src.push(row);
                row = {};
            }
            var vegas_overlay = jQuery('.vegas-overlays');
            var overlay = vegas_overlay.attr('data-overlay');
            jQuery('.voyage-slider').vegas({
                overlay: overlay,
                slides: array_src,
            });
        } else {
            console.log('sin imagenes para vegas');
            let img_list = [
                'https://www.grupotoratto.com/uploads/banner/banner1600x870.jpg',
                'https://www.grupotoratto.com/uploads/desktop-min.jpg',
                'https://www.grupotoratto.com/uploads/desktop-min-min.jpg',
            ]
            console.log('img_list', img_list);
            jQuery('.voyage-slider').vegas({
                //  overlay: overlay,
                slides: [
                    'https://www.grupotoratto.com/uploads/banner/banner1600x870.jpg',
                    'https://www.grupotoratto.com/uploads/desktop-min.jpg',
                    'https://www.grupotoratto.com/uploads/desktop-min-min.jpg',
                ],
            });
        }
    },
}
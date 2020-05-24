import { Viewer } from 'photo-sphere-viewer';

export default {
    initPanoramic() {
        const dviewer = document.querySelector('#panoramic-viewer');
        if (dviewer !== null) {
            let photoUrl = dviewer.getAttribute('data-photo');
            let caption = dviewer.getAttribute('data-caption');
            new Viewer({
                container: dviewer,
                panorama: photoUrl,
                defaultZoomLvl: 0,
                navbar: [
                    'autorotate',
                    'zoom',
                    'fullscreen',
                ],
                caption,
                mousewheel: false,
            });
        }
    },
}
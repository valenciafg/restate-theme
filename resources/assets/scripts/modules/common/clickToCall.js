import { Web } from 'sip.js';

// WebSocket server to connect with
const server = 'wss://pbx.grupotoratto.com:7443';

let simpleUser;

// Connect to server and place call

export default {
  initCall() {
    const remoteAudio = document.getElementById('remoteAudio');
    $('.toratto-call').click(function(e) {
      e.preventDefault();
      // Construct a SimpleUser instance
      simpleUser = new Web.SimpleUser(server, {
        aor: 'sip:124@pbx.grupotoratto.com', // caller
        media: {
          constraints: { audio: true, video: false }, // audio only call
          remote: { audio: remoteAudio }, // play remote audio
        },
        userAgentOptions: {
          authorizationPassword: 'gt123456',
          authorizationUsername: '124',
        },
      });
      simpleUser.connect()
      .then(() => {
        $('.icon-wrapper-call').hide();
        $('.icon-wrapper-hangup').show();
        // simpleUser.register();
        simpleUser.call('sip:126@pbx.grupotoratto.com');
      })
      .catch((error) => {
        // Call failed
        console.error('Failure', error)
      });
    });
  },
  initHanup() {
    $('.toratto-hangup').click(function(e) {
      e.preventDefault();

      simpleUser.hangup()
      .then(() => {
        $('.icon-wrapper-hangup').hide();
        $('.icon-wrapper-call').show();
      })
      .catch((error) => {
        // Call failed
        console.error('Failure', error)
      });
    });
  },
}


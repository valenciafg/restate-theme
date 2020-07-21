import { Web } from 'sip.js';

// Helper function to get an HTML audio element
function getAudioElement(id) {
  const el = document.getElementById(id);
  // console.log(el instanceof HTMLAudioElement)
  // console.log(el.constructor.name);
  if (!(el instanceof HTMLAudioElement)) {
    // throw new Error(`Element "${id}" not found or not an audio element.`);
    console.log(`Element "${id}" not found or not an audio element.`);
  }
  return el;
}

// Options for SimpleUser
const options = {
  aor: 'sip:110@pbx.cinusual.com', // caller
  media: {
    constraints: { audio: true, video: false }, // audio only call
    remote: { audio: getAudioElement('remoteAudio') }, // play remote audio
  },
  userAgentOptions: {
    authorizationPassword: 'gt123456',
    authorizationUsername: '110',
  },
};

// WebSocket server to connect with
const server = 'wss://pbx.cinusual.com:7443';

// Construct a SimpleUser instance


// Connect to server and place call


// export default {
//   initCall() {
//     simpleUser.connect()
//       .then(() => simpleUser.call('sip:100@pbx.cinusual.com'))
//       .catch((error) => {
//         // Call failed
//         console.error('Failure', error)
//       });
//   },
// }
export default {
  initCall() {
    $('.toratto-call').click(function(e) {
      e.preventDefault();
      const simpleUser = new Web.SimpleUser(server, options);
      simpleUser.connect()
      .then(() => {
        $('.icon-wrapper-call').hide();
        $('.icon-wrapper-hangup').show();
        simpleUser.register();
        simpleUser.call('sip:100@pbx.cinusual.com');
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
/*
      simpleUser.hangup()
      .then(() => {
        $('.icon-wrapper-hangup').hide();
        $('.icon-wrapper-call').show();
      })
      .catch((error) => {
        // Call failed
        console.error('Failure', error)
      });
      */
    });
  },
}


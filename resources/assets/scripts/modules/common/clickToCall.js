/* eslint-disable no-undef */
import { Web } from 'sip.js';

// WebSocket server to connect with
const server = `wss://${sage_vars.pbx_server}:${sage_vars.pbx_port}`;

let simpleUser;

// Connect to server and place call

export default {
  initCall() {
    const remoteAudio = document.getElementById('remoteAudio');
    const ext = $('#remoteAudio').data('ext');
    $('.toratto-call').click(function(e) {
      e.preventDefault();
      // Construct a SimpleUser instance
      simpleUser = new Web.SimpleUser(server, {
        aor: `sip:${sage_vars.pbx_aor}@${sage_vars.pbx_server}`, // caller
        media: {
          constraints: { audio: true, video: false }, // audio only call
          remote: { audio: remoteAudio }, // play remote audio
        },
        userAgentOptions: {
          authorizationPassword: `${sage_vars.pbx_password}`,
          authorizationUsername: `${sage_vars.pbx_username}`,
        },
      });
      simpleUser.connect()
      .then(() => {
        $('.icon-wrapper-call').hide();
        $('.icon-wrapper-hangup').show();
        // simpleUser.register();
        simpleUser.call(`sip:${ext}@${sage_vars.pbx_server}`);
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


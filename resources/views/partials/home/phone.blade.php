@php
  $settings = new  App\Controllers\Setting();
  $all_settings = $settings->getAllSettings();
  $ext = $all_settings['pbx_main_extension'];
  $help = $all_settings['pbx_help'];
@endphp
@if (!empty($ext))
<div class="wrapper-call" data-toggle="tooltip" data-placement="bottom" title="{{$help}}">
  <div class="icon-wrapper-call">
    <a href="#" class="toratto-call"><i class="fas fa-phone"></i></a>
  </div>
  <div class="icon-wrapper-hangup" style="display: none">
    <a href="#" class="toratto-hangup"><i class="fas fa-phone-slash"></i></a>
  </div>
</div>
<audio id="remoteAudio" controls style="display: none" data-ext="{{$ext}}">
  <p>Your browser doesn't support HTML5 audio.</p>
</audio>
@endif

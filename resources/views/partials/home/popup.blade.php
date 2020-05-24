@php 
    $settings = new  App\Controllers\Setting();
    $all_settings = $settings->getAllSettings();
@endphp
@if (!empty($all_settings) && $all_settings['show_popup'] !== 'FALSE')
<div class="pop-up open">
  <div class="content">
    <div class="container">      
      <span class="close">
        <i class="far fa-times-circle"></i>
      </span>     
      <img src="{{$all_settings['popup_image']}}" alt="popup">
    </div>
  </div>
</div>
@endif
@php
    $settings = new  App\Controllers\Setting();
    $all_settings = $settings->getAllSettings();
    $popup_url = $all_settings['popup_url'];
@endphp
@if (!empty($popup_url))
<a id="main-popup-url" href="{{$popup_url}}">-</a>
@endif
@if (!empty($all_settings['show_popup']) && $all_settings['show_popup'] !== 'FALSE')
<a id="main-popup" href="{{$all_settings['popup_image']}}" data-pepe="https://fancyapps.com/fancybox/3/docs/#options" data-fancybox="gallery" style="display: none;">
	<img src="{{$all_settings['popup_image']}}" alt="popup"/>
</a>
@endif

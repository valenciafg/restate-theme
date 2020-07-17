@php
    $settings = new  App\Controllers\Setting();
    $all_settings = $settings->getAllSettings();
@endphp
@if (!empty($all_settings['show_popup']) && $all_settings['show_popup'] !== 'FALSE')
<a id="main-popup" href="{{$all_settings['popup_image']}}" data-fancybox="gallery" style="display: none;">
	<img src="{{$all_settings['popup_image']}}" alt="popup"/>
</a>
@endif

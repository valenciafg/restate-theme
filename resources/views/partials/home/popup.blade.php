@php
    $settings = new  App\Controllers\Setting();
    $all_settings = $settings->getAllSettings();
    $popup_url = $all_settings['popup_url'];
    $url = '#';
    if (!empty($popup_url)) {
        $url = $popup_url;
    }
@endphp
@if (!empty($all_settings['show_popup']) && $all_settings['show_popup'] !== 'FALSE')
<div id="main-popup-data" data-img="{{$all_settings['popup_image']}}" data-url="{{$url}}" style="display: none;"></div>
@endif

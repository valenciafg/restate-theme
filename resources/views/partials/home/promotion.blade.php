@php 
    $settings = new  App\Controllers\Setting();
    $all_settings = $settings->getAllSettings();
@endphp
@if (!empty($all_settings['show_promotion']) && $all_settings['show_promotion'] !== 'FALSE')
<section class="toratto-section-home-promotion">
    <img src="{{$all_settings['promotion_image']}}" alt="promotion" style="width: 100%;">
</section>
@endif
@php
  $settings = new  App\Controllers\Setting();
  $all_settings = $settings->getAllSettings();
  $video = $all_settings['promotion_video'];
@endphp
@if (!empty($video))
<section class="toratto-section-home-video">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 text-center">
        <a data-fancybox href="{{$video}}">
          <i class="fas fa-play-circle"></i>
        </a>
      </div>
    </div>
  </div>
</section>
@endif

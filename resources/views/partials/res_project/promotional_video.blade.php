@php
    $video = $project['video'];
    $title = $project['title'];
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

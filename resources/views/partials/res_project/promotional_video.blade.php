@php
    $video = $project['video'];
    $video_background = $project['video_background'];
    $title = $project['title'];
@endphp
@if (!empty($video))
  @if (empty($video_background))
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
  @else
  <section class="toratto-section-home-video-with-bg" style="background-image: url({{$video_background}});">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-3 col-sm-12 text-center">
          <span class="top-title">¡Somos tu mejor opción!</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 text-center middle-button">
          <a data-fancybox href="{{$video}}">
            <i class="fas fa-play-circle"></i>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 text-center">
          <a class="bottom-title" data-fancybox href="{{$video}}">
            VER RECORRIDO VIRTUAL
          </a>
        </div>
      </div>
    </div>
  </section>
  @endif
@endif

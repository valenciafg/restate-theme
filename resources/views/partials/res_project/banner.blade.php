@php
  $gallery = $project['gallery'];
  $excerpt = $project['excerpt'];
  $overlay = get_stylesheet_directory_uri()."/assets/images/06.png";
  $location = !empty($project['categories']['location']) ? $project['categories']['location'][0] : "";
  $stage = !empty($project['categories']['stage']) ? $project['categories']['stage'][0] : "";
  $images = array();
  foreach ($gallery as $image) {
    $images[] = [
      'src' => $image
    ];
  }
  $images = json_encode($images);
  $facade_banner_img = $project['facade_banner_img'];
@endphp
@if (!empty($project['show_facade_banner']) && $project['show_facade_banner'] === 'TRUE' && !empty($facade_banner_img))
  <div class="toratto-project-banner" style="background-image: url({{$facade_banner_img}});background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;">
    @include('partials.res_project.banner.content')
  </div>
@else
  <div class="toratto-project-slider-info" data-overlay="{{$overlay}}" data-images="{{$images}}">
  </div>
  <div class="toratto-project-slider" style="height:100vh;">
    @include('partials.res_project.banner.content')
  </div>
@endif

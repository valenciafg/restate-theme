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
@endphp
<div class="toratto-project-slider-info" data-overlay="{{$overlay}}" data-images="{{$images}}">
</div>
<div class="toratto-project-slider" style="height:100vh;">
    <div class="container align-center toratto-project-banner-container">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="toratto-project-banner-subtitle">
              @if (!empty($location))
              <span class="location">{{$location}}</span>
              @endif
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
            <div class="toratto-project-banner-title">
                {{$project['title']}}
            </div>
            @if ($project['slogan'])
            <p class="toratto-project-banner-subtitle">
                {{$project['slogan']}}
            </p>
            @endif
            @if ($project['brochure'])
            <div class="">
                <a class="btn btn-toratto-green btn-md" href="{{$project['brochure']}}">DESCARGAR BROCHURE</a>
            </div>
            @endif
          </div>
          <div class="col-md-4 col-sm-12">
            <span class="toratto-project-banner-excerpt">
              {{$excerpt}}
            </span>
          </div>
          <div class="col-md-8 col-sm-12">
            <div class="toratto-project-banner-subtitle">
              @if (!empty($stage))
              <span class="stage float-right">{{$stage}}</span>
              @endif
            </div>
          </div>
        </div>
    </div>
</div>

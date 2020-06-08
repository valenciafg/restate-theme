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
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="toratto-project-banner-subtitle">
                    @if (!empty($location))
                    <span class="location"><i class="fas fa-map-marked-alt"></i> {{$location}}</span>
                    @endif
                    @if (!empty($stage))
                    <span class="stage"><i class="fas fa-tag"></i> {{$stage}}</span>
                    @endif
                </div>
                <div class="toratto-project-banner-title">
                    @if ($project['logo'])
                    <img src="{{$project['logo']}}" width="90px" height="70px" alt="logo">
                    @endif
                    {{$project['title']}}
                </div>
                @if ($project['slogan'])
                <p class="toratto-project-banner-subtitle">
                    {{$project['slogan']}}                    
                </p>
                @endif
                @if ($project['brochure'])
                <div class="">
                    <a class="btn btn-outline-success btn-md display-4" href="{{$project['brochure']}}">Brochure</a>
                </div>
                @endif
            </div>
            <div class="col-md-4">
                <span class="toratto-project-banner-excerpt">
                    {{$excerpt}}
                </span>
            </div>
        </div>
    </div>
</div>
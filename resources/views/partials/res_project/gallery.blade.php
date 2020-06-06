@php
    $gallery = $project['gallery'];
    $inside = $project['inside_photos'];
    $outside = $project['outside_photos'];
    $inside_active_tab = "show active";
    $inside_active_nav = "active";
    $outside_active_tab = "";
    $outside_active_nav = "";
    if (empty($inside) && !empty($outside)) {
        $outside_active_tab = "show active";
        $outside_active_nav = "active";
    }
@endphp
@if (!empty($inside) || !empty($outside)) 
<section class="toratto-project-gallery toratto-section-background-00">
    <h1 class="toratto-section-title">Galería</h1>
    <div class="container toratto-project-gallery-container"> 
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="tab-content">
                    @if (!empty($inside))
                    <div class="tab-pane fade {{$inside_active_tab}}" id="pills-home" role="tabpanel" aria-labelledby="pills-inside-tab">
                        <div class="row toratto-main">
                        @foreach ($inside as $photo)
                        <a href="{{$photo['image_url']}}" class="item" data-fancybox="inside_gallery" data-options='{"loop": true}'>
                            <img src="{{$photo['thumbnail_url']}}"/>
                        </a>
                        @endforeach
                        </div>
                    </div>
                    @endif
                    @if (!empty($outside))
                    <div class="tab-pane fade {{$outside_active_tab}}" id="pills-profile" role="tabpanel" aria-labelledby="pills-outside-tab">
                        <div class="row toratto-main">
                        @foreach ($outside as $photo)
                        <a href="{{$photo['image_url']}}" data-fancybox="outside_gallery" data-options='{"loop": true}'>
                            <img src="{{$photo['thumbnail_url']}}"/>
                        </a>
                        @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <ul class="nav nav-pills nav-justified" role="tablist">
                    @if (!empty($inside))
                    <li class="nav-item">
                        <a class="nav-link {{$inside_active_nav}}" id="pills-inside-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            Interiores
                        </a>
                    </li>
                    @endif
                    @if (!empty($outside))
                    <li class="nav-item">
                        <a class="nav-link {{$outside_active_nav}}" id="pills-outside-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Exteriores y Áreas comunes
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>
@endif
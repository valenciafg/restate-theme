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
    <div class="toratto-project-gallery-container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="tab-content">
                    @if (!empty($inside))
                    <div class="tab-pane fade gallery-container {{$inside_active_tab}}" id="pills-home" role="tabpanel" aria-labelledby="pills-inside-tab">
                        <div class="rev_slider">
                        @foreach ($inside as $photo)
                        <div class="rev_slide">
                            <img class="test" src="{{$photo['image_url']}}"/>
                        </div>
                        @endforeach
                        </div>
                    </div>
                    @endif
                    @if (!empty($outside))
                    <div class="tab-pane fade gallery-container {{$outside_active_tab}}" id="pills-profile" role="tabpanel" aria-labelledby="pills-outside-tab">
                        <div class="rev_slider2">
                        @foreach ($outside as $photo)
                        <div class="rev_slide">
                            <img class="test" src="{{$photo['image_url']}}"/>
                        </div>
                        @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <ul class="nav nav-pills" role="tablist">
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

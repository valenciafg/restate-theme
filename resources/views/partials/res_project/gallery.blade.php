@php
    $gallery = $project['gallery'];
@endphp
@if (!empty($gallery))
@php
    $inside = $project['inside_photos'];
    $outside = $project['outside_photos'];
    $col_size = 12;
    if (!empty($inside) && !empty($outside)) {
        $col_size = 6;
    }
@endphp
<section class="toratto-project-gallery toratto-section-background-01">
    <div class="container">
        <h1 class="toratto-section-title">Conoce nuestros espacios</h1>
        <div class="row" style="padding: 15px;">
            @if (!empty($inside))
            <div class="carousel-gallery-inside col-{{$col_size}}">
                <div class="row">
                    <div class="col-12 toratto-section-title">
                        <h4>Interiores</h4>
                    </div>
                </div>
                <div class="row">
                    @foreach ($inside as $photo)
                    <div class="col-4 carousel-gallery-item">
                        <a class="" href="{{$photo['image_url']}}" data-fancybox="inside_gallery" data-options='{"loop": true}'>
                            <div class="image" style="background-image: url({{$photo['thumbnail_url']}})">
                                <div class="overlay">
                                    <i class="fas fa-search-plus"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @if (!empty($outside))
            <div class="carousel-gallery-outside col-{{$col_size}}">
                <div class="row">
                    <div class="col-12 toratto-section-title">
                        <h4>Exteriores</h4>
                    </div>
                </div>
                <div class="row">
                    @foreach ($outside as $photo)
                    <div class="col-4 carousel-gallery-item">
                        <a class="" href="{{$photo['image_url']}}" data-fancybox="outside_gallery" data-options='{"loop": true}'>
                            <div class="image" style="background-image: url({{$photo['thumbnail_url']}})">
                                <div class="overlay">
                                    <i class="fas fa-search-plus"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif
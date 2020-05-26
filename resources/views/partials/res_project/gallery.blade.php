@php
    $gallery = $project['gallery'];
@endphp
@if (!empty($gallery))
@php
    $inside = $project['inside_photos'];
    $outside = $project['outside_photos'];
@endphp
<section class="toratto-section-background-01">
    <div class="container">
        <h1 class="toratto-section-title">Conoce nuestros espacios</h1>
        <div class="carousel-gallery row">
            @if (!empty($inside))
            <div class="carousel-gallery-inside col-xs-6">
            @foreach ($inside as $photo)
                <a class="carousel-gallery-a" href="{{$photo['image_url']}}" data-fancybox="inside_gallery" data-options='{"loop": true}'>
                    <div class="image" style="background-image: url({{$photo['thumbnail_url']}})">
                        <div class="overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </a>
            @endforeach
            <div>
            @endif
            @if (!empty($outside))
            <div class="carousel-gallery-outside col-xs-6">
            @foreach ($outside as $photo)
                <a class="carousel-gallery-a" href="{{$photo['image_url']}}" data-fancybox="outside_gallery" data-options='{"loop": true}'>
                    <div class="image" style="background-image: url({{$photo['thumbnail_url']}})">
                        <div class="overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </a>
            @endforeach
            <div>
            @endif
        </div>
    </div>
</section>
@endif
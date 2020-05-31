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
    <div class="">
        <h1 class="toratto-section-title">Conoce nuestros espacios</h1>
        <div class="row" style="padding: 15px;">
            @if (!empty($inside))
            <div class="carousel-gallery-inside col-md-{{$col_size}} col-sm-12">
                <div class="row">
                    <div class="col-12 toratto-section-title">
                        <h4>Interiores</h4>
                    </div>
                </div>
                <div class="row toratto-main">
                    @foreach ($inside as $photo)
                    <a href="{{$photo['image_url']}}" data-fancybox="inside_gallery" data-options='{"loop": true}'>
                        <img src="{{$photo['thumbnail_url']}}"/>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
            @if (!empty($outside))
            <div class="carousel-gallery-outside col-md-{{$col_size}} col-sm-12">
                <div class="row">
                    <div class="col-12 toratto-section-title">
                        <h4>Exteriores</h4>
                    </div>
                </div>
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
    </div>
</section>
@endif
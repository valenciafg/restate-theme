@php
$gmap_image = $project['gmap_image'];
$background = "";
if(!empty($gmap_image)) {
    $background = "background-image: url(".$gmap_image.");background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;";
}
$address = $project['address'];
$coordinate_x = $project['coordinate_x'];
$coordinate_y = $project['coordinate_y'];
$gmap_url = "";
if(!empty($coordinate_x) && !empty($coordinate_y)) {
    $gmap_url = "https://www.google.com/maps/search/?api=1&query=".$coordinate_x.",".$coordinate_y;
}
$location = !empty($project['categories']['location']) ? $project['categories']['location'][0] : "";
@endphp
@if (!empty($address))
<section class="toratto-project-location" style="{{$background}}">
    <div class="container">
        <div class="row">
            <div class="card col-md-4 col-sm-12">
                <div class="card-body">
                    <h4 class="card-title">Visítanos en</h4>
                    <p class="card-text">
                        <i class="fas fa-map-marker-alt"></i> {{$address}}
                    </p>
                    <p class="card-text"> 
                        <i class="fas fa-map-marked-alt"></i> {{$location}}
                    </p> 
                </div>
                 @if (!empty($gmap_url))
                <div class="card-footer text-center"> 
                    <a class="btn btn-toratto-green" href="{{$gmap_url}}" target="_blank">Ir al mapa</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif
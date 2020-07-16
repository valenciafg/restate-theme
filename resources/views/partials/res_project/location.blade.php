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
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 offset-md-2 col-sm-12 blue-text">
        Ubícanos en
      </div>
      <div class="col-md-10 offset-md-2 col-sm-12 green-text">
        {{$address}}
      </div>
      <div class="col-md-10 offset-md-2 col-sm-12 green-text">
        {{$location}}
      </div>
      <div class="col-md-10 offset-md-2 col-sm-12" style="margin-top: 20px">
        <a class="btn btn-toratto-green-full" href="{{$gmap_url}}" target="_blank" style="width: 190px; height:55px; padding-top:15px;">IR AL MAPA</a>
      </div>
      <div class="col-md-2 col-sm-12" style="margin-top: 30px">
        <img src="@asset('images/isotipo.png')" alt="Toratto" style="height: 50px;width: 50px;background-color: #fff;">
      </div>
    </div>
  </div>
</section>
@endif

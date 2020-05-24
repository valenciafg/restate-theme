@php
    $panoramic_photo = $project['panoramic_photo'];
    $title = $project['title'];
@endphp
@if (!empty($panoramic_photo))
<h1>Vista 360º</h1>
<div id="panoramic-viewer" data-photo="{{$panoramic_photo}}" data-caption="{{$title}}"></div>
@endif
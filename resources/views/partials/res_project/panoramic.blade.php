@php
    $panoramic_photo = $project['panoramic_photo'];
    $title = $project['title'];
@endphp
@if (!empty($panoramic_photo))
<section class="toratto-project-panoramic toratto-section-background-02">
<h1 class="toratto-section-title">Vista 360º</h1>
<div id="panoramic-viewer" data-photo="{{$panoramic_photo}}" data-caption="{{$title}}"></div>
</section>
@endif
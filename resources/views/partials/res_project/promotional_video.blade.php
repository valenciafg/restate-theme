@php
    $video = $project['video'];
    $title = $project['title'];
@endphp
@if (!empty($video))
<section class="toratto-section-video toratto-section-background-00">
    <div class="container">
    @php 
    echo $video;
    @endphp
    </div>
</section>
@endif
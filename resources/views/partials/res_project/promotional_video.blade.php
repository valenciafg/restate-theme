@php
    $video = $project['video'];
    $title = $project['title'];
@endphp
@if (!empty($video))
<section class="toratto-section-video toratto-section-background-00">
    <div class="container">
        <div class="row">
            <div class="card col-md-4 col-sm-12">
                <div class="card-body">
                    <h4 class="card-title">Disfruta de nuestro vídeo promocional</h4>
                </div>
            </div>
            <div class="col-md-8 col-sm-12"> 
                @php 
                echo $video;
                @endphp
            </div>
        </div>
    </div>
</section>
@endif
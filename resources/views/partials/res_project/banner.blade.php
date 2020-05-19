@php
    $gallery = $project['gallery'];
    $overlay = get_stylesheet_directory_uri()."/assets/images/07.png";
    print_r($project['categories']['location']);
    $location = !empty($project['categories']['location']) ? $project['categories']['location'][0] : "";
    $stage = !empty($project['categories']['stage']) ? $project['categories']['stage'][0] : "";
@endphp
<script type="text/javascript">
    jQuery(function() {
        jQuery('.voyage-slider').vegas({
            overlay: '{{$overlay}}',
            slides: [
                <?php foreach ($gallery as $image): ?>
                { src: '{{$image}}' },
                <?php endforeach; ?>
            ]
        });
    });
</script>
<div class="voyage-slider" style="height:100vh;">
    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <h4 class="">{{$location}}</h4>
                <h1 class="">
                    @if ($project['logo'])
                    <img src="{{$project['logo']}}" width="90px" height="70px" alt="logo">
                    @endif
                    {{$project['title']}}
                </h1>
                @if ($project['slogan'])
                <p class="">
                    {{$project['slogan']}}                    
                </p>
                @endif
                
                <div class="">
                    @if ($project['brochure'])
                    <a class="btn btn-outline-success btn-md display-4" href="{{$project['brochure']}}">Brochure</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
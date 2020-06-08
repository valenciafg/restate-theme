@php 
    $settings = new  App\Controllers\Setting();
    $all_settings = $settings->getAllSettings();
@endphp
@if (!empty($all_settings['facebook']))
<section class="toratto-section-home-social toratto-section-background-00">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v7.0"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="fb-page" 
                data-href="{{$all_settings['facebook']}}"
                data-tabs="timeline"
                data-width=""
                data-height="500" 
                data-small-header="false" 
                data-adapt-container-width="false" 
                data-hide-cover="false" 
                data-show-facepile="true">
                    <blockquote cite="{{$all_settings['facebook']}}" class="fb-xfbml-parse-ignore">
                        <a href="{{$all_settings['facebook']}}">Toratto Grupo Inmobiliario</a>
                    </blockquote>
                </div>
            </div>
            <div class="card toratto-home-social-title col-md-4 col-sm-12">
                <div class="card-body">
                    <h3 class="card-title">¡Síguenos en nuestras redes sociales!</h3>
                </div>
            </div>
            <div class="card toratto-home-social-icons col-md-4 col-sm-12">
                <div class="card-body">
                    <h3 class="card-text">
                        @if (!empty($all_settings['twitter']))
                        <a href="{{$all_settings['twitter']}}" target="_blank"><i class="fab fa-twitter"></i></a> 
                        @endif
                        @if (!empty($all_settings['gplus']))
                        <a href="{{$all_settings['gplus']}}" target="_blank"><i class="fab fa-google-plus-g"></i></a> 
                        @endif
                        @if (!empty($all_settings['instagram']))
                        <a href="{{$all_settings['instagram']}}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if (!empty($all_settings['pinterest']))
                        <a href="{{$all_settings['pinterest']}}" target="_blank"><i class="fab fa-pinterest"></i></a>
                        @endif
                        @if (!empty($all_settings['skype']))
                        <a href="{{$all_settings['skype']}}" target="_blank"><i class="fab fa-skype"></i></a>
                        @endif
                        @if (!empty($all_settings['linkedin']))
                        <a href="{{$all_settings['linkedin']}}" target="_blank"><i class="fab fa-linkedin"></i></a>
                        @endif
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
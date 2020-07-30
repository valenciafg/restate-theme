@php
    $settings = new  App\Controllers\Setting();
    $all_settings = $settings->getAllSettings();
    $fb_posts = $all_settings['facebook_posts'];
@endphp
@if (!empty($all_settings['facebook']))
<section class="toratto-section-home-social toratto-section-background-00">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v7.0"></script>
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-4 col-sm-12">
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
      @if(!empty($fb_posts))
      <div class="row">
        @foreach ($fb_posts as $post)
          <div class="col-md-3 col-sm-12">
            @php echo $post; @endphp
          </div>
        @endforeach
      </div>
      @endif
      <div class="row">
        <div class="col-md-12">
          @php
            echo do_shortcode("[social_board id='384' type='carousel']");
            echo do_shortcode("[social_board id='383' type='carousel']");
          @endphp
        </div>
      </div>
    </div>
</section>
@endif

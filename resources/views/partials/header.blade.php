<header class="banner">
  <!-- container -->
  <div class="">
    @php 
      $settings = new  App\Controllers\Setting();
      $logo = $settings->getWebsitePrimaryLogo();
    @endphp
    <!--MENU PRINCIPAL fixed-top-->
    <nav class="navbar nav-primary navbar-expand-lg navbar-toratto">
      <a class="navbar-brand brand" href="{{ home_url('/') }}">
        <img src="{{$logo}}" width="192" height="50" alt="{{ get_bloginfo('name', 'display') }}">
      </a>
      <div class="collapse navbar-collapse">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu([
            'theme_location' => 'primary_navigation', 
            'menu_class' => 'nav navbar-nav justify-content-center'
          ]) !!}
        @endif
      </div>
    </nav>
  </div>
</header>

@php
  $settings = new  App\Controllers\Setting();
  $all_settings = $settings->getAllSettings();
  $menu = new App\Controllers\Menu();

  $logo = $settings->getWebsitePrimaryLogo();
  $logo2 = $all_settings['secundary_logo'];
  $menu_items = $menu->getPrimaryNavigationMenuItems();
@endphp
<header class="banner">
  <!--
  <nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Access Home Online</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="index.htm">Home</a></li>
          <li><a href="settings.htm">Settings</a></li>
          <li><a href="connected-sites.htm">Sites</a></li>
        </ul>
      </div>
    </div>
  </nav>-->
  <!-- MAIN MENU -->
  <nav class="navbar navbar-toratto navbar-expand-lg justify-content-md-center justify-content-start navbar-fixed-top fixed-top">
    <!-- MENU LEFT SIDE -->
    <a class="navbar-brand navbar-toratto-brand brand" href="{{ home_url('/') }}">
      <img class="toratto-logo-primary" src="{{$logo}}" width="192" height="50" alt="{{ get_bloginfo('name', 'display') }}">
      <img class="toratto-logo-secundary" src="{{$logo2}}" width="192" height="50" alt="{{ get_bloginfo('name', 'display') }}" style="display:none;">
    </a>
    <a href="#" class="mobile-menu-button float-right position-relative collapsed" data-toggle="collapse" data-target="#mobile-navbar-collapse" aria-expanded="false">
      <i class="fas fa-bars"></i>
    </a>
    <!-- MENU CENTER SIDE -->
    <div class="navbar-collapse navbar-toratto-menu collapse align-items-center">
      <ul class="nav navbar-nav navbar-nav-toratto-center mx-auto">
      @foreach ($menu_items as $item)
        <li class="nav-item">
          <a class="nav-link" href="{{$item->url}}">{{$item->title}}</a>
        </li>
      @endforeach
      </ul>
      <!-- MENU RIGTH SIDE -->
      <ul class="nav navbar-nav flex-row navbar-toratto-calltoaction">
        @if (!empty($all_settings['phone']))
        @php
          $clean_phone = str_replace("(", "", $all_settings['phone']);
          $clean_phone = str_replace(")", "", $clean_phone);
          $clean_phone = str_replace(" ", "", $clean_phone);
          $clean_phone = str_replace("+", "", $clean_phone);
        @endphp
        <li class="nav-item">
          <a href="tel:{{$clean_phone}}">
            <i class="fas fa-phone-alt"></i> {{$all_settings['phone']}}
          </a>
        </li>
        @endif
        @if (!empty($all_settings['whatsapp']))
        @php
        $clean_whatsapp = str_replace("(", "", $all_settings['whatsapp']);
        $clean_whatsapp = str_replace(")", "", $clean_whatsapp);
        $clean_whatsapp = str_replace(" ", "", $clean_whatsapp);
        $clean_whatsapp = str_replace("+", "", $clean_whatsapp);
        @endphp
        <li class="nav-item">
          <a href="https://wa.me/{{$clean_whatsapp}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
        </li>
        @endif
        <li class="nav-item">
          <a class="btn btn-toratto-green toratto-quotation-link" href="/contacto" role="button">
          Cotiza Aquí
          </a>
        </li>
      </ul>
    </div>
    <!-- -->
    <div class="collapse navbar-collapse" id="mobile-navbar-collapse">
      <ul class="nav navbar-nav">
      @foreach ($menu_items as $item)
        <li class="nav-item">
          <a class="nav-link" href="{{$item->url}}">{{$item->title}}</a>
        </li>
      @endforeach
      </ul>
    </div>
  </nav>
</header>

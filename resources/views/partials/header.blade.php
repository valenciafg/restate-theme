@php
  $settings = new  App\Controllers\Setting();
  $all_settings = $settings->getAllSettings();
  $menu = new App\Controllers\Menu();

  $logo = $settings->getWebsitePrimaryLogo();
  $menu_items = $menu->getPrimaryNavigationMenuItems();
@endphp
<header class="banner">
  <nav class="navbar navbar-toratto navbar-expand-lg justify-content-md-center justify-content-start navbar-fixed-top fixed-top">
    <a class="navbar-brand brand" href="{{ home_url('/') }}">
      <img src="{{$logo}}" width="192" height="50" alt="{{ get_bloginfo('name', 'display') }}">
    </a>
    <div class="navbar-collapse collapse justify-content-between align-items-center">
        <ul class="nav navbar-nav navbar-nav-toratto-center mx-auto text-md-center text-left">
        @foreach ($menu_items as $item)
          <li class="nav-item menu-item">
            <a class="nav-link hvr-underline-reveal" href="{{$item->url}}">{{$item->title}}</a> 
          </li>
        @endforeach
        </ul>
        <ul class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap navbar-toratto-calltoaction">
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
            <a class="btn btn-outline-success btn-sm" href="#" role="button">
            Cotiza Aquí
            </a>
          </li>
        </ul>
    </div>
  </nav>
</header>

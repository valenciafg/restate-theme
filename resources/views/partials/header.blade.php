@php
  $settings = new  App\Controllers\Setting();
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
        <ul class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap">
            <li class="nav-item">
              <a class="nav-link" href="">
                <i class="fab fa-facebook"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
        </ul>
    </div>
  </nav>

</header>

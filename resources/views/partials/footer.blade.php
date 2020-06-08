@php 
  $settings = new  App\Controllers\Setting();
  $all_settings = $settings->getAllSettings();
  $logo = $settings->getWebsitePrimaryLogo();
  $all_menus = get_nav_menu_locations();
  $primary_menu_id = $all_menus['primary_navigation'];
  $menu = wp_get_nav_menu_object($primary_menu_id);
  $menu_items = wp_get_nav_menu_items($menu->term_id);
@endphp
<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <!-- LEFT SIDE -->
        <div class="col-md-3 footer-about wow fadeInUp">
          <img class="logo-footer" src="{{$logo}}" alt="{{ get_bloginfo('name', 'display') }}">
          @if (!empty($all_settings['description']))
          <p>
            {{$all_settings['description']}}
          </p>
          @endif
        </div>
        <!--CENTER-->
        <div class="col-md-4 offset-md-1 footer-contact wow fadeInDown">
          <h3>Contacto</h3>
          @if (!empty($all_settings['address']))
          <p><i class="fas fa-map-marker-alt"></i>{{$all_settings['address']." ".$all_settings['city']}}</p>
          @endif
          @if (!empty($all_settings['phone']))
          @php
            $clean_phone = str_replace("(", "", $all_settings['phone']);
            $clean_phone = str_replace(")", "", $clean_phone);
            $clean_phone = str_replace(" ", "", $clean_phone);
            $clean_phone = str_replace("+", "", $clean_phone);
          @endphp
          <p>
            <a href="tel:{{$clean_phone}}">
              <i class="fas fa-phone"></i>{{$all_settings['phone']}}
            </a>
          </p>
          @endif
          @if (!empty($all_settings['email']))
          <p><i class="fas fa-envelope"></i><a href="mailto:{{$all_settings['email']}}">{{$all_settings['email']}}</a></p>
          @endif
        </div>
        <!--RIGHT SIDE-->
        <div class="col-md-4 footer-links wow fadeInUp">
          <div class="row">
            <div class="col-md-6">
            @foreach ($menu_items as $item)
              <p><a href="{{$item->url}}">{{$item->title}}</a></p>
            @endforeach
            </div>
            <div class="col-md-6">
              <p><i class="fas fa-book-open"></i><a href="#" target="_blank"> Libro de Reclamaciones</a></p>
              <p><i class="fas fa-folder-open"></i><a href="/legal" target="_blank"> Protección al Consumidor</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
          <div class="col-md-6 footer-copyright">
            &copy; Grupo Toratto 2020. Todos los derechos reservados.
          </div>
          <div class="col-md-6 footer-social">
            @if (!empty($all_settings['whatsapp']))
            @php
            $clean_whatsapp = str_replace("(", "", $all_settings['whatsapp']);
            $clean_whatsapp = str_replace(")", "", $clean_whatsapp);
            $clean_whatsapp = str_replace(" ", "", $clean_whatsapp);
            $clean_whatsapp = str_replace("+", "", $clean_whatsapp);
            @endphp
            <a href="https://wa.me/{{$clean_whatsapp}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
            @endif
            @if (!empty($all_settings['facebook']))
            <a href="{{$all_settings['facebook']}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
            @endif
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
          </div>
        </div>
    </div>
  </div>
</footer>
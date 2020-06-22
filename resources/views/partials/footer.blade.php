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
    <div class="container-fluid">
      <div class="row">
        <!-- LEFT SIDE -->
        <div class="col-md-3 footer-about">
          @if (!empty($all_settings['phone']))
          @php
            $clean_phone = str_replace("(", "", $all_settings['phone']);
            $clean_phone = str_replace(")", "", $clean_phone);
            $clean_phone = str_replace(" ", "", $clean_phone);
            $clean_phone = str_replace("+", "", $clean_phone);
          @endphp
          <p>
            <a href="tel:{{$clean_phone}}" style="font-size: 2rem;">
              <strong><i class="fas fa-phone-alt"></i>{{$all_settings['phone']}}</strong>
            </a>
          </p>
          @endif
          @if (!empty($all_settings['email']))
          <p>
            <a href="mailto:{{$all_settings['email']}}">
              </strong><i class="fas fa-envelope"></i>{{$all_settings['email']}}</strong>
            </a>
          </p>
          @endif
        </div>
        <!--CENTER-->
        <div class="col-md-2 footer-links">
          <ul>
            <li><a href="/proyectos">Proyectos en Venta</a></li>
            <li><a href="/proximos-proyectos">Próximos Proyectos</a></li>
            <li><a href="/proyectos-entregados">Proyectos Entregados</a></li>
          </ul>
        </div>
        <!--RIGHT SIDE-->
        <div class="col-md-2 footer-links">
          <ul>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/compra-de-terrenos">Compra de Terrenos</a></li>
            <li><a href="/nosotros">Nosotros</a></li>
          </ul>
        </div>
        <div class="col-md-2 footer-links">
          <ul>
            <li><i class="fas fa-book-open"></i><a href="#" target="_blank"> Libro de Reclamaciones</a></li>
            <li><i class="fas fa-folder-open"></i><a href="/legal" target="_blank"> Protección al Consumidor</a></li>
            <li><a href="#">Post-venta</a></li>
            <li><a href="/contacto">Contacto</a></li>
          </ul>
        </div>
        <div class="col-md-3 footer-links">
          <img class="logo-footer" src="{{$logo}}" alt="{{ get_bloginfo('name', 'display') }}">
          @if (!empty($all_settings['description']))
          <p>
            {{$all_settings['description']}}
          </p>
          @endif
          @if (!empty($all_settings['address']))
          <p><i class="fas fa-map-marker-alt"></i>{{$all_settings['address']}}</p>
          <p>{{$all_settings['city']}}</p>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 footer-message">
          Todas las imágenes, planos, medidas y áreas son referenciales por lo que podrían sufrir cambios al momento de desarrollarse el proyecto, asimismo los elementos decorativos acabados y mobiliarios son propuestas del departamento de diseño que no se incluyen en la oferta comercial y no comprometen a la empresa inmobiliaria.
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

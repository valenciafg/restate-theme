<footer class="content-info">
  <div class="container">
    @php dynamic_sidebar('sidebar-footer') @endphp
  </div>
</footer>
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
          <p>
            {{$all_settings['description']}}
          </p>
          <p><a href="#">Nosotros</a></p>
        </div>
        <!--CENTER-->
        <div class="col-md-4 offset-md-1 footer-contact wow fadeInDown">
          <h3>Contacto</h3>
          <p><i class="fas fa-map-marker-alt"></i>{{$all_settings['address']." ".$all_settings['city']}}</p>
          <p><i class="fas fa-phone"></i>{{$all_settings['phone']}}</p>
          <p><i class="fas fa-envelope"></i><a href="mailto:{{$all_settings['email']}}">{{$all_settings['email']}}</a></p>
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
              <p><a href="#">Libro de Reclamaciones</a></p>
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
            <a href="#"><i class="fab fa-facebook-f"></i></a> 
            <a href="#"><i class="fab fa-twitter"></i></a> 
            <a href="#"><i class="fab fa-google-plus-g"></i></a> 
            <a href="#"><i class="fab fa-instagram"></i></a> 
            <a href="#"><i class="fab fa-pinterest"></i></a>
          </div>
        </div>
    </div>
  </div>
</footer>
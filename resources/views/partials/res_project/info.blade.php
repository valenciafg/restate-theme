
<section class="toratto-project-info">
  <div class="container">
    <div class="row justify-content-center">
      <ul class="nav nav-fill">
        @if (!empty($project['delivery_date']))
        <li class="nav-item toratto-project-info-item">
          Entrega a partir del {{$project['delivery_date']}}
        </li>
        @endif
        @if (!empty($project['max_rooms']))
        <li class="nav-item toratto-project-info-item">
          <img src="@asset('images/bed-2.png')" style="width:50px; height:50px;"> 1 a {{$project['max_rooms']}} ambientes
        </li>
        @endif
        @if (!empty($project['min_area']))
        <li class="nav-item toratto-project-info-item">
          <img src="@asset('images/metraje-2.png')" style="width:50px; height:50px;"> {{$project['min_area']}} m&sup2;
          @if (!empty($project['max_area']))
          a {{$project['max_area']}} m&sup2;
          @endif
        </li>
        @endif
        {{-- @if (!empty($project['starting_price_usd']))
        <li class="nav-item toratto-project-info-item">
          Precio desde $ {{$project['starting_price_usd']}}
          @if (!empty($project['end_price_usd']))
           hasta $ {{$project['end_price_usd']}}
          @endif
        </li>
        @endif --}}
        {{-- <li class="nav-item toratto-project-info-item">
          <a href="/legal" target="_blank">Ver Documentos Legales</a>
        </li> --}}
        <li class="nav-item toratto-project-info-item" style="margin: 0 20px 0 20px; display: flex; align-items:center">
          <a href="{{$project['brochure']}}" target="_blank">Descargar Brochure</a>
        </li>
      </ul>
    </div>
  </div>
</section>

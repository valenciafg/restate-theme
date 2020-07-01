
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
          Desde 1 a {{$project['max_rooms']}} ambientes
        </li>
        @endif
        @if (!empty($project['min_area']))
        <li class="nav-item toratto-project-info-item">
          Metraje de {{$project['min_area']}} m&sup2;
          @if (!empty($project['max_area']))
          a {{$project['max_area']}} m&sup2;
          @endif
        </li>
        @endif
        @if (!empty($project['starting_price_usd']))
        <li class="nav-item toratto-project-info-item">
          Precio desde $ {{$project['starting_price_usd']}}
          @if (!empty($project['end_price_usd']))
          hasta $ {{$project['end_price_usd']}}
          @endif
        </li>
        @endif
        <li class="nav-item toratto-project-info-item">
          <a href="/legal" target="_blank">Ver Documentos Legales</a>
        </li>
      </ul>
    </div>
  </div>
</section>

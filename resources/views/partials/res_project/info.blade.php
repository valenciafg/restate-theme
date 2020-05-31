
<section class="toratto-project-info">
  <div class="row">
    @if (!empty($project['delivery_date']))
    <div class="col">
        <i class="far fa-calendar-alt"></i> Entegra desde {{$project['delivery_date']}}
    </div>
    @endif
    @if (!empty($project['max_rooms']))
    <div class="col">
        <i class="fas fa-bed"></i> De 1 a {{$project['max_rooms']}} Dormitorios
    </div>
    @endif
    @if (!empty($project['min_area']))
    <div class="col">
        <i class="fas fa-ruler-combined"></i> Desde {{$project['min_area']}} m&sup2;
        @if (!empty($project['max_area']))
        Hasta {{$project['max_area']}} m&sup2;
        @endif
    </div>
    @endif
    @if (!empty($project['starting_price_usd']))
    <div class="col">
        <i class="far fa-money-bill-alt"></i> $ {{$project['starting_price_usd']}}
        @if (!empty($project['starting_price_pen']))
        o S./ {{$project['starting_price_pen']}}
        @endif
    </div>
    @endif
  </div>
</section>

<section class="toratto-project-info">
  <div class="container">
    <div class="row">
      @if (!empty($project['delivery_date']))
      <div class="col-md-2 col-sm-6">
        <div class="row toratto-project-info-item">
          <div class="col-md-2 toratto-project-info-icon">
            <i class="far fa-calendar-alt"></i>
          </div>
          <div class="col-md-10 toratto-project-info-content">
            <div class="toratto-project-info-content-title">
              Entrega a partir del {{$project['delivery_date']}}
            </div>          
          </div>
        </div>
      </div>
      @endif
      @if (!empty($project['max_rooms']))
      <div class="col-md-2 col-sm-6">
        <div class="row toratto-project-info-item">
          <div class="col-md-2 toratto-project-info-icon">
            <i class="fas fa-bed"></i>
          </div>
          <div class="col-md-10 toratto-project-info-content">
            <div class="toratto-project-info-content-title">
              Desde 1 a {{$project['max_rooms']}} ambientes
            </div>
          </div>
        </div>        
      </div>
      @endif
      @if (!empty($project['min_area']))
      <div class="col-md-2 col-sm-6">
        <div class="row toratto-project-info-item">
          <div class="col-md-2 toratto-project-info-icon">
            <i class="fas fa-ruler-combined"></i>
          </div>
          <div class="col-md-10 toratto-project-info-content">
            <div class="toratto-project-info-content-title">
              Metraje de {{$project['min_area']}} m&sup2;
              @if (!empty($project['max_area']))
              a {{$project['max_area']}} m&sup2;
              @endif
            </div>
          </div>
        </div>
      </div>
      @endif
      @if (!empty($project['starting_price_usd']))
      <div class="col-md-2 col-sm-6">
        <div class="row toratto-project-info-item">
          <div class="col-md-2 toratto-project-info-icon">
            <i class="far fa-money-bill-alt"></i>
          </div>
          <div class="col-md-10 toratto-project-info-content">
            <div class="toratto-project-info-content-title">
              Precio desde $ {{$project['starting_price_usd']}}
              @if (!empty($project['starting_price_pen']))
              o S./ {{$project['starting_price_pen']}}
              @endif
            </div>          
          </div>
        </div>
      </div>
      @endif
      <div class="col-md-2 col-sm-6">
        <div class="row toratto-project-info-item">
          <div class="col-md-2 toratto-project-info-icon">
            <i class="fas fa-folder-open"></i>
          </div>
          <div class="col-md-10 toratto-project-info-content">
            <div class="toratto-project-info-content-title">
              <a href="/legal" target="_blank">Documentos Legales</a>
            </div>          
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
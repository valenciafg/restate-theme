
<section class="toratto-project-info">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <span class="toratto-project-info-item">
          <img src="@asset('images/bed-2.png')" style="width:50px; height:50px;"> 1 a {{$project['max_rooms']}} ambientes
        </span>
      </div>
      <div class="col-md-4">
        <span class="toratto-project-info-item">
          <img src="@asset('images/metraje-2.png')" style="width:50px; height:50px;"> {{$project['min_area']}} m&sup2;
          @if (!empty($project['max_area']))
          a {{$project['max_area']}} m&sup2;
          @endif
        </span>
      </div>
      <div class="col-md-4" style="text-align: center">
        <span class="toratto-project-info-item">
          <a href="{{$project['brochure']}}" target="_blank">Descargar Brochure</a>
        </span>
      </div>
    </div>
  </div>
</section>

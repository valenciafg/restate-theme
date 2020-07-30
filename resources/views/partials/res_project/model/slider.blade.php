<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="toratto-section-model-carousel">
        @php $index = 0; @endphp
        @foreach ($models as $model)
        @if ($model['blueprint'])
        <div
          class="item"
          data-index="{{$index}}"
          data-name="{{$model['name']}}"
          data-total_area="{{$model['total_area']}}"
          data-room_number="{{$model['room_number']}}"
          data-starting_price_pen="{{$model['starting_price_pen']}}"
          data-starting_price_usd="{{$model['starting_price_usd']}}"
        >
          <a data-fancybox="gallery-{{$index}}" href="{{$model['blueprint']}}">
            <img src="{{$model['blueprint']}}" height="350" alt="{{$model['name']}}">
            <div class="overlay">
              <i class="fas fa-search-plus"></i>
            </div>
          </a>
        </div>
        @php $index += 1; @endphp
        @endif
        @endforeach
      </div>
    </div>
  </div>
  <div class="row toratto-section-model-carousel-info">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <span class="toratto-model-info-name">{{$first_model_name}}</span>
      <ul class="nav justify-content-center nav-fill toratto-model-info">
          @if (!empty($first_model_room_number))
          <li class="nav-item">
            <img src="@asset('images/bed-2.png')" style="width:50px; height:50px;"> {{$first_model_room_number}} Dormitorios
          </li>
          @endif
          @if (!empty($first_model_total_area))
          <li class="nav-item">
            <img src="@asset('images/metraje-2.png')" style="width:50px; height:50px;"> Desde {{$first_model_total_area}} m&sup2;
          </li>
          @endif
      </ul>
    </div>
  </div>
</div>

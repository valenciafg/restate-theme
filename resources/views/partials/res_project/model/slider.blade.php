<div class="col-md-6 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="toratto-section-model-carousel">
                        @foreach ($models as $model)
                        @if ($model['blueprint'])
                            <div class="item" data-name="{{$model['name']}}" data-total_area="{{$model['total_area']}}" data-room_number="{{$model['room_number']}}" data-starting_price_pen="{{$model['starting_price_pen']}}" data-starting_price_usd="{{$model['starting_price_usd']}}">
                                <img src="{{$model['blueprint']}}" height="400" alt="{{$model['name']}}">
                            </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <ul class="nav justify-content-center nav-fill toratto-model-info">
                        @if (!empty($first_model_room_number))
                        <li class="nav-item">
                          {{$first_model_room_number}} Habitaciones
                        </li>
                        @endif
                        @if (!empty($first_model_total_area))
                        <li class="nav-item">
                          Desde {{$first_model_total_area}} m&sup2;
                        </li>
                        @endif
                        @if (!empty($first_model_starting_price_usd))
                        <li class="nav-item">
                          Desde {{$first_model_starting_price_usd}} USD
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

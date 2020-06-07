@php
    $models = $project['models'];
    /*
    echo "<pre>";
    print_r($models);
    echo "</pre>";
    */
    //{{$model['name']}}
@endphp
@if (!empty($models))
@php
    $first_model_name = $models[0]['name'];
    $first_model_room_number = $models[0]['room_number'];
    $first_model_total_area = $models[0]['total_area'];    
    $first_model_starting_price_usd = $models[0]['starting_price_usd'];
@endphp
<section class="toratto-section-model">
    <div class="row">
        <h1 class="toratto-section-model-title col-md-12">¡Tu nuevo hogar está a un solo paso!</h1>
    </div>
    <div class="row">
        <!-- slider model section -->
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
                            <i class="fas fa-bed"></i> {{$first_model_room_number}} Habitaciones
                        </li>
                        @endif
                        @if (!empty($first_model_total_area))
                        <li class="nav-item">
                            <i class="fas fa-ruler-combined"></i> Desde {{$first_model_total_area}} m&sup2;
                        </li>
                        @endif
                        @if (!empty($first_model_starting_price_usd))
                        <li class="nav-item">
                            <i class="far fa-money-bill-alt"></i> Desde {{$first_model_starting_price_usd}} USD
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- form model section -->
        @include('partials.res_project.model.form')
    </div>
</section>
@endif
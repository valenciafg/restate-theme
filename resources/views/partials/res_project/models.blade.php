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
@endphp
<section class="toratto-section-model">
    <div class="row">
        <h1 class="toratto-section-model-title col-md-12">¡Tu nuevo hogar está a un solo paso!</h1>
    </div>
    <div class="row">
        <!-- slider model section -->
        <div class="col-md-6 col-sm-12">
            <div class="toratto-section-model-carousel owl-carousel owl-theme">
                @foreach ($models as $model)
                @if ($model['blueprint'])
                    <div class="item" data-name="{{$model['name']}}">
                        <img src="{{$model['blueprint']}}" width="547" height="387" alt="{{$model['name']}}">
                    </div>
                @endif
                @endforeach
            </div>
        </div>
        <!-- form model section -->
        @include('partials.res_project.model.form')
    </div>
</section>
@endif
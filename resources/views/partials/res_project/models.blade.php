@php
    $models = $project['models'];
@endphp
@if (!empty($models))
<h1 class="toratto-section-title">Conoce nuestros modelos</h1>
    @foreach ($models as $model)
    @if ($model['blueprint'])
        {{$model['name']}}
        <img src="{{$model['blueprint']}}" width="547" height="387" alt="{{$model['name']}}">
    @endif
    @endforeach
@endif
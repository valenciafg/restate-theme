@php
    $models = $project['models'];
@endphp
@if (!empty($models))
<h1>Nuestros Modelos</h1>
    @foreach ($models as $model)
    @if ($model['blueprint'])
        {{$model['name']}}
        <img src="{{$model['blueprint']}}" width="547" height="387" alt="{{$model['name']}}">
    @endif
    @endforeach
@endif
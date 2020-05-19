@php
    $areas = !empty($project['categories']['common_areas']) ? $project['categories']['common_areas'] : [];
@endphp
@if (!empty($areas))
<h1>Áreas Comunes</h1>
<ul>
@foreach ($areas as $area)
    <li>{{$area}}</li>    
@endforeach
</ul>
@endif
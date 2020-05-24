@php
    $areas = !empty($project['categories']['common_areas']) ? $project['categories']['common_areas'] : [];
@endphp
@if (!empty($areas))
<h1>Nuestras Áreas Comunes</h1>
<div class="col-12 container">
  <ul class="list-unstyled row">
    @foreach ($areas as $area)
        <li class="list-item col-4">
        @if ($area === 'Gimnasio')
            <i class="fas fa-dumbbell"></i>
        @elseif ($area === 'Bar')
            <i class="fas fa-glass-cheers"></i>
        @elseif ($area === 'Area de parrillas')
            <i class="fas fa-hamburger"></i>
        @elseif ($area === 'Piscina')
            <i class="fas fa-swimmer"></i>
        @elseif ($area === 'Area de usos multiples')
            <i class="fas fa-birthday-cake"></i>
        @elseif ($area === 'Zonas de acceso para personas con discapacidad')
            <i class="fas fa-wheelchair"></i>
        @elseif ($area === 'Estacionamiento para bicicletas')
            <i class="fas fa-biking"></i>
        @elseif ($area === 'Lobby')
            <i class="fas fa-chalkboard-teacher"></i>
        @else
            <span></span>
        @endif
            {{$area}}
        </li>
    @endforeach
    </ul>
</div>
@endif


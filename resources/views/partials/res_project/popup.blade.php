@php
  $show_popup = $project['show_popup'];
  $popup_image = $project['popup_image'];
  $url = '#';
@endphp
@if (!empty($show_popup) && $show_popup !== 'FALSE')
<div id="main-popup-data" data-img="{{$popup_image}}" data-url="{{$url}}" style="display: none;"></div>
@endif

@php
  $show_popup = $project['show_popup'];
  $popup_image = $project['popup_image'];
@endphp
@if (!empty($show_popup) && $show_popup !== 'FALSE')
<a id="main-popup" href="{{$popup_image}}" data-fancybox="gallery" style="display: none;">
	<img src="{{$popup_image}}" alt="popup"/>
</a>
@endif

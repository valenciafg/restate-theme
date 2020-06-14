@php
  $gallery = $project['panoramic_gallery'];
  $title = $project['title'];
@endphp
@if (!empty($gallery))
<section class="toratto-project-panoramic toratto-section-background-00">
  <h1 class="toratto-section-title">Vista 360º</h1>
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="slider ps-slider-single">
        @php
        $i = 0;
        @endphp
        @foreach ($gallery as $img)
          <div id="panoramic-viewer-{{$i}}" data-photo="{{$img['image_url']}}" class="psv-panoramic" data-caption="{{$img['caption']}}"></div>
        @php
        $i += 1;
        @endphp
        @endforeach
      </div>
    </div>
    <div class="col-md-12 col-sm-12">
      <div class="slider ps-slider-nav">
        @php
        $i = 0;
        @endphp
        @foreach ($gallery as $img)
          <div>
            <h3>{{$img['caption']}}</h3>
          </div>
        @php
        $i += 1;
        @endphp
        @endforeach
      </div>
    </div>
  </div>
</section>
@endif

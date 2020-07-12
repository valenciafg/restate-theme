<div class="container align-center toratto-project-banner-container">
  <div class="row">
    <div class="col-md-8 col-sm-12">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="toratto-project-banner-subtitle">
            @if (!empty($stage))
            <span class="stage">{{$stage}}</span>
            @endif
          </div>
        </div>
        <div class="col-md-12 offset-md-1 col-sm-12">
          <div class="toratto-project-banner-title">
            {{$project['title']}}
          </div>
        </div>
        <div class="col-md-12 offset-md-2 col-sm-12">
          <div class="toratto-project-banner-subtitle">
            @if (!empty($location))
            <span class="location">{{$location}}</span>
            @endif
          </div>
        </div>
      </div>
      <div class="row"></div>
      <div class="row"></div>
    </div>
    <div class="col-md-4 col-sm-12">
      <span class="toratto-project-banner-excerpt">
        {{$excerpt}}
      </span>
    </div>
  </div>
</div>

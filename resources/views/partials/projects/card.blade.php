@php
  $projectObj = new  App\Controllers\Project();
  $project = $projectObj->getSingleProject($post->ID);
  $address = $project['address'];
  $facade = $project['facade'];
  $categories = $project['categories'];
  $location = $categories['location'];
  $stage = $categories['stage'];
  if(empty($facade)) {
      $facade = get_parent_theme_file_uri()."/dist/images/default_facade.jpg";
  }
@endphp
<div class="col-md-4 col-sm-12" style="padding-right: 0;padding-left: 0;">
  <div class="toratto-project-building">
    <a href="{{$project['url']}}" class="card toratto-project-building-card">
      <img class="card-img img-hover-zoom" src="{{$facade}}">
    </a>
    <div class="card-bottom toratto-project-building-card-bottom-info shadow">
      <ul class="nav justify-content-center nav-fill">
        <li class="nav-item">
          @if (!empty($project['logo']))
              <img src="{{$project['logo']}}" width="90px" height="60px">
          @else
              {{strtoupper($project['title'])}}
          @endif
        </li>
        <li class="nav-item toratto-project-building-card-bottom-info-location">
          @if (!empty($location))
            <span class="location"><i class="fas fa-map-marked-alt"></i> {{$location[0]}}</span>
          @endif
          @if (!empty($stage))
            <span class="location"><i class="fas fa-tag"></i> {{$stage[0]}}</span>
          @endif
          @if (!empty($stage))
            <span class="address">{{$address}}</span>
          @endif
        </li>
      </ul>
    </div>
  </div>
</div>

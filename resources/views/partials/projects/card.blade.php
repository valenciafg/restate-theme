@php
  $projectObj = new  App\Controllers\Project();
  $project = $projectObj->getSingleProject($post->ID);
  $address = $project['address'];
  $facade = $project['facade'];
  $categories = $project['categories'];
  $location = $categories['location'];
  $stage = $categories['stage'];
  $max_rooms = $project['max_rooms'];
  $min_area = $project['min_area'];
  $max_area = $project['max_area'];
@endphp
<div class="col-md-6 col-sm-12" style="padding-right: 0;padding-left: 0;">
  <div class="toratto-project-building">
    <a href="{{$project['url']}}" class="card toratto-project-building-card">
      @if (empty($facade))
        <img class="card-img img-hover-zoom" src="@asset('images/default_facade.jpg')">
      @else
        <img class="card-img img-hover-zoom" src="{{$facade}}">
      @endif
    </a>
    <div class="card-bottom toratto-project-building-card-bottom-info h-100 shadow">
      <ul class="nav justify-content-center nav-fill" style="margin-bottom: 10px;">
        <li class="nav-item">
          @if (!empty($project['logo']))
              <img src="{{$project['logo']}}" width="90px" height="70px">
          @else
              {{strtoupper($project['title'])}}
          @endif
        </li>
        <li class="nav-item toratto-project-building-card-bottom-info-location">
          @if (!empty($location))
            <span class="location">{{$location[0]}}</span>
          @endif
          @if (!empty($address))
            <span class="address">{{$address}}</span>
          @endif
          @if (!empty($stage))
            <span class="stage">{{$stage[0]}}</span>
          @endif
        </li>
      </ul>
      <ul class="nav justify-content-center nav-fill toratto-bottom-extra-info">
        @if (!empty($max_rooms))
        <li>
          <img src="@asset('images/bed-1.png')" style="width:50px; height:50px;"> Hasta {{$max_rooms}} dormitorios
        </li>
        @endif
        @if (!empty($min_area) && !empty($max_area))
        <li>
          <img src="@asset('images/metraje-1.png')" style="width:50px; height:50px;"> Desde {{$min_area}} hasta {{$max_area}}m&sup2;
        </li>
        @endif
      </ul>
    </div>
  </div>
</div>

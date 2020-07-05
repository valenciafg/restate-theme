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
      <div class="container">
        <div class="row">
          <div class="col-md-4 text-center">
            @if (!empty($project['logo']))
                <img src="{{$project['logo']}}" width="100px" height="80px">
            @else
                {{strtoupper($project['title'])}}
            @endif
          </div>
          <div class="col-md-8 location">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-5 px-0">
                  @if (!empty($location))
                  <span class="district">{{$location[0]}}</span>
                  @endif
                </div>
                <div class="col-md-7 px-0">
                  @if (!empty($stage))
                  <div class="stage">{{$stage[0]}}</div>
                  @endif
                </div>
              </div>
              <div class="row" style="margin-top: 10px">
                <div class="col-md-12 px-0">
                  @if (!empty($address))
                  <div class="address">{{$address}}</div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

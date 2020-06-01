@php 
  $project = new  App\Controllers\Project();
  $projects = $project->getBannerProjects();
@endphp
<section class="toratto-section-home-banner owl-carousel owl-theme">
@foreach ($projects as $project)
  @php
  $categories = $project['categories'];
  $location = $categories['location'];
  $stage = $categories['stage'];
  @endphp
  <div class="owl-slide d-flex align-items-center cover" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{$project['main_image']}});">
    <div class="container">
      <div class="row justify-content-center justify-content-md-start">
        <div class="col-10 col-md-6 static">
          <div class="owl-slide-text">
            @if (!empty($location))
              <div class="owl-slide-animated owl-slide-subtitle-location">
                <i class="fas fa-map-marked-alt"></i> {{$location[0]}}
              </div>
            @endif            
            <div class="owl-slide-animated owl-slide-title">
              @if (!empty($project['logo']))
              <img src="{{$project['logo']}}" width="30px" height="60px">
              @endif
              {{$project['title']}}
            </div>
            @if (!empty($project['slogan']))
            <div class="owl-slide-animated owl-slide-subtitle">
              {{$project['slogan']}}
            </div>
            @endif
            <div class="owl-slide-animated owl-slide-subtitle-action">
              <a class="btn btn-toratto-green owl-slide-animated" href="{{$project['url']}}" role="button">
              Ver proyecto
              </a>
              @if (!empty($stage))
              <div class="stage">
                <i class="fas fa-tag"></i>
                {{$stage[0]}}
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
</section>
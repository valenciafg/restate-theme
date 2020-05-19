@php 
  $project = new  App\Controllers\Project();
  $projects = $project->getBannerProjects();
@endphp
<div class="owl-carousel owl-theme">
@foreach ($projects as $project)
  <div class="owl-slide d-flex align-items-center cover" style="background-image: url({{$project['main_image']}});">
    <div class="container">
      <div class="row justify-content-center justify-content-md-start">
        <div class="col-10 col-md-6 static">
          <div class="owl-slide-text">
            <h2 class="owl-slide-animated owl-slide-title">
              {{$project['title']}}
            </h2>
            <div class="owl-slide-animated owl-slide-subtitle mb-3">
              {{$project['slogan']}}
            </div>
            <a class="btn btn-outline-success owl-slide-animated owl-slide-cta" href="{{$project['url']}}" role="button">
            Ver proyecto
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
</div>
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
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="owl-slide-animated">
            <div class="toratto-leaf" style="max-width: 198px">
              {{$stage[0]}}
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 offset-md-1 col-sm-12">
          <div class="owl-slide-animated owl-slide-title">
            {{strtoupper($project['title'])}}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-11 col-sm-12">
          <div class="row">
            <div class="col-md-3 offset-md-2 col-sm-6">
              <div class="owl-slide-animated">
                <div class="toratto-leaf" style="max-width: 198px">
                  {{$location[0]}}
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <a class="btn btn-lg btn-toratto-green owl-slide-animated" href="{{$project['url']}}" role="button">
                VER PROYECTO
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
</section>

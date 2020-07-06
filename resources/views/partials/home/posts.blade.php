@php
  $project = new  App\Controllers\Project();
  $projects = $project->getProjects(10);

  //echo "<pre>";
  //print_r($projects);
  //echo "</pre>";
  $col_md = 6;

@endphp
@if (!empty($projects))
<section class="toratto-section-home-project toratto-section-background-00">
    <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <h1 class="toratto-section-title">Proyectos</h1>
          </div>
        </div>
        <div class="row">
            @foreach ($projects as $project)
            @php
            $address = $project['address'];
            $facade = $project['facade'];
            $categories = $project['categories'];
            $location = $categories['location'];
            $stage = $categories['stage'];
            @endphp
            <div class="col-md-{{$col_md}} col-sm-12" style="padding-left: 0;padding-right: 0;">
                <div class="toratto-project-building">
                    <a href="{{$project['url']}}" class="card toratto-project-building-card">
                      @if (empty($facade))
                        <img class="card-img img-hover-zoom" src="@asset('images/default_facade.jpg')">
                      @else
                        <img class="card-img img-hover-zoom" src="{{$facade}}">
                      @endif
                    </a>
                    <div class="card-bottom toratto-project-building-card-bottom-info shadow">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-4 text-center">
                            @if (!empty($project['logo']))
                                <img src="{{$project['logo']}}" width="100px" height="80px">
                            @else
                                {{strtoupper($project['title'])}}
                            @endif
                          </div>
                          <div class="col-md-8 location px-0">
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
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 toratto-project-building-projects">
                <a class="btn btn-toratto-green btn-block btn-lg" href="/proyectos">Ver todos los proyectos</a>
            </div>
        </div>
    </div>
</section>
@endif

@php
  $project = new  App\Controllers\Project();
  $projects = $project->getProjects(10);

  //echo "<pre>";
  //print_r($projects);
  //echo "</pre>";
  $col_md = 4;

@endphp
@if (!empty($projects))
<section class="toratto-section-home-project toratto-section-background-00">
    <div class="container">
        <h1 class="toratto-section-title">Proyectos</h1>
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
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 toratto-project-building-projects">
                <a class="btn btn-toratto-green btn-block" href="/proyectos">Ver todos los proyectos</a>
            </div>
        </div>
    </div>
</section>
@endif

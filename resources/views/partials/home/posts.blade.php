@php 
  $project = new  App\Controllers\Project();
  $projects = $project->getProjects(10);
/*
  echo "<pre>";
  print_r($projects);
  echo "</pre>";
  */
@endphp
@if (!empty($projects))
<section class="toratto-section-home-project toratto-section-background-00">
    <div class="container">
        <h1 class="toratto-section-title">Proyectos</h1>
        <div class="row">
            @foreach ($projects as $project)
            @php
            $categories = $project['categories'];
            $location = $categories['location'];
            $stage = $categories['stage'];
            $facade = $project['facade'];
            if(empty($facade)) {
                $facade = get_parent_theme_file_uri()."/dist/images/default_facade.jpg";
            }
            @endphp
            <div class="col-md-4 col-sm-12 toratto-project-building-col">
                <a href="{{$project['url']}}" class="card toratto-project-building-card">
                    <img class="card-img img-hover-zoom" src="{{$facade}}">
                    <div class="card-img-overlay">
                        <h2 class="card-title">
                            @if (!empty($project['logo']))
                                <img src="{{$project['logo']}}" width="90px" height="60px">
                            @endif
                            {{strtoupper($project['title'])}}
                        </h2>
                        @if (!empty($stage))
                        <p class="card-text">
                            <i class="fas fa-tag"></i> {{$stage[0]}}
                        </p>
                        @endif 
                        @if (!empty($location))
                        <p class="card-text">
                            <i class="fas fa-map-marked-alt"></i> {{$location[0]}}
                        </p>
                        @endif
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 toratto-project-building-projects">
                <a class="btn btn-toratto-green btn-block" href="#" target="_blank">Ver todos los proyectos</a>
            </div>
        </div>
    </div>
</section>
@endif
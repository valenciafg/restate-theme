@php 
  $project = new  App\Controllers\Project();
  $projects = $project->getProjects(10);
  /*
  echo "<pre>";
  print_r($projects);
  echo "</pre>";
  */
@endphp
<section class="toratto-section-home-project toratto-section-background-03">
    <div class="container">
        <h1 class="toratto-section-title">Proyectos</h1>
        <div class="row">
        @foreach ($projects as $project)
        @php
        $categories = $project['categories'];
        $location = $categories['location'];
        $stage = $categories['stage'];
        @endphp
            <div class="col-4">
                <div class="card">
                    <img class="card-img" src="{{$project['facade']}}" alt="{{$project['title']}}">
                    <div class="card-img-overlay">
                        <h2 class="card-title">
                            @if (!empty($project['logo']))
                            <a href="{{$project['url']}}" class="float-right d-inline-flex" style="margin-left: 5px;">
                                <img src="{{$project['logo']}}" width="90px" height="60px">
                            </a>
                            @endif
                            {{$project['title']}}
                        </h2>
                        <h4 class="card-subtitle">
                        </h4>
                        @if (!empty($stage))
                        <p class="card-text toratto-text-icon" style="font-size: 1.2em;">
                            <i class="fas fa-tag"></i> {{$stage[0]}}
                        </p>
                        @endif 
                        @if (!empty($location))
                        <p class="card-text toratto-text-icon" style="font-size: 1.2em;">
                            <i class="fas fa-map-marked-alt"></i> {{$location[0]}}
                        </p>
                        @endif 
                        <a href="{{$project['url']}}" class="btn btn-toratto-green btn-sm toratto-content-center">Ver más detalles</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
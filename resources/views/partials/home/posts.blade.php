@php 
  $project = new  App\Controllers\Project();
  $projects = $project->getProjects(10);
  /*
  echo"<pre>";
  print_r($projects);
  echo"</pre>";
  */
@endphp
<div class="container">
    <div class="row">
    @foreach ($projects as $project)
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-img-block">
                    <img class="card-img-top" src="{{$project['main_image']}}" alt="{{$project['title']}}">
                </div>
                <div class="card-body border-bottom pb-3">
                    <h5 class="card-title">
                        {{$project['title']}}
                        <a href="#" class="float-right d-inline-flex" style="margin-left: 5px;">
                            <!--<i class="fas fa-share-alt"></i>-->
                            <img src="{{$project['logo']}}" width="90px" height="60px">
                        </a>
                    </h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
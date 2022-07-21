<div class="col-md-{{$col_md}} col-sm-12">
    <div class="toratto-project-building">
        <a href="{{$project['url']}}" class="card toratto-project-building-card">
            <img class="card-img img-hover-zoom" src="{{$facade}}">
            <div class="card-img-overlay">
                <div class="card-bottom">
                    @if (!empty($stage))
                    <p class="card-text">
                        <i class="fas fa-tag"></i> {{$stage[0]}}
                    </p>
                    @endif 
                </div>
            </div>
        </a>
        <div class="card-bottom toratto-project-building-card-bottom-info shadow">
            <ul class="nav justify-content-center nav-fill">
                <li class="nav-item">
                @if (!empty($project['logo']))
                    <img class="project-logo" src="{{$project['logo']}}" width="90px" height="60px">
                @else
                    {{strtoupper($project['title'])}}                        
                @endif
                </li>
                <li class="nav-item toratto-project-building-card-bottom-info-location">
                    @if (!empty($location))
                        <span class="location"><i class="fas fa-map-marked-alt"></i> {{$location[0]}}</span>
                    @endif
                    @if (!empty($address))
                        <span class="address">{{$address}}</span>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
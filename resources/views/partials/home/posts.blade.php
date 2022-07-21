@php
  $projectObj = new  App\Controllers\Project();
  // $project = new  App\Controllers\Project();
  // $pj = $project;
  // $projects = $project->getProjects(10);
  $posts = new WP_Query(array(
    'post_type' => 'res_project', // Default or custom post type
    'posts_per_page' => 10, // Max number of posts per page
    'paged' => $currentPage,
    'tax_query' => array(
        array (
            'taxonomy' => 'res_stage',
            'field' => 'slug',
            'terms' => 'entregado',
            'operator'  => 'NOT IN'
        )
    ),
  ));
  $col_md = 6;

@endphp
@if ($posts->have_posts())
<section class="toratto-section-home-project toratto-section-background-00">
    <div class="container">
      <div class="row">
      @php
        $posts = $posts->posts;
      @endphp
      @foreach ($posts as $post)
      @php
        $project = $projectObj->getSingleProject($post->ID);
        $address = $project['address'];
        $facade = $project['facade'];
        $ribbon = $project['ribbon'];
        $categories = $project['categories'];
        $location = $categories['location'];
        $stage = $categories['stage'];
        $show = $project['show_home'];
      @endphp
      @if (isset($show) && $show === 'TRUE')
        <div class="col-md-{{$col_md}} col-sm-12" style="padding-left: 0;padding-right: 0;">
          <div class="toratto-project-build">
            <a href="{{$project['url']}}" class="card toratto-project-building-card">
              @if (!empty($ribbon))
                <h4 class='corner corner-ribbon'>{{$ribbon}}</h4>
              @endif
              @if (empty($facade))
                <img class="card-img img-hover-zoom" src="@asset('images/default_facade.jpg')">
              @else
                <img class="card-img img-hover-zoom" src="{{$facade}}">
              @endif
            </a>
              <div class="card-bottom toratto-project-building-card-bottom-info shadow">
                <div class="container">
                  <div class="row">
                    <!-- logo column -->
                    <div class="col-md-3 px-0 col-sm-12">
                      @if (!empty($project['logo']))
                          <img class="project-logo" src="{{$project['logo']}}" width="100px" height="80px">
                      @else
                          {{strtoupper($project['title'])}}
                      @endif
                    </div>
                    <!-- district and stage column -->
                    <div class="col-md-9  px-0">
                      <div class="row">
                        <div class="col-md-6 text-center">
                          @if (!empty($location))
                          <span class="district">{{$location[0]}}</span>
                          @endif
                        </div>
                        <div class="col-md-6">
                          @if (!empty($stage))
                      <div class="stage">{{$stage[0]}}</div>
                      @endif
                        </div>
                      </div>
                      <div class="row" style="margin-top: 10px">
                        <div class="col-md-12 px-0 col-sm-12">
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
      @endif
      @endforeach
      </div>
    </div>
</section>
@endif

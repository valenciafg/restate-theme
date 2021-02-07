@php
  $projectObj = new  App\Controllers\Project();
  // $projects = $project->getProjects();
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
      ),
      array (
        'taxonomy' => 'res_stage',
        'field' => 'slug',
        'terms' => 'proximo',
        'operator'  => 'NOT IN'
      ),
      array (
        'taxonomy' => 'res_stage',
        'field' => 'slug',
        'terms' => 'proxima-entrega',
        'operator'  => 'NOT IN'
      ),
    ),
  ));
@endphp
@if ($posts->have_posts())
  @section('content')
    <section class="toratto-section-background-00">
        <div class="container toratto-legal-doc-page shadow">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                      <a
                        class="nav-link active"
                        id="v-pills-0-tab"
                        data-toggle="pill"
                        href="#v-pills-0"
                        role="tab"
                        aria-controls="v-pills-0"
                        aria-selected="false"
                      >
                        POLÍTICA DE PRIVACIDAD
                      </a>
                      @php
                        $posts = $posts->posts;
                      @endphp
                      @foreach ($posts as $post)
                      @php
                        $project = $projectObj->getSingleProject($post->ID);
                      @endphp
                      <a
                      class="nav-link"
                      id="v-pills-{{$project['id']}}-tab"
                      data-toggle="pill"
                      href="#v-pills-{{$project['id']}}"
                      role="tab"
                      aria-controls="v-pills-{{$project['id']}}"
                      aria-selected="false"
                        >
                        {{$project['title']}}
                      </a>
                      @endforeach
                    </div>
                </div>
                <div class="col-md-9 col-sm-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-0" role="tabpanel" aria-labelledby="v-pills-0-tab">
                      <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <h2 class="title-underline">POLÍTICA DE PRIVACIDAD Y PROTECCIÓN DE DATOS PERSONALES</h2>
                          <div style="margin-top: 8px;">
                            @php echo $content; @endphp
                          </div>
                        </div>
                      </div>
                    </div>
                    @foreach ($posts as $post)
                    @php
                      $project = $projectObj->getSingleProject($post->ID);
                    @endphp
                    <div class="tab-pane fade" id="v-pills-{{$project['id']}}" role="tabpanel" aria-labelledby="v-pills-{{$project['id']}}-tab">
                      @php
                          echo $project['legal_info'];
                          $legal_docs = $project['legal_docs'];
                      @endphp
                      @if (!empty($legal_docs))
                      <div class="row">
                        @foreach ($legal_docs as $doc)
                        <div class="col-md-6 col-sm-6" style="margin-bottom: 5px;">
                          <a class="btn btn-toratto-blue-single btn-lg text-left" href="{{$doc['file']}}" target="_blank">
                            {{-- <i class="far fa-file-pdf"></i>  --}}
                            <img src="@asset('images/PDF_file_icon_red.png')" style="width:30px; height:35px;">
                            {{$doc['name']}}
                          </a>
                        </div>
                        @endforeach
                      </div>
                      @endif
                    </div>
                  @endforeach
                  </div>
                </div>
            </div>
        </div>
    <section>
  @endsection
@endif

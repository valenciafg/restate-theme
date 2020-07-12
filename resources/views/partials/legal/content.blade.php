@php
  $project = new  App\Controllers\Project();
  $projects = $project->getProjects();
@endphp
@if (!empty($projects))
  @section('content')
    <section class="toratto-section-background-00">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 text-center">
            <h1 class="toratto-custom-page toratto-section-title-2">Protección al Consumidor</h1>
          </div>
        </div>
      </div>
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
                      @foreach ($projects as $project)
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
                          @php echo $content; @endphp
                        </div>
                      </div>
                    </div>
                    @foreach ($projects as $project)
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

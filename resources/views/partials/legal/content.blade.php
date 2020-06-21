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
                <div class="col-12 col-sm-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($projects as $project)
                        @php
                            if ($i == 0) {
                                $active_class="active";
                            } else {
                                $active_class="";
                            }
                        @endphp
                        <a
                            class="nav-link {{$active_class}}"
                            id="v-pills-{{$project['id']}}-tab"
                            data-toggle="pill"
                            href="#v-pills-{{$project['id']}}"
                            role="tab"
                            aria-controls="v-pills-{{$project['id']}}"
                            aria-selected="false"
                        >
                            {{$project['title']}}
                        </a>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-sm-9">
                    <div class="tab-content" id="v-pills-tabContent">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($projects as $project)
                        @php
                        if ($i == 0) {
                            $active_class="show active";
                        } else {
                            $active_class="";
                        }
                        @endphp
                        <div class="tab-pane fade {{$active_class}}" id="v-pills-{{$project['id']}}" role="tabpanel" aria-labelledby="v-pills-{{$project['id']}}-tab">
                          <h3>{{$project['title']}}</h3>
                            @php
                                echo $project['legal_info'];
                                $legal_docs = $project['legal_docs'];
                            @endphp
                            @if (!empty($legal_docs))
                            <ul class="toratto-legal-docs-list">
                                @foreach ($legal_docs as $doc)
                                <li>
                                    <a class="btn btn-toratto-blue btn-lg" href="{{$doc['file']}}" target="_blank">
                                      <i class="far fa-file-pdf"></i> {{$doc['name']}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    <section>
  @endsection
@endif

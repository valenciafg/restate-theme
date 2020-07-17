@php

$currentPage = get_query_var('paged');
$posts = new WP_Query(array(
    'post_type' => 'res_project', // Default or custom post type
    'posts_per_page' => 10, // Max number of posts per page
    'paged' => $currentPage,
    'tax_query' => array(
        array (
            'taxonomy' => 'res_stage',
            'field' => 'slug',
            'terms' => 'entregado',
        )
    ),
));
@endphp
@section('content')
<section class="toratto-section-background-00" style="margin-top: 40px;">
  {{-- <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 text-center">
        <h1 class="toratto-custom-page toratto-section-title-2">{{ get_the_title() }}</h1>
      </div>
    </div>
  </div> --}}
  <div class="container shadow toratto-project-page">
    @include('partials.blog.nav')
    <div class="row">
      @if ($posts->have_posts())
        @php
          $posts = $posts->posts;
        @endphp
        @foreach ($posts as $post)
          @include('partials.projects.card')
        @endforeach
      @else
        <h1>empty</h1>
      @endif
    </div>
    @include('partials.blog.nav')
  </div>
</section>
@endsection

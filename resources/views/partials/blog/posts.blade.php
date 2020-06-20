@php
$currentPage = get_query_var('paged');
$posts = new WP_Query(array(
    'post_type' => 'post', // Default or custom post type
    'posts_per_page' => 10, // Max number of posts per page
    'paged' => $currentPage
));
@endphp
@section('content')
<section class="toratto-section-background-00">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-sm-12 text-center">
        <h1 class="toratto-custom-page toratto-section-title">{{ get_the_title() }}</h1>
      </div>
    </div>
  </div>
  <div class="container shadow toratto-blog-page">
    @include('partials.blog.nav')
    <div class="row">
      @if ($posts->have_posts())
        @while ($posts->have_posts())
        @php $posts->the_post() @endphp
          @include('partials.blog.card')
        @endwhile
      @else
        <h1>empty</h1>
      @endif
    </div>
    @include('partials.blog.nav')
  </div>
</section>
@endsection

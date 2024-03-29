@php
$currentPage = get_query_var('paged');
$distrito = get_query_var('distrito');
$taxs = array(
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
  )
);
if ($distrito && !empty($distrito)) {
  array_push($taxs, array(
    'taxonomy' => 'res_location',
    'field' => 'slug',
    'terms' => $distrito
  ));
}
$posts = new WP_Query(array(
    'post_type' => 'res_project', // Default or custom post type
    'posts_per_page' => 10, // Max number of posts per page
    'paged' => $currentPage,
    'tax_query' => $taxs,
));
@endphp
@section('content')
<section class="toratto-section-background-00" style="margin-top: 90px;">
  <div class="container">
    <div class="">
      @include('partials.blog.nav')
      <div class="row toratto-project-row">
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
  </div>
</section>
@endsection


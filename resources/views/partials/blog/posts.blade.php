@php
$settings = new  App\Controllers\Setting();
$background_img = $settings->getWebsiteBlogBannerImage();
$currentPage = get_query_var('paged');
$posts = new WP_Query(array(
    'post_type' => 'post', // Default or custom post type
    'posts_per_page' => 9, // Max number of posts per page
    'paged' => $currentPage
));
@endphp
@section('content')
<section class="toratto-section-background-00">
  @if (!empty($background_img))
  <div class="toratto-blog-title-container container-fluid">
    <div class="row" style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url({{$background_img}});background-size: cover;background-repeat: no-repeat;background-position: center;">
      <div class="col-md-12 col-sm-12 text-center toratto-blog-title-col">
        <h1 class="toratto-custom-page toratto-section-title">{{ get_the_title() }}</h1>
      </div>
    </div>
  </div>
  @endif
  <div class="container shadow toratto-blog-page">
    @include('partials.blog.nav')
    <div class="row" style="margin-bottom: 40px">
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

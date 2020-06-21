@php
$thumbID = get_post_thumbnail_id( $post->ID );
$imgDestacada = wp_get_attachment_url( $thumbID );
@endphp
<div class="toratto-section-background-00">
<section class="container toratto-blog-post shadow">
  <article @php post_class() @endphp>
    <div class="row">
      <!-- Post Content Column -->
      <div class="col-lg-8">
        <!-- Title -->
        <h1 class="mt-4">{!! get_the_title() !!}</h1>
        <p class="byline author vcard">
          {{ __('Written by', 'sage') }}
          <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
            {{ get_the_author() }}
          </a>
        </p>
        <hr>
        <!-- Date/Time -->
        <time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
        <hr>
        @if (has_post_thumbnail())
        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{$imgDestacada}}" alt="">
        <hr>
        @endif
        <!-- Post Content -->
        <div class="entry-content">
          @php the_content() @endphp
        </div>
        <hr>
      </div>
    </div>
  </article>
  </section>
</div>

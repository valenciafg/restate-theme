{{--
  Template Name: Home Template
--}}

@extends('layouts.app')
@php 
  $project = new  App\Controllers\Project();
  $projects = $project->getBannerProjects();
  /*
  echo"<pre>";
  print_r($projects);
  echo"</pre>";
  */
  $banner_images = '';
  foreach($projects as $project):
      $banner_images .= $project['main_image'].",";
  endforeach;
  $banner_images = rtrim($banner_images,',');
@endphp
<div class="vegas-images" data-img="{{$banner_images}}" style="display: none;"></div>
<div class="owl-carousel owl-theme">
@foreach ($projects as $project)
  <div class="owl-slide d-flex align-items-center cover" style="background-image: url({{$project['main_image']}});">
    <div class="container">
      <div class="row justify-content-center justify-content-md-start">
        <div class="col-10 col-md-6 static">
          <div class="owl-slide-text">
            <h2 class="owl-slide-animated owl-slide-title">
              {{$project['title']}}
            </h2>
            <div class="owl-slide-animated owl-slide-subtitle mb-3">
              {{$project['slogan']}}
            </div>
            <a class="btn btn-outline-success owl-slide-animated owl-slide-cta" href="{{$project['url']}}" role="button">
            Ver proyecto
            </a>
          </div><!-- /owl-slide-text -->
        </div>
      </div>
    </div>
  </div>
@endforeach
</div>
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
@endsection


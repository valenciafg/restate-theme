{{--
  Template Name: Home Template
--}}

@extends('layouts.app')
@php 
  $project = new  App\Controllers\Project();
  $projects = $project->getBannerProjects();
  /*
  $banner_images = '';
  foreach($projects as $project):
      $banner_images .= $project['main_image'].",";
  endforeach;
  $banner_images = rtrim($banner_images,',');
  */
@endphp
@include('partials.home.banner')
@include('partials.home.popup')
@include('partials.home.posts')
@include('partials.home.promotion')
{{--
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
@endsection
--}}

{{--
  Template Name: Home Template
--}}

@extends('layouts.app')
<div class="voyage-sliderx">

</div>
@php 
  $project = new  App\Controllers\Project();
  $projects = $project->getBannerProjects();
  echo"<pre>";
  print_r($projects);
  echo"</pre>";
  $banner_images = '';
  foreach($projects as $project):
      $banner_images .= $project['main_image'].",";
  endforeach;
  $banner_images = rtrim($banner_images,',');
@endphp
<div class="vegas-images" data-img="{{$banner_images}}" style="display: none;"></div>
<div class="owl-carousel owl-theme">
  <div> Your Content </div>
  <div> Your Content </div>
  <div> Your Content </div>
  <div> Your Content </div>
  <div> Your Content </div>
  <div> Your Content </div>
  <div> Your Content </div>
</div>
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
@endsection


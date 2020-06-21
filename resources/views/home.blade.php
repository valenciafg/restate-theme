{{--
  Template Name: Toratto Home Template
--}}

@extends('layouts.app')
@php
  $project = new  App\Controllers\Project();
  $projects = $project->getBannerProjects();
@endphp
@include('partials.home.banner')
@include('partials.home.popup')
@include('partials.home.posts')
@include('partials.home.promotion')
@include('partials.home.blog')
@include('partials.home.social')
{{--
@include('partials.home.social')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
@endsection
--}}

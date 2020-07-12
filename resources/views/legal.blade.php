{{--
  Template Name: Toratto Legal Information Template
--}}
@php
  $post = get_post();
  $content = $post->post_content;
@endphp
@extends('layouts.app')
@include('partials.legal.content')

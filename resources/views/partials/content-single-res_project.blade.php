@php
$projectObj = new  App\Controllers\Project();
$post = get_post();
$project = $projectObj->getSingleProject($post->ID);
/*
echo"<pre>";
print_r($project);
echo"</pre>";
*/
@endphp
@include('partials.res_project.banner')
@include('partials.res_project.info')
{{-- @include('partials.res_project.common_areas') --}}
@include('partials.res_project.gallery')
@include('partials.res_project.panoramic')
@include('partials.res_project.promotional_video')
@include('partials.res_project.models')
@include('partials.res_project.location')
@include('partials.res_project.social')

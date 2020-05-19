<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class Project extends Controller
{
    private $postObj;
    private $post_type_name = 'res_project';
    private $query;
    private $posts;

    public function __construct() {
        $this->postObj = new Post();
    }

    public function getProjectsQuery($limit = -1) {
        $this->query = $this->postObj->getPostByPostType($this->post_type_name, $limit);
        $this->posts = $this->query->get_posts();
    }

    public function getProjectGallery($gallery) {
        $images = [];
        foreach ($gallery as $id) {
            if(!empty($id)) {
                $image_url = wp_get_attachment_url($id);
                $thumbnail_url = wp_get_attachment_thumb_url($id);
                $images[] = [
                    'image_url' => $image_url,
                    'thumbnail_url' => $thumbnail_url
                ];
            }
        }
        return $images;
    }

    public function getProjectAttachments($file_list) {
        $files = [];
        foreach ($file_list as $id) {
            $file = wp_get_attachment_url($id);
            $files[] = $file;
        }
        return $files;
    }

    public function getProjectFile($files) {
        $file = "";
        if(!empty($files)) {
            $file = wp_get_attachment_url($files[0]);
        }
        return $file;
    }

    public function getProjectModels($model_list) {
        $models = [];
        if(!empty($model_list) && !empty($model_list[0]['restate_project_model_name'])){
            foreach ($model_list as $model) {
                $models[] = [
                    "name" => $model['restate_project_model_name'],
                    "total_area" => $model['restate_project_model_total_area'],
                    "room_number" => $model['restate_project_model_room_number'],
                    "starting_price_pen" => $model['restate_project_model_starting_price_pen'],
                    "starting_price_usd" => $model['restate_project_model_starting_price_usd'],
                    "blueprint" => $this->getProjectFile($model['restate_project_model_blueprints'])
                ];
            }
        }
        return $models;
    }

    public function getProjects($limit = -1) {
        $this->getProjectsQuery($limit);
        $data = array();
        if(!empty($this->posts)) {
            $posts = $this->posts;
            foreach ($posts as $post) {
                $id = $post->ID;
                $title = get_the_title($id);
                $url = get_permalink($id);
                $main_image = wp_get_attachment_url(get_post_thumbnail_id($id));
                $logo = get_post_meta($id, "restate_project_logo_image");
                $logo = $this->getProjectFile($logo);
                $slogan = get_post_meta($id, "restate_project_slogan", true);
                $show_banner = get_post_meta($id, "restate_project_show_banner", true);
                $delivery_date = get_post_meta($id, "restate_project_delivery_date", true);
                $starting_price_pen = get_post_meta($id, "restate_project_starting_price_pen", true);
                $starting_price_usd = get_post_meta($id, "restate_project_starting_price_usd", true);
                $max_rooms = get_post_meta($id, "restate_project_max_rooms", true);
                $min_area = get_post_meta($id, "restate_project_min_area", true);
                $max_area = get_post_meta($id, "restate_project_max_area", true);
                $address = get_post_meta($id, "restate_project_address", true);
                $coordinate_x = get_post_meta($id, "restate_project_coordinate_x", true);
                $coordinate_y = get_post_meta($id, "restate_project_coordinate_y", true);
                $inside_photos = get_post_meta($id, 'restate_project_inside_photos', false);
                $inside_photos = $this->getProjectGallery($inside_photos);
                $outside_photos = get_post_meta($id, 'restate_project_outside_photos', false);
                $outside_photos = $this->getProjectGallery($outside_photos);
                $brochures_files = get_post_meta($id, 'restate_project_brochure_file', false);
                $brochures_files = $this->getProjectFile($brochures_files);
                $terms_and_conditions = get_post_meta($id, "restate_project_information_conditions", true);
                $models = get_post_meta($id, "restate_project_models");
                $models = $this->getProjectModels($models[0]);
                $data[] = [
                    'id'                    => $id,
                    'title'                 => $title,
                    'url'                   => $url,
                    'logo'                  => $logo,
                    'main_image'            => $main_image,
                    'slogan'                => $slogan,
                    'show_banner'           => $show_banner,
                    'delivery_date'         => $delivery_date,
                    'starting_price_pen'    => $starting_price_pen,
                    'starting_price_usd'    => $starting_price_usd,
                    'max_rooms'             => $max_rooms,
                    'min_area'              => $min_area,
                    'max_area'              => $max_area,
                    'address'               => $address,
                    'coordinate_x'          => $coordinate_x,
                    'coordinate_y'          => $coordinate_y,
                    'inside_photos'         => $inside_photos,
                    'outside_photos'        => $outside_photos,
                    'brochure'              => $brochures_files,
                    'terms_and_conditions'  => $terms_and_conditions,
                    'models'                => $models
                ];
            }
        }
        return $data;
    }

    public function getBannerProjects() {
        $projects = $this->getProjects();
        $data = [];
        foreach($projects as $project) {
            if($project['show_banner'] == "TRUE") {
                $data[] = $project;
            }
        }
        return $data;
    }
}
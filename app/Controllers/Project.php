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

    public function getFullGallery($gallery) {
        $images = [];
        if(!empty($gallery)) {
            foreach ($gallery as $image) {
                $images[] = $image['image_url'];
            }
        } else {
            $images[] = get_stylesheet_directory_uri()."/assets/images/departamento_default.jpg";
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

    public function getProjectFileThumb($files) {
        $file = "";
        if(!empty($files)) {
            $file = wp_get_attachment_thumb_url($files[0]);
        }
        return $file;
    }

    public function getProjectCategories($id) {
        $categories = [];
        $common_areas = [];
        $terms = get_the_terms($id, 'res_common_area');
        if($terms) {
            foreach ($terms as $t) {
                $common_areas[] = $t->name;
            }
        }
        $location = [];
        $terms = get_the_terms($id, 'res_location');
        if($terms) {
            foreach ($terms as $t) {
                $location[] = $t->name;
            }
        }
        $type = [];
        $terms = get_the_terms($id, 'res_project_type');
        if($terms) {
            foreach ($terms as $t) {
                $type[] = $t->name;
            }
        }
        $stage = [];
        $terms = get_the_terms($id, 'res_stage');
        if($terms) {
            foreach ($terms as $t) {
                $stage[] = $t->name;
            }
        }

        $categories = [
            'common_areas'  => $common_areas,
            'location'      => $location,
            'type'          => $type,
            'stage'         => $stage
        ];
        return $categories;
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
                    "blueprint" => $this->getProjectFile($model['restate_project_model_blueprints']),
                    "blueprint_thumbnail" => $this->getProjectFileThumb($model['restate_project_model_blueprints'])
                ];
            }
        }
        return $models;
    }

    public function getPanoramicGallery($panoramic_list) {
        $gallery = [];
        if(!empty($panoramic_list) && !empty($panoramic_list[0]['restate_project_panoramic_caption'])){
            foreach ($panoramic_list as $image) {
                $id = $image['restate_project_panoramic_image'][0];
                $image_url = wp_get_attachment_url($id);
                $thumbnail_url = wp_get_attachment_thumb_url($id);
                $gallery[] = [
                    "caption" => $image['restate_project_panoramic_caption'],
                    "image_url" => $image_url,
                    "thumbnail_url" => $thumbnail_url,
                ];
            }
        }
        return $gallery;
    }

    public function getProjectLegalDocs($doc_list) {
        $docs = [];
        if(!empty($doc_list) && !empty($doc_list[0]['restate_project_legal_doc_name'])){
            foreach ($doc_list as $doc) {
                $docs[] = [
                    "name" => $doc['restate_project_legal_doc_name'],
                    "file" => $this->getProjectFile($doc['restate_project_legal_doc_file'])
                ];
            }
        }
        return $docs;
    }

    public function getProjects($limit = -1) {
        $this->getProjectsQuery($limit);
        $data = array();
        if(!empty($this->posts)) {
            $posts = $this->posts;
            foreach ($posts as $post) {
                $id = $post->ID;
                $data[] = $this->getSingleProject($id);
            }
        }
        return $data;
    }

    public function getSingleProject($id) {
        $data = array();
        $title = get_the_title($id);
        $excerpt = get_the_excerpt($id);
        $url = get_permalink($id);
        $main_image = wp_get_attachment_url(get_post_thumbnail_id($id));
        $main_image = $main_image ? $main_image : get_stylesheet_directory_uri()."/assets/images/departamento_default.jpg";
        $facade = get_post_meta($id, "restate_project_facade_image");
        $facade = $this->getProjectFile($facade);
        $facade = $facade !== "" ? $facade : get_stylesheet_directory_uri()."/assets/images/default_facade.jpg";
        $show_popup = get_post_meta($id, "restate_project_show_popup", true);
        $popup_image = get_post_meta($id, "restate_project_popup_image");
        $popup_image = $this->getProjectFile($popup_image);
        $categories = $this->getProjectCategories($id);
        $logo = get_post_meta($id, "restate_project_logo_image");
        $logo = $this->getProjectFile($logo);
        $show_facade_banner = get_post_meta($id, "restate_project_show_facade_banner", true);
        $facade_banner_img = get_post_meta($id, "restate_project_facade_banner_image");
        $facade_banner_img = $this->getProjectFile($facade_banner_img);
        $slogan = get_post_meta($id, "restate_project_slogan", true);
        $show_banner = get_post_meta($id, "restate_project_show_banner", true);
        $show_home = get_post_meta($id, "restate_project_show_home", true);
        $delivery_date = get_post_meta($id, "restate_project_delivery_date", true);
        $starting_price_pen = get_post_meta($id, "restate_project_starting_price_pen", true);
        $end_price_pen = get_post_meta($id, "restate_project_end_price_pen", true);
        $starting_price_usd = get_post_meta($id, "restate_project_starting_price_usd", true);
        $end_price_usd = get_post_meta($id, "restate_project_end_price_usd", true);
        $max_rooms = get_post_meta($id, "restate_project_max_rooms", true);
        $min_area = get_post_meta($id, "restate_project_min_area", true);
        $max_area = get_post_meta($id, "restate_project_max_area", true);
        $address = get_post_meta($id, "restate_project_address", true);
        $coordinate_x = get_post_meta($id, "restate_project_coordinate_x", true);
        $coordinate_y = get_post_meta($id, "restate_project_coordinate_y", true);
        $gmap_image = get_post_meta($id, "restate_project_gmap_image");
        $gmap_image = $this->getProjectFile($gmap_image);
        $inside_photos = get_post_meta($id, 'restate_project_inside_photos', false);
        $inside_photos = $this->getProjectGallery($inside_photos);
        $outside_photos = get_post_meta($id, 'restate_project_outside_photos', false);
        $outside_photos = $this->getProjectGallery($outside_photos);
        $gallery  = $this->getFullGallery(array_merge($inside_photos, $outside_photos));
        $panoramic_gallery = get_post_meta($id, "restate_project_panoramics", true);
        $panoramic_gallery = $this->getPanoramicGallery($panoramic_gallery);
        $video = get_post_meta($id, "restate_project_promotional_video", true);
        $video_background = get_post_meta($id, "restate_project_promotional_video_background");
        $video_background = $this->getProjectFile($video_background);
        $brochures_files = get_post_meta($id, 'restate_project_brochure_file', false);
        $brochures_files = $this->getProjectFile($brochures_files);
        $terms_and_conditions = get_post_meta($id, "restate_project_information_conditions", true);
        $advisor_fullname = get_post_meta($id, 'restate_project_advisor_fullname', true);
        $advisor_ws_number = get_post_meta($id, 'restate_project_advisor_whatsapp_number', true);
        $advisor_email = get_post_meta($id, 'restate_project_advisor_email', true);
        $advisor_gender = get_post_meta($id, 'restate_project_advisor_gender', true);
        $models = get_post_meta($id, "restate_project_models");
        $models = $this->getProjectModels($models[0]);
        $legal_info = get_post_meta($id, "restate_project_legal_info", true);
        $legal_docs = get_post_meta($id, "restate_project_legal_docs");
        $legal_docs = $this->getProjectLegalDocs($legal_docs[0]);
        $data = [
            'id'                    => $id,
            'title'                 => $title,
            'excerpt'               => $excerpt,
            'url'                   => $url,
            'logo'                  => $logo,
            'main_image'            => $main_image,
            'facade'                => $facade,
            'categories'            => $categories,
            'slogan'                => $slogan,
            'show_banner'           => $show_banner,
            'show_home'             => $show_home,
            'show_facade_banner'    => $show_facade_banner,
            'show_popup'            => $show_popup,
            'popup_image'           => $popup_image,
            'facade_banner_img'     => $facade_banner_img,
            'delivery_date'         => $delivery_date,
            'starting_price_pen'    => $starting_price_pen,
            'end_price_pen'         => $end_price_pen,
            'starting_price_usd'    => $starting_price_usd,
            'end_price_usd'         => $end_price_usd,
            'max_rooms'             => $max_rooms,
            'min_area'              => $min_area,
            'max_area'              => $max_area,
            'address'               => $address,
            'coordinate_x'          => $coordinate_x,
            'coordinate_y'          => $coordinate_y,
            'gmap_image'            => $gmap_image,
            'inside_photos'         => $inside_photos,
            'panoramic_gallery'     => $panoramic_gallery,
            'video'                 => $video,
            'video_background'      => $video_background,
            'gallery'               => $gallery,
            'outside_photos'        => $outside_photos,
            'brochure'              => $brochures_files,
            'terms_and_conditions'  => $terms_and_conditions,
            'advisor_fullname'      => $advisor_fullname,
            'advisor_ws_number'     => $advisor_ws_number,
            'advisor_email'         => $advisor_email,
            'advisor_gender'        => $advisor_gender,
            'models'                => $models,
            'legal_info'            => $legal_info,
            'legal_docs'            => $legal_docs

        ];
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

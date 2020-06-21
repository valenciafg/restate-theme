<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class Post extends Controller
{
    public function getPostByPostType($post_type = "post", $limit = -1){
        $pt = $post_type;
        $args = array(
            'posts_per_page'    => $limit,
            'post_type'         => $pt,
            'post_status'       => array('publish', 'inherit'),
            'order'             => 'DESC',
        );
        $query = new WP_Query($args);
        return $query;
    }
}
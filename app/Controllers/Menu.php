<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class Menu extends Controller
{
    public function getPrimaryNavigationMenuItems() {
        $menu = [];
        $menu_name = 'primary_navigation';
        $locations = get_nav_menu_locations();
        if(isset($locations[ $menu_name ])) {
            $menu_id = $locations[$menu_name];
            $menu = wp_get_nav_menu_object($menu_id);
        }
        
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        return $menu_items;
    }
}
<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;
use App\Controllers\Setting;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    $setting = new Setting();
    $all_settings = $setting->getAllSettings();
    $localized_array = array(
        'ajaxurl'                   => admin_url('admin-ajax.php'),
        'siteurl'                   => get_bloginfo('url'),
        'stylesheet_directory_uri'  => get_stylesheet_directory_uri(),
        'upload'                    => admin_url( 'admin-ajax.php?action=handle_dropped_media' ),
        'delete'                    => admin_url( 'admin-ajax.php?action=handle_deleted_media' ),
        'pbx_server'                => $all_settings['pbx_server'],
        'pbx_port'                  => $all_settings['pbx_port'],
        'pbx_aor'                   => $all_settings['pbx_aor'],
        'pbx_username'              => $all_settings['pbx_username'],
        'pbx_password'              => $all_settings['pbx_password'],
        'pbx_main_extension'        => $all_settings['pbx_main_extension'],
    );

    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_register_style( 'ERP_TORATTO_CHAT_CSS', 'https://erp.grupotoratto.com/im_livechat/external_lib.css' );
    wp_enqueue_style('ERP_TORATTO_CHAT_CSS');
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, false);
    wp_register_script( 'ERP_TORATTO_CHAT_JS', 'https://erp.grupotoratto.com/im_livechat/external_lib.js', null, null, false );
    wp_enqueue_script('ERP_TORATTO_CHAT_JS');
    wp_register_script( 'ERP_TORATTO_CHAT_JS2', 'https://erp.grupotoratto.com/im_livechat/loader/1', null, null, false );
    wp_enqueue_script('ERP_TORATTO_CHAT_JS2');
    wp_register_script( 'ERP_TORATTO_CHAT_JS2', 'https://erp.grupotoratto.com/im_livechat/loader/1', null, null, false );
    wp_enqueue_script('ERP_TORATTO_CHAT_JS2');
    wp_register_script( 'RECAPTCHA_JS', 'https://www.google.com/recaptcha/api.js?render=6LeYbLIZAAAAAAH9SxfpOUMGTaj6mXdclMez6SNt', null, null, false );
    wp_enqueue_script('RECAPTCHA_JS');
    wp_localize_script('sage/main.js','sage_vars', $localized_array);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

add_action( 'wp_ajax_toratto_quotation_form', 'App\Controllers\TorattoAjax::toratto_quotation_form');
add_action( 'wp_ajax_nopriv_toratto_quotation_form', 'App\Controllers\TorattoAjax::toratto_quotation_form');

add_action( 'wp_ajax_toratto_contact_form', 'App\Controllers\TorattoAjax::toratto_contact_form');
add_action( 'wp_ajax_nopriv_toratto_contact_form', 'App\Controllers\TorattoAjax::toratto_contact_form');

add_action( 'wp_ajax_toratto_complaints_book_from', 'App\Controllers\TorattoAjax::toratto_complaints_book_from');
add_action( 'wp_ajax_nopriv_toratto_complaints_book_from', 'App\Controllers\TorattoAjax::toratto_complaints_book_from');

add_action( 'wp_ajax_toratto_land_purchase_form', 'App\Controllers\TorattoAjax::toratto_land_purchase_form');
add_action( 'wp_ajax_nopriv_toratto_land_purchase_form', 'App\Controllers\TorattoAjax::toratto_land_purchase_form');

add_action( 'wp_ajax_handle_dropped_media', 'App\Controllers\TorattoAjax::handle_dropped_media');
add_action( 'wp_ajax_nopriv_handle_dropped_media', 'App\Controllers\TorattoAjax::handle_dropped_media');

add_action( 'wp_ajax_handle_deleted_media', 'App\Controllers\TorattoAjax::handle_deleted_media');
add_action( 'wp_ajax_nopriv_handle_deleted_media', 'App\Controllers\TorattoAjax::handle_deleted_media');

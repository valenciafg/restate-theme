<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Setting extends Controller
{
    private $settings;

    public function __construct() {
        $this->settings = get_option('real_estate_setting');
    }

    public function getSettings(){
        return $this->settings;
    }

    public function getWebsiteLogoId($logo_type) {
        $agency_logo = (isset($this->settings[$logo_type])?$this->settings[$logo_type]:[]);
        if(empty($agency_logo))
            return false;
        if(empty($agency_logo[0]))
            return false;
        return $agency_logo[0];
    }

    private function getAttachmentUrl($id) {
        return $id ? wp_get_attachment_url($id) : "";
    }

    public function getWebsitePrimaryLogo() {
        $logo_id = $this->getWebsiteLogoId('real_estate_setting_main_logo');
        return $this->getAttachmentUrl($logo_id);
    }

    public function getWebsiteSecundaryLogo() {
        $logo_id = $this->getWebsiteLogoId('real_estate_setting_secundary_logo');
        return $this->getAttachmentUrl($logo_id);
    }

    public function getWebsitePopupImage() {
        $logo_id = $this->getWebsiteLogoId('real_estate_setting_popup_image');
        return $this->getAttachmentUrl($logo_id);
    }

    public function getWebsitePromotionImage() {
        $logo_id = $this->getWebsiteLogoId('real_estate_setting_promotion_image');
        return $this->getAttachmentUrl($logo_id);
    }

    public function getWebsiteBlogBannerImage() {
        $logo_id = $this->getWebsiteLogoId('real_estate_setting_blog_banner_image');
        return $this->getAttachmentUrl($logo_id);
    }

    public function getFacebookPosts($list) {
        $posts = [];
        foreach ($list as $post) {
            if(!empty($post['real_estate_setting_social_fb_embed'])) {
                $posts[] = $post['real_estate_setting_social_fb_embed'];
            }
        }
        return $posts;
    }

    public function getSocialStreams($list) {
        $posts = [];
        foreach ($list as $post) {
            if(!empty($post['real_estate_setting_social_post_code']) && !empty($post['real_estate_setting_social_post_type'])) {
                $posts[] = array(
                    'code' => $post['real_estate_setting_social_post_code'],
                    'type' => $post['real_estate_setting_social_post_type']
                );
            }
        }
        return $posts;
    }

    public  function getAllSettings(){
        $config_data = [];
        $settings = $this->settings;
        $config_data = [
            'primary_logo'          => $this->getWebsitePrimaryLogo(),
            'secundary_logo'        => $this->getWebsiteSecundaryLogo(),
            'show_popup'            => (isset($settings['real_estate_setting_show_popup'])?$settings['real_estate_setting_show_popup'][0]:''),
            'popup_image'           => $this->getWebsitePopupImage(),
            'popup_url'             => (isset($settings['real_estate_setting_popup_image_url'])?$settings['real_estate_setting_popup_image_url']:''),
            'show_promotion'        => (isset($settings['real_estate_setting_show_promotion'])?$settings['real_estate_setting_show_promotion'][0]:''),
            'promotion_image'       => $this->getWebsitePromotionImage(),
            'blog_image'            => $this->getWebsiteBlogBannerImage(),
            'description'           => (isset($settings['real_estate_setting_main_description'])?$settings['real_estate_setting_main_description']:''),
            'address'               => (isset($settings['real_estate_setting_main_address'])?$settings['real_estate_setting_main_address']:''),
            'postal_code'           => (isset($settings['real_estate_setting_main_postal_code'])?$settings['real_estate_setting_main_postal_code']:''),
            'city'                  => (isset($settings['real_estate_setting_main_city'])?$settings['real_estate_setting_main_city']:''),
            'country'               => (isset($settings['real_estate_setting_main_country'])?$settings['real_estate_setting_main_country']:''),
            'email'                 => (isset($settings['real_estate_setting_main_email'])?$settings['real_estate_setting_main_email']:''),
            'phone'                 => (isset($settings['real_estate_setting_main_phone'])?$settings['real_estate_setting_main_phone']:''),
            'promotion_video'       => (isset($settings['real_estate_setting_promotional_video'])?$settings['real_estate_setting_promotional_video']:''),
            'recaptcha_site_key'    => (isset($settings['real_estate_setting_main_recaptcha_site_key'])?$settings['real_estate_setting_main_recaptcha_site_key']:''),
            'recaptcha_secret_key'  => (isset($settings['real_estate_setting_main_recaptcha_secret_key'])?$settings['real_estate_setting_main_recaptcha_secret_key']:''),
            'gmap_api_key'          => (isset($settings['real_estate_setting_main_google_maps_api_key'])?$settings['real_estate_setting_main_google_maps_api_key']:''),
            'whatsapp'              => (isset($settings['real_estate_setting_social_whatsapp'])?$settings['real_estate_setting_social_whatsapp']:''),
            'facebook'              => (isset($settings['real_estate_setting_social_facebook'])?$settings['real_estate_setting_social_facebook']:''),
            'facebook_posts'        => (isset($settings['real_estate_setting_social_fb_posts'])?$this->getFacebookPosts($settings['real_estate_setting_social_fb_posts']):[]),
            'social_streams'        => (isset($settings['real_estate_setting_social_posts'])?$this->getSocialStreams($settings['real_estate_setting_social_posts']):[]),
            'twitter'               => (isset($settings['real_estate_setting_social_twitter'])?$settings['real_estate_setting_social_twitter']:''),
            'pinterest'             => (isset($settings['real_estate_setting_social_pinterest'])?$settings['real_estate_setting_social_pinterest']:''),
            'linkedin'              => (isset($settings['real_estate_setting_social_linkedin'])?$settings['real_estate_setting_social_linkedin']:''),
            'gplus'                 => (isset($settings['real_estate_setting_social_gplus'])?$settings['real_estate_setting_social_gplus']:''),
            'skype'                 => (isset($settings['real_estate_setting_social_skype'])?$settings['real_estate_setting_social_skype']:''),
            'instagram'             => (isset($settings['real_estate_setting_social_instagram'])?$settings['real_estate_setting_social_instagram']:''),
            'youtube'               => (isset($settings['real_estate_setting_social_youtube'])?$settings['real_estate_setting_social_youtube']:''),
            'pbx_server'            => (isset($settings['real_estate_setting_te_server'])?$settings['real_estate_setting_te_server']:''),
            'pbx_port'              => (isset($settings['real_estate_setting_te_port'])?$settings['real_estate_setting_te_port']:''),
            'pbx_aor'               => (isset($settings['real_estate_setting_te_aor'])?$settings['real_estate_setting_te_aor']:''),
            'pbx_username'          => (isset($settings['real_estate_setting_te_username'])?$settings['real_estate_setting_te_username']:''),
            'pbx_password'          => (isset($settings['real_estate_setting_te_password'])?$settings['real_estate_setting_te_password']:''),
            'pbx_main_extension'    => (isset($settings['real_estate_setting_te_extension'])?$settings['real_estate_setting_te_extension']:''),
            'pbx_help'    => (isset($settings['real_estate_setting_te_help'])?$settings['real_estate_setting_te_help']:''),
        ];
        return $config_data;
    }

    public function printSetting() {
        echo "<pre>";
        print_r($this->settings);
        echo "</pre>";
    }
}

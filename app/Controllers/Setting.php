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

    public  function getAllSettings(){
        $config_data = [];
        $settings = $this->settings;
        // $config_data['currency'] = $this->getCurrency();
        // $config_data['timezone'] = $this->getTimeZone();
        // $config_data['use'] = $this->getWebsiteUse();
        $config_data['primary_logo'] = $this->getWebsitePrimaryLogo();
        $config_data['secundary_logo'] = $this->getWebsiteSecundaryLogo();
        $config_data['show_popup'] = (isset($settings['real_estate_setting_show_popup'])?$settings['real_estate_setting_show_popup']:'');
        $config_data['popup_image'] = $this->getWebsitePopupImage();
        $config_data['description'] = (isset($settings['real_estate_setting_main_description'])?$settings['real_estate_setting_main_description']:'');        
        $config_data['address'] = (isset($settings['real_estate_setting_main_address'])?$settings['real_estate_setting_main_address']:'');
        $config_data['postal_code'] = (isset($settings['real_estate_setting_main_postal_code'])?$settings['real_estate_setting_main_postal_code']:'');
        $config_data['city'] = (isset($settings['real_estate_setting_main_city'])?$settings['real_estate_setting_main_city']:'');
        $config_data['country'] = (isset($settings['real_estate_setting_main_country'])?$settings['real_estate_setting_main_country']:'');
        $config_data['email'] = (isset($settings['real_estate_setting_main_email'])?$settings['real_estate_setting_main_email']:'');
        $config_data['phone'] = (isset($settings['real_estate_setting_main_phone'])?$settings['real_estate_setting_main_phone']:'');

        

/*
        $config_data['google_map'] = (isset($settings['google_map'])?$settings['google_map']:'');
        $config_data['insurance'] = (isset($settings['insurance'])?$settings['insurance']:[]);
        $config_data['captcha'] = $this->getRecaptchaData();        
        $config_data['logo'] = $this->getWebsiteLogo();

        $config_data['wpml_lang'] = $this->helper->getActiveLanguageCode();
        $config_data['blog_language'] = $this->helper->getBlogLanguageSimple();
        $config_data['cpt'] = $this->qBuilder->getPostTypes();
*/
        return $config_data;
    }

    public function printSetting() {
        print_r($this->settings);
    }
}
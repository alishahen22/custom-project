<?php

namespace App\Settings;

use Mockery\Matcher\Any;
use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name_ar;
    public string $site_name_en;
    public string $decs_footer_ar;
    public string $decs_footer_en;
    public string $logo_footer = 'settings/logo.png';
   public string $logo = 'settings/logo.png';
    public string $favicon = 'settings/favicon.png';
    public string $email;
    public string $phone;
    public string $whatsapp;
    public string $website;
    public string $facebook;
    public string $twitter;
    public string $snapchat;
    public string $youtube;
    public string $instagram;
    public string $linkedin;
    public string $address;
    public  string| array $location ;
    public string $meta_title_ar;
    public string $meta_title_en;
    public string $meta_description_ar;
    public string $meta_description_en;
    public array $meta_keywords_ar;  // Updated to array
    public array $meta_keywords_en;  // Updated to array
    public string $about_desc_ar;
    public string $about_desc_en;
    public string $about_image;
    public string $seo_desc_ar;
    public string $seo_desc_en;
    public string $seo_image;
    public string $vision_ar;
    public string $vision_en;
    public string $message_ar;
    public string $message_en;
    public string $message_image;
    public string $value_desc_ar;
    public string $value_desc_en;
    public string $value_image;
    public string $seo_title_en;
    public string $seo_title_ar;

    public static function group(): string
    {
        return 'general';
    }
}

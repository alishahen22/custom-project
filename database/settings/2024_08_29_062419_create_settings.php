<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name_ar', 'موقعي');
        $this->migrator->add('general.site_name_en', 'My website');
        $this->migrator->add('general.logo', 'This is my website');
        $this->migrator->add('general.favicon', 'This is my website');
        $this->migrator->add('general.meta_title_ar', 'My website');
        $this->migrator->add('general.meta_title_en', 'My website');
        $this->migrator->add('general.meta_description_ar', 'This is my website');
        $this->migrator->add('general.meta_description_en', 'This is my website');
        $this->migrator->add('general.meta_keywords_ar', ['keyword1', 'keyword2', 'keyword3']);
        $this->migrator->add('general.meta_keywords_en', ['keyword1', 'keyword2', 'keyword3']);
        $this->migrator->add('general.phone', '');
        $this->migrator->add('general.email', '');
        $this->migrator->add('general.website', '');
        $this->migrator->add('general.whatsapp', '');
        $this->migrator->add('general.facebook', '');
        $this->migrator->add('general.twitter', '');
        $this->migrator->add('general.snapchat', '');
        $this->migrator->add('general.youtube', '');
        $this->migrator->add('general.instagram', '');
        $this->migrator->add('general.linkedin', '');
        $this->migrator->add('general.address', '');
        $this->migrator->add('general.location', '');
        $this->migrator->add('general.about_desc_ar', '');
        $this->migrator->add('general.about_desc_en', '');
        $this->migrator->add('general.about_image', '');
        $this->migrator->add('general.seo_desc_ar', '');
        $this->migrator->add('general.seo_desc_en', '');
        $this->migrator->add('general.seo_image', '');
        $this->migrator->add('general.vision_ar', '');
        $this->migrator->add('general.vision_en', '');
        $this->migrator->add('general.message_ar', '');
        $this->migrator->add('general.message_en', '');
        $this->migrator->add('general.message_image', '');
        $this->migrator->add('general.value_desc_ar', '');
        $this->migrator->add('general.value_desc_en', '');
        $this->migrator->add('general.value_image', '');
    }
};

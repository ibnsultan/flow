<?php
namespace App\Database\Seeds;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Setting::truncate();

        $settings = array(
            array(
                "key" => "site_name",
                "value" => "Flow",
            ),
            array(
                "key" => "site_url",
                "value" => "https://flow.test",
            ),
            array(
                "key" => "favicon",
                "value" => "/assets/images/brand/icon.png",
            ),
            array(
                "key" => "system_version",
                "value" => "alpha",
            ),
            array(
                "key" => "theme_layout",
                "value" => "ltr",
            ),
            array(
                "key" => "allow_landing",
                "value" => "true",
            ),
            array(
                "key" => "allow_blog",
                "value" => "false",
            ),
            array(
                "key" => "allow_apis",
                "value" => "true",
            ),
            array(
                "key" => "theme_contrast",
                "value" => "true",
            ),
            array(
                "key" => "theme_color",
                "value" => "preset-9",
            ),
            array(
                "key" => "logo_light",
                "value" => "/assets/images/brand/logo.png",
            ),
            array(
                "key" => "logo_dark",
                "value" => "/assets/images/brand/logo.png",
            ),
            array(
                "key" => "meta_keywords",
                "value" => NULL,
            ),
            array(
                "key" => "meta_image",
                "value" => NULL,
            ),
            array(
                "key" => "meta_description",
                "value" => NULL,
            ),
            array(
                "key" => "user_confirm",
                "value" => "false",
            ),
            array(
                "key" => "allow_notification",
                "value" => "true",
            ),
            array(
                "key" => "allow_announcement",
                "value" => "true",
            ),
            array(
                "key" => "allow_registration",
                "value" => "false",
            ),
        );
        
        foreach($settings as $entry) {
            Setting::create($entry);
        }
    }
}

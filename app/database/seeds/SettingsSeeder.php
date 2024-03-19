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
        // You can directly create db records

        $setting = new Setting();
        $settings = array(
            array(
                "key" => "logo_light",
                "value" => "/assets/images/brand/logo.png",
            ),
            array(
                "key" => "logo_dark",
                "value" => "/assets/images/brand/logo.png",
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
                "key" => "default_layout",
                "value" => "ltr",
            ),
            array(
                "key" => "allow_landing",
                "value" => "true",
            ),
            array(
                "key" => "allow_blog",
                "value" => "true",
            ),
            array(
                "key" => "allow_apis",
                "value" => "true",
            ),
        );

        foreach($settings as $entry) {
            $setting->create($entry);
        }
    }
}

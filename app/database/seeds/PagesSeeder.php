<?php
namespace App\Database\Seeds;

use App\Models\Page;
use App\Database\Factories\PageFactory;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $pages = array(
            array(
                "title" => "Privacy Policy",
                "slug" => "privacy",
                "content" => "",
                "status" => "live",
                "meta_keywords" => "",
                "meta_description" => ""
            ),
            array(
                "title" => "Terms of Use",
                "slug" => "terms",
                "content" => "",
                "status" => "live",
                "meta_keywords" => NULL,
                "meta_description" => NULL
            ),
        );

        foreach($pages as $page) {
            Page::create($page);
        }
        
    }
}

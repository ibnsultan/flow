<?php
namespace App\Database\Seeds;

use App\Models\BlogCategories;
use App\Database\Factories\BlogCategoryFactory;
use Illuminate\Database\Seeder;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        BlogCategories::create([
            'name' => 'General',
            'description' => 'This is the default category for blog articles'
        ]);
    }
}

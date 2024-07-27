<?php
namespace App\Database\Seeds;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {

        BlogCategory::truncate();

        BlogCategory::create([
            'name' => 'General',
            'description' => 'This is the default category for blog articles'
        ]);
    }
}

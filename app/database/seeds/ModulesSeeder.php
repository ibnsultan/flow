<?php
namespace App\Database\Seeds;

use App\Models\Module;
use App\Database\Factories\ModuleFactory;
use Illuminate\Database\Seeder;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Module::truncate();

        $modules = array(
            array(
                "id" => 1,
                "name" => "user",
                "description" => NULL,
                "status" => 1,
                "is_core" => 1,
                "created_at" => "2024-05-18 11:29:47",
                "updated_at" => "2024-06-21 13:50:59",
            ),
            array(
                "id" => 2,
                "name" => "app",
                "description" => NULL,
                "status" => 1,
                "is_core" => 1,
                "created_at" => "2024-06-19 10:15:50",
                "updated_at" => "2024-06-21 13:50:59",
            ),
            array(
                "id" => 3,
                "name" => "blog",
                "description" => NULL,
                "status" => 1,
                "is_core" => 0,
                "created_at" => "2024-06-19 10:18:26",
                "updated_at" => "2024-06-24 11:06:18",
            ),
            array(
                "id" => 4,
                "name" => "page",
                "description" => NULL,
                "status" => 1,
                "is_core" => 0,
                "created_at" => "2024-06-19 10:18:37",
                "updated_at" => "2024-07-21 20:01:02",
            ),
            array(
                "id" => 5,
                "name" => "announcement",
                "description" => NULL,
                "status" => 1,
                "is_core" => 0,
                "created_at" => "2024-06-19 10:19:02",
                "updated_at" => "2024-06-24 11:06:34",
            ),
            array(
                "id" => 6,
                "name" => "api",
                "description" => NULL,
                "status" => 1,
                "is_core" => 0,
                "created_at" => "2024-06-19 10:20:40",
                "updated_at" => "2024-07-09 14:17:48",
            ),
        );

        foreach($modules as $module) {
            Module::updateOrCreate(['id' => $module['id']], $module);
        }
    }
}

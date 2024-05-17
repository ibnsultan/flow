<?php
namespace App\Database\Seeds;

use App\Models\PermissionType;
use App\Database\Factories\PermissionTypeFactory;
use Illuminate\Database\Seeder;

class PermissionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $permission_types = ["added", "owned", "both", "all", "none"];

        foreach ($permission_types as $type) {
            PermissionType::create([
                "name" => $type
            ]);
        }
        
    }
}

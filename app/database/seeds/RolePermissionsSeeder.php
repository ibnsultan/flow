<?php
namespace App\Database\Seeds;

use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Database\Seeder;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        RolePermission::truncate();
        $permissions = Permission::all();
        
        foreach ($permissions as $permission) {
            RolePermission::create([
                "role_id" => 1,
                "permission_id" => $permission->id,
                "permission_type_id" => 1
            ]);
        }
    }
}

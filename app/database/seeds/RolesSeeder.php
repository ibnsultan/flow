<?php
namespace App\Database\Seeds;

use App\Models\Role;
use App\Database\Factories\RoleFactory;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        // admin
        Role::create([
            "name" => "admin",
            "description" => "Admin role"
        ]);
    }
}

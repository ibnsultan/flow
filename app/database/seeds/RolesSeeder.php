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
        Role::truncate();

        $roles = [
            [
                "name" => "admin",
                "description" => "Admin role",
                "is_admin" => 1
            ],
            [
                "name" => "moderator",
                "description" => "Moderator role",
                "is_admin" => 1
            ],
            [
                "name" => "subscriber",
                "description" => "User role",
                "is_admin" => 0
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}

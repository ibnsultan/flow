<?php
namespace App\Database\Seeds;

use App\Models\Users;
use App\Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $user = new Users();
        $user->fullname = 'Administrator';
        $user->email = 'admin@flow.io';
        $user->password = \Leaf\Helpers\Password::hash('admin');
        $user->role = 'admin';
        $user->avatar = '/storage/uploads/avatars/65f40d8e507be.gif';
        $user->save();
    }
}

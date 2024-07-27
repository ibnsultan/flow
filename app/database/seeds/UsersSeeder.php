<?php
namespace App\Database\Seeds;

use App\Models\User;
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
        User::truncate();

        $user = new User();
        $user->fullname = 'Administrator';
        $user->email = 'admin@flow.app';
        $user->password = \Leaf\Helpers\Password::hash('password');
        $user->role = 'admin';
        $user->avatar = '/assets/images/user/avatar-1.jpg';
        $user->save();
    }
}

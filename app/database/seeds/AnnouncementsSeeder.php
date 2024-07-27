<?php
namespace App\Database\Seeds;

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Announcement::truncate();

        Announcement::create([
            'title' => 'Welcome to Flow!',
            'description' => 'This is the first announcement on Flow. Welcome!',
            'recipients' => ['admin', 'user'],
            'link' => 'https://github.com/ibnsultan/flow'  
        ]);
    }
}

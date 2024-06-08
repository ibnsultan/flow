<?php

namespace App\Controllers\Admin;

use App\Helpers\Helpers;

use App\Models\Announcement;
use App\Controllers\Controller;

class AnnouncementController extends Controller
{
    public function index()
    {
        response()->markup(view('admin/announcement/index', 
            [
                'title' => 'Announcement List',
                'helper' => new Helpers,
                'announcements' => Announcement::all()
            ]
        ));
    }
}
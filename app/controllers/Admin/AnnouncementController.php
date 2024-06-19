<?php

namespace App\Controllers\Admin;

use App\Models\Announcement;
use App\Controllers\Controller;

class AnnouncementController extends Controller
{
    public function index() :void
    {

        $this->data->title = 'Announcement List';
        $this->data->announcements = Announcement::all();

        render('admin.announcement.index', (array) $this->data);

    }
}
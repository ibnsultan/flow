<?php

namespace App\Controllers\Admin;

use App\Models\Setting;
use App\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Show the general settings.
     */
    public function general(){
        
        response()->markup(view('admin.settings.general', [
            'title' => 'General Settings',
            'settings' => Setting::all()
        ]));

    }
}
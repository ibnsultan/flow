<?php

namespace App\Controllers;

use App\Models\Module;
use App\Models\Setting;

class Controller extends \Leaf\Controller
{

    protected $data;
    protected $permission;

    public function __construct()
    {
        $this->data = new \stdClass();

        # helper instances
        $this->data->date = new \Carbon\Carbon;
        $this->data->helpers = new \App\Helpers\Helpers;
        $this->data->handler = new \App\Middleware\Handler;
        
        $this->data->langs = new \App\Models\Language;
        $this->data->announcement = new \App\Models\Announcement;
        $this->data->notifications = new \App\Models\Notification;
        
        # required data
        $this->data->modules = (object) Module::all()->pluck('status', 'name')->toArray();
        $this->data->settings = (object) Setting::all()->pluck('value', 'key')->toArray();

        // application constants
        if(!defined('modules')) define('modules', $this->data->modules ?? null);
        if(!defined('settings')) define('settings', $this->data->settings ?? null);
    }
}

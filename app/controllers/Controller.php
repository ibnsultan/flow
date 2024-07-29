<?php

namespace App\Controllers;

use App\Models\Module;
use App\Models\Setting;
use App\Models\Announcement;
use App\Models\Notification;

use App\Helpers\Helpers;
use App\Middleware\Handler;

class Controller extends \Leaf\Controller
{

    protected $data;
    protected $permission;

    public function __construct()
    {
        $this->data = new \stdClass();

        # new instances
        $this->data->helpers = new Helpers;
        $this->data->handler = new Handler;
        $this->data->announcement = new Announcement;
        $this->data->notification = new Notification;
        
        # required data
        $this->data->modules = (object) Module::all()->pluck('status', 'name')->toArray();
        $this->data->settings = (object) Setting::all()->pluck('value', 'key')->toArray();

        // application constants
        if(!defined('modules')) define('modules', $this->data->modules ?? null);
        if(!defined('settings')) define('settings', $this->data->settings ?? null);
    }
}

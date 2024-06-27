<?php

namespace App\Controllers;

use App\Models\Module;
use App\Models\Setting;
use App\Models\Notification;

use App\Helpers\Helpers;
use App\Middleware\PermissionHandler;

class Controller extends \Leaf\Controller
{

    protected $data;
    protected $permission;

    public function __construct()
    {
        $this->data = new \stdClass();

        # new instances
        $this->data->helpers = new Helpers;
        $this->data->notification = new Notification;
        $this->data->permission = new PermissionHandler;

        # required data
        $this->data->modules = (object) Module::all()->pluck('status', 'name')->toArray();
        $this->data->settings = (object) Setting::all()->pluck('value', 'key')->toArray();
    }
}

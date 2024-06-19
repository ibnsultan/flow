<?php

namespace App\Controllers;

use App\Models\Setting;
use App\Models\Notification;

use App\Helpers\Helpers;

class Controller extends \Leaf\Controller
{

    protected $data;

    public function __construct()
    {
        $this->data = new \stdClass();
        $this->data->helpers = new Helpers;
        $this->data->notification = new Notification;
        $this->data->settings = (object) Setting::all()->pluck('value', 'key')->toArray();
    }

}

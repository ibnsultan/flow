<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Notification;


class Controller extends \Leaf\Controller
{

    protected $users;
    protected $notifications;

    public function __construct()
    {
        $this->users = new User();
        $this->notifications = new Notification();
    }
}

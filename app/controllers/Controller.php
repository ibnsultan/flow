<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\Notifications;


class Controller extends \Leaf\Controller
{

    protected $users;
    protected $notifications;

    public function __construct()
    {
        $this->users = new Users();
        $this->notifications = new Notifications();
    }
}

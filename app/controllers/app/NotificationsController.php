<?php

namespace App\Controllers\App;

use App\Controllers\Controller;

class NotificationsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userNotifications(){
        return $this->notifications->user(auth()->id());
    }
    
}
<?php

namespace App\Controllers;

use App\Models\Users;

/**
 * This is the base controller for your Leaf MVC Project.
 * You can initialize packages or define methods here to use
 * them across all your other controllers which extend this one.
 */
class Controller extends \Leaf\Controller
{

    protected $users;

    public function __construct()
    {
        $this->users = new Users();
    }
}

<?php

namespace App\Controllers\App;

use App\Controllers\Controller;
use App\Controllers\App\ApiController;

class UserController extends Controller
{
    protected $api;

    public function __construct()
    {
        parent::__construct();
        $this->api = new ApiController();   
    }

    public function display(){
        $data = [
            'title' => 'Profile',
            'apiKeys' => $this->api->userKeys(),
        ];

        response()->markup(view('app.user.profile', $data));
    }
    
}
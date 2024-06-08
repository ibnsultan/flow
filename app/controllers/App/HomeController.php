<?php

namespace App\Controllers\App;

use App\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home(){

        $data = [
            'title' => 'Dashboard',
            'current_user' => auth()->user()
        ];

        response()->markup(view('app.home', $data));
    }
}
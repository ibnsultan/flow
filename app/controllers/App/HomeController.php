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

        $this->data->title = 'Dashboard';
        $this->data->current_user = auth()->user();

        render('app.home', (array) $this->data);
    }
}
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

    public function start(){ 
        $this->data->title = 'Start';
        $this->data->current_user = auth()->user();

        render('app.start', (array) $this->data);
    }
}
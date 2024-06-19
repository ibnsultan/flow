<?php

namespace App\Controllers\Admin;

use App\Models\ApiKey;
use App\Models\BlogArticle;
use App\Models\User;
use App\Models\Page;

use App\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home(){

        $this->data->title = 'Dashboard';
        $this->data->current_user = auth()->user();
        $this->data->stats = [
            'users' => User::count(),
            'api_keys' => ApiKey::count(),
            'articles' => BlogArticle::count(),
            'pages' => Page::count(),
        ];

        render('admin.dashboard', (array) $this->data);
    }
}
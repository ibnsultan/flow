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

        $data = [
            'title' => 'Dashboard',
            'current_user' => auth()->user(),
            'stats' => [
                'users' => User::count(),
                'api_keys' => ApiKey::count(),
                'articles' => BlogArticle::count(),
                'pages' => Page::count(),
            ],
        ];

        response()->markup(view('admin.dashboard', $data));
    }
}
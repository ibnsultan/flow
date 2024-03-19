<?php

namespace App\Controllers\Admin;

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
                'users' => \App\Models\User::count(),
                'api_keys' => \App\Models\ApiKey::count(),
                'articles' => \App\Models\BlogArticle::count()
            ],
        ];

        response()->markup(view('admin.dashboard', $data));
    }
}
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
                'users' => \App\Models\Users::count(),
                'api_keys' => \App\Models\ApiKeys::count(),
                'articles' => \App\Models\BlogArticles::count()
            ],
        ];

        response()->markup(view('admin.dashboard', $data));
    }
}
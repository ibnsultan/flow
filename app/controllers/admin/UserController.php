<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * List all Users
     * 
     * @param string $role
     * @return void`    
     */
    public function index($role){

        if(!in_array($role, ['all', 'moderator']))
            exit(response()->page(getcwd()."/app/views/errors/404.html"));

        ($role == 'all') ? 
            $users = $this->users->non_admins() : 
            $users = $this->users->admins() ;

        $data = [
            'title' => 'Users',
            'users' => $users
        ];

        response()->markup(view('admin.users.index', $data));
    }

    /**
     * View User
     * 
     * @param string $id
     * @return void
     */
    public function viewUser($id){

        $user_id = \App\Helpers\Helpers::decode($id);
        if($user_id == '') exit(response()->page(getcwd()."/app/views/errors/404.html"));

        $data = [
            'title' => "Manage: {$this->users->find($user_id)->fullname}",
            'user' => $this->users->getUser($user_id)
        ];

        response()->markup( view('admin.users.view', $data) );

    }
}
<?php

namespace App\Controllers\Admin;

use Leaf\Helpers\Password;
use App\Helpers\MailSender;

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
     * Add User
     * 
     * @return void
     */
    public function createUser(){

        // check if user exists
        if($this->users->where('email', request()->get('email'))->first())
            exit(response()->json(['status'=>'error', 'message'=>'User already exists']));

        try {

            // insert user records
            $this->users::create([
                'fullname' => request()->get('fullname'),
                'email' => request()->get('email'),
                'password' => Password::hash(random_bytes(8)),
                'role' => request()->get('user_role'),
                'status' => 'active'
            ]);

            // send onboarding email
            $mail = new MailSender();
            $mail->sendHtml(
                'Welcome to '.getenv('app_name'),
                view('mail.welcome', [
                    'name' => request()->get('fullname'),
                    'username' => request()->get('email'),
                    'password' => 'Reset your password to get started',
                    'loginLink' => getenv('app_url').'/login'
                ]),
                request()->get('email'),
                request()->get('fullname')
            );

            response()->json(['status'=>'success', 'message'=>'User created successfully']);

        } catch (\Throwable $e) {
            
            (getenv('app_debug') == 'true') ?
                response()->json(['status'=>'error', 'message'=>$e->getMessage()]) :
                response()->json(['status'=>'error', 'message'=>'An error occurred']);
        }
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
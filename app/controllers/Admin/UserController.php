<?php

namespace App\Controllers\Admin;

use App\Models\User;

use App\Helpers\Helpers;
use Leaf\Helpers\Password;
use App\Helpers\MailSender;
use App\Middleware\Handler;

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
     * @return void
     */
    public function index($role) 
    {        
        # validate user access
        $viewUsers = Handler::can('user', 'read');
        if(!$viewUsers->status)
            return response()->markup(view('errors.403'), 403);

        if(!in_array($role, ['all', 'moderator']))
            return response()->page(ViewsPath('errors/404.html'), 404);

        # data allocation
        ($role == 'all') ? 
            $users = User::non_admins() : 
            $users = User::admins() ;

        $this->data->title = 'Users';
        $this->data->users = $users;

        # permissions allocation
        $this->data->canCreateUser = Handler::can('user', 'create');
        $this->data->canUpdateUser = Handler::can('user', 'update');
        $this->data->canDeleteUser = Handler::can('user', 'delete');
        $this->data->canModifyRole = Handler::can('user', 'modify_user_role');

        return render('admin.users.index', (array) $this->data);
    }


    /**
     * Add User
     * 
     * @return void
     */
    public function createUser(){

        # validate user access
        $canCreateUser = Handler::can('user', 'create');
        if(!$canCreateUser->status)
            return response()->markup(view('errors.403'), 403);

        # check if user exists
        if(User::where('email', request()->get('email'))->first())
            exit(response()->json(['status'=>'error', 'message'=>'User already exists']));

        try {

            # insert user records
            User::create([
                'fullname' => request()->get('fullname'),
                'email' => request()->get('email'),
                'password' => Password::hash(random_bytes(8)),
                'role' => request()->get('user_role'),
                'status' => 'active'
            ]);

            # send onboarding email
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
            
            $message = ['status'=>'error', 'message'=> __('An Unkown error occurred')];
            (getenv('app_debug') == 'false') ?: $message['debug'] = [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ];
        }
    }

    /**
     * View User
     * 
     * @param string $id
     * @return void
     */
    public function viewUser($id){

        # validate user access
        $canViewUser = Handler::can('user', 'read');
        if(!$canViewUser->status)
            return response()->markup(view('errors.403'), 403);

        # decode user id
        $user_id = Helpers::decode($id);
        if($user_id == '')
            exit(response()->page(ViewsPath('errors/404.html'), 404));

        # data allocation
        $this->data->title = "Manage: " . User::find($user_id)->fullname;
        $this->data->user = User::find($user_id);

        # permissions allocation
        $this->data->canUpdateUser = Handler::can('user', 'update');
        $this->data->canModifyRole = Handler::can('user', 'modify_user_role');

        render('admin.users.view', (array) $this->data);

    }

    /**
     * Delete User
     * 
     * @param string $id
     * @return void
     */
    public function deleteUser($id){

        # validate user access
        $canDeleteUser = Handler::can('user', 'delete');
        if(!$canDeleteUser->status)
            return response()->markup(view('errors.403'), 403);

        $user_id = Helpers::decode($id);
        if($user_id == '')
            exit(response()->page(getcwd()."/app/views/errors/404.html"));

        if(User::find($user_id)->role == 'admin')
            exit(response()->json(['status'=>'error', 'message'=>'You cannot delete an admin']));

        User::find($user_id)->delete();
        response()->json(['status'=>'success', 'message'=>'User deleted successfully']);

    }


    /**
     * Update User
     * 
     * @param string $id
     * @return void
     */

    public function updateUser(){

        # validate user access
        $canUpdateUser = Handler::can('user', 'update');
        if(!$canUpdateUser->status)
            return response()->markup(view('errors.403'), 403);

        # decode user id
        $user_id = Helpers::decode(request()->get('user_id'));
        if($user_id == '')
            exit(response()->page(getcwd()."/app/views/errors/404.html"));

        $user = User::find($user_id);

        # check if user exists
        if(!$user)
            exit(response()->json(['status'=>'error', 'message'=>'User not found']));

        $canModifyRole = Handler::can('user', 'modify_user_roles');
        if(!$canModifyRole->status and request()->get('user_role') != $user->role)
            exit(response()->json(['status'=>'error', 'message'=> __('You do not have permission to modify user role')]));

        try {

            (request()->get('phone') == '') ? 
                $phone = null : $phone = request()->get('phone');

            # update user records
            $user->update([
                'fullname' => request()->get('fullname'),
                'email' => request()->get('email'),
                'phone' => $phone,
                'role' => request()->get('user_role'),
                'status' => request()->get('user_status'),
                'about' => request()->get('bio')
            ]);

            response()->json(['status'=>'success', 'message'=> __('User updated successfully')]);

        } catch (\Throwable $e) {

            $message = ['status'=>'error', 'message'=> __('An Unkown error occurred')];
            (getenv('app_debug') == 'false') ?: $message['debug'] = [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ];
            
        }
    }
}
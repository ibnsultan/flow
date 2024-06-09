<?php

namespace App\Controllers\App;

use App\Models\User;

use App\Helpers\Helpers;
use Leaf\Helpers\Password;

use App\Controllers\Controller;
use App\Controllers\App\ApiController;

class UserController extends Controller
{
    protected $api;

    public function __construct()
    {
        parent::__construct();
        $this->api = new ApiController();   
    }

    public function display(){
        $data = [
            'title' => 'Profile',
            'apiKeys' => $this->api->userKeys(),
        ];

        response()->markup(view('app.user.profile', $data));
    }

    public function update(){

        try {

            if(request()->get('avatar')['size']){
                $file = Helpers::upload(
                    'avatar',
                    'storage/app/uploads/avatars/',
                    ['jpg', 'jpeg', 'png', 'gif']
                );
                
                if($file['error']) exit( response()->json(['status' => 'error', 'message' => $file['message']]) );

                $file = $file['path'];
            }

            User::updateDetails(
                auth()->id(),
                [
                    'fullname' => request()->params('name', auth()->user()['fullname']),
                    'email' => request()->params('email', auth()->user()['email']),
                    'phone' => request()->params('phone', auth()->user()['phone']),
                    'about' => request()->params('bio', auth()->user()['about']),
                    'avatar' => $file ?? auth()->user()['avatar'],
                    'remember_token' => null
                ]
            );
            response()->json(['status' => 'success', 'message' => 'Profile updated successfully']);
        } catch (\Exception $e) {

            (getenv('app_debug') == "true")? $message = $e->getMessage() : $message = "Failed to update profile";
            response()->json(['status' => 'error', 'message' => $message]);
        }

    }

    public function updatePassword(){
        
        $oldPassword = request()->get('old_password');
        $newPassword = request()->get('new_password');

        if(!$oldPassword || !$newPassword)
            exit( response()->json(['status' => 'error', 'message' => 'Please fill all fields']) );

        if($oldPassword == $newPassword)
            exit( response()->json(['status' => 'error', 'message' => 'Old and new passwords cannot be the same']) );

        if(Password::verify($oldPassword, User::find(auth()->id())->password)){

            try {

                User::updateDetails(
                    auth()->id(), [
                        'password' => Password::hash($newPassword),
                        'remember_token' => null
                    ]
                );

                response()->json(['status' => 'success', 'message' => 'Password updated successfully']);

            } catch (\Exception $e) {

                (getenv('app_debug') == "true")? $message = $e->getMessage() : $message = "Failed to update password";
                response()->json(['status' => 'error', 'message' => $message]);
            }

        }else{
            response()->json(['status' => 'error', 'message' => 'Current password submitted is incorrect']);
        }

    }
    
}
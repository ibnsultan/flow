<?php

namespace App\Controllers;
use App\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function signin(){
        response()->markup(view('auth.login'));
    }

    public function signup(){
        response()->markup(view('auth.register'));
    }

    public static function login($api = false){
        $data = auth()->login([
            'email' => request()->get('email'),
            'password' => request()->get('password')
        ]);

        if($data) {

            ($api) ? exit( response()->json(['status'=>'success', 'bearer'=>$data['token']])) : null;

            $message = ['status' => 'success', 'message' => 'Welcome! Login successful'];
        }else{
            $message = ['status' => 'error', 'message' => 'Uh Ooooh! Login failed'];
        }

        response()->json($message);
    }

    public static function register(){
        $data = auth()->register([
            'email' => request()->get('email'),
            'fullname' => request()->get('name'),
            'password' => request()->get('password')
        ]);

        if($data) {
            $message = ['status' => 'success', 'message' => 'Registration successful'];
        }else{
            $message = ['status' => 'error', 'message' => 'Registration failed'];
        }

        response()->json($message);
    }

    public function reset(){
        response()->plain('Hey there, were u expecting something ðŸ˜‚');
    }


}
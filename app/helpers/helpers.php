<?php

namespace App\Helpers;

class Helpers{

    protected static $Admins = ['admin'];
    protected static $users = ['admin', 'subscriber'];

    protected static $user_roles = [
        'admin' => 'Administrator',
        'subscriber' => 'Subscriber'
    ];

    public static function isAdmin(){
        return in_array(auth()->user()['role'], self::$Admins);
    }

    public static function isUser(){
        return in_array(auth()->user()['role'], self::$users);
    }

    public static function role($role){
        return self::$user_roles[$role];   
    }

}
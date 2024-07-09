<?php

namespace App\Models;

class ApiKey extends Model{
    
    protected $table = 'api_keys';

    protected $fillable = [
       'name', 'user_id', 'token', 'secret'
    ];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static function user($user){
        return self::where('user_id', $user)->get();
    }

    public static function getSecret($token){
        return self::where('token', $token)->first();
    }
    
}
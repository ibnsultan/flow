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

    public function user($user){
        return $this->where('user_id', $user)->get();
    }

    public function getSecret($token){
        return $this->where('token', $token)->first();
    }
    
}
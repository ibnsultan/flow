<?php

namespace App\Models;

class ApiKeys extends Model{
    
    protected $table = 'api_keys';

    protected $fillable = [
        'user_id', 'key', 'token', 'expiration'
    ];

    public $timestamps = true;

    protected $casts = [
        'expiration' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user($user){
        return $this->where('user_id', $user)->get();
    }
    
}
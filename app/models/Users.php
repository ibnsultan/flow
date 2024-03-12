<?php

namespace App\Models;

class Users extends Model
{
    protected $table = 'users';
    
    protected $fillable = [
        'fullname', 'email', 'password', 'avatar', 'role'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}

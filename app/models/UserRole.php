<?php

namespace App\Models;

class UserRole extends Model{

    protected $table = 'user_roles';

    protected $fillable = [ 'name', 'description' ];

    public $timestamp = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user(){
        return $this->hasMany(User::class, 'role', 'name');
    }

}
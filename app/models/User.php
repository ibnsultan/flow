<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';
    
    protected $fillable = [
        'fullname', 'email', 'password', 'avatar', 'role', 'phone', 'about'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function updateDetails($user, $columns){
        return $this->where('id', $user)->update($columns);
    }

    public function blog_article(){
        return $this->hasMany(BlogArticle::class, 'author', 'id');
    }

    public function file_storage(){
        return $this->hasMany(FileStorage::class, 'user_id', 'id');
    }

}

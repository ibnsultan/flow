<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';
    
    protected $fillable = [
        'fullname', 'email', 'password', 'avatar', 'role', 'phone', 'about', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $with = ['user_role'];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public $adminRoles = ['admin', 'moderator'];


    /**
     * Relationsips
     * 
     */

    public function blog_article(){
        return $this->hasMany(BlogArticle::class, 'author', 'id');
    }

    public function file_storage(){
        return $this->hasMany(FileStorage::class, 'user_id', 'id');
    }

    public function api_key(){
        return $this->hasOne(ApiKey::class, 'user_id', 'id');
    }

    public function user_role(){
        return $this->belongsTo(UserRole::class, 'role', 'name');
    }


    /**
     * Queries
     * 
     */

    public function non_admins(){
        return $this->whereNotIn('role', $this->adminRoles)->with('user_role')->orderBy('created_at', 'desc')->get();
    }

    public function admins(){
        return $this->whereIn('role', $this->adminRoles)->get();
    }
    
    public function updateDetails($user, $columns){
        return $this->where('id', $user)->update($columns);
    }

    public function getUser($user_id){
        return $this->where('id', $user_id)->with('user_role')->get()->first();
    }
}

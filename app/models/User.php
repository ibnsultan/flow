<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';
    
    protected $fillable = [ 'fullname', 'email', 'password', 'avatar', 'role', 'phone', 'about', 'status' ];

    protected $hidden = [ 'password', 'remember_token' ];

    protected $with = ['user_role'];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static $adminRoles = ['admin', 'moderator'];

    public static function non_admins(){
        return self::whereNotIn('role', static::$adminRoles)->orderBy('created_at', 'desc')->get();
    }

    public static function admins(){
        return self::whereIn('role', static::$adminRoles)->get();
    }
    
    public static function updateDetails($user, $columns){
        return self::where('id', $user)->update($columns);
    }

    public static function getUser($user_id){
        return self::where('id', $user_id)->get()->first();
    }

    # has many articles
    public function blog_article(){
        return $this->hasMany(BlogArticle::class, 'author', 'id');
    }

    # owns many files
    public function file_storage(){
        return $this->hasMany(FileStorage::class, 'user_id', 'id');
    }

    # has one api key
    public function api_key(){
        return $this->hasOne(ApiKey::class, 'user_id', 'id');
    }

    # belongs to a single role
    public function user_role(){
        return $this->belongsTo(Role::class, 'role', 'name');
    }
}
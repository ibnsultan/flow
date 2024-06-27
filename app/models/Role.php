<?php

namespace App\Models;

class Role extends Model{
    protected $table = 'roles';

    protected $fillable = ['role_name', 'description'];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // get roles with number of user co
    public static function withUsers() {
        return self::select('roles.*', Model::raw('count(users.id) as users_count'))
            ->leftJoin('users', 'roles.name', '=', 'users.role')
            ->groupBy('roles.id')
            ->get();
    }

    public function users() {
        return $this->hasMany(User::class);
    }

    public function rolePermissions() {
        return $this->hasMany(RolePermission::class);
    }
}
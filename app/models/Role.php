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

    public function rolePermissions() {
        return $this->hasMany(RolePermission::class);
    }
}
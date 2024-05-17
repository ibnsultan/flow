<?php

namespace App\Models;

class PermissionType extends Model{
    protected $table = 'permission_types';

    protected $fillable = ['name'];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function rolePermissions() {
        return $this->hasMany(RolePermission::class);
    }
}
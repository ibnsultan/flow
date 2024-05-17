<?php

namespace App\Models;

class Permission extends Model{
    protected $table = 'permissions';
    protected $with = ['module'];

    protected $fillable = ['name', 'description', 'module_id', 'is_primary', 'allowed_permissions'];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function module() {
        return $this->belongsTo(Module::class);
    }

    public function rolePermissions() {
        return $this->hasMany(RolePermission::class);
    }
}
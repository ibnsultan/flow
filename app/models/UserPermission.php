<?php

namespace App\Models;

class UserPermission extends Model
{
    protected $table = 'user_permissions';
    protected $with = ['user', 'permission', 'permissionType'];

    protected $fillable = ['user_id', "permission_id", "permission_type_id"];

    public $timestamps = true;

    protected $cast = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function permissionType()
    {
        return $this->belongsTo(PermissionType::class);
    }
}
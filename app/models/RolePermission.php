<?php

namespace App\Models;

class RolePermission extends Model
{
    protected $table = "role_permissions";
    protected $with = ["role", "permission", "permissionType"];

    protected $fillable = ["role_id", "permission_id", "permission_type_id"];

    public $timestamps = true;

    protected $cast = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function permissionType()
    {
        return $this->belongsTo(PermissionType::class);
    }

}
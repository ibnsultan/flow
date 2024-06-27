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

    public static function byRole(int $roleId) :mixed
    {
        return db()->query("SELECT m.name AS 'module', p.name AS 'permission', t.name AS 'scope' 
            FROM role_permissions rp, roles r, permission_types t, permissions p, modules m
            WHERE rp.role_id = r.id AND rp.permission_id = p.id AND rp.permission_type_id = t.id AND p.module_id = m.id AND rp.role_id = $roleId")
            ->get();
    }

    public static function byPermission(int $permissionId, int $roleId) :mixed
    {
        return db()->query("SELECT m.name AS 'module', p.name AS 'permission', t.name AS 'scope' 
            FROM role_permissions rp, roles r, permission_types t, permissions p, modules m
            WHERE rp.role_id = r.id AND rp.permission_id = p.id AND rp.permission_type_id = t.id AND p.module_id = m.id AND 
                  rp.permission_id = $permissionId AND rp.role_id = $roleId")
            ->get();
    }

    public static function updateExisting(int $roleId, int $permissionId, int $permissionTypeId) :bool
    {
        $permission = self::where("role_id", $roleId)->where("permission_id", $permissionId)->first();
        
        # delete is $permissionTypeId is 0, else update
        if($permission):
            if($permissionTypeId == 0) return $permission->delete();
            
            $permission->permission_type_id = $permissionTypeId;
            return $permission->save();

            else: return false;
        endif;

    }

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
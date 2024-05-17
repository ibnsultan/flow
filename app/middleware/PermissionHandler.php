<?php

namespace App\Middleware;

use App\Models\User;
use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\UserPermission;
use App\Models\PermissionType;

class PermissionHandler
{
    public function __construct()
    {
        // ...
    }

    public function permission(string $permissionName, ?int $userId=null) :string
    {
        $userId = $userId ?? auth()->id();
        $userRole = User::find($userId)->role;

        $permissionId = Permission::where('name', $permissionName)->first();
        
        // check from role permissions first, if not found, check from user permissions
        $rolePermission = RolePermission::where('role_id', $userRole->id)
            ->where('permission_id', $permissionId)
            ->first();

        if ($rolePermission) {
            return $rolePermission->permissionType->name;
        }

        $userPermission = UserPermission::where('user_id', $userId)
            ->where('permission_id', $permissionId)
            ->first();

        if ($userPermission) {
            return $userPermission->permissionType->name;
        }

        return 'none';        
    }

    public function hasPermission($permissionName, $permissionType) :bool
    {
        $permission = Permission::where('name', $permissionName)->first();
        $permissionType = PermissionType::where('name', $permissionType)->first();

        $rolePermission = RolePermission::where('role_id', auth()->user()->role->id)
            ->where('permission_id', $permission->id)
            ->where('permission_type_id', $permissionType->id)
            ->first();

        if ($rolePermission) {
            return true;
        }

        $userPermission = UserPermission::where('user_id', auth()->id())
            ->where('permission_id', $permission->id)
            ->where('permission_type_id', $permissionType->id)
            ->first();

        if ($userPermission) {
            return true;
        }

        return false;

    }

    public function userPermissions() :null|object
    {
        $userPermissions = UserPermission::with('permission', 'permissionType')
            ->where('user_id', auth()->id())
            ->get();
            
        return $userPermissions;
    }

}
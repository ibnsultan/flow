<?php

namespace App\Middleware;

use App\Models\User;
use App\Models\Module;
use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\UserPermission;
use App\Models\Role;

class PermissionHandler
{
    public function __construct()
    {
        // ...
    }

    public static function can(string $moduleName, string $permissionName, mixed $permissionScopes = 'all', int $userId = null) :object
    {
        $userId = $userId ?? auth()->id();
        $userRoleId = Role::where('name', User::find($userId)->role)->first()->id;    
        
        $module = Module::where('name', $moduleName)->first();
        if(!$module) return (object) [ 'status' => false ];

        # check if such permission exists
        $permissionId = Permission::where('name', $permissionName)->where('module_id', $module->id)->first();
        if (!$permissionId) return (object) [ 'status' => false ];
        
        $permissionId = $permissionId->id;

        # check if role has permission
        $rolePermission = RolePermission::byPermission($permissionId, $userRoleId);
        if($rolePermission) {
            
            if(!is_array($permissionScopes)) {
                if($rolePermission[0]['scope'] == $permissionScopes):
                    return (object) [ 'status' => true, 'scope' => $permissionScopes ];
                    else: return (object) [ 'status' => false ];
                endif;
            }

            // I know there no need to check if $permissionScopes is an array, but I'm doing it anyway
            if(is_array($permissionScopes) and in_array($rolePermission[0]['scope'], $permissionScopes))
                return (object) [ 'status' => true, 'scope' => $rolePermission[0]['scope'] ];

        }

        return (object) [ 'status' => false ];
    }

    public static function ownership(string $scope, $ownFunction, $addFunction) :bool
    {
        if($scope == 'owned' and !$ownFunction) return false;
        if($scope == 'added' and !$addFunction) return false;
        if($scope == 'both' and !$ownFunction and !$addFunction) return false;

       return true;
    }

}
<?php

namespace App\Middleware;

use App\Models\User;
use App\Models\Module;
use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\UserPermission;
use App\Models\Role;

class Handler
{

    /**
     * Check if user has permission to access a module
     *
     * @param string $moduleName
     * @param string $permissionName
     * @param mixed $permissionScopes
     * @param int $userId
     * @return object
     */

    public static function can(string $moduleName, string $permissionName, mixed $permissionScopes = null, int $userId = null) :object
    {
        $userId = $userId ?? auth()->id();
        $permissionScopes = $permissionScopes ?? ['all', 'owned', 'added', 'both'];

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

    /**
     * Check if user owns or added a resource
     *
     * @param string $scope
     * @param mixed $ownFunction
     * @param mixed $addFunction
     * @return bool
     */

    public static function owns(string $scope, $ownFunction=false, $addFunction=false) :bool
    {
        if($scope == 'all') return true;
        if($scope == 'owned' and !$ownFunction) return false;
        if($scope == 'added' and !$addFunction) return false;
        if($scope == 'both' and !$ownFunction and !$addFunction) return false;

       return true;
    }

}
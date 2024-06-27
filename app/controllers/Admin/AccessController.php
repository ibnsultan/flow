<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use App\Models\Module;
use App\Models\Permission;
use App\Models\PermissionType;
use App\Models\RolePermission;
use App\Models\UserPermission;

use App\Helpers\Helpers;
use App\Middleware\PermissionHandler;

use App\Controllers\Controller;

class AccessController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function roles() :void
    {
        $this->data->title = 'Roles Management';
        $this->data->roles = Role::withUsers();

        render('admin.access.roles', (array) $this->data);
    }

    public function modules() :void
    {
        $this->data->title = 'Modules Management';
        $this->data->modules = Module::all();

        render('admin.access.modules', (array) $this->data); 
    }

    public function permissions() :void
    {
        $permission = PermissionHandler::can('setting', 'view_permissions');
        if(!$permission->status) exit(render('errors.403'));

        $this->data->title = 'Permissions Management';
        $this->data->roles = Role::withUsers();
        $this->data->modules = Module::all();

        render('admin.access.permissions', (array) $this->data);
    }

    public function addPermission() :void
    {
        $permission = PermissionHandler::can('setting', 'add_permission');
        if(!$permission->status)
            exit(response()->json(['status' => 'error', 'message' => __('You do not have permission to perform this action')]));

        try{
            $data = [
                'name' => request()->params('permission'),
                'module_id' => request()->params('module'),
                'scopes' => request()->params('permissions'),
            ];

            # validate data
            if(in_array(null, $data))
                exit(response()->json(['status' => 'error', 'message' => __('Invalid Request')]));

            $data['description'] = request()->params('description');
            $data['name'] = strtolower(preg_replace('/[^A-Za-z0-9]/', '_', $data['name']));

            # validate module
            if(!Module::find($data['module_id']))
                exit(response()->json(['status' => 'error', 'message' => __('Module not found')]));

            # check for duplicate permission
            if(Permission::where('name', $data['name'])->where('module_id', $data['module_id'])->exists())
                exit(response()->json(['status' => 'error', 'message' => __('Permission already exists')]));

            Permission::create($data);

            // register permission to admin role
            $adminId = Role::where('name', 'admin')->first()->id;
            $permissionId = Permission::where('name', $data['name'])->where('module_id', $data['module_id'])->first()->id;

            RolePermission::create([
                'role_id' => $adminId,
                'permission_id' => $permissionId,
                'permission_type_id' => 4,
            ]);


            response()->json(['status' => 'success', 'message' => __('Permission added successfully')]);
        }catch(\Exception $e){
            response()->json(['status' => 'error', 'message' => __('An error occurred while adding permission'),
                'debug' => [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                ]
            ]);
        }
    }

    public function rolePermissions($role) :void
    {
        try{

            $permission = PermissionHandler::can('setting', 'view_role_permissions');
            if(!$permission->status)
                exit(response()->json(['status' => 'error', 'message' => __('You do not have permission to perform this action')]));

            $role = Role::where('name', $role)->first();
            $role = $role->id;

            if(!$role)
                exit(response()->json(['status' => 'error', 'message' => __('Role not found')]));

            $modules = Module::all();
            $modulesPermissions = [];

            # remap permissions to modules
            foreach($modules as $module){
                $permissions = Permission::where('module_id', $module->id)->get();
                $primary = [];
                $secondary = [];

                if($permissions->count()):

                    foreach($permissions as $permission){
                        if($permission->is_primary){
                            $primary[$permission->name] = $permission->scopes;
                        }else{
                            $secondary[$permission->name] = $permission->scopes;
                        }
                    }
                
                endif;

                $modulesPermissions[$module->name] = [
                    'primary' => $primary,
                    'secondary' => $secondary
                ];
            }

            # existing permissions
            $rolePermissions = RolePermission::byRole($role);
            $this->data->rolePermissions = array_reduce($rolePermissions, function($carry, $item){
                $carry[$item['module']][$item['permission']] = $item['scope'];
                return $carry;
            }, []);
            
            $this->data->role = $role;
            $this->data->modulesPermissions = $modulesPermissions;
            $this->data->permissionTypes = PermissionType::all()->pluck('name', 'id')->toArray();

            $markup = view('admin.access.partials.role-permissions', (array) $this->data);

            response()->json(['status' => 'success', 'data' => $markup]);
                            
        }catch(\Exception $e){
            response()->json(['status' => 'error', 'message' => __('An error occurred while fetching role permissions'), 
                'debug' => [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                ]
            ]);
        }

    }

    public function registerRolePermission() :void
    {
       try{
            $permission = PermissionHandler::can('setting', 'edit_role_permissions');
            if(!$permission->status)
                exit(response()->json(['status' => 'error', 'message' => __('You do not have permission to perform this action')]));

            $data = [
                'role' => request()->params('role'),
                'value' => request()->params('value'),
                // 'module' => request()->params('module'),
                'permission' => request()->params('permission'),
            ];

            if(in_array(null, $data))
                exit(response()->json(['status' => 'error', 'message' => __('All fields are required')]));

            (!empty(Helpers::decode($data['role']))) ?
                $roleId= Helpers::decode($data['role']) :
                exit(response()->json(['status' => 'error', 'message' => __('Invalid Request')]));

            # validate if parameter exists
            if(!Role::find($roleId))
                exit(response()->json(['status' => 'error', 'message' => __('Role not found')]));

            $scopeId = PermissionType::where('name', $data['value'])->first()->id;

            $permissionId = Permission::where('name', $data['permission'])->first()->id;
            if(!$permissionId)
                exit(response()->json(['status' => 'error', 'message' => __('Permission not found')]));

            # rebuild the data
            $data = []; $data = [
                'role_id' => $roleId,
                'permission_id' => $permissionId,
                'permission_type_id' => $scopeId ?? 0,
            ];
            
            if(!RolePermission::updateExisting($roleId, $permissionId, $scopeId)) RolePermission::create($data);        
            response()->json(['status' => 'success', 'message' => __('Role permissions updated successfully')]);

        }catch(\Exception $e){
            
            response()->json(['status' => 'error', 'message' => __('An error occurred while registering role permissions'),
                'debug' => [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                ]
            ]);                    
        }  
    }
}
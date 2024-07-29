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
use App\Middleware\Handler;

use App\Controllers\Controller;

class AccessController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Roles Management
     * 
     * @return void
     */
    public function roles() :void
    {
        # validate permission
        if(!Handler::can('app', 'view_roles')->status)
            exit(render('errors.403'));

        # data allocation
        $this->data->title = 'Roles Management';
        $this->data->roles = Role::withUsers();

        # permission allocation
        $this->data->addRolePermission = Handler::can('app', 'add_role');
        $this->data->editRolePermission = Handler::can('app', 'edit_role');
        $this->data->deleteRolePermission = Handler::can('app', 'delete_role');

        render('admin.access.roles', (array) $this->data);
    }

    /**
     * Create a new Role
     * 
     * @return void
     */
    public function createRole() :void
    {
        # validate permission
        if(!Handler::can('app', 'add_user_role')->status)
            exit(response()->json(['status' => 'error', 'message' => __('You do not have permission to perform this action')]));

        try{

            # retrieve data
            $data = [
                'name' => request()->params('name'),
                'description' => request()->params('description'),
            ];

            # validate data
            if(empty($data['name']))
                exit(response()->json(['status' => 'error', 'message' => __('All fields are required')]));

            # check for duplicate role
            if(Role::where('name', $data['name'])->exists())
                exit(response()->json(['status' => 'error', 'message' => __('Role already exists')]));

            Role::create($data);

            # check if role should clone permissions from another role
            if(request()->get('clone')){
                
                $role = Role::where('name', $data['name'])->first();
                $permissions = RolePermission::where('role_id', request()->get('clone'))->get();

                foreach($permissions as $permission){
                    RolePermission::create([
                        'role_id' => $role->id,
                        'permission_id' => $permission['permission_id'],
                        'permission_type_id' => $permission['permission_type_id'],
                    ]);
                }
            }

            response()->json(['status' => 'success', 'message' => __('Role added successfully')]);
        }catch(\Exception $e){
            response()->json(['status' => 'error', 'message' => __('An error occurred while adding role'),
                'debug' => [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                ]
            ]);
        }
    }

    /**
     * Permissions Management
     * 
     * @return void
     */
    public function permissions() :void
    {
        # validate permission
        if(!Handler::can('app', 'view_permissions')->status)
            exit(render('errors.403'));

        # data allocation
        $this->data->title = 'Permissions Management';
        $this->data->roles = Role::withUsers();
        $this->data->appModules = Module::all();

        # permission allocation
        $this->data->addRolePermission = Handler::can('app', 'add_user_role');
        $this->data->editRolePermission = Handler::can('app', 'edit_user_role');
        $this->data->addPermissionPermission = Handler::can('app', 'add_permission');

        render('admin.access.permissions', (array) $this->data);
    }

    /**
     * Add a new Permission
     * 
     * @return void
     */
    public function addPermission() :void
    {
        # validate permission
        if(!Handler::can('app', 'add_permission')->status)
            exit(response()->json(['status' => 'error', 'message' => __('You do not have permission to perform this action')]));

        try{

            # retrieve data
            $data = [
                'name' => request()->params('permission'),
                'module_id' => request()->params('module'),
                'scopes' => request()->params('permissions'),
            ];

            # validate data
            if(in_array(null, $data))
                exit(response()->json(['status' => 'error', 'message' => __('Invalid Request')]));

            # sanitize description and permission name
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

    /**
     * Fetch Role Permissions
     * 
     * @param string $role
     * @return void
     */
    public function rolePermissions($role) :void
    {
        try{
            # validate permission
            if(!Handler::can('app', 'view_role_permissions')->status)
                exit(response()->json(['status' => 'error', 'message' => __('You do not have permission to perform this action')]));

            # fetch and validate role id
            $role = Role::where('name', $role)->first();
            $role = $role->id;

            if(!$role) exit(response()->json(['status' => 'error', 'message' => __('Role not found')]));

            # fetch modules and instantiate permissions
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
            
            # allocate data
            $this->data->role = $role;
            $this->data->modulesPermissions = $modulesPermissions;
            $this->data->permissionTypes = PermissionType::all()->pluck('name', 'id')->toArray();

            # allocate permissions
            $this->data->editRolePermission = Handler::can('app', 'edit_role_permissions');
            $this->data->resetRolePermission = Handler::can('app', 'delete_role_permissions');

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

    /**
     * Update Role Permissions
     * 
     * @return void
     */
    public function registerRolePermission() :void
    {
       try{
            # validate permission
            if(!Handler::can('app', 'edit_role_permissions')->status)
                exit(response()->json(['status' => 'error', 'message' => __('You do not have permission to perform this action')]));

            # retrieve request data
            $data = [
                'role' => request()->params('role'),
                'value' => request()->params('value'),
                // 'module' => request()->params('module'),
                'permission' => request()->params('permission'),
            ];

            # validate data
            if(in_array(null, $data))
                exit(response()->json(['status' => 'error', 'message' => __('All fields are required')]));

            # decode and validate role
            (!empty(Helpers::decode($data['role']))) ?
                $roleId= Helpers::decode($data['role']) :
                exit(response()->json(['status' => 'error', 'message' => __('Invalid Request')]));

            # validate if role exists
            if(!Role::find($roleId))
                exit(response()->json(['status' => 'error', 'message' => __('Role not found')]));

            # fetch permission and types
            $scopeId = PermissionType::where('name', $data['value'])->first()->id;
            $permissionId = Permission::where('name', $data['permission'])->first()->id;

            # validate permission
            if(!$permissionId)
                exit(response()->json(['status' => 'error', 'message' => __('Permission not found')]));

            # rebuild the data
            $data = []; $data = [
                'role_id' => $roleId,
                'permission_id' => $permissionId,
                'permission_type_id' => $scopeId ?? 0,
            ];
            
            # check if permission exists, if not create else update
            if(!RolePermission::updateExisting($roleId, $permissionId, $scopeId))
                RolePermission::create($data);

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
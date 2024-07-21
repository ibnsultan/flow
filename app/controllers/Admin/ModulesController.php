<?php

namespace App\Controllers\Admin;

use App\Models\Module;
use App\Models\Permission;

use App\Helpers\Helpers;
use App\Controllers\Controller;
use App\Middleware\PermissionHandler;

class ModulesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display modules
     * 
     * @return void
     */
    public function index() :void
    {
        # validate permission
        if(!PermissionHandler::can('setting', 'view_modules')->status) exit(render('errors.403'));

        # data allocation
        $this->data->title = 'Modules Management';
        $this->data->appModules = Module::all();

        # permission allocation
        $this->data->addModulePermission = PermissionHandler::can('setting', 'add_module');
        $this->data->editModulePermission = PermissionHandler::can('setting', 'edit_module');

        render('admin.access.modules', (array) $this->data); 
    }

    public function createModule() :void
    {
        # validate permission
        if(!PermissionHandler::can('setting', 'add_module')->status)
            exit(response()->json(['status' => 'error', 'message' => __('You are not authorized')]));
        
        try{

            # validate request
            if(is_null(request()->get('name')) or is_null(request()->get('description')))
                exit(response()->json(['status' => 'error', 'message' => __('Invalid Request')]));
            
            # create module
            $module = new Module;
            $module->name = request()->get('name');
            $module->description = request()->get('description');
            $module->save();

            # check if it comes with permissions i.e create => ['all', 'none'];
            $cruds = ['create', 'read', 'update', 'delete'];
            foreach($cruds as $crud){
                if(!is_null(request()->get($crud))){

                    $scopes = request()->get($crud);
                    if(!is_array($scopes)) $scopes = [$scopes];

                    # save the permissions
                    $permission = new Permission;
                    $permission->name = $crud;
                    $permission->module_id = $module->id;
                    $permission->is_primary = 1;
                    $permission->scopes = $scopes;

                    if(!$permission->save())
                        exit(response()->json(['status' => 'error', 
                            'message' => __('Module created successfully but an error occurred while creating permissions')
                        ]));
                    
                }
            }

            response()->json(['status' => 'success', 'message' => __('Module created successfully')]);

        }catch(\Exception $e){
            response()->json(['status' => 'error', 'message' => __('An error occurred while creating module'), 
                'debug' => [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                ]
            ]);
        }
    }

    public function updateStatus() :void
    {

        # validate permission
        if(!PermissionHandler::can('setting', 'edit_module')->status)
            exit(response()->json(['status' => 'error', 'message' => __('You are not authorized')]));

        try{

            # retrieve and validate module
            $module = Helpers::decode(request()->get('module')); 
            if(!$module or is_null(request()->params('status')))
                exit(response()->json(['status' => 'error', 'message' => __('Invalid Request')]));

            $module = Module::find($module); if(!$module)
                exit(response()->json(['status' => 'error', 'message' => __('Module not found')]));

            # update module status
            $module->status = request()->get('status');
            $module->save();

            response()->json(['status' => 'success', 'message' => $module->name . __(' status updated successfully')]);
        }catch(\Exception $e){
            response()->json(['status' => 'error', 'message' => __('An error occurred while updating module status'), 
                'debug' => [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                ]
            ]);
        }
    }
}
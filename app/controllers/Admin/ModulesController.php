<?php

namespace App\Controllers\Admin;

use App\Models\Module;
use App\Helpers\Helpers;

use App\Controllers\Controller;

class ModulesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() :void
    {
        $this->data->title = 'Modules Management';
        $this->data->modules = Module::all();

        render('admin.access.modules', (array) $this->data); 
    }

    public function updateStatus() :void
    {
        $module = Helpers::decode(request()->get('module')); 
        if(!$module or is_null(request()->params('status')))
            exit(response()->json(['status' => 'error', 'message' => __('Invalid Request')]));

        $module = Module::find($module); if(!$module)
            exit(response()->json(['status' => 'error', 'message' => __('Module not found')]));

        try{
            $module->status = request()->get('status');
            $module->save();

            exit(response()->json(['status' => 'success', 'message' => $module->name . __(' status updated successfully')]));
        }catch(\Exception $e){
            exit(response()->json(['status' => 'error', 'message' => __('An error occurred while updating module status'), 'debug' => $e->getMessage()]));
        }
    }
}
<?php

namespace App\Controllers;

use App\Models\Module;
use App\Models\Setting;

class Controller extends \Leaf\Controller
{

    protected $data;
    protected $permission;

    public function __construct()
    {
        $this->data = new \stdClass();
        $this->inializeRegistras();

        // application constants
        if(!defined('modules')) define('modules', $this->data->modules ?? null);
        if(!defined('settings')) define('settings', $this->data->settings ?? null);

    }

    public function __set($name, $value)
    {
        $this->data->$name = $value;
    }

    protected function renderPage($title, $view, $data = [])
    {
        $this->title = $title;
        return render($view, array_merge($this->data, $data));
    }

    protected function jsonResponse($state, $successMsg, $errorMsg, $redirect = null)
    {
        if ($state) {
            $this->status = true;
            $this->message = $successMsg;
            $this->redirect = $redirect;
        } else {
            $this->status = false;
            $this->message = $errorMsg;
        }
        return response()->json($this->data);
    }

    protected function jsonError($message)
    {
        $this->status = false;
        $this->message = $message;
        return response()->json($this->data);
    }

    protected function jsonSuccess($message)
    {
        $this->status = true;
        $this->message = $message;
        return response()->json($this->data);
    }

    protected function jsonException($e)
    {
        $this->status = false;
        $this->message = "An unexpected error occurred";

        if (getenv('app_debug') != 'false') {
            $this->debug = [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTrace()
            ];
        }

        return response()->json($this->data);
    }

    protected function inializeRegistras(){
        $methods = get_class_methods($this);
        foreach($methods as $method){
            if(strpos($method, 'registerInstance') !== false){
                $this->$method();
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Instance Registrars
    |--------------------------------------------------------------------------
    */

    protected function registerInstanceDate()
    {
        # $this->date = new \Carbon\Carbon;
    }

    protected function registerInstanceHelpers()
    {
        $this->helpers = new \App\Helpers\Helpers;
    }

    protected function registerInstanceHandler()
    {
        $this->handler = new \App\Middleware\Handler;
    }

    protected function registerInstanceLangs()
    {
        $this->langs = new \App\Models\Language;
    }

    protected function registerInstanceAnnouncement()
    {
        $this->announcement = new \App\Models\Announcement;
    }

    protected function registerInstanceNotifications()
    {
        $this->notifications = new \App\Models\Notification;
    }

    protected function registerInstanceModules()
    {
        $this->modules = (object) Module::all()->pluck('status', 'name')->toArray();
    }

    protected function registerInstanceSettings()
    {
        $this->settings = (object) Setting::all()->pluck('value', 'key')->toArray();
    }

}
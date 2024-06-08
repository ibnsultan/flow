<?php

namespace App\Controllers\Admin;

use App\Models\Setting;
use App\Models\Language;

use App\Helpers\Helpers;
use App\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Show the general settings.
     */
    public function general(){
        
        response()->markup(view('admin.settings.general', [
            'title' => 'General Settings',
            'settings' => Setting::all()
        ]));

    }

    /**
     * Update the general settings.
     * 
     * @return void
     */
    public function updateGeneral(){

        try{

            /*exit(
                response()->json([
                    'status' => 'error',
                    'message' => 'This feature is disabled in the demo',
                    'request' => $_REQUEST,
                    'files' => $_FILES
                ])
            );*/

            // upload files
            foreach(['favicon','logo_light','logo_dark'] as $key){
                if(request()->get($key)['size']){
                    $$key = Helpers::upload($key, 'storage/app/uploads/brand/', ['jpg', 'jpeg', 'png']);

                    if($$key['error']) 
                        exit(response()->json(['status' => 'error', 'message' => $$key['message']]));
                }
            }
    
            $formData = [
                'site_name' => request()->get('site_name'),
                'site_url' => request()->get('site_url'),
                'theme_color' => request()->get('color_preset'),
                'theme_layout' => request()->get('theme_layout'),
                'system_version' => request()->get('system_version'),
                'favicon' => $favicon['path'] ?? settings->get('favicon'),
                'logo_light' => $logo_light['path'] ?? settings->get('logo_light'),
                'logo_dark' => $logo_dark['path'] ?? settings->get('logo_dark')
            ];

            // update settings
            foreach($formData as $key => $value){
                Setting::where('key', $key)->update(['value' => $value]);
            }

            response()->json(['status' => 'success', 'message' => 'Settings updated successfully']);
            
        } catch (\Exception $e) {
            (getenv('app_debug') == "true")? 
                response()->json(['status' => 'error', 'message' => $e->getMessage()]) :
                response()->json(['status' => 'error', 'message' => 'Failed to update settings']);
        }
    }

    /**
     * SEO settings.
     * 
     * @return void
     */
    public function seo(){
        
        response()->markup(view('admin.settings.seo', [
            'title' => 'SEO Settings',
        ]));

    }

    /**
     * Update the SEO settings.
     * 
     * @return void
     */
    public function updateSeo(){

        try{

            if(request()->get('meta_image')['size']){
                $meta_image = Helpers::upload('meta_image', 'storage/app/uploads/seo/', ['jpg', 'jpeg', 'png', 'webp']);

                if($meta_image['error']) 
                    exit(response()->json(['status' => 'error', 'message' => $meta_image['message']]));
            }

            $formData = [
                'meta_description' => request()->get('meta_description'),
                'meta_keywords' => request()->get('meta_keywords'),
                'meta_image' => $meta_image['path'] ?? settings->get('meta_image')
            ];

            // update settings
            foreach($formData as $key => $value){
                Setting::where('key', $key)->update(['value' => $value]);
            }

            response()->json(['status' => 'success', 'message' => 'Settings updated successfully']);

        }catch (\Exception $e) {
            (getenv('app_debug') == "true")? 
                response()->json(['status' => 'error', 'message' => $e->getMessage()]) :
                response()->json(['status' => 'error', 'message' => 'Failed to update settings']);
        }

    }

    /**
     * Modules settings.
     * 
     * @return void
     */
    public function modules(){
        
        response()->markup(view('admin.settings.modules', [
            'title' => 'Modules Settings',
        ]));

    }

    /**
     * Update the modules settings.
     * 
     * @return void
     */
    public function updateModules(){

        try{

            // update settings
            foreach($_REQUEST as $key => $value){
                
                $sanitizedValue = request()->get($key);
                Setting::where('key', $key)->update(['value' => $sanitizedValue]);

            }

            response()->json(['status' => 'success', 'message' => 'Settings updated successfully']);

        }catch (\Exception $e) {
            (getenv('app_debug') == "true")? 
                response()->json(['status' => 'error', 'message' => $e->getMessage()]) :
                response()->json(['status' => 'error', 'message' => 'Failed to update settings']);
        }

    }

    /**
     * Translation settings.
     * 
     * @return void
     */
    public function translation(){
        
        response()->markup(view('admin.translation.languages', [
            'title' => 'Languages & Translations',
            'languages' => Language::all()
        ]));
    }

}
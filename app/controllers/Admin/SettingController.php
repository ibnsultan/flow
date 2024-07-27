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

        $this->data->title = 'General Settings';
        $this->data->setting = Setting::all();
        
        render('admin.settings.general', (array) $this->data);

    }

    /**
     * Update the general settings.
     * 
     * @return void
     */
    public function updateGeneral(){

        try{

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
                'favicon' => $favicon['path'] ?? settings->favicon,
                'logo_light' => $logo_light['path'] ?? settings->logo_light,
                'logo_dark' => $logo_dark['path'] ?? settings->logo_dark
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
        
        $this->data->title = 'SEO Settings';
        render('admin.settings.seo', (array) $this->data);

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
                'meta_image' => $meta_image['path'] ?? settings->meta_image
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
        
        $this->data->title = 'Modules Settings';
        render('admin.settings.modules', (array) $this->data);

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
        
        $this->data->title = 'Languages & Translations';
        $this->data->languages = Language::all();
        
        render('admin.settings.translation', (array) $this->data);
    }

}
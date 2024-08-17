<?php

namespace App\Controllers\Admin;

use App\Helpers\Helpers;

use App\Models\Language;
use App\Controllers\Controller;

class TranslationController extends Controller
{

    // TODO: set the default language dynamically
    protected $defaultLang = 'en';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * List all languages
     * 
     * @return void
     */
    public function index(){

        $this->data->title = 'Translations';
        $this->data->languages = Language::all();

        render('admin.translation.index', (array) $this->data);
    }

    /**
     * Update the language Status
     * 
     * @return void
     */
    public function status(){
            
        $languageId = Helpers::decode(request()->get('id'));
        if(!$languageId)
            exit(response()->json(['status' => 'error', 'message' => __('Invalid language')]));

        $language = Language::find($languageId);
        $language->status = !$language->status;
        $language->save();

        response()->json(['status' => 'success', 'message' => __('Language status updated successfully')]);
    }

    /**
     * Update the language Layout
     * 
     * @return void
     */
    public function layout(){
            
        $languageId = Helpers::decode(request()->get('id'));
        if(!$languageId)
            exit(response()->json(['status' => 'error', 'message' => __('Invalid language')]));

        $language = Language::find($languageId);
        $language->layout = request()->params('layout', $language->layout);
        $language->save();

        response()->json(['status' => 'success', 'message' => __('Language layout updated successfully')]);
    }

    /**
     * Display the language file
     * 
     * @param string $id
     * @return void
     */
    public function display($id){

        $languageId = Helpers::decode($id);
        if(!$languageId)
            exit(response()->page('app/views/errors/404.html', 404));

        $language = Language::find($languageId);

        $languageFile = "storage/languages/{$language->iso}.json";
        $dafaultLanguage = Language::where('iso', $this->defaultLang)->first();

        // create the language file if it doesn't exist
        if(!file_exists($languageFile))
            file_put_contents($languageFile, json_encode([]));

        $languageData = json_decode(file_get_contents($languageFile), true);
        $defaultLanguage = json_decode(file_get_contents("storage/languages/{$this->defaultLang}.json"), true);

        // sync the language files
        $missingKeys = array_diff_key($defaultLanguage, $languageData);
        $updatedFile = array_merge($languageData, $missingKeys);

        $this->data->title = 'Translation: ' . $language->name;
        $this->data->language = $language;
        $this->data->languageData = $updatedFile;

        render('admin.translation.language', (array) $this->data);
    }

    /**
     * Update the language file
     * 
     * @return void
     */
    public function update(){
        
        # payload, id, key, value

        $languageId = Helpers::decode(request()->get('id'));
        if(!$languageId)
            exit(response()->json(['status' => 'error', 'message' => __('Invalid language')]));

        $language = Language::find($languageId);
        $languageFile = "storage/languages/{$language->iso}.json";

        $languageData = json_decode(file_get_contents($languageFile), true);
        $languageData[request()->get('key')] = request()->get('value');

        file_put_contents($languageFile, json_encode($languageData, JSON_PRETTY_PRINT));

        response()->json(['status' => 'success', 'message' => __('Translation updated successfully')]);
    }
}
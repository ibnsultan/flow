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

    public function display($id){

        $languageId = Helpers::decode($id);
        if(!$languageId)
            exit(response()->page(getcwd().'/app/views/errors/404.html', 404));

        $language = Language::find($languageId);

        $languageFile = "storage/languages/{$language->iso}.json";
        $dafaultLanguage = Language::where('iso', $this->defaultLang)->first();

        // create the language file if it doesn't exist
        if(!file_exists($languageFile))
            file_put_contents(getcwd(). "/$languageFile", json_encode([]));

        $languageData = json_decode(file_get_contents(getcwd()."/$languageFile"), true);
        $defaultLanguage = json_decode(file_get_contents(getcwd()."/storage/languages/{$this->defaultLang}.json"), true);

        // sync the language files
        $missingKeys = array_diff_key($defaultLanguage, $languageData);
        $updatedFile = array_merge($languageData, $missingKeys);

        $this->data->title = 'Translation: ' . $language->name;
        $this->data->language = $language;
        $this->data->languageData = $updatedFile;

        render('admin.translation.language', (array) $this->data);
    }
}
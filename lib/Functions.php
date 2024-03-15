<?php

/*
|--------------------------------------------------------------------------
| Pre Load Directory Files
|--------------------------------------------------------------------------
| This function is used to load all files in a given directory
| and its subdirectories into the application recursively.
| 
*/
function load_dir_files($directory) {
	if(is_dir($directory)){

		$scan = scandir($directory); unset($scan[0], $scan[1]);
		foreach($scan as $file) :

			if(is_dir($directory."/".$file)):
                load_dir_files($directory."/".$file);
                else: if(strpos($file, '.php') !== false) { require_once($directory."/".$file); }
			endif;

		endforeach;

    }

}

/*
|--------------------------------------------------------------------------
| Delete Directory and its contents
|--------------------------------------------------------------------------
| This function is used to delete a directory and its contents
| 
*/
function delete_dir($dirPath) {
    if (is_dir($dirPath)) {
        $files = scandir($dirPath);
        foreach ($files as $file) {
           if ($file !== '.' && $file !== '..') {
              $filePath = $dirPath . '/' . $file;
              if (is_dir($filePath)) {
                    delete_dir($filePath);
              } else {
                 unlink($filePath);
              }
           }
        }
        rmdir($dirPath);
     }
}

/*
|--------------------------------------------------------------------------
| Require Multiple Files
|--------------------------------------------------------------------------
| This function is used to require multiple files at once
| 
*/

function require_files(){
    foreach(func_get_args() as $file){
        require_once($file);
    }
}


/*
|--------------------------------------------------------------------------
| Localizations and Translations
|--------------------------------------------------------------------------
|
| This function is used to translate strings in your application.
| It takes a string and returns the translated string.
|
*/

function _($key){

    $language = cookie()->get('lang') ?? 'en';
    $directory = getcwd() . "/storage/languages/$language.json";

    // check if file exists
    if(!is_file($directory))        
        file_put_contents($directory, json_encode([]));

    $translation = json_decode(file_get_contents($directory), true);

    // if key is not found, push the key to the language file
    if(!isset($translation[$key]) and getenv('app_env') == 'development'):

        $translation[$key] = $key;
        file_put_contents($directory, json_encode($translation, JSON_PRETTY_PRINT));

    endif;

    return $translation[$key] ?? $key;

}
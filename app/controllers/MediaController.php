<?php

namespace App\Controllers;

use App\Helpers\Helpers;
use App\Models\FileStorage;
use App\Controllers\Controller;

class MediaController extends Controller
{
    protected $fileStorage;

    public function __construct()
    {
        parent::__construct();
        $this->fileStorage = new FileStorage();
    }

    public function index()
    {
        $data = [
            'title' => 'Media',
            'files' => FileStorage::with('user')->get()
        ];

        response()->markup(view('media.index', $data));
    }

    public function upload(string $fileInput, ?string $storeDir=null, ?array $fileTypes = null, $virtualPath = true ) :array
    {
        try{
            $uploadFile = request()->get($fileInput);
            
            $fileType = pathinfo($uploadFile['name'], PATHINFO_EXTENSION);
            $fileName = uniqid() . '.' . $fileType;

            // pass the default directory
            if (!$storeDir) $storeDir = getcwd() . '/storage/app/uploads/';

            if(!is_dir($storeDir)) mkdir($storeDir, 0777, true);
            
                
            // check file validity
            if ($fileTypes && !in_array($fileType, $fileTypes))
                return [ 'error' => true, 'message' => 'Invalid file type' ];


            // check if directory exists
            if (move_uploaded_file($uploadFile['tmp_name'], $storeDir . $fileName)) {

                // sanitize the file if virtualPath is enabled
                if($virtualPath)
                    $filePath = str_replace( [getcwd(), 'storage/app'], ['', 'storage'], "/$storeDir$fileName" );

                // record the file to database
                $this->fileStorage->create([
                    'name' => $uploadFile['name'],
                    'path' => $filePath,
                    'type' => $uploadFile['type'],
                    'size' => $uploadFile['size'],
                    'extension' => pathinfo($uploadFile['name'], PATHINFO_EXTENSION),
                    'user_id' => auth()->id()
                ]);

                return [
                    'error' => false,
                    'message' => 'File uploaded successfully',
                    'file' => $fileName,
                    'path' => $filePath
                ];
                
            } else {
                return [ 'error' => true, 'message' => 'Error uploading file' ];
            }
        }catch (\Exception $e) {
            (getenv('app_debug') == "true")? $message = $e->getMessage() : $message = "Invalid file submitted";
            return ['error' => true, 'message' => $message];
        }

    }

    public function delete($id)
    {
        $file_id = Helpers::decode($id);
        $file = FileStorage::find($file_id);

        if (!$file)
            response()->json(['status' => 'error', 'message' => 'File not found'], 404);

        $file->delete();

        response()->json(['status' => 'success', 'message' => 'File deleted']);
    }
}
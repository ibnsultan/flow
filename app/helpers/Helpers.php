<?php

namespace App\Helpers;

class Helpers{

    protected static $Admins = ['admin'];
    protected static $users = ['admin', 'subscriber'];

    protected static $user_roles = [
        'admin' => 'Administrator',
        'subscriber' => 'Subscriber'
    ];

    public static function isAdmin(){
        return in_array(auth()->user()['role'], self::$Admins);
    }

    public static function isUser(){
        return in_array(auth()->user()['role'], self::$users);
    }

    public static function role($role){
        return self::$user_roles[$role];   
    }

    public static function upload(string $fileInput, ?string $storeDir=null, ?array $fileTypes = null, $virtualPath = true ) :array
    {
        $fileType = pathinfo($_FILES[$fileInput]['name'], PATHINFO_EXTENSION);
        $fileName = uniqid() . '.' . $fileType;

        // pass the default directory
        if (!$storeDir)
            $storeDir = getcwd() . '/storage/app/uploads/';

        if(!is_dir($storeDir))
            mkdir($storeDir, 0777, true);
        
            
        // check file validity
        if ($fileTypes && !in_array($fileType, $fileTypes)) {
            return [
                'error' => true,
                'message' => 'Invalid file type'
            ];
        }

        // check if directory exists
        if (move_uploaded_file($_FILES[$fileInput]['tmp_name'], $storeDir . $fileName)) {

            if($virtualPath)
                $filePath = str_replace(
                    [getcwd(), 'storage/app'],
                    ['', 'storage'],
                    "/$storeDir$fileName"
                );

            return [
                'error' => false,
                'message' => 'File uploaded successfully',
                'file' => $fileName,
                'path' => $filePath
            ];
        } else {
            return [
                'error' => true,
                'message' => 'Error uploading file'
            ];
        }
    }

    public static function encode($data){

        $data = bin2hex($data.'.'.date('d'));
        return (new \Hashids\Hashids)->encodeHex( $data);
    }

    public static function decode($data){
        $data = (new \Hashids\Hashids)->decodeHex( $data );

        $data = explode('.', hex2bin($data));
        return $data[0];
    }

    // preview api key, strpad(first 4 digits, *), last 4 digits
    public static function previewKey($key){
        return str_pad(substr($key, 0, 6), 40, '*') . substr($key, -6);
    }
}

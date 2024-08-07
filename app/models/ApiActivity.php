<?php

namespace App\Models;

class ApiActivity extends Model{
    
    protected $table = 'api_activities';

    protected $fillable = [
        'handler', 'origin', 'payload', 'apiID', 'status'
    ];

    public $timestamps = true;

    protected $casts = [
        'payload' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static function key($id){
        return self::where('apiID', $id)->orderBy('created_at', 'desc')->get();
    }
    
}
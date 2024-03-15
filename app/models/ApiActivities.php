<?php

namespace App\Models;

class ApiActivities extends Model{
    
    protected $table = 'api_activities';

    protected $fillable = [
        'request_uri', 'payload', 'apiID', 'status'
    ];

    public $timestamps = true;

    protected $casts = [
        'payload' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    
}
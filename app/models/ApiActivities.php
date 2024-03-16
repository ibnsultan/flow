<?php

namespace App\Models;

class ApiActivities extends Model{
    
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

    public function activities($id){
        return $this->where('apiID', $id)->get();
    }
    
}
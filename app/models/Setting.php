<?php

namespace App\Models;

class Setting extends Model
{
    protected $table = 'settings';
    
    protected $fillable = [
        'key', 'value'
    ];

    // get a setting value
    public function get($key) {
        return $this->where('key', $key)->first()->value;
    }

}
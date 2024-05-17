<?php

namespace App\Models;

class Module extends Model{
    protected $table = 'modules';

    protected $fillable = ['module_name', 'description', 'status'];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
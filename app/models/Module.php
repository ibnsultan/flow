<?php

namespace App\Models;

class Module extends Model{
    protected $table = 'modules';

    protected $fillable = ['name', 'description', 'status', 'is_core'];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
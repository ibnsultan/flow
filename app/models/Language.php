<?php

namespace App\Models;

class Language extends Model
{

    protected $table = 'languages';

    protected $fillable = ['name', 'iso', 'layout', 'status'];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

}
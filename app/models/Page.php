<?php

namespace App\Models;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = ['title', 'slug', 'content', 'status', 'meta_description', 'meta_keywords'];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

}
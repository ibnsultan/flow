<?php

namespace App\Models;

class FileStorage extends Model{

    protected $table = 'file_storage';

    protected $fillable = ['name', 'path', 'type', 'size', 'extension', 'mime', 'user_id', 'created_at', 'updated_at'];

    protected $with = ['user'];

    protected $casts = [
        'size' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
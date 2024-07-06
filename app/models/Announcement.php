<?php

namespace App\Models;

class Announcement extends Model{

    protected $table = 'announcements';

    protected $fillable = [
        'title', 'description', 'cover', 'recipients', 'link'
    ];

    public $timestamps = true;

    protected $casts = [
        'recipients' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static function group($role){
        return self::whereJsonContains('recipients', $role)
            ->limit(15)->latest()->get();
    }

}
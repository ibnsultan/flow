<?php

namespace App\Models;

class Announcements extends Model{

    protected $table = 'announcements';

    protected $fillable = [
        'title', 'description', 'cover', 'receipients', 'link'
    ];

    public $timestamps = true;

    protected $casts = [
        'receipients' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    function group($role){
        return $this->whereJsonContains('receipients', $role)->limit(15)->get();
    }

}
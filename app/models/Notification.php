<?php

namespace App\Models;

class Notification extends Model{

    protected $table = 'notifications';

    protected $fillable = [ 'title', 'message', 'status', 'user_id' ];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // select unread, order by date
    public static function user($user){
        return self::where('user_id', $user)->where('status', 0)->orderBy('created_at', 'desc')->get();
    }

    public static function markAsRead($id){
        return self::where('id', $id)->update(['status' => 1]);
    }

}
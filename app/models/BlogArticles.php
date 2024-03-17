<?php

namespace App\Models;

class BlogArticles extends Model
{
    protected $table = 'blog_articles';
    
    protected $fillable = ['title', 'content', 'cover', 'author', 'category', 'tags', 'views', 'likes'];
    
    protected $with = ['users', 'blog_categories'];

    public $timestamps = true;

    protected $casts = [
        'tags' => 'json',
        'views' => 'integer',
        'likes' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function users()
    {
        return $this->belongsTo(Users::class, 'author');
    }

    public function blog_categories()
    {
        return $this->belongsTo(BlogCategories::class, 'category');
    }
}

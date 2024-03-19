<?php

namespace App\Models;

class BlogArticle extends Model
{
    protected $table = 'blog_articles';
    
    protected $fillable = ['title', 'content', 'cover', 'author', 'category', 'tags', 'views', 'likes'];
    
    protected $with = ['user', 'blog_category'];

    public $timestamps = true;

    protected $casts = [
        'tags' => 'json',
        'views' => 'integer',
        'likes' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function blog_category()
    {
        return $this->belongsTo(BlogCategory::class, 'category');
    }
}

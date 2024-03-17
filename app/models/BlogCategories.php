<?php

namespace App\Models;

class BlogCategories extends Model{
    
    protected $table = 'blog_categories';
    
    protected $fillable = ['name', 'description'];
    
    public $timestamps = true;

    public function blog_articles()
    {
        return $this->hasMany(BlogArticles::class, 'category', 'id');
    }

}
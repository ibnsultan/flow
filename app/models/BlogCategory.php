<?php

namespace App\Models;

class BlogCategory extends Model{
    
    protected $table = 'blog_categories';
    
    protected $fillable = ['name', 'description'];
    
    public $timestamps = true;

    public function blog_article()
    {
        return $this->hasMany(BlogArticle::class, 'category', 'id');
    }

}
<?php

namespace App\Controllers\Admin;

use App\Models\BlogArticles;
use App\Models\BlogCategories;

use App\Controllers\Controller;

class BlogController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

        $data = [
            'title' => 'Blog',
            'articles' => BlogArticles::with('users', 'blog_categories')->get()
        ];

        response()->markup(view('admin.blog.index', $data));
    }

    public function writeArticle(){
            
        $data = [
            'title' => 'Write Article',
            'categories' => BlogCategories::all()
        ];

        response()->markup(view('admin.blog.write', $data));
    }

    public function categories(){

        $data = [
            'title' => 'Blog Categories',
            'categories' => BlogCategories::withCount('blog_articles')->get()
        ];

        response()->markup(view('admin.blog.categories', $data));
    }

    public function deleteCategory($id){

        $category_id = \App\Helpers\Helpers::decode($id);
        $category = BlogCategories::find($category_id);

        if(!$category)
            response()->json(['status' => 'error', 'message' => 'Category not found'], 404);
        
        
        BlogArticles::where('category', $category_id)->update(['category' => 1]); 
        $category->delete();

        response()->json(['status'=>'success', 'message' => 'Category deleted']);

    }
}
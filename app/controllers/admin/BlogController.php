<?php

namespace App\Controllers\Admin;

use App\Models\BlogArticle;
use App\Models\BlogCategory;

use App\Controllers\Controller;
use App\Controllers\MediaController;

class BlogController extends Controller
{
    protected $filestorage;

    public function __construct()
    {
        parent::__construct();
        $this->filestorage = new MediaController;
    }

    /**
     * Display the blog articles
     * 
     * @return void
     */
    public function index(){

        $data = [
            'title' => 'Blog',
            'articles' => BlogArticle::with('user', 'blog_category')->orderBy('created_at', 'desc')->get()
        ];

        response()->markup(view('admin.blog.index', $data));
    }

    /**
     * View & Edit article
     * 
     * @param string $id
     * @return void
     */
    public function viewArticle($id){

        $article_id = \App\Helpers\Helpers::decode($id);
        if($article_id == '') exit(response()->page(getcwd()."/app/views/errors/404.html"));

        $data = [
            'title' => BlogArticle::find($article_id)->title,
            'article' => BlogArticle::find($article_id),
            'categories' => BlogCategory::all(),
            'article_id' => $id
        ];

        response()->markup( view('admin.blog.edit', $data) );

    }

    /**
     * Write article
     * 
     * @return void
     */
    public function writeArticle(){
            
        $data = [
            'title' => 'Write Article',
            'categories' => BlogCategory::all()
        ];

        response()->markup(view('admin.blog.write', $data));
    }

    /**
     * Create a new article
     * 
     * @return void
     */
    public function createArticle(){

        $fileUploaded = null;
        $coverImage = request()->get('cover');
        
        // TODO: Use files from the Media Storage
        if(!is_null($coverImage) and $coverImage['name'] != '' ){

            $fileUploaded = $this->filestorage->upload(
                'cover', 'storage/app/uploads/blog/',
                ['jpg', 'jpeg', 'png', 'gif', 'webp']
            );

            if($fileUploaded['error']):
                exit( response()->json(['status' => 'error', 'message' => $fileUploaded['message']]) );
            endif;   

        }

        ( request()->get('tags') ) ? $tags = explode(',', str_replace(' ', '', request()->get('tags'))) : $tags = null;


        try {
            
            BlogArticle::create([
                'title' => request()->get('title'),
                'content' => request()->get('content'),
                'category' => request()->get('category'),
                'tags' => $tags,
                'author' => auth()->id(),
                'cover' => $fileUploaded['path'] ?? null
            ]);

            response()->json( ['status' => 'success', 'message'=> 'Article added succesfully'] );

        } catch (\Throwable $e) {

            (getenv('app_debug') == "true")? $message = $e->getMessage() : $message = "Could not Publish the article";
            response()->json(['status' => 'error', 'message' => $message]);
        }
        
    }

    /**
     * Update an article
     * 
     * @return void
     */
    public function updateArticle()
    {

        $article_id = \App\Helpers\Helpers::decode(request()->get('article_id'));
        if($article_id == '') exit(response()->json(['status' => 'error', 'message' => 'Invalid request']));

        $article = BlogArticle::find($article_id);

        $fileUploaded = null;
        $coverImage = request()->get('cover');

        if(!is_null($coverImage) and $coverImage['name'] != '' ){

            $fileUploaded = $this->filestorage->upload(
                'cover', 'storage/app/uploads/blog/',
                ['jpg', 'jpeg', 'png', 'gif', 'webp']
            );

            if($fileUploaded['error']):
                exit( response()->json(['status' => 'error', 'message' => $fileUploaded['message']]) );
            endif;   

        }

        ( request()->get('tags') ) ? $tags = explode(',', str_replace(' ', '', request()->get('tags'))) : $tags = null;

        try {
            
            $article->update([
                'title' => request()->get('title'),
                'content' => request()->get('content'),
                'category' => request()->get('category'),
                'tags' => $tags,
                'cover' => $fileUploaded['path'] ?? $article->cover
            ]);

            response()->json( ['status' => 'success', 'message'=> 'Article updated succesfully'] );

        } catch (\Throwable $e) {

            (getenv('app_debug') == "true")? $message = $e->getMessage() : $message = "Could not update the article";
            response()->json(['status' => 'error', 'message' => $message]);
        }
        
    }

    /**
     * Delete an article
     * 
     * @param string $id
     * @return void
     */
    public function categories(){

        $data = [
            'title' => 'Blog Categories',
            'categories' => BlogCategory::withCount('blog_article')->get()
        ];

        response()->markup(view('admin.blog.categories', $data));
    }

    /**
     * Create a new category
     * 
     * @return void
     */
    public function createCategory(){
            
        try {
            
            BlogCategory::create([
                'name' => request()->get('name'),
                'description' => request()->get('description')
            ]);

            response()->json( ['status' => 'success', 'message'=> 'Category added succesfully'] );

        } catch (\Throwable $e) {

            (getenv('app_debug') == "true")? $message = $e->getMessage() : $message = "Could not add the category";
            response()->json(['status' => 'error', 'message' => $message]);
        }
    }

    /**
     * Update a category
     * 
     * @return void
     */
    public function updateCategory(){

        $category_id = \App\Helpers\Helpers::decode(request()->get('category_id'));
        if($category_id == '') exit(response()->json(['status' => 'error', 'message' => 'Invalid request']));

        $category = BlogCategory::find($category_id);

        try {
            
            $category->update([
                'name' => request()->get('name'),
                'description' => request()->get('description')
            ]);

            response()->json( ['status' => 'success', 'message'=> 'Category updated succesfully'] );

        } catch (\Throwable $e) {

            (getenv('app_debug') == "true")? $message = $e->getMessage() : $message = "Could not update the category";
            response()->json(['status' => 'error', 'message' => $message]);
        }

    }

    /**
     * Delete a category
     * 
     * @param string $id
     * @return void
     */
    public function deleteCategory($id){

        $category_id = \App\Helpers\Helpers::decode($id);
        $category = BlogCategory::find($category_id);

        if(!$category)
            response()->json(['status' => 'error', 'message' => 'Category not found'], 404);
        
        
        BlogArticle::where('category', $category_id)->update(['category' => 1]); 
        $category->delete();

        response()->json(['status'=>'success', 'message' => 'Category deleted']);

    }
}
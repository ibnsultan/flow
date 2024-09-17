<?php

namespace App\Controllers\Admin;

use App\Helpers\Helpers;
use App\Models\BlogArticle;
use App\Models\BlogCategory;

use App\Controllers\Controller;
use App\Controllers\MediaController;

use App\Middleware\Handler;
use App\Models\Permission;

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

        if(!Handler::can('blog', 'read')->status) exit(render('errors.403'));

        $this->data->title = 'Blog';
        $this->data->articles = BlogArticle::with('user', 'blog_category')
            ->orderBy('created_at', 'desc')->get();

        # permission list
        $this->data->addArticlePermission = Handler::can('blog', 'create');
        $this->data->editArticlePermission = Handler::can('blog', 'update');
        $this->data->deleteArticlePermission = Handler::can('blog', 'delete');

        render('admin.blog.index', (array) $this->data);
    }

    /**
     * View & Edit article
     * 
     * @param string $id
     * @return void
     */
    public function viewArticle($id){

        # validate user permission
        $permission = Handler::can('blog', 'read');
        if(!$permission->status) exit(render('errors.403'));

        # fetch the article
        $article_id = Helpers::decode($id);
        if($article_id == '') exit(response()->page(getcwd()."/app/views/errors/404.html"));

        $article = BlogArticle::find($article_id);

        # validate property ownership
        if($permission->scope !== 'all'){
            if(!Handler::owns( $permission->scope, auth()->id() == $article->author ))
                exit(render('errors.403'));
        }

        # data allocation
        $this->data->article = $article;
        $this->data->title = $this->data->article->title;
        $this->data->categories = BlogCategory::all();

        render('admin.blog.edit', (array) $this->data);

    }

    /**
     * Write article
     * 
     * @return void
     */
    public function writeArticle(){

        # validate user permission
        if(!Handler::can('blog', 'create')->status) exit(render('errors.403'));
        
        # data allocation
        $this->data->title = 'Write Article';
        $this->data->categories = BlogCategory::all();

        render('admin.blog.write', (array) $this->data);
    }

    /**
     * Create a new article
     * 
     * @return void
     */
    public function createArticle(){

        if(!Handler::can('blog', 'create')->status)
            exit(response()->json( ['status' => 'error', 'message'=> __('You\'re not authorised')]));

        $fileUploaded = null;
        $coverImage = request()->get('cover');
        
        if(!is_null($coverImage) and $coverImage['name'] != '' ){

            $fileUploaded = request()->uploadAs('cover', 'storage/app/public/blog/', uniqid(),
                ['extensions' => ['jpg', 'jpeg', 'png']]
            );

            if(!$fileUploaded):
                return response()->json(['status' => 'error', 'message' => __('Error uploading file')]);
            endif;

            // replace storage/app/public with an empty string
            $fileUploaded['path'] = str_replace('storage/app/public', '', $fileUploaded['path']);

        }

        # prepare article tags
        (request()->get('tags')) ?
            $tags = explode(',', str_replace(' ', '', request()->get('tags'))) :
            $tags = null;

        // extract images from the content
        $content = extract_images_from_html(request()->get('content'),'storage/app/public/blog/');
        $content = htmlentities($content);

        try {
            
            BlogArticle::create([
                'title' => request()->get('title'),
                'content' => $content,
                'category' => request()->get('category'),
                'tags' => $tags,
                'author' => auth()->id(),
                'cover' => $fileUploaded['path'] ?? null
            ]);

            response()->json( ['status' => 'success', 'message'=> __('Article added succesfully')] );

        } catch (\Throwable $e) {

            response()->json(['status' => 'error', 'message' => __('An error occured while publishing the article'),
                'debug' => [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                ]
            ]);

        }
        
    }

    /**
     * Update an article
     * 
     * @return void
     */
    public function updateArticle()
    {
        # validate user permission
        $permission = Handler::can('blog', 'read');
        if(!$permission->status)
            exit(response()->json( ['status' => 'error', 'message'=> __('You\'re not authorised')]));

        # fetch the article
        $article = BlogArticle::find(request()->get('article_id'));

        # if user does not own the article
        if($permission->scope !== 'all'){
            if(!Handler::owns( $permission->scope, auth()->id() == $article->author ))
                exit(response()->json( ['status' => 'error', 'message'=> __('You\'re not authorised')]));
        }

        # uploads file
        $fileUploaded = null;
        $coverImage = request()->get('cover');

        if(!is_null($coverImage) and $coverImage['name'] != '' ){

            $fileUploaded = request()->uploadAs('cover', 'storage/app/public/blog/', uniqid(),
                ['extensions' => ['jpg', 'jpeg', 'png']]
            );

            if(!$fileUploaded):
                return response()->json(['status' => 'error', 'message' => __('Error uploading file')]);
            endif;

            // replace storage/app/public with an empty string
            $fileUploaded['path'] = str_replace('storage/app/public', '', $fileUploaded['path']);

        }

        # extract tags
        (request()->get('tags')) ?
            $tags = explode(',', str_replace(' ', '', request()->get('tags'))) :
            $tags = null;

        // extract images from the content
        $content = extract_images_from_html(request()->get('content'),'storage/app/public/blog/');
        $content = htmlentities($content);

        try {
            
            $article->update([
                'title' => request()->get('title'),
                'content' => $content,
                'category' => request()->get('category'),
                'tags' => $tags,
                'cover' => $fileUploaded['path'] ?? $article->cover
            ]);

            response()->json( ['status' => 'success', 'message'=> __('Article updated succesfully')] );

        } catch (\Throwable $e) {

            response()->json(['status' => 'error', 'message' => __('An error occured while updating the article'),
                'debug' => [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                ]
            ]);

        }
        
    }

    /**
     * Delete an article
     * 
     * @param string $id
     * @return void
     */
    public function deleteArticle($id){

        # validate user permission
        $permission = Handler::can('blog', 'delete');
        if(!$permission->status) exit(render('errors.403'));
         
        # fetch the article
        $article_id = Helpers::decode($id);
        $article = BlogArticle::find($article_id);

        # if user does not own the article
        if($permission->scope !== 'all'){
            if(!Handler::owns( $permission->scope, auth()->id() == $article->author ))
                exit(render('errors.403'));
        }

        # article not found
        if(!$article) response()->json(['status' => 'error', 'message' => 'Article not found'], 404);
        
        # delete the article
        $article->delete();
        response()->json(['status'=>'success', 'message' => 'Article deleted']);
    }


    /**
     * List all categories
     * 
     * @return void
     */
    public function categories(){
        
        # validate user permission
        if(!Handler::can('blog', 'view_blog_categories')->status)
            exit(response()->json( ['status' => 'error', 'message'=> __('You\'re not authorised')]));

        # data allocation
        $this->data->title = 'Blog Categories';
        $this->data->categories = BlogCategory::withCount('blog_article')->get();

        # permission list
        $this->data->addCategoryPermission = Handler::can('blog', 'create_blog_categories');
        $this->data->editCategoryPermission = Handler::can('blog', 'update_blog_categories');
        $this->data->deleteCategoryPermission = Handler::can('blog', 'delete_blog_categories');

        render('admin.blog.categories', (array) $this->data);
    }

    /**
     * Create a new category
     * 
     * @return void
     */
    public function createCategory(){

        # validate user permission
        if(!Handler::can('blog', 'create_blog_categories')->status)
            exit(response()->json( ['status' => 'error', 'message'=> __('You\'re not authorised')]));
            
        try {
            
            BlogCategory::create([
                'name' => request()->get('name'),
                'description' => request()->get('description')
            ]);

            response()->json( ['status' => 'success', 'message'=> 'Category added succesfully'] );

        } catch (\Throwable $e) {

            response()->json(['status' => 'error', 'message' => __('An error occured while creating category'),
                'debug' => [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                ]
            ]);
        }
    }

    /**
     * Update a category
     * 
     * @return void
     */
    public function updateCategory(){

        # validate user permission
        if(!Handler::can('blog', 'update_blog_categories')->status)
            exit(response()->json( ['status' => 'error', 'message'=> __('You\'re not authorised')]));

        #fetch category
        $category_id = Helpers::decode(request()->get('category_id'));
        if($category_id == '') exit(response()->json(['status' => 'error', 'message' => 'Invalid request']));

        $category = BlogCategory::find($category_id);

        # start updating
        try {
            
            $category->update([
                'name' => request()->get('name'),
                'description' => request()->get('description')
            ]);

            response()->json( ['status' => 'success', 'message'=> __('Category updated succesfully')] );

        } catch (\Throwable $e) {

            response()->json(['status' => 'error', 'message' => __('An error occured while creating category'),
                'debug' => [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                ]
            ]);
        }

    }

    /**
     * Delete a category
     * 
     * @param string $id
     * @return void
     */
    public function deleteCategory($id){
        
        # validate user permission
        if(!Handler::can('blog', 'delete_blog_categories')->status)
            exit(response()->json( ['status' => 'error', 'message'=> __('You\'re not authorised')]));

        # fetch category
        $categoryId = Helpers::decode($id);
        $category = BlogCategory::find($categoryId);

        # prevent deletion of the default category
        if($categoryId === 1)
            exit(response()->json( ['status' => 'error', 'message'=> __('Default category can\'t be deleted')]));

        # check if category exists
        if(!$category)
            response()->json(['status' => 'error', 'message' => __('Category does not exist')]);
        
        # reallocate article to default category before deleting
        BlogArticle::where('category', $categoryId)->update(['category' => 1]);

        # delete
        $category->delete();
        response()->json(['status'=>'success', 'message' => __('Category succesfully deleted')]);

    }
}
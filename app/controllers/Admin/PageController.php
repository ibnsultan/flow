<?php

namespace App\Controllers\Admin;

use App\Helpers\Helpers;

use App\Models\Page;
use App\Controllers\Controller;

class PageController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display the pages
     * 
     * @return void
     */
    public function index() :void
    {

        $this->data->title = 'Pages';
        $this->data->pages = Page::all();

        render('admin.pages.index', (array) $this->data);
    }

    /**
     * Add a new page
     * 
     * @return void
     */
    public function add() :void
    {
        $this->data->title = 'Create New Page';
        render('admin.pages.add', (array) $this->data);
    }

    /**
     * Add a new page
     * 
     * @return void
     */
    public function addPage(){

        // extract images from the content
        $content = extract_images_from_html(
            request()->get('content'),'storage/app/uploads/blog/');

        
        $content = htmlentities($content);
        
        try{

            Page::create([

                'title' => request()->get('title'),
                'slug' => request()->get('slug'),
                'content' => $content,
                'status' => request()->get('status'),
                'meta_description' => request()->get('meta_description'),
                'meta_keywords' => request()->get('meta_keywords'),
                'status' => request()->get('status')

            ]);

            response()->json(['status' => 'success', 'message' => 'Page added successfully']);

        }catch(\Exception $e){
            ( getenv('app_debug') == 'true') ?
                response()->json(['status' => 'error', 'message' => $e->getMessage()]) :
                response()->json(['status' => 'error', 'message' => 'Failed to add the page']);
        }

    }

    /**
     * Edit a page
     * 
     * @param string $id
     * @return void
     */
    public function edit($id){
        
        $pageId = Helpers::decode($id);
        if($pageId == '')
            exit(response()->json(['status' => 'error', 'message' => 'Invalid request']));

        $page = Page::find($pageId);
        if(!$page)
            exit(response()->page(getcwd().'/app/views/errors/404.html', 404));

        $this->data->title = 'Edit Page';
        $this->data->page = $page;

        render('admin.pages.edit', (array) $this->data);
    }

    /**
     * Update a page
     * 
     * @param string $id
     * @return void
     */
    public function updatePage($id){

        $pageId = Helpers::decode($id);
        $page = Page::find($pageId);

        if(!$page)
            exit(response()->json(['status' => 'error', 'message' => 'Invalid request']));

        // extract images from the content
        $content = extract_images_from_html(
            request()->get('content'),'storage/app/uploads/blog/');

        $content = htmlentities($content);

        try{

            $page->update([

                'title' => request()->get('title'),
                'slug' => request()->get('slug'),
                'content' => $content,
                'status' => request()->get('status'),
                'meta_description' => request()->get('meta_description'),
                'meta_keywords' => request()->get('meta_keywords'),
                'status' => request()->get('status')

            ]);

            response()->json(['status' => 'success', 'message' => 'Page updated successfully']);

        }catch(\Exception $e){
            ( getenv('app_debug') == 'true') ?
                response()->json(['status' => 'error', 'message' => $e->getMessage()]) :
                response()->json(['status' => 'error', 'message' => 'Failed to update the page']);
        }
    }

    /**
     * Delete a page
     * 
     * @param string $id
     * @return void
     */

    public function delete($id){
        
        $pageId = Helpers::decode($id);
        if($pageId == '')
            response()->json(['status' => 'error', 'message' => 'Invalid request']);
        
        $page = Page::find($pageId);
        if(!$page)
            response()->json(['status' => 'error', 'message' => 'Page not found'], 404);
        
        $page->delete();
        response()->json(['status'=>'success', 'message' => 'Page deleted']);
    }

}
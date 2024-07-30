<?php

namespace App\Controllers\Admin;

use App\Models\Page;
use App\Controllers\Controller;

use App\Helpers\Helpers;
use App\Middleware\Handler;

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

        # validate permission
        if(!Handler::can('page', 'read')->status) exit(render('errors.403'));

        # allocate data
        $this->data->title = 'Pages';
        $this->data->pages = Page::all();

        # allocate permission
        $this->data->addPagePermission = Handler::can('page', 'create');
        $this->data->editPagePermission = Handler::can('page', 'update');
        $this->data->deletePagePermission = Handler::can('page', 'delete');

        render('admin.pages.index', (array) $this->data);
    }

    /**
     * Add a new page
     * 
     * @return void
     */
    public function add() :void
    {
        # validate permission
        if(!Handler::can('page', 'create')->status) exit(render('errors.403'));

        $this->data->title = 'Create New Page';
        render('admin.pages.add', (array) $this->data);
    }

    /**
     * Add a new page
     * 
     * @return void
     */
    public function addPage(){

        # validate permission
        if(!Handler::can('page', 'create')->status)
            exit(response()->json(['status' => 'error', 'message' => 'Permission denied']));

        try{

            // extract images from the content
            $content = extract_images_from_html(
                request()->get('content'),'storage/app/uploads/blog/');

            $content = htmlentities($content);
            
            # add the page
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
            response()->json(['status' => 'error', 'message' => 'Failed to add the page',
                'debug' => [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]
            ]);
        }

    }

    /**
     * Edit a page
     * 
     * @param string $id
     * @return void
     */
    public function edit($id){

        # validate permission
        if(!Handler::can('page', 'update')->status) exit(render('errors.403'));
        
        # decode the id
        $pageId = Helpers::decode($id);
        if($pageId == '')
            exit(response()->json(['status' => 'error', 'message' => 'Invalid request']));

        # find the page
        $page = Page::find($pageId);
        if(!$page)
            exit(response()->page(getcwd().'/app/views/errors/404.html', 404));

        # allocate data
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

        # validate permission
        if(!Handler::can('page', 'update')->status)
            exit(response()->json(['status' => 'error', 'message' => 'Permission denied']));

        try{

            # decode the id
            $pageId = Helpers::decode($id);
            $page = Page::find($pageId);

            # check if page exists
            if(!$page) exit(response()->json(['status' => 'error', 'message' => 'Invalid request']));

            // extract images from the content
            $content = extract_images_from_html(
                request()->get('content'),'storage/app/uploads/blog/');

            $content = htmlentities($content);

            # update the page
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
            response()->json(['status' => 'error', 'message' => 'Failed to update the page',
                'debug' => [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]
            ]);
        }
    }

    /**
     * Delete a page
     * 
     * @param string $id
     * @return void
     */

    public function delete($id){

        # validate permission
        if(!Handler::can('page', 'delete')->status)
            exit(response()->json(['status' => 'error', 'message' => 'Permission denied']));
        
        # decode the id
        $pageId = Helpers::decode($id);
        if($pageId == '')
            response()->json(['status' => 'error', 'message' => 'Invalid request']);
        
        # find the page
        $page = Page::find($pageId);
        if(!$page) response()->json(['status' => 'error', 'message' => 'Page not found']);

        # delete the page
        $page->delete();
        response()->json(['status'=>'success', 'message' => 'Page deleted']);
    }

}
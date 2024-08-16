<?php

namespace App\Controllers\Admin;

use App\Middleware\Handler;

use App\Models\Role;
use App\Models\Announcement;
use App\Controllers\Controller;

class AnnouncementController extends Controller
{
    public function index() :void
    {
        # Check if user has permission to view announcements
        if(!Handler::can('app', 'view_announcements')->status) exit(render('errors.403'));

        # allocate data
        $this->data->roles = Role::all();
        $this->data->title = 'Announcement List';
        $this->data->announcements = Announcement::all();

        # allocate permissions
        $this->data->addAnnouncementPermission = Handler::can('app', 'add_announcements');
        $this->data->deleteAnnouncementPermission = Handler::can('app', 'delete_announcements');

        render('admin.announcement.index', (array) $this->data);

    }

    public function add() :void
    {
        if(!Handler::can('app', 'add_announcements')->status)
            exit(response()->json(['status' => 'error', 'message' => __('You do not have permission to add announcements')]));
        
        try{
            $data['title'] = request()->params('title');
            $data['description'] = request()->params('description');
            $data['recipients'] = request()->params('recipients');

            if(in_array(null, $data)) 
                exit(response()->json(['status' => 'error', 'message' => 'Title, description and recipients are required']));

            /*if(request()->get('cover')['size']){
                $file = Helpers::upload(
                    'cover',
                    'storage/app/uploads/announcements/',
                    ['jpg', 'jpeg', 'png', 'gif']
                );

                if($file['error']) exit( response()->json(['status' => 'error', 'message' => $file['message']]) );

                $data['cover'] = $file['path'];
            }*/

            $data['link'] = request()->params('link');

            Announcement::create($data);

            response()->json(['status' => 'success', 'message' => __('Announcement created successfully')]);
            
        }catch(\Exception $e){
            response()->json(['status' => 'error', 'message' => __('An error occurred while creating announcement'),
                'debug' => [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine() . ' in ' . $e->getFile()
                ]
            ]);
        }
    }

    public function delete($id) :void
    {

        if(!Handler::can('settings', 'delete_announcements'))
            exit(response()->json(['status' => 'error', 'message' => __('You do not have permission to delete announcements')]));

        $announcement = Announcement::find($id);

        if(!$announcement)
            exit(response()->json(['status' => 'error', 'message' => __('Announcement not found')]));

        $announcement->delete();

        response()->json(['status' => 'success', 'message' => __('Announcement deleted successfully')]);
    }
}
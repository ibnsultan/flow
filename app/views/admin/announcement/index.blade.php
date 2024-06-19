@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body position-relative">
                            <h5>
                                {{_('Announcements')}}
                            </h5>
                            <a class="btn btn-primary position-absolute" 
                                style="top:0.8rem;right:2rem;" href="/admin/announcement/add"
                                data-bs-toggle="modal" data-bs-target="#addNewAnnouncement">
                                {{_('Add New')}}
                            </a>             
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if(count($announcements))

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{_('Title')}}</th>
                                                <th>{{_('Description')}}</th>
                                                <th>{{_('Issued')}}</th>
                                                <th>{{_('Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($announcements as $announcement)
                                                <tr>
                                                    <td>{{ $announcement->title }}</td>
                                                    <td>{{ $announcement->description }}</td>
                                                    <td>{{ $announcement->created_at->diffForHumans() }}</td>
                                                    <td>
                                                        <a href="/admin/announcement/edit/{{ $helpers::encode($announcement->id) }}" class="btn btn-sm btn-primary rounded">
                                                            <i class="ti ti-pencil"></i>
                                                        </a>
                                                        <a href="/admin/announcement/delete/{{ $helpers::encode($announcement->id) }}" class="btn btn-sm btn-danger rounded">
                                                            <i class="ti ti-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            @else
                                <div class="text-center">
                                    {{_('No announcements found')}}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            
            </div>

        </div>
    </div>

    <!-- Add New Announcement Modal -->
    <div class="modal fade" id="addNewAnnouncement" tabindex="-1" aria-labelledby="addNewAnnouncementLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewAnnouncementLabel">
                        {{_('Add New Announcement')}}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="addAnnouncement" method="POST">
                        <div class="form-group">
                            <label class="form-label">{{_('Title')}}</label>
                            <input type="text" name="title" class="form-control" placeholder="announcement title" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">{{_('Description')}}</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="announcement content" required></textarea>
                        </div>
                        <div class="form-group user-upload rounded w-100">
                            <img src="/assets/images/placeholder.jpg" alt="Image Placeholder" id="imagePreview" class="w-100">
                            <label for="cover" id="coverUpload" class="img-avtar-upload" >
                                <i class="ti ti-camera f-24 mb-1"></i>
                                <span>Upload</span>
                            </label>
                            <input type="file" id="cover" name="cover" class="d-none" accept="image/*" 
                                onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100 rounded">{{_('Publish')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection
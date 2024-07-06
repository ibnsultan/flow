@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body border-0 position-relative">
                            <h5>
                                {{__('Announcements')}}
                            </h5>
                            <a class="btn btn-primary rounded text-white position-absolute" style="top:0.8rem;right:2rem;"
                                data-bs-toggle="modal" data-bs-target="#addNewAnnouncement">
                                {{__('Add New')}}
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
                                                <th>{{__('Title')}}</th>
                                                <th>{{__('Description')}}</th>
                                                <th>{{__('Issued')}}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($announcements as $announcement)
                                                <tr id="announcement-{{$announcement->id}}">
                                                    <td>{{ $announcement->title }}</td>
                                                    <td class="w-50">
                                                        <span>{{ $announcement->description }}</span>
                                                    </td>
                                                    <td>{{ $announcement->created_at->diffForHumans() }}</td>
                                                    <td class="text-end">
                                                        <button class="btn btn-sm btn-danger rounded" onclick="deleteAnnouncement({{$announcement->id}})">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            @else
                                <div class="text-center">
                                    {{__('No announcements found')}}
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
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewAnnouncementLabel">
                        {{__('Add New Announcement')}}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="addAnnouncement" method="POST">
                        <div class="form-group">
                            <label class="form-label">{{__('Title')}}</label>
                            <sup class="text-danger">*</sup>
                            <input type="text" name="title" class="form-control" placeholder="announcement title" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{__('Description')}}</label>
                            <sup class="text-danger">*</sup>
                            <textarea name="description" class="form-control" rows="3" placeholder="announcement content" required></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{__('Link')}}</label>
                            <input type="text" name="link" class="form-control" placeholder="announcement link">
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{__('Recipients')}}</label>
                            <sup class="text-danger">*</sup>
                            <select name="recipients[]" class="form-control form-select" multiple required
                                data-live-search="true" data-size="8">
                                <option value="">Select Target audience</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->description }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!--div class="form-group user-upload rounded w-100">
                            <img src="/assets/images/placeholder.jpg" alt="Image Placeholder" id="imagePreview" class="w-100">
                            <label for="cover" id="coverUpload" class="img-avtar-upload" >
                                <i class="ti ti-camera f-24 mb-1"></i>
                                <span>Upload</span>
                            </label>
                            <input type="file" id="cover" name="cover" class="d-none" accept="image/*" 
                                onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])">
                        </div-->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100 rounded">{{__('Publish')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection
@section('scripts')
    <script>

        $('form[name="addAnnouncement"]').submit(function(e){
            e.preventDefault();
            buttonState($('[type="submit"]'), 'loading');

            var formData = new FormData(this);
            $.ajax({
                url: '/admin/announcement/add',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status == 'success'){
                        window.location.reload();
                    }else{
                        Swal.fire({icon: 'error', title: 'Error', text: response.message})
                    }
                },
                error: function(response){
                    Swal.fire({icon: 'error', title: 'Error', text: '{{__('Something went wrong')}}'})
                },
                complete: function(){
                    buttonState($('[type="submit"]'), 'reset', 'Publish');
                }
            });
        });

        function deleteAnnouncement(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/announcement/delete/'+id,
                        type: 'GET',
                        success: function(response){
                            if(response.status == 'success'){
                                $('#announcement-'+id).remove();
                                iziToast.success({title: 'Success', message: response.message, position: 'bottomCenter'});
                            }else{
                                Swal.fire({icon: 'error', title: 'Error', text: response.message})
                            }
                        },
                        error: function(response){
                            Swal.fire({icon: 'error', title: 'Error', text: response.responseJSON.message})
                        }
                    });
                }
            });
        }

    </script>
@endsection
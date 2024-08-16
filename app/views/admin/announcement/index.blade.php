@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body border-0 position-relative">
                            <h5>
                                {{ __('Announcements') }}
                            </h5>
                            @if($addAnnouncementPermission->status)
                                <a class="btn btn-primary rounded text-white position-absolute" style="top:0.8rem;right:2rem;"
                                    data-bs-toggle="modal" data-bs-target="#addNewAnnouncement">
                                    {{ __('Add Announcement') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if(count($announcements))
                                @include('admin.announcement.table.list')
                            @else
                                @include('layouts.admin.empty')
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('admin.announcement.forms.create')
       
@endsection
@section('scripts')

    <!-- add announcement -->
    @if($addAnnouncementPermission->status)
        <script>
            $('#formAddAnnouncement').submit(function(e){
                e.preventDefault();
                buttonState($('#btnAddAnnouncement'), 'loading');

                var formData = new FormData(this);
                $.ajax({
                    url: '{{ route('admin.announcement.create') }}',
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
                        buttonState($('#btnAddAnnouncement'), 'reset', 'Publish');
                    }
                });
            });
        </script>
    @endif

    <!-- delete announcement -->
    @if($deleteAnnouncementPermission->status)
        <script>
            function deleteAnnouncement(id){
                Swal.fire({
                    title: "{{ __('Are you sure?') }}",
                    text: "{{ __('This action is not reversible!') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "{{ __('Yes, delete it!') }}"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: ('{{ route("admin.announcement.delete", ":id") }}').replace(':id', id),
                            type: 'GET',
                            success: function(response){
                                if(response.status == 'success'){
                                    $('#announcement-'+id).remove();
                                    toast.success({title: 'Success', message: response.message, position: 'bottomCenter'});
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
    @endif
@endsection
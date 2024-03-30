@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-3 position-relative">
                            <h5>
                                {{_('Modules Settings')}}
                            </h5>                
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form name="updateSeo" method="POST" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-12 my-2">
                                        <h6 class="card-title">Notifications</h6>
                                    </div>

                                    <!-- allow announcements -->
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="allow_announcement" id="allow_announcement" {{ settings->get('allow_announcement') == 'true' ? 'checked' : '' }}>
                                                <label class="form-check" for="allow_announcement">
                                                    {{_('Allow Announcements')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- allow notifications -->
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="allow_notification" id="allow_notification" {{ settings->get('allow_notification') == 'true' ? 'checked' : '' }}>
                                                <label class="form-check" for="allow_notification">
                                                    {{_('Allow Notifications')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 my-2">
                                        <h6 class="card-title">CMS</h6>
                                    </div>

                                    <!-- allow blog -->
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="allow_blog" id="allow_blog" {{ settings->get('allow_blog') == 'true' ? 'checked' : '' }}>
                                                <label class="form-check" for="allow_blog">
                                                    {{_('Allow Blog')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 my-2">
                                        <h6 class="card-title">Authentication</h6>
                                    </div>

                                    <!-- allow api -->
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="allow_apis" id="allow_apis" {{ settings->get('allow_apis') == 'true' ? 'checked' : '' }}>
                                                <label class="form-check" for="allow_apis">
                                                    {{_('Allow API')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>                                    

                                    <!-- allow registration -->
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="allow_registration" id="allow_registration" {{ settings->get('allow_registration') == 'true' ? 'checked' : '' }}>
                                                <label class="form-check" for="allow_registration">
                                                    {{_('Allow Registration')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center mt-3">
                                    <button type="submit" class="btn btn-primary rounded">{{_('UPDATE MODULES')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        $('form[name="updateSeo"]').on('submit', function(e) {
            e.preventDefault();

            // disable btn and is loading
            $('button[type="submit"]').attr('disabled', true).html('Updating...');

            // get all checkboxes, if checked, set value to true, else false
            var formData = new FormData(this);
            $('input[type="checkbox"]').each(function() {
                if($(this).is(':checked')){
                    formData.append($(this).attr('name'), 'true');
                }else{
                    formData.append($(this).attr('name'), 'false');
                }
            });

            $.ajax({
                url: '/admin/settings/modules',
                method: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response.status == 'success'){
                        Swal.fire({ icon: 'success', title: 'Success', text: response.message })
                            .then(() => { location.reload(); })
                    }else{
                        Swal.fire({ icon: 'error', title: 'Error', text: response.message })
                        $('button[type="submit"]').attr('disabled', false).html('Update Profile');
                    }
                },
                error: function(err) {
                    Swal.fire({ icon: 'error', title: 'Error', text: 'An error occurred. Please try again later.' })
                    $('button[type="submit"]').attr('disabled', false).html('Update Profile');
                }
            });
        });

    </script>
@endsection
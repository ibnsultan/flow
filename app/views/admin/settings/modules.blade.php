@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-3 position-relative">
                            <h5>
                                {{__('Modules Settings')}}
                            </h5>                
                        </div>
                    </div>
                </div>
            </div>

            <!-- warning: deprecated -->
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning">
                        <p>
                            {{__('This page is deprecated. Please use the new Access->Modules page to manage modules.')}}
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form name="updateModules" method="POST" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-12 my-2">
                                        <h6 class="card-title">Notifications</h6>
                                    </div>

                                    <!-- allow announcements -->
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="allow_announcement" id="allow_announcement" {{ settings->allow_announcement == 'true' ? 'checked' : '' }}>
                                                <label class="form-check" for="allow_announcement">
                                                    {{__('Allow Announcements')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- allow notifications -->
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="allow_notification" id="allow_notification" {{ settings->allow_notification == 'true' ? 'checked' : '' }}>
                                                <label class="form-check" for="allow_notification">
                                                    {{__('Allow Notifications')}}
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
                                                <input class="form-check-input" type="checkbox" name="allow_blog" id="allow_blog" {{ settings->allow_blog == 'true' ? 'checked' : '' }}>
                                                <label class="form-check" for="allow_blog">
                                                    {{__('Allow Blog')}}
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
                                                <input class="form-check-input" type="checkbox" name="allow_apis" id="allow_apis" {{ settings->allow_apis == 'true' ? 'checked' : '' }}>
                                                <label class="form-check" for="allow_apis">
                                                    {{__('Allow API')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>                                    

                                    <!-- allow registration -->
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="allow_registration" id="allow_registration" {{ settings->allow_registration == 'true' ? 'checked' : '' }}>
                                                <label class="form-check" for="allow_registration">
                                                    {{__('Allow Registration')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center mt-3">
                                    <button type="submit" class="btn btn-primary rounded">{{__('UPDATE MODULES')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
@endsection
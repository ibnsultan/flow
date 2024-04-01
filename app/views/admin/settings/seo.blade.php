@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-3 position-relative">
                            <h5>
                                {{_('SEO Settings')}}
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

                                    <div class="col-md-4 col-sm-12">
                                        
                                        <label class="form-label">{{_('Meta Image')}}</label>
                                        <div class="form-group user-upload rounded w-100">
                                            <img src="{{ settings->get('meta_image') ?? '/assets/images/placeholder.jpg' }}" alt="Image Placeholder" id="imagePreview" class="w-100 h-100">
                                            <label for="cover" id="coverUpload" class="img-avtar-upload">
                                                <i class="ti ti-camera f-24 mb-1"></i>
                                                <span>Upload</span>
                                            </label>
                                            <input type="file" id="cover" name="meta_image" class="d-none" accept="image/*" onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-12 row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">{{_('Meta Keywords')}}</label>
                                                <textarea name="meta_keywords" class="form-control" placeholder="keywords comma separated" rows="3">{{ settings->get('meta_keywords') }}</textarea>
                                            </div>
                                        </div>
                                         
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">{{_('Meta Description')}}</label>
                                                <textarea name="meta_description" class="form-control" placeholder="description" rows="3">{{ settings->get('meta_description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- submit button -->
                                    <div class="col-md-12 col-sm-12 text-center mt-3">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary rounded">{{_('UPDATE SETTINGS')}}</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
@endsection
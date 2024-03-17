@extends('layouts.admin')	
@section('content')   

    <div class="pc-container">
        <div class="pc-content">
            
            <!--div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body position-relative page-title" >
                            <h5>
                                {{_('Write Article')}}
                            </h5>            
                        </div>
                    </div>
                </div>
            </div-->

            
            <form action="post" enctype="multipart/form-data" name="addArticle">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="card h-100">
                            <div class="card-body editor-board">

                                <textarea name="content" id="classic-editor" required hidden>
                                    <h1>Write your article here</h1>
                                </textarea>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">                                    
                                    <label class="form-label">Article Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Article Title ..." required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Category</label>
                                    <select class="form-select" name="category" required>
                                        <option value="" hidden>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Tags</label>
                                    <input type="text" name="tags" placeholder="Tags, comma separated" class="form-control">
                                </div>

                                <div class="form-group user-upload rounded w-100">
                                    <img src="/assets/images/placeholder.jpg" alt="Image Placeholder" id="imagePreview" class="w-100">
                                    <label for="cover" id="coverUpload" class="img-avtar-upload" onclick="document.getElementById('cover').click()">
                                        <i class="ti ti-camera f-24 mb-1"></i>
                                        <span>Upload</span>
                                    </label>
                                    <input type="file" id="cover" name="cover" class="d-none" accept="image/*" onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary w-100 rounded">Publish</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
                

        </div>
    </div>

@endsection
@section('scripts')
    <script src="/assets/js/plugins/ckeditor/classic/ckeditor.js"></script>
    <script src="https://example.com/ckfinder/ckfinder.js"></script>
    
    <script>
        ClassicEditor
            .create( document.querySelector( '#classic-editor' ), {

                ckfinder: {
                    uploadUrl: '/app/media/upload'
                }
                

            } )
            .catch( error => {
                console.error( error );
            } );

        // update the text area content on ckeditor change
        $('.ck-editor__editable').on('keyup', function() {
            alert('changed');
            $('#classic-editor').val($(this).html());
        });

        // on submit form
        document.forms.addArticle.addEventListener('submit', function(e) {
            e.preventDefault();

            console.log(new FormData(this));

            return;
            
            $.ajax({
                url: '/admin/blog/write',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if(response.status == 'success') {
                        Swal.fire(
                            'Success!',
                            'The article has been published.',
                            'success'
                        ).then((result) => {
                            location.href = '/admin/blog/'
                        });
                    }else{
                        Swal.fire(
                            'Error!',
                            'The article could not be published.',
                            'error'
                        );
                    }
                },
                error: function(response) {
                    Swal.fire(
                        'Error!',
                        'The article could not be published.',
                        'error'
                    );
                }
            });

        });


    </script>
@endsection
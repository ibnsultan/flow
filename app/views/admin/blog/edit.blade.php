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
                                    {!! $article->content !!}
                                </textarea>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">

                                <input type="text" name="article_id" value="{{$article_id}}" hidden>

                                <div class="form-group">                                    
                                    <label class="form-label">Article Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Article Title ..." value="{{$article->title}}" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Category</label>
                                    <select class="form-select" name="category" required>
                                        <option value="{{$article->blog_category->id}}" hidden>{{$article->blog_category->name}}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label class="form-label">Tags</label>
                                    <input type="text" name="tags" placeholder="Tags, comma separated" 
                                        value="{{implode(',', $article->tags ?? [])}}" 
                                        class="form-control">
                                </div>

                                <div class="form-group user-upload rounded w-100">
                                    <img src="{{$article->cover ?? '/assets/images/placeholder.jpg'}}" alt="Image Placeholder" id="imagePreview" class="w-100">
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
    <!--script src="/assets/js/plugins/ckeditor/classic/ckeditor.js"></script-->
    <script src="https://cdn.jsdelivr.net/npm/ckeditor5-build-classic-base64-upload-adapter@1.0.1/build/ckeditor.min.js"></script>
    
    <script>
        ClassicEditor
            .create( document.querySelector( '#classic-editor' ), {             

            } )
            .catch( error => {
                console.error( error );
        });
        
        // TODO: listens to ckeditor changes instead of interval
        setInterval(function() {
            var ckEditable = document.querySelector('.ck-editor__editable').innerHTML;

            if(ckEditable != $('#classic-editor').val()) {
                $('#classic-editor').val(ckEditable);
            }
        }, 1000);
        

        // on submit form
        document.forms.addArticle.addEventListener('submit', function(e) {
            e.preventDefault();
            
            $.ajax({
                url: '/admin/blog/article/update',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if(response.status == 'success') {
                        Swal.fire(
                            'Success!',
                            'The article has been Updated Succesfully.',
                            'success'
                        )
                    }else{
                        Swal.fire(
                            'Error!',
                            'The article could not be updated.',
                            'error'
                        );
                    }
                },
                error: function(response) {
                    Swal.fire(
                        'Error!',
                        'The article could not be updated.',
                        'error'
                    );
                }
            });

        });


    </script>
@endsection
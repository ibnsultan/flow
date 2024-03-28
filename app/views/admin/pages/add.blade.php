@extends('layouts.admin')	
@section('content')   

    <div class="pc-container">
        <div class="pc-content">
            
            <form action="post" enctype="multipart/form-data" name="addPage">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="card h-100">
                            <div class="card-body editor-board">

                                <textarea name="content" id="classic-editor" required hidden>
                                    <h1>Start your page here</h1>
                                </textarea>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <select name="status" class="form-select" required>
                                        <option value="live">{{_('Published')}}</option>
                                        <option value="draft">{{_('Draft')}}</option>
                                    </select>
                                </div>

                                <div class="form-group">                                    
                                    <label class="form-label">{{_('Page Title')}}</label>
                                    <input type="text" class="form-control" name="title" placeholder="Article Title ..." required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">{{_('URL Slug')}}</label>
                                    <input type="text" name="slug" placeholder="url slug" class="form-control" pattern="^[a-zA-Z0-9_-]+$" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">{{_('Meta Keywords')}}</label>
                                    <input type="text" name="meta_keywords" placeholder="Meta Keywords, comma separated" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">{{_('Meta Description')}}</label>
                                    <textarea name="meta_description" class="form-control" placeholder="Meta Description" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary w-100 rounded">{{_('PUBLISH PAGE')}}</button>
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
    
    <script>
        ClassicEditor
            .create( document.querySelector( '#classic-editor' ), {} )
            .catch( error => {console.error( error )
        });
        
        // TODO: listens to ckeditor changes instead of interval
        setInterval(function() {
            var ckEditable = document.querySelector('.ck-editor__editable').innerHTML;

            if(ckEditable != $('#classic-editor').val()) {
                $('#classic-editor').val(ckEditable);
            }
        }, 1000);

        // slugify title
        document.forms.addPage.title.addEventListener('keyup', function() {
            var title = this.value;
            var slug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            document.forms.addPage.slug.value = slug;
        });

        // on submit form
        document.forms.addPage.addEventListener('submit', function(e) {
            e.preventDefault();
            
            $.ajax({
                url: '/admin/pages/add',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if(response.status == 'success') {
                        Swal.fire( 'Success!', response.message, 'success' ).then((result) => {
                            location.href = '/admin/pages/'
                        });
                    }else{
                        Swal.fire( 'Error!', response.message, 'error' );
                    }
                },
                error: function(response) {
                    Swal.fire( 'Error!', 'The article could not be published.', 'error' );
                }
            });

        });


    </script>
@endsection
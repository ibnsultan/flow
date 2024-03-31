var url = window.location.pathname;

switch(url) {

    // pattern: /admin/blog/articles
    case '/admin/blog/categories':
        // add category submit
        $('form[name="addCategory"]').submit(function(e){
            e.preventDefault();

            // disable button and is loading
            $('#addCategory').attr('disabled', true).html('<i class="bi bi-arrow-clockwise"></i> Saving... ');

            $.ajax({
                url: '/admin/blog/category/create',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response){
                    if(response.status == 'success'){
                        Swal.fire(
                            'Success!',
                            'The category has been added.',
                            'success'
                        ).then((result) => {
                            location.reload();
                        });
                    }else{
                        Swal.fire(
                            'Error!',
                            'The category could not be added, please try again.',
                            'error'
                        );

                        // enable button
                        $('#addCategory').attr('disabled', false).html('Save');
                    }
                }
            });

        });

        $('form[name="updateCategory"]').submit(function(e){
            e.preventDefault();

            // disable button and is loading
            $('#updateCategory').attr('disabled', true).html('<i class="bi bi-arrow-clockwise"></i> Saving...');

            $.ajax({
                url: '/admin/blog/category/update',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response){
                    if(response.status == 'success'){
                        Swal.fire( 'Success!', 'The category has been updated.', 'success'
                        ).then((result) => {
                            location.reload();
                        });
                    }else{
                        Swal.fire( 'Error!', 'The category could not be updated. Please try again.', 'error' );
                        $('#updateCategory').attr('disabled', false).html('Save');
                    }
                }
            });
        });
        
        function editCategory(id, name, description){
            $('#category_id').val(id);
            $('#categoryName').val(name);
            $('#categoryDescription').val(description);

            $('#editCategoryModal').modal('show');
        }

        function deleteCategory(id){
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this category!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {                    
                    $.ajax({
                        url: '/admin/blog/categories/' + id + '/delete',
                        type: 'GET',
                        success: function(response){
                            if(response.status == 'success'){
                                Swal.fire( 'Deleted!', 'The category has been deleted.', 'success'
                                ).then((result) => {
                                    location.reload();
                                });
                            }else{
                                Swal.fire( 'Error!', 'The category could not be deleted.', 'error' );
                            }
                        }
                    });
                }
            });
        }; break;

    
    // pattern: /admin/blog
    case '/admin/blog':
        function deleteArticle(id) {  
            Swal.fire({
                title: 'Are you sure?',
                text: 'You wont be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/blog/article/' + id + '/delete',
                        type: 'GET',
                        success: function (response) {
                            if (response.status == 'success') {
                                Swal.fire( 'Deleted!', 'Article has been deleted.', 'success' ).then((result) => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire( 'Error!', 'There was an error deleting the article', 'error' );
                            }
                        },
                        error: function () {
                            Swal.fire( 'Error!', 'There was an error deleting the article', 'error' );
                        }
                    });
                } 
            });

        } break;


    case '/admin/blog/article/write':
        injectScript('/assets/js/plugins/ckeditor/classic/ckeditor.js')
            .then(() => {
                ClassicEditor
                    .create(document.querySelector('#classic-editor'))
                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            var ckEditable = editor.getData();
                            if (ckEditable !== $('#classic-editor').val()) {
                                $('#classic-editor').val(ckEditable);
                            }
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            })
            .catch(error => {
                console.error('Failed to load CKEditor:', error);
        });

        document.forms.addArticle.addEventListener('submit', function(e) {
            e.preventDefault();
            
            $.ajax({
                url: '/admin/blog/article/write',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if(response.status == 'success') {
                        Swal.fire( 'Success!', 'The article has been published.', 'success').then((result) => {
                            location.href = '/admin/blog/'
                        });
                    }else{
                        Swal.fire( 'Error!', 'The article could not be published.', 'error' );
                    }
                },
                error: function(response) {
                    Swal.fire( 'Error!', 'The article could not be published.', 'error' );
                }
            });

        }); break;

    
    // pattern: /blog/article/edit/{alphanumeric}
    case url.match(/\/admin\/blog\/article\/edit\/[a-zA-Z0-9]+/g)[0]:
        injectScript('/assets/js/plugins/ckeditor/classic/ckeditor.js')
            .then(() => {
                ClassicEditor
                    .create(document.querySelector('#classic-editor'))
                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            var ckEditable = editor.getData();
                            if (ckEditable !== $('#classic-editor').val()) {
                                $('#classic-editor').val(ckEditable);
                            }
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            })
            .catch(error => {
                console.error('Failed to load CKEditor:', error);
        });



    default:
        // do nothing
        break

}
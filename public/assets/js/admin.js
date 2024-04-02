var url = window.location.pathname;

function pattern(urlMatch) {
    if (!urlMatch) return false;

    return urlMatch[0];
}

function multiple(urls) {

    var url = window.location.pathname;
    for (var i = 0; i < urls.length; i++) {
        if (url === urls[i]) {
            return urls[i];
        }
    }
    
    return false;

}

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
    case pattern(url.match(/\/admin\/blog\/article\/edit\/[a-zA-Z0-9]+/g)) :
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
                        Swal.fire( 'Success!', 'The article has been Updated Succesfully.', 'success' )
                    }else{
                        Swal.fire( 'Error!', 'The article could not be updated.', 'error' );
                    }
                },
                error: function(response) {
                    Swal.fire( 'Error!', 'The article could not be updated.', 'error' );
                }
            });

        }); break

    case '/admin/settings/general':
        $('.preset-color a').on('click', function() {
            $('.preset-color a').removeClass('active');
            $(this).addClass('active');
            
            $('#theme_preset').val($(this).data('value'));
        });

        $('.layout-preset').on('click', function(){
            $('#default_layout').val($(this).data('input'));

            // change active class
            $('.layout-preset').removeClass('active');
            $(this).addClass('active');
        });

        $('form[name="updateSettings"]').on('submit', function(e) {
            e.preventDefault();

            // disable btn and is loading
            $('button[type="submit"]').attr('disabled', true).html('Updating...');

            let formData = new FormData(this);

            $.ajax({
                url: '/admin/settings/general',
                method: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response.status == 'success'){
                        Swal.fire({ icon: 'success', title: 'Success', text: response.message })
                        $('button[type="submit"]').attr('disabled', false).html('Update Profile');
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
        }); break

    
    case '/admin/settings/seo':
        $('form[name="updateSeo"]').on('submit', function(e) {
            e.preventDefault();

            // disable btn and is loading
            $('button[type="submit"]').attr('disabled', true).html('Updating...');

            let formData = new FormData(this);

            $.ajax({
                url: '/admin/settings/seo',
                method: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response.status == 'success'){
                        Swal.fire({ icon: 'success', title: 'Success', text: response.message })
                        $('button[type="submit"]').attr('disabled', false).html('Update Profile');
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
        }); break

    
    case '/admin/settings/modules':
        $('form[name="updateModules"]').on('submit', function(e) {
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
        break


    case multiple([ '/admin/users/all', '/admin/users/moderator' ]):
        $('form[name="userRegistrationForm"]').submit(function(e){

			e.preventDefault();
			
			// disable button to prevent multiple clicks
			$('button[type="submit"]').attr('disabled', true).html('Processing...');

			$.ajax({
				url: '/admin/user/create',
				type: 'POST',
				data: $(this).serialize(),
				success: function(response) {
					if(response.status == 'success') {

						Swal.fire({ icon: 'success', title: 'Success', text: response.message }).then(() => {
							location.reload();
						});

					} else {

						Swal.fire({ icon: 'error', title: 'Oops...', text: response.message });
						$('button[type="submit"]').attr('disabled', false).html('Create User');

					}
				},
				error: function() {

					Swal.fire({ icon: 'error', title: 'Oops...', text: 'An error occurred. Please try again later.' });
					$('button[type="submit"]').attr('disabled', false).html('Create User');

				}
			});

		})

        function deleteUser(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this user!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {                    
                    $.ajax({
                        url: '/admin/user/' + id ,
                        type: 'DELETE',
                        success: function(response){
                            if(response.status == 'success'){
                                Swal.fire( 'Deleted!', response.message, 'success'
                                ).then((result) => {
                                    location.reload();
                                });
                            }else{
                                Swal.fire( 'Error!', response.message, 'error' );
                            }
                        },
                        error: function() {
                            Swal.fire( 'Error!', 'There was an error deleting the user', 'error' );
                        }
                    });
                }
            });
        }; break


    // pattern: admin/user/{alphanumeric}
    case pattern(url.match(/\/admin\/user\/[a-zA-Z0-9]+/g)):
        $('[name="updateProfile"]').submit(function(e){
            e.preventDefault();
            let formData = new FormData(this);
            
            $.ajax({
                url: '/admin/user/update',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status == 'success'){
                        Swal.fire('Success', response.message, 'success')
                        .then((result) => {
                            location.reload();
                        });
                    }else{
                        Swal.fire('Error', response.message, 'error');
                    }
                },
                error: function(err){
                    Swal.fire('Error', 'An error occurred. Please try again', 'error');
                }
            });
        });


    
    default:
        // do nothing
        break

}